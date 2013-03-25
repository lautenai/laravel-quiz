<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$post->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('blog/posts')}}">Blog Posts</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Blog Post</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>User id:</strong>
	{{$post->user_id}}
</p>
<p>
	<strong>Title:</strong>
	{{$post->title}}
</p>
<p>
	<strong>Content:</strong>
	{{$post->content}}
</p>

<p><a href="{{URL::to('blog/posts/edit/'.$post->id)}}" class="btn">Edit</a> <a href="{{URL::to('blog/posts/delete/'.$post->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
<h2>Blog Comments</h2>

@if(count($post->blog_comments) == 0)
	<p>No blog comments.</p>
@else
	<table>
		<thead>
			<th>User Id</th>
			<th>Blog Post Id</th>
			<th>Content</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th></th>
		</thead>

		<tbody>
			@foreach($post->blog_comments as $blog_comment)
				<tr>
					<td>{{$blog_comment->user_id}}</td>
					<td>{{$blog_comment->blog_post_id}}</td>
					<td>{{$blog_comment->content}}</td>
					<td>{{$blog_comment->created_at}}</td>
					<td>{{$blog_comment->updated_at}}</td>
					<td><a href="{{URL::to('blog/comments/view/'.$blog_comment->id)}}">View</a> <a href="{{URL::to('blog/comments/edit/'.$blog_comment->id)}}">Edit</a> <a href="{{URL::to('blog/comments/delete/'.$blog_comment->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('blog/comments/create/'.$post->id)}}">Create new blog comment</a></p>
