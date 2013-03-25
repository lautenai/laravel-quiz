<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('questions')}}">Questions</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('answers')}}">Answers</a> <span class="divider">/</span>
		</li>
		<li class="active">New Answer</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('question_id', 'Question Id')}}

			<div class="input">
				{{Form::text('question_id', Input::old('question_id', $question_id), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('title', 'Title')}}

			<div class="input">
				{{Form::text('title', Input::old('title'), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('correct', 'Correct')}}

			<div class="input">
				{{Form::text('correct', Input::old('correct'), array('class' => 'span6'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}