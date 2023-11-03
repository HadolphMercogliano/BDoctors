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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')
                  ->constrained()
                  ->cascadeOnDelete(); 
                
            // $table->unsignedBigInteger('doctor_id');
            // $table->foreign('doctor_id')->references('id')->on('doctors'); 
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('email', 70);
            $table->text('text');

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
        Schema::dropIfExists('messages');
    }
};