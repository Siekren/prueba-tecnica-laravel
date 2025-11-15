<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Usaremos DB Query Builder para la consulta compleja

class Toy extends Model
{
    // Opcional: Define la tabla si no sigue la convención de nomenclatura (plural de Toy)
    // protected $table = 'toys';

    /**
     * Obtiene los juguetes según el nombre del niño y el ID de género.
     * La consulta original parece tener un error en la cláusula WHERE y los parámetros.
     * Se asume que se buscaba el nombre del niño ('name') y el ID del género del niño ('id_kidgenre').
     *
     * @param string|null $name Nombre del niño (que está en la tabla `kid`).
     * @param int|null $genreId ID del género (que está en la tabla `kid_genre`).
     * @return \Illuminate\Support\Collection
     */
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
