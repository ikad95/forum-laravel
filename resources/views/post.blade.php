@extends('layouts.app')
@section('content')
<div style="margin: 120px;">
<form class="form-horizontal" action="/" method="post">
  <div class="row-fluid">
    <div class="form-group">
      <div class="col-lg-12">
      	{{ csrf_field() }}
      	<label>Title :</label>
		<input class="form-control" name="title" type="text">

      	<label> Ask :</label>
        <textarea class="form-control" name="content" rows="4" id="textArea"></textarea>
        <br>
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
      </div>
    </div>
  </div >
</form>
</div>
@endsection