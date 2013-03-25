<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('blog/posts/view/'.$comment->blog_post->id)}}">Blog Post</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('blog/comments')}}">Blog Comments</a> <span class="divider">/</span>
		</li>
		<li class="active">Editing Blog Comment</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('user_id', 'User Id')}}

			<div class="input">
				{{Form::text('user_id', Input::old('user_id', $comment->user_id), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('blog_post_id', 'Blog Post Id')}}

			<div class="input">
				{{Form::text('blog_post_id', Input::old('blog_post_id', $comment->blog_post_id), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('content', 'Content')}}

			<div class="input">
				{{Form::textarea('content', Input::old('content', $comment->content), array('class' => 'span10'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}