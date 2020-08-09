<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHewanPemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hewan_pemilik', function (Blueprint $table) {
            $table->integer('id_pemilik')->unsigned()->index();
            $table->integer('id_hewan')->unsigned()->index();
            $table->enum('jenis_kelamin', ['Jantan', 'Betina']);
            $table->string('nama_hewan',50);
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        Schema::table('hewan_pemilik', function (Blueprint $table) {
            //Set PK
            $table->primary(['id_pemilik', 'id_hewan']);

            //Set FK hewan_pemilik --- pemilik
            $table->foreign('id_pemilik')
                ->references('id')
                ->on('pemilik')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Set FK hewan_pemilik --- hewan
            $table->foreign('id_hewan')
                ->references('id')
                ->on('hewan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hewan_pemilik');
    }
}
