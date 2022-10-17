@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
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
            @error('name')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            @error('email')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            @error('role')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="row">
                <form action="{{ route('admin.user.update', $user->id) }}" class="col-4" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label >Name</label>
                        <input name='name' type="text" class="form-control"  placeholder="Name"
                               value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input name='email' type="text" class="form-control"  placeholder="Email"
                               value="{{ $user->email }}">
                    </div>
                    <div class="form-group w-50">
                        <label>Select user role</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $id => $role)
                                <option value="{{ $id }}"
                                    {{ $id == $user->role ? ' selected':'' }}
                                >{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                        <input name='user_id' type="hidden" value="{{ $user->id }}">
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
