<?php

class Create_Answers_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('answers', function($table)
		{
			
			$table->increments('id');

			$table->integer('question_id')->unsigned();
			$table->string('title');
			$table->integer('correct');

			$table->foreign('question_id')->references('id')->on('questions')->on_update('cascade')->on_delete('cascade');

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answers');
	}

}