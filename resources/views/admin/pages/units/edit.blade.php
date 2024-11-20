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
                    <div>
                        <a href='/admin/unit/create' class="btn btn-dark btn-outline-success">+Thêm Mới</a>
                    </div>
                <!-- /.card -->
                </div>
                @include('admin/mixins/alert')
                <form action="/admin/unit/edit/{{$record->id}}" method="Post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tên Đơn Vị</label>
                            <input type="text" name="title" class="form-control" id="title" required  value='{{$record->title}}'>
                        </div>
                    </div>
                    @csrf
                    @method('PATCH')
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
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


