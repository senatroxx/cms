@extends('layouts.app-admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-hover">
            <tbody>
                @foreach($comments as $com)
                <tr>
                    <td>{{ \Illuminate\Support\Str::limit($com->content, $limit = 60, $end = '...') }} <small> at <a href="{{ route('article.show', $com->post->id) }}" class="text-white">{{ $com->post->title }}</a></small></td>
                    <td width="15%">{{ $com->user->name }}</td>
                    <td width="15%">{{ $com->created_at->diffForHumans() }}</td>
                    <form action="{{ route('comments.destroy', $com->id) }}" method="post">
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