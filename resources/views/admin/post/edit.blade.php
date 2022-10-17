@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @error('title')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="row">
                <form action="{{ route('admin.post.update', $post->id) }}" class="col-6" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label >Title</label>
                        <input name='title' type="text" class="form-control"  placeholder="Category title"
                               value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="summernote" cols="30" rows="10">
                            {{ $post->content }}
                        </textarea>
                    </div>
                    <div class="w-50 mb-3">
                        <img src="{{ asset('storage/'.$post->preview_image) }}" alt="" class="w-50">
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Image-preview input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-50 mb-3">
                        <img src="{{ asset('storage/'.$post->main_image) }}" alt="" class="w-50">
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Image input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="main_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group w-50">
                        <label>Select category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $post->category_id ? ' selected':'' }}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>



            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
