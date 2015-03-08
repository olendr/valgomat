<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('participants', function(Blueprint $table) {
            $table->increments('id');
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('income')->nullable();
            $table->string('political_view')->nullable();
            $table->string('last_vote')->nullable();
            $table->string('will_vote')->nullable();
            $table->string('region')->nullable();
            $table->string('municipality')->nullable();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('participants');
	}

}
