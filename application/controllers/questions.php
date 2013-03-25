<?php

class Questions_Controller extends Base_Controller {

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
	 * View all of the questions.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$questions = Question::with(array('answers'))->get();

		$this->layout->title   = 'Questions';
		$this->layout->content = View::make('questions.index')->with('questions', $questions);
	}

	/**
	 * Show the form to create a new question.
	 *
	 * @return void
	 */
	public function get_create()
	{
		$this->layout->title   = 'New Question';
		$this->layout->content = View::make('questions.create');
	}

	/**
	 * Create a new question.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'title' => array('required'),
		));

		if($validation->valid())
		{
			$question = new Question;

			$question->title = Input::get('title');

			$question->save();

			Session::flash('message', 'Added question #'.$question->id);

			return Redirect::to('questions');
		}

		else
		{
			return Redirect::to('questions/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific question.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$question = Question::with(array('answers'))->find($id);

		if(is_null($question))
		{
			return Redirect::to('questions');
		}

		$this->layout->title   = 'Viewing Question #'.$id;
		$this->layout->content = View::make('questions.view')->with('question', $question);
	}

	/**
	 * Show the form to edit a specific question.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$question = Question::find($id);

		if(is_null($question))
		{
			return Redirect::to('questions');
		}

		$this->layout->title   = 'Editing Question';
		$this->layout->content = View::make('questions.edit')->with('question', $question);
	}

	/**
	 * Edit a specific question.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'title' => array('required'),
		));

		if($validation->valid())
		{
			$question = Question::find($id);

			if(is_null($question))
			{
				return Redirect::to('questions');
			}

			$question->title = Input::get('title');

			$question->save();

			Session::flash('message', 'Updated question #'.$question->id);

			return Redirect::to('questions');
		}

		else
		{
			return Redirect::to('questions/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific question.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$question = Question::find($id);

		if( ! is_null($question))
		{
			$question->delete();

			Session::flash('message', 'Deleted question #'.$question->id);
		}

		return Redirect::to('questions');
	}
}