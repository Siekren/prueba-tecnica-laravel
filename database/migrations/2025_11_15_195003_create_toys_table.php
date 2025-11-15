<?php

// database/migrations/XXXX_XX_XX_XXXXXX_create_toys_table.php

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
        Schema::create('toys', function (Blueprint $table) {
            $table->id('id_toy');
            $table->string('toy_name', 100);
            $table->decimal('toy_price', 8, 2);
            $table->string('url', 255);

            // Llave foránea para la relación con kid_genre
            $table->unsignedBigInteger('id_toy_genre');
            $table->foreign('id_toy_genre')->references('idkid_genre')->on('kid_genre');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toys');
    }
};
