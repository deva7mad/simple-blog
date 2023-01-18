@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Latest posts</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-md-4">
                                    <div>
                                        <a href="{{ route('posts.show', $post) }}">
                                            <img src="{{ $post->image }}" width="250" height="250" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted">{{ $post->created_at }}</div>
                                    </div>
                                    <a href="{{ route('posts.show', $post) }}" class="font-weight-bold text-success">
                                        <h4 class="">{{ $post->title }}</h4>
                                    </a>
                                    <p class="text-muted">{{ $post->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
