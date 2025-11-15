<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Usaremos DB Query Builder para la consulta compleja
use App\Models\KidGenre;

class Toy extends Model
{

    public function genre()
    {
        // belongsTo(Modelo_Padre::class, 'llave_foranea_en_tabla_actual', 'llave_primaria_en_tabla_padre')
        return $this->belongsTo(KidGenre::class, 'id_toy_genre', 'idkid_genre');
    }
    public function getToys($name, $genreId)
    {
        // Versión Laravel Query Builder
        $toys = DB::table('toys as t')
            ->join('kid_genre as kg', 't.id_toy_genre', '=', 'kg.idkid_genre')
            ->join('kid as k', 'k.idkid_genre', '=', 'kg.idkid_genre')
            ->select('t.*', 'k.name as kid_name') // Seleccionar columnas de juguete y nombre del niño
            ->where('k.name', $name)
            ->where('k.idkid_genre', $genreId)
            ->get(); // Obtener los resultados

        return $toys;
    }
}
