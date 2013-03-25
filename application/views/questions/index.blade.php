@if(count($questions) == 0)
	<p>No questions.</p>
@else
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Answers</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($questions as $question)
				<tr>
					<td>{{$question->title}}</td>
					<td>{{count($question->answers)}}</td>
					<td>
						<a href="{{URL::to('questions/view/'.$question->id)}}" class="btn">View</a>
						<a href="{{URL::to('questions/edit/'.$question->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('questions/delete/'.$question->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('questions/create')}}">Create new Question</a></p>