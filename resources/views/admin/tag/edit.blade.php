@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit tag</h1>
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
                <form action="{{ route('admin.tag.update', $tag->id) }}" class="col-4" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label >Title</label>
                        <input name='title' type="text" class="form-control"  placeholder="Category title"
                               value="{{ $tag->title }}">
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
