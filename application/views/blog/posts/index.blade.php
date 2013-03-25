@if(count($posts) == 0)
	<p>No posts.</p>
@else
	<table>
		<thead>
			<tr>
				<th>User Id</th>
				<th>Title</th>
				<th>Content</th>
				<th>Blog Comments</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($posts as $post)
				<tr>
					<td><a href="{{URL::to('users/view/'.$post->id)}}">User #{{$post->user_id}}</a></td>
					<td>{{$post->title}}</td>
					<td>{{$post->content}}</td>
					<td>{{count($post->blog_comments)}}</td>
					<td>
						<a href="{{URL::to('blog/posts/view/'.$post->id)}}" class="btn">View</a>
						<a href="{{URL::to('blog/posts/edit/'.$post->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('blog/posts/delete/'.$post->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('blog/posts/create')}}">Create new Blog Post</a></p>