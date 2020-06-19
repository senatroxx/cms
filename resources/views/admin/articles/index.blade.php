@extends('layouts.app-admin')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('post.create') }}" class="btn btn-primary float-right mb-3 rounded-pill">Create New Article</a>
        <div class="table-responsive">
        <table class="table table-hover">
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('post.edit', $post->id) }}" class="text-secondary">{{ $post->title }}</a></td>
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
        </div>
    </div>
</div>
@endsection