<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPenilaianColumnOnP3MSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p3_m_s', function (Blueprint $table) {
            $table->string('penilaian')->nullable()->after('proposal');
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
            $table->dropColumn('penilaian');
        });
    }
}
