<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('blog/posts/view/'.$comment->blog_post->id)}}">Blog Post</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('blog/comments')}}">Blog Comments</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Blog Comment</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>User id:</strong>
	{{$comment->user_id}}
</p>
<p>
	<strong>Blog post id:</strong>
	{{$comment->blog_post_id}}
</p>
<p>
	<strong>Content:</strong>
	{{$comment->content}}
</p>

<p><a href="{{URL::to('blog/comments/edit/'.$comment->id)}}" class="btn">Edit</a> <a href="{{URL::to('blog/comments/delete/'.$comment->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
