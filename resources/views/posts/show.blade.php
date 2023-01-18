@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        <div class="">
                            <img src="{{ $post->image }}" width="400" height="400" class="img-fluid" alt="">
                        </div>

                        <div class="my-5">{!! nl2br($post->content) !!}</div>

                        <div class="card-footer">
                            <h3>Comments</h3>
                            @auth
                                @include('includes._createCommentForm')
                            @else
                                 <a class="btn btn-primary" href="{{url('/login')}}"> Login </a> {{' to add a comment'}}
                            @endauth
                            <div class="accordion-item">
                                @foreach ($post->comments as $comment)
                                    <div class="my-5"><a href="#">{{ $comment->user->name }}: </a> {!! nl2br($comment->body) !!}</div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
