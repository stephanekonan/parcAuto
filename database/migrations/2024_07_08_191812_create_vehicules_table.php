<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('immatriculation');
            $table->string('model');
            $table->string('type');
            $table->unsignedBigInteger('marque_id');
            $table->unsignedBigInteger('place_id');
            $table->string('proprietaire');
            $table->string('proprietaire_phone');
            $table->integer('carburant');
            $table->string('panne');
            $table->string('garantie');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
