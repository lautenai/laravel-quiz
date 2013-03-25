<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('questions/view/'.$answer->question->id)}}">Question</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('answers')}}">Answers</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Answer</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>Question id:</strong>
	{{$answer->question_id}}
</p>
<p>
	<strong>Title:</strong>
	{{$answer->title}}
</p>
<p>
	<strong>Correct:</strong>
	{{$answer->correct}}
</p>

<p><a href="{{URL::to('answers/edit/'.$answer->id)}}" class="btn">Edit</a> <a href="{{URL::to('answers/delete/'.$answer->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
