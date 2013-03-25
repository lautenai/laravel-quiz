<?php

class Answers_Controller extends Base_Controller {

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
	 * View all of the answers.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$answers = Answer::with(array('question'))->get();

		$this->layout->title   = 'Answers';
		$this->layout->content = View::make('answers.index')->with('answers', $answers);
	}

	/**
	 * Show the form to create a new answer.
	 *
	 * @return void
	 */
	public function get_create($question_id = null)
	{
		$this->layout->title   = 'New Answer';
		$this->layout->content = View::make('answers.create', array(
									'question_id' => $question_id,
								));
	}

	/**
	 * Create a new answer.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'question_id' => array('required', 'integer'),
			'title' => array('required'),
			'correct' => array('required', 'integer'),
		));

		if($validation->valid())
		{
			$answer = new Answer;

			$answer->question_id = Input::get('question_id');
			$answer->title = Input::get('title');
			$answer->correct = Input::get('correct');

			$answer->save();

			Session::flash('message', 'Added answer #'.$answer->id);

			return Redirect::to('answers');
		}

		else
		{
			return Redirect::to('answers/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific answer.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$answer = Answer::with(array('question'))->find($id);

		if(is_null($answer))
		{
			return Redirect::to('answers');
		}

		$this->layout->title   = 'Viewing Answer #'.$id;
		$this->layout->content = View::make('answers.view')->with('answer', $answer);
	}

	/**
	 * Show the form to edit a specific answer.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$answer = Answer::find($id);

		if(is_null($answer))
		{
			return Redirect::to('answers');
		}

		$this->layout->title   = 'Editing Answer';
		$this->layout->content = View::make('answers.edit')->with('answer', $answer);
	}

	/**
	 * Edit a specific answer.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'question_id' => array('required', 'integer'),
			'title' => array('required'),
			'correct' => array('required', 'integer'),
		));

		if($validation->valid())
		{
			$answer = Answer::find($id);

			if(is_null($answer))
			{
				return Redirect::to('answers');
			}

			$answer->question_id = Input::get('question_id');
			$answer->title = Input::get('title');
			$answer->correct = Input::get('correct');

			$answer->save();

			Session::flash('message', 'Updated answer #'.$answer->id);

			return Redirect::to('answers');
		}

		else
		{
			return Redirect::to('answers/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific answer.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$answer = Answer::find($id);

		if( ! is_null($answer))
		{
			$answer->delete();

			Session::flash('message', 'Deleted answer #'.$answer->id);
		}

		return Redirect::to('answers');
	}
}