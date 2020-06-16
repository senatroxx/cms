@extends('layouts.app-admin')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-11">
        <div class="input-group">
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
    </div>
    <div class="col-1">
        <input type="submit" value="Save" class="btn btn-dark float-right mb-3">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <textarea name="body" id="editor" cols="30" rows="10"></textarea>
    </div>
</div>
</form>
@endsection