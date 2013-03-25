<?php

class User extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'users';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = false;

	/**
	 * Establish the relationship between a user and blog posts.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function blog_posts()
	{
		return $this->has_many('Blog_Post');
	}

	/**
	 * Establish the relationship between a user and blog comments.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function blog_comments()
	{
		return $this->has_many('Blog_Comment');
	}
}