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
                        <a href='/admin/producers/create' class="btn btn-dark btn-outline-success">+Thêm Mới</a>
                    </div>
                <!-- /.card -->
                </div>
                @include('admin/mixins/alert')
                <form action="/admin/producers/edit/{{$record->id}}" method="Post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tên Nhà Xuất</label>
                            <input type="text" name="name" class="form-control" id="title"  value='{{$record->name}}'>
                        </div>
                        <div class="form-group">
                            <label for="desc">Nơi Sản Xuất</label>
                            <input type="text" name="place" class="form-control" id="title" value='{{$record->place}}'>
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



