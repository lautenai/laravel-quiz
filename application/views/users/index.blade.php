@if(count($users) == 0)
	<p>No users.</p>
@else
	<table>
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Blog Posts</th>
				<th>Blog Comments</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->username}}</td>
					<td>{{$user->password}}</td>
					<td>{{count($user->blog_posts)}}</td>
					<td>{{count($user->blog_comments)}}</td>
					<td>
						<a href="{{URL::to('users/view/'.$user->id)}}" class="btn">View</a>
						<a href="{{URL::to('users/edit/'.$user->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('users/delete/'.$user->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('users/create')}}">Create new User</a></p>