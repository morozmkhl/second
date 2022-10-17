@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding post</h1>
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
                @error('content')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                @error('preview_image')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                @error('main_image')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="row">
                    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25">
                            <label>Title</label>
                            <input name='title' type="text" class="form-control" placeholder="Category title">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="summernote" cols="30" rows="10"></textarea>
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
                                {{ $category->id == old('category_id') ? ' selected':'' }}
                                >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                                @foreach($tags as $tag)
                                <option
                                    {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}
                                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>


                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
