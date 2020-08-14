<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateP3MSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p3_m_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_reviewer1')->unsigned()->nullable();
            $table->integer('id_reviewer2')->unsigned()->nullable();
            $table->string('judul');
            $table->char('tahun', 9);
            $table->integer('nominal');
            $table->string('bidang_penelitian', 20);
            $table->string('proposal')->nullable();
            $table->string('monev')->nullable();
            $table->text('revisi_proposal')->nullable();
            $table->string('jenis_proposal');
            $table->string('kategori')->nullable();
            $table->enum('status',['0','1','2'])->default('1');
            $table->enum('revisi',['0','1','2'])->default('1');
            $table->timestamps();

            $table->foreign('id_reviewer1')->references('id')->on('p3_m_s')->onDelete('cascade');
            $table->foreign('id_reviewer2')->references('id')->on('p3_m_s')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p3_m_s');
    }
}
