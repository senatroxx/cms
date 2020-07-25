@extends('layouts.app')

@section('content')
<div class="container">
  <div class="mt-4 row">
  @if($posts[0] != null)
    @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6 mb-4 shdaow">
          <div class="card">
            <div class="view overlay">
              <img src="{!! !empty($post->image) ? $post->image :  'https://via.placeholder.com/350x195/' !!}" class="card-img-top"
                alt="">
              <a href="{{ route('article.show', $post->id) }}">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">By {{ $post->user->name }}</h6>
              <p class="card-text">{!! \Illuminate\Support\Str::limit(preg_replace("/<img[^>]+\>/i", "", $post->body), $limit = 160, $end = '...') !!}</p>
              <p class="card-text"><small class="text-muted">Posted {{ $post->created_at->diffForHumans() }}</small></p>
              <a href="{{ route('article.show', $post->id) }}"
                class="btn btn-primary btn-md text-center">Read More
                <i class="fas fa-play ml-2"></i>
              </a>
            </div>
          </div>
        </div>
    @endforeach
  @else
    <h3>No Article.</h3>
  @endif
  </div>
</div>
@endsection