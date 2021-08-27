@extends('layouts.admin')

@section('content')
<div class="container">

@if (Session::has('message'))
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        @if (isset($post->image))
                                <img width="100px" src="{{ asset('storage/'.$post->image) }}">
                            @else
                                <img width="100px" src="{{ asset('storage/photos/no_photo.jpg') }}">
                        @endif
                    </td>

                    <td>{{ Str::limit(strip_tags($post->desc), 100, ' ...') }}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a 
                            href="{{ route('panel.destroy',  $post->id) }}" 
                            class="delete btn btn-danger"
                            onclick="return confirm('Are you sure want to delete?');"
                            data-id={{ $post->id }}
                        >delete</a>&nbsp;
                        <a 
                            href="{{ route('panel.edit',  $post->id) }}" 
                            class="edit btn btn-success" 
                            data-id={{ $post->id }}
                        >edit</a>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('panel.create') }}">Add post</a>
</div>
@endsection


