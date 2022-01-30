<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->integer('cc')->change();
            $table->integer('hp')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('cc')->change();
            $table->string('hp')->change();
        });
    }
}
