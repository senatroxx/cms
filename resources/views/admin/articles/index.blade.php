@extends('layouts.app-admin')

@section('content')
<a href="{{ route('post.create') }}" class="btn btn-dark float-right mb-3 shadow">Create New Article</a>
<table class="table table-dark shadow">
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td><a href="{{ route('post.edit', $post->id) }}" class="text-white">{{ $post->title }}</a></td>
            <td width="15%">{{ $post->user->name }}</td>
            <td width="15%">{{ date("d/m/Y",strtotime($post->created_at)) }}</td>
            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <td width="10%"><button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection