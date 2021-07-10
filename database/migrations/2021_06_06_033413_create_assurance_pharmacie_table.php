<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssurancePharmacieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assurance_pharmacie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('pharmacie_id');
            $table->foreign('pharmacie_id')->references('id')->on('pharmacies')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('assurance_id');
            $table->foreign('assurance_id')->references('id')->on('assurances')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assurance_pharmacie');
    }
}
