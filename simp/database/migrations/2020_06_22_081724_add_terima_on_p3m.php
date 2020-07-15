<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTerimaOnP3m extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p3_m_s', function (Blueprint $table) {
            $table->enum('terima',['0','1','2'])->default('1')->after('revisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p3_m_s', function (Blueprint $table) {
            $table->dropColumn('terima');
        });
    }
}
