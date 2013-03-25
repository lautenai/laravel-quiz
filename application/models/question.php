<?php

class Question extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'questions';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = false;

	/**
	 * Establish the relationship between a question and answers.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function answers()
	{
		return $this->has_many('Answer');
	}
}