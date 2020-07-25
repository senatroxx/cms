@extends('layouts.app-admin')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('post.create') }}" class="btn btn-primary float-right mb-3 rounded-pill">Create New Article</a>
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('post.edit', $post->id) }}" class="text-secondary">{{ $post->title }}</a></td>
                    <td width="15%">{{ $post->user->name }}</td>
                    <td width="15%">{{ date("d/m/Y",strtotime($post->created_at)) }}</td>
                    <td width="10%">
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm rounded">Edit</a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection