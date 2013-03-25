<?php

class Answer extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'answers';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = false;

	/**
	 * Establish the relationship between a answer and a question.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Belongs_To
	 */
	public function question()
	{
		return $this->belongs_to('Question');
	}
}