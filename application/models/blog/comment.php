<?php

class Blog_Comment extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'blog_comments';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = true;

	/**
	 * Establish the relationship between a comment and a blog post.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Belongs_To
	 */
	public function blog_post()
	{
		return $this->belongs_to('Blog_Post');
	}

	/**
	 * Establish the relationship between a comment and a user.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Belongs_To
	 */
	public function user()
	{
		return $this->belongs_to('User');
	}
}