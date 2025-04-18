@extends('user.layouts.master')
@section('title')
{{ isset($post) ? 'Post Update' : 'Post Create'}}
@endsection
@section('content')
    <style>
        .form-check,
        .form-group {
            padding: 0;
        }
    </style>
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ isset($post) ? 'Post Update' : 'Post Create' }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">{{ isset($post) ? 'Edit Post' : 'Add Post' }}</h4>
                                <div class="ms-md-auto py-0 py-md-0">
                                    <a href="{{ route('posts.index') }}" class="btn btn-dark btn-sm">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form action based on whether we're creating or updating -->
                            <form
                                action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- If updating, use PUT payment-method -->
                                @if (isset($post))
                                    @method('PUT')
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title"
                                                value="{{ old('title', isset($post) ? $post->title : '') }}"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Enter title" />
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="published_at">Published At</label>
                                            <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', isset($post) ? $post->published_at : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content">Content <span class="text-danger">*</span></label>
                                            <textarea name="content" id="" cols="30" rows="5" class="form-control">{!! old('content', isset($post) ? $post->content : '') !!}  </textarea>
                                            @error('content')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                class="btn btn-primary btn-sm mt-4">{{ isset($post) ? 'Update' : 'Submit' }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
