<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProdiColumnOnKaP3MSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ka_p3_m_s', function (Blueprint $table) {
            $table->string('prodi')->nullable()->after('nidn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ka_p3_m_s', function (Blueprint $table) {
            $table->dropColumn('prodi');
        });

    }
}
