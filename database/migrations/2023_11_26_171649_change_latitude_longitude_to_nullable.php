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
        Schema::table('posts', function (Blueprint $table) {
            $table->double('departure_latitude',9,6)->nullable(true)->change();
            $table->double('departure_longitude',9,6)->nullable(true)->change();
            $table->double('arrive_latitude',9,6)->nullable(true)->change();
            $table->double('arrive_longitude',9,6)->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->double('departure_latitude',9,6)->nullable(false)->change();
            $table->double('departure_longitude',9,6)->nullable(false)->change();
            $table->double('arrive_latitude',9,6)->nullable(false)->change();
            $table->double('arrive_longitude',9,6)->nullable(false)->change();
        });
    }
};
