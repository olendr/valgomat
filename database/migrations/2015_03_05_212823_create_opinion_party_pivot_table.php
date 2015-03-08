<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionPartyPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opinion_party', function(Blueprint $table)
		{
			$table->integer('opinion_id')->unsigned()->index();
			$table->foreign('opinion_id')->references('id')->on('opinions')->onDelete('cascade');
			$table->integer('party_id')->unsigned()->index();
			$table->foreign('party_id')->references('id')->on('parties')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('opinion_party');
	}

}
