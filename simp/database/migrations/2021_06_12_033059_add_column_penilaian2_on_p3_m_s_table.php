<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPenilaian2OnP3MSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p3_m_s', function (Blueprint $table) {
            $table->string('penilaian2')->nullable()->after('penilaian');
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
            $table->dropColumn('penilaian2');
        });
    }
}
