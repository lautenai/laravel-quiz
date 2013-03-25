<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('questions')}}">Questions</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Question</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>Title:</strong>
	{{$question->title}}
</p>

<p><a href="{{URL::to('questions/edit/'.$question->id)}}" class="btn">Edit</a> <a href="{{URL::to('questions/delete/'.$question->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
<h2>Answers</h2>

@if(count($question->answers) == 0)
	<p>No answers.</p>
@else
	<table>
		<thead>
			<th>Title</th>
			<th>Correct</th>
			<th></th>
		</thead>

		<tbody>
			@foreach($question->answers as $answer)
				<tr>
					<td>{{$answer->title}}</td>
					<td>{{$answer->correct}}</td>
					<td><a href="{{URL::to('answers/view/'.$answer->id)}}">View</a> <a href="{{URL::to('answers/edit/'.$answer->id)}}">Edit</a> <a href="{{URL::to('answers/delete/'.$answer->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('answers/create/'.$question->id)}}">Create new answer</a></p>
