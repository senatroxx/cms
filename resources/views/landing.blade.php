@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="my-4 text-center">Welcome to the Blog </h1>
  <div class="row text-center">
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
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body, $limit = 160, $end = '...') !!}</p>
            <a href="{{ route('article.show', $post->id) }}"
              class="btn btn-primary btn-md text-center">Read More
              <i class="fas fa-play ml-2"></i>
            </a>
          </div>
        </div>
      </div>
  @endforeach
  </div>
</div>
@endsection