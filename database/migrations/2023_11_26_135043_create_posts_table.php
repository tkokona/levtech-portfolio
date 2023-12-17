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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title',30);
            $table->dateTime('departure_date_and_time');
            $table->integer('number_of_passengers');
            $table->integer('rideable_number_of_people');
            $table->string('departure_point',30);
            $table->string('arrive_point',30);
            $table->double('departure_latitude',9,6)->nullable(true);
            $table->double('departure_longitude',9,6)->nullable(true);
            $table->double('arrive_latitude',9,6)->nullable(true);
            $table->double('arrive_longitude',9,6)->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        
    }
};
