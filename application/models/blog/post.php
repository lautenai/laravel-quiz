<?php

class Blog_Post extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'blog_posts';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = true;

	/**
	 * Establish the relationship between a post and a user.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Belongs_To
	 */
	public function user()
	{
		return $this->belongs_to('User');
	}

	/**
	 * Establish the relationship between a post and blog comments.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function blog_comments()
	{
		return $this->has_many('Blog_Comment');
	}
}