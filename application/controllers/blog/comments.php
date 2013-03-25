<?php

class Blog_Comments_Controller extends Base_Controller {

	/**
	 * The layout being used by the controller.
	 *
	 * @var string
	 */
	public $layout = 'layouts.scaffold';

	/**
	 * Indicates if the controller uses RESTful routing.
	 *
	 * @var bool
	 */
	public $restful = true;

	/**
	 * View all of the comments.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$comments = Blog_Comment::with(array('blog_post', 'user'))->get();

		$this->layout->title   = 'Blog Comments';
		$this->layout->content = View::make('blog.comments.index')->with('comments', $comments);
	}

	/**
	 * Show the form to create a new comment.
	 *
	 * @return void
	 */
	public function get_create($blog_post_id = null, $user_id = null)
	{
		$this->layout->title   = 'New Blog Comment';
		$this->layout->content = View::make('blog.comments.create', array(
									'blog_post_id' => $blog_post_id,
									'user_id' => $user_id,
								));
	}

	/**
	 * Create a new comment.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'blog_post_id' => array('required', 'integer'),
			'content' => array('required'),
		));

		if($validation->valid())
		{
			$comment = new Blog_Comment;

			$comment->user_id = Input::get('user_id');
			$comment->blog_post_id = Input::get('blog_post_id');
			$comment->content = Input::get('content');

			$comment->save();

			Session::flash('message', 'Added comment #'.$comment->id);

			return Redirect::to('blog/comments');
		}

		else
		{
			return Redirect::to('blog/comments/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific comment.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$comment = Blog_Comment::with(array('blog_post', 'user'))->find($id);

		if(is_null($comment))
		{
			return Redirect::to('blog/comments');
		}

		$this->layout->title   = 'Viewing Blog Comment #'.$id;
		$this->layout->content = View::make('blog.comments.view')->with('comment', $comment);
	}

	/**
	 * Show the form to edit a specific comment.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$comment = Blog_Comment::find($id);

		if(is_null($comment))
		{
			return Redirect::to('blog/comments');
		}

		$this->layout->title   = 'Editing Blog Comment';
		$this->layout->content = View::make('blog.comments.edit')->with('comment', $comment);
	}

	/**
	 * Edit a specific comment.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'blog_post_id' => array('required', 'integer'),
			'content' => array('required'),
		));

		if($validation->valid())
		{
			$comment = Blog_Comment::find($id);

			if(is_null($comment))
			{
				return Redirect::to('blog/comments');
			}

			$comment->user_id = Input::get('user_id');
			$comment->blog_post_id = Input::get('blog_post_id');
			$comment->content = Input::get('content');

			$comment->save();

			Session::flash('message', 'Updated comment #'.$comment->id);

			return Redirect::to('blog/comments');
		}

		else
		{
			return Redirect::to('blog/comments/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific comment.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$comment = Blog_Comment::find($id);

		if( ! is_null($comment))
		{
			$comment->delete();

			Session::flash('message', 'Deleted comment #'.$comment->id);
		}

		return Redirect::to('blog/comments');
	}
}