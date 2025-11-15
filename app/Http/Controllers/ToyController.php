<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Exception;

class ToyController extends Controller
{

    public function listToys(Request $request)
    {

        $name = $request->query('name');
        $email = $request->query('email');
        $genreId = $request->query('id_kidgenre');

        // Validación básica (opcional, pero buena práctica)
        if (empty($name) || empty($genreId)) {
            return redirect('/')->withErrors(['msg' => 'Nombre y Género son obligatorios.']);
        }
        if ($name && $genreId) {
            Session::put('search_params', [
                'name' => $name,
                'genreId' => $genreId
            ]);
        }
        $userData = [
                'name' => $name,
                'email' => $email,
                'genre_id' => $genreId,
            ];
        $userDataJson = json_encode($userData);
        $cookie = Cookie::make('user_toy_search', $userDataJson, 60 * 24 * 7); // 7 días

        if ($request->isMethod('GET')) {
            try {
                $toyModel = new Toy();
                $arrToys = $toyModel->getToys($name, $genreId);

                return view('results', [
                    'arrToys' => $arrToys, // Los datos se pasan directamente al array
                    'searchName' => $name
                ]);
                return $response->withCookie($cookie);
            } catch (Exception $e) {
                return response()->json([
                    'error' => $e->getMessage() . ' Something went wrong! Please contact support.'
                ], 500);
            }
        } else {
            return response()->json([
                'error' => 'Method not supported'
            ], 422);
        }
    }
}
