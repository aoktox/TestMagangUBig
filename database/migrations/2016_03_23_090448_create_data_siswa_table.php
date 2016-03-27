<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis')->unique();
            $table->string('nama');
            $table->char('j_kel');
            /*$table->string('tmp_lahir');*/
            $table->timestamp('tgl_lahir');
            $table->text('alamat');
            $table->timestamps();

            $table->primary('nis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('siswa');
    }
}
