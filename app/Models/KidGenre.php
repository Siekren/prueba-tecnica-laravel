<?php

// app/Models/KidGenre.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KidGenre extends Model
{
    use HasFactory;

    protected $table = 'kid_genre';
    protected $primaryKey = 'idkid_genre'; // Clave primaria
    public $timestamps = false;
}
