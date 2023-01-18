@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('saved'))
            <div class="alert alert-primary alert-dismissible">
                {{ session()->get('saved') }}
            </div>
        @endif
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('posts.create') }}">
                    Add post
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> Posts list</div>
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('posts.edit', $post->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $posts->links() }}

            </div>
        </div>
    </div>
@endsection
