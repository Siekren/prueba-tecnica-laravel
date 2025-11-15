<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail; // Usaremos la fachada de correo de Laravel
use Exception;

class ToyController extends Controller
{

    public function listToys(Request $request)
    {

        $name = $request->query('name');
        $genreId = $request->query('id_kidgenre');


        if ($name && $genreId) {
            Session::put('search_params', [
                'name' => $name,
                'genreId' => $genreId
            ]);
        }

        if ($request->isMethod('GET')) {
            try {
                $toyModel = new Toy();
                $arrToys = $toyModel->getToys($name, $genreId);

                return view('results', [
                    'arrToys' => $arrToys, // Los datos se pasan directamente al array
                    'searchName' => $name
                ]);

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
