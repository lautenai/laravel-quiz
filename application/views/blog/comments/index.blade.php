@if(count($comments) == 0)
	<p>No comments.</p>
@else
	<table>
		<thead>
			<tr>
				<th>User Id</th>
				<th>Blog Post Id</th>
				<th>Content</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($comments as $comment)
				<tr>
					<td><a href="{{URL::to('users/view/'.$comment->id)}}">User #{{$comment->user_id}}</a></td>
					<td><a href="{{URL::to('blog/posts/view/'.$comment->id)}}">Blog Post #{{$comment->blog_post_id}}</a></td>
					<td>{{$comment->content}}</td>
					<td>
						<a href="{{URL::to('blog/comments/view/'.$comment->id)}}" class="btn">View</a>
						<a href="{{URL::to('blog/comments/edit/'.$comment->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('blog/comments/delete/'.$comment->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('blog/comments/create')}}">Create new Blog Comment</a></p>