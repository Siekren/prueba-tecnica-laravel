<?php
// app/Http/Controllers/Api/ToyApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Toy; // Importamos el modelo
use Illuminate\Http\Request;

class ToyApiController extends Controller
{
    /**
     * GET /api/toys
     * Muestra una lista de todos los juguetes (READ - All).
     */
    public function index()
    {
        // Devolvemos todos los juguetes con sus relaciones de género
        $toys = Toy::with('genre')->get();
        return response()->json($toys);
    }

    /**
     * GET /api/toys/{id}
     * Muestra un juguete específico (READ - Single).
     */
    public function show(Toy $toy) // Inyección de modelo (Route Model Binding)
    {
        // El modelo $toy ya está cargado por Laravel
        $toy->load('genre'); // Carga la relación de género
        return response()->json($toy);
    }

    /**
     * POST /api/toys
     * Crea un nuevo juguete (CREATE).
     */
    public function store(Request $request)
    {
        // Nota: Se requiere validación robusta aquí
        $validatedData = $request->validate([
            'toy_name' => 'required|string|max:100',
            'toy_price' => 'required|numeric',
            'url' => 'required|string|max:255',
            'id_toy_genre' => 'required|exists:kid_genre,idkid_genre',
        ]);

        $toy = Toy::create($validatedData);

        // Código de estado 201 (Created)
        return response()->json($toy, 201);
    }

    // ... Implementaciones para update() y destroy()

    /**
     * DELETE /api/toys/{id}
     * Elimina un juguete (DELETE).
     */
    public function destroy(Toy $toy)
    {
        $toy->delete();
        // Código de estado 204 (No Content)
        return response()->json(null, 204);
    }
    public function search(Request $request)
    {
        // 1. Obtener parámetros del query string
        $searchName = $request->query('name');
        $genreId = $request->query('genre_id'); // Usamos 'genre_id' para ser más RESTful

        // 2. Validación básica (la API debe ser robusta)
        if (empty($searchName) || empty($genreId)) {
            return response()->json([
                'error' => 'Los parámetros de búsqueda (name y genre_id) son obligatorios.'
            ], 400); // 400 Bad Request
        }

        try {
            // 3. Usar el método existente del modelo Toy
            $toyModel = new Toy();
            $arrToys = $toyModel->getToys($searchName, $genreId);

            // 4. Devolver la respuesta en JSON
            // (Si hubiéramos implementado API Resources, los usaríamos aquí)
            return response()->json($arrToys);

        } catch (\Exception $e) {
            // Manejar excepciones de la base de datos o lógicas
            return response()->json([
                'error' => 'Error interno del servidor al procesar la búsqueda.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
