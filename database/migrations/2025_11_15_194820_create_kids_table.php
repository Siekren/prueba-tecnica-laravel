<?php

// database/migrations/XXXX_XX_XX_XXXXXX_create_kids_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kid', function (Blueprint $table) {
            $table->id('id_kid');
            $table->string('name', 50);
            $table->string('email', 100)->nullable();

            // Llave foránea que apunta a la tabla kid_genre
            $table->unsignedBigInteger('idkid_genre');
            $table->foreign('idkid_genre')->references('idkid_genre')->on('kid_genre');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kid');
    }
};
