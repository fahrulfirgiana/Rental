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
        Schema::create('sopir', function (Blueprint $table) {
            $table->bigIncrements('id_sopir');
            $table->string('kd_sopir', 15);
            $table->string('nm_sopir', 40);
            $table->string('nohp', 13);
            $table->string('gender', 20);
            $table->text('alamat');
            $table->text('ket');

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
        Schema::dropIfExists('sopir');
    }
};
