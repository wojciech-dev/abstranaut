@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Add new post</strong>
        </div>

        <div class="card-body">
            @if ($action == 'store')
                <form method="POST" action="{{ route('panel.store') }}" enctype="multipart/form-data">
            @else
                <form method="POST" action="{{ route('panel.update', $post->id) }}" enctype="multipart/form-data">
            @endif

            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-11">
                    <input 
                        id="name" 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="@isset($post){{ $post->name }}@endisset" 
                        maxlength="500"
                    >

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-md-1 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-11">
                    <input 
                        id="title" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title" 
                        value="@isset($post){{ $post->title }}@endisset"
                    >

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-md-1 col-form-label text-md-right">Image</label>

                <div class="col-md-11">
                    <div class="d-flex align-items-center">
                        @if (isset($post->image))
                            <img width="100px" src="{{ asset('storage/'.$post->image) }}">&nbsp;
                        @endif 
                    <div>
                    <input 
                        id="image" 
                        type="file" 
                        class="form-control @error('image') is-invalid @enderror" 
                        name="image" 
                        value="@isset($post){{ $post->name }}@endisset" 
                        maxlength="500"
                    >
                    <small>max 2MB size</small>
                </div>
            </div>
                
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                                     
            </div>

            <div class="form-group row">
            <label for="desc" class="col-md-1 col-form-label text-md-right">Desc</label>
                <div class="col-md-11">
                   
                    <textarea 
                        id="desc" 
                        name="desc"
                    >@isset($post){{ $post->desc }}@endisset</textarea>
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    <a href="{{ route('panel.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'desc', {
    allowedContent: true,
    autoGrow_onStartup: true,
    enterMode: CKEDITOR.ENTER_BR,
    width: '100%',
    height: '400px',
} );
CKEDITOR.editorConfig = function( config ) {
	config.entities_latin = false; 
  	config.entities_greek = false; 
  	config.entities = false; 
  	config.basicEntities = false;
    config.allowedContent = true; 
};
</script>
@endsection
