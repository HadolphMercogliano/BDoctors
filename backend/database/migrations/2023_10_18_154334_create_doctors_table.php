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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete()->nullable();
            $table->text('description')->nullable();
            $table->text('curriculum_vitae')->nullable();

            // $table->services(); essendo una many to many non ci vuole il campo nella tabella, si faranno direttamenet i collegamenti in tabella pivot
            
            $table->text('photo')->nullable();
            $table->string('address', 200);
            $table->boolean('visible');
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
        Schema::dropIfExists('doctors');
    }
};