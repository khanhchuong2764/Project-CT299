@extends('admin/layouts/default')


@section('content')
    <div class="content-wrapper">
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary mt-3">
                <div class="card-header">
                    <h3 class="card-title">{{$titlePage}}</h3>
                   
                <!-- /.card -->
                </div>
                @include('admin/mixins/alert')
            <form action="/admin/account/create" method="Post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="fullname">Họ Tên *</label>
                        <input type="text" name="fullname" required class="form-control" id="title" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" required class="form-control" id="title" >
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu *</label>
                        <input type="password" name="password" required class="form-control" id="title" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="text" name="phone" class="form-control" required id="title" >
                    </div>
                    <div class="form-group" uploads-image>
                        <label for="thumbnail">Avatar</label>
                        <input required type="file" id="thumbnail" name="file" class="form-control-file" accept="image/*" uploads-image-input>
                        <img src=""  alt="" uploads-image-previews class="imguploads">
                        <button type="button" class="btn btn-secondary btn-sm ml-3 btn-delete-uploads" button-delete-uploads>Xóa</button>
                    </div> 
                    <div class="form-group form-check form-check-inline">
                        <input type="radio" id="statusActive" name="status" class="form-check-input" checked value="active">
                        <label for="statusActive" class="form-check-lable">Hoạt Động</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input type="radio" id="statusInactive" name="status" class="form-check-input" value="inactive">
                        <label for="statusInactive" class="form-check-lable">Dừng Hoạt Động</label>
                    </div>
                </div>
                @csrf
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Mới</button>
                </div>
            </form>
            <!--/.col (left) -->    
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection







