<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users')}}">Users</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing User</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>Username:</strong>
	{{$user->username}}
</p>
<p>
	<strong>Password:</strong>
	{{$user->password}}
</p>

<p><a href="{{URL::to('users/edit/'.$user->id)}}" class="btn">Edit</a> <a href="{{URL::to('users/delete/'.$user->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
<h2>Blog Posts</h2>

@if(count($user->blog_posts) == 0)
	<p>No blog posts.</p>
@else
	<table>
		<thead>
			<th>Title</th>
			<th>Content</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th></th>
		</thead>

		<tbody>
			@foreach($user->blog_posts as $blog_post)
				<tr>
					<td>{{$blog_post->title}}</td>
					<td>{{$blog_post->content}}</td>
					<td>{{$blog_post->created_at}}</td>
					<td>{{$blog_post->updated_at}}</td>
					<td><a href="{{URL::to('blog/posts/view/'.$blog_post->id)}}">View</a> <a href="{{URL::to('blog/posts/edit/'.$blog_post->id)}}">Edit</a> <a href="{{URL::to('blog/posts/delete/'.$blog_post->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('blog/posts/create/'.$user->id)}}">Create new blog post</a></p>
<h2>Blog Comments</h2>

@if(count($user->blog_comments) == 0)
	<p>No blog comments.</p>
@else
	<table>
		<thead>
			<th>Blog Post Id</th>
			<th>Content</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th></th>
		</thead>

		<tbody>
			@foreach($user->blog_comments as $blog_comment)
				<tr>
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

<p><a class="btn success" href="{{URL::to('blog/comments/create/'.$user->id)}}">Create new blog comment</a></p>
