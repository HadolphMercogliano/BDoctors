<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_specialization', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')
                  ->references('id')->on('doctors')
                  ->constrained()
                  ->cascadeOnDelete(); 

            $table->unsignedBigInteger('specialization_id');
            $table->foreign('specialization_id')
                  ->references('id')
                  ->on('specializations')
                  ->constrained()
                  ->cascadeOnDelete(); 
                  
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_specialization');
    }
};