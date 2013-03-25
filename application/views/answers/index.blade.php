@if(count($answers) == 0)
	<p>No answers.</p>
@else
	<table>
		<thead>
			<tr>
				<th>Question Id</th>
				<th>Title</th>
				<th>Correct</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($answers as $answer)
				<tr>
					<td><a href="{{URL::to('questions/view/'.$answer->id)}}">Question #{{$answer->question_id}}</a></td>
					<td>{{$answer->title}}</td>
					<td>{{$answer->correct}}</td>
					<td>
						<a href="{{URL::to('answers/view/'.$answer->id)}}" class="btn">View</a>
						<a href="{{URL::to('answers/edit/'.$answer->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('answers/delete/'.$answer->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('answers/create')}}">Create new Answer</a></p>