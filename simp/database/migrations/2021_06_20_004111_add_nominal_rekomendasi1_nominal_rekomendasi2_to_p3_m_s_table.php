<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNominalRekomendasi1NominalRekomendasi2ToP3MSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p3_m_s', function (Blueprint $table) {
            $table->integer('nominal_rekomendasi1')->nullable()->after('nominal');
            $table->integer('nominal_rekomendasi2')->nullable()->after('nominal_rekomendasi1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pe_m_s', function (Blueprint $table) {
            $table->dropColumn('nominal_rekomendas1');
            $table->dropColumn('nominal_rekomendas2');
        });
    }
}
