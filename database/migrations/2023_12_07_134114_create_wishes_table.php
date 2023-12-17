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
        Schema::create('wishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('root_id')->constrained('posts');
            $table->foreignId('root_user_id')->constrained('users');
            $table->dateTime('desired_departure_date_and_time');
            $table->integer('desired_number_of_passengers');
            $table->string('desired_departure_point',30);
            $table->string('desired_arrive_point',30);
            $table->double('departure_latitude',9,6)->nullable();
            $table->double('departure_longitude',9,6)->nullable();
            $table->double('arrive_latitude',9,6)->nullable();
            $table->double('arrive_longitude',9,6)->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('wishes');
        
    }
};
