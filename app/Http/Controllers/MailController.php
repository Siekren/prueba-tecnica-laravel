<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ToyInformationMail;

class MailController extends Controller
{
    /**
     * Envía la información del juguete por correo electrónico.
     */
    public function sendToyMail(Request $request)
    {
        $toyData = $request->only(['toy_name', 'toy_price', 'url']);

        $userEmail = $request->input('email');

        $to = $userEmail;
        try {
            Mail::to($to)
                ->send(new ToyInformationMail($toyData));

            return "El mensaje ha sido enviado";
        } catch (\Exception $e) {

            return "El mensaje no pudo ser enviado. Error: " . $e->getMessage();
        }
    }
}
