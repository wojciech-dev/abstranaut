@extends('layouts.admin')

@section('content')
<div class="container">

@if (Session::has('message'))
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif
    <h2>FAQ</h2>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->name }}</td>
                    <td>{{ Str::limit(strip_tags($post->desc), 100, ' ...') }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a 
                                href="{{ route('faq.edit',  $post->id) }}" 
                                class="edit btn btn-success" 
                                data-id={{ $post->id }}
                            >Edit</a>&nbsp;
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('faq.create') }}">Add post</a>
</div>
@endsection


