@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="{{ route('posts.index') }}">
                    All Posts
                </a>
            </div>
        </div>

        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('posts.create') }}">
                    Add new post
                </a>
            </div>
        </div>

    </div>

@endsection
