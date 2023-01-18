<form method="POST" action="{{ route("comments.store", $post->id) }}" >
    @csrf
    <div class="form-group">
        <label for="post">Add your comment: </label>
        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body"
                  id="post">{{ old('body') }}</textarea>
        @if($errors->has('body'))
            <div class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
        @endif

        @if($errors->has('post_id'))
            <div class="invalid-feedback">
                {{ $errors->first('post_id') }}
            </div>
        @endif
        <span class="help-block"></span>
    </div>

    @if(session()->has('saved'))
        <div class="alert alert-primary alert-dismissible">
            {{ session()->get('saved') }}
        </div>
    @endif

    <div class="form-group">
        <button class="btn btn-primary" type="submit">
            Save Comment
        </button>
    </div>
</form>
