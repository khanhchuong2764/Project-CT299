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
                        <a href='/admin/article/create' class="btn btn-dark btn-outline-success">+Thêm Mới</a>
                    </div>
                <!-- /.card -->
                </div>
                <div class="card-body">
                    @if ($record->title)
                        <h1 class="mb-4">{{$record->title}}</h1>
                    @endif
                    @if ($record->category->title)
                        <div class="mb-4">Danh Mục Bài Viết: <b>{{$record->category->title}}</b></div>
                    @endif
                    @if ($record->thumbnail)
                        <label for="">Ảnh:</label>
                        <div class="mb-4">
                            <img src='{{$record->thumbnail}}', alt="" style="width:200px">
                        </div>
                    @endif
                    @if ($record->status)
                        <div class="mb-4">
                            <span class="status-detail">Trạng Thái:</span>
                            @if ($record->status =='active')
                                <span class="badge badge-success">Hoạt Động</span>
                            @else
                            <span class="badge badge-danger"> Dừng Hoạt Động</span>
                            @endif
                        </div>
                    @endif
                    @if ($record->posittion)
                        <div class="mb-4">Vị Trí: <b>{{$record->posittion}}</b></div>
                    @endif
                    @if ($record->description)
                        <div class="mb-4">Mô Tả Ngắn: <b>{!!$record->description!!}</b></div>
                    @endif
                    @if ($record->description)
                        <div class="mb-4">Nội Dung: <b>{!!$record->content!!}</b></div>
                    @endif
                    <a class="btn btn-warning btn-sm" href="/admin/article/edit/{{$record->id}}">Sửa</a>
                </div> 
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



