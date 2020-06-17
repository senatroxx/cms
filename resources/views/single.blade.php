@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-10 mx-auto">
      <h3 class="mt-4">{{ $post->title }} <span class="lead"> by <a href="#"> {{ $post->user->name }} </a></span> </h3>
      <hr>
      <p>Posted {{ $post->created_at->diffForHumans() }} </p>
      <hr>
      <img class="img-fluid rounded" src=" {!! !empty($post->image) ? $post->image :  'http://placehold.it/750x300' !!} " alt="">
      <hr>
      <div class="clearfix">
      <p class="lead">{!! $post->body !!}</p>
      </div>
      <hr>
      @auth
      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form action="{{ route('article.store') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
              <textarea class="form-control" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      @endauth
      @if(count($comments) > 0)
      <hr>
      <h4 class="mb-3">Comments:</h4>
      @foreach($comments as $com)
      <div class="media mx-4">
        <div class="media-body">
          <h5 class="mx-0">{{ $com->user->name }} <small class="text-muted ml-1">{{ $com->created_at->diffForHumans() }}</small></h5>
          {{ $com->content }}
        </div>
      </div>
      <hr>
      @endforeach
      @endif
    </div>
  </div>
</div>
<script>
  var img = document.getElementsByTagName('img');
  var panjang = img.length;
  for(var i=1;i< img.length;i++) {
    if(img[i].src == '{{ $post->image }}') {
      img[i].parentNode.removeChild(img[i]);
    }
  }
</script>
@endsection