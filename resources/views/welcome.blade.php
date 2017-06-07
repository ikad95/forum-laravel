@extends('layouts.app')
@section('title')
Forum
@endsection

@section('content')

<div style="margin-left: 120px;margin-right: 120px;">
    <a href="/create" class="btn btn-primary" >New Thread</a>
    <br><br>
    <div class="list-group">
    	@foreach ($contents as $content)
    	{{$content->topic}}
    	  <div href="#" class="list-group-item" >
    	    <span class="pull-right">{{ $content->created_at->diffForHumans() }}</span>
	        <h4 class="list-group-item-heading">{{ $content->user->name }}</h4>
	        <p class="list-group-item-text">{{ $content->content }}</p>
	        <br>
	      </div>
	      <p>Comments</p>
	      <div style="margin-left: 50px;">
		    @foreach ($content->comments as $comment)
		    	<div href="#" class="list-group-item" style="height: 30%;">
		    	    <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
			        <h4 class="list-group-item-heading">{{ $comment->user }}</h4>
			        <p class="list-group-item-text">{{ $comment->comment }}</p>
			        <br>
			    </div>
			@endforeach
		</div>
	    <form class="form-horizontal form-inline " action="/comment" method="post" style="margin-top: 5px;">

	     {{ csrf_field() }}
	     	<input type="hidden" name="post_id" value="{{ $content->id }}">
		    <input class="form-control" name="comment" type="text" style="width: 65%; margin-left: 50px;"> 
		    <input class="btn" type="submit" value="Comment" style="width: 28%;">
    	</form>
    	<br>
    	@endforeach
    </div>
</div>
@endsection