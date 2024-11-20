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
                <div class="card-body">
                    @if ($record->fullname)
                        <div class="mb-4">
                            <span class="status-detail">Họ Tên:</span>
                            <span class="mb-4">{{$record->fullname}}</span>
                        </div>
                    @endif
                    @if ($record->email)
                        <div class="mb-4">
                            <span class="status-detail">Email:</span>
                            <span class="mb-4">{{$record->email}}</span>
                        </div>
                    @endif
                    @if ($record->phone)
                        <div class="mb-4">
                            <span class="status-detail">SDT:</span>
                            <span class="mb-4">{{$record->phone}}</span>
                        </div>
                    @endif
                    @if ($record->avatar)
                        <label for="">Avatar:</label>
                        <div class="mb-4">
                            <img src='{{$record->avatar}}', alt="" style="width:200px">
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
                    <a class="btn btn-warning btn-sm" href="/admin/my-account/edit/{{$record->id}}">Cập Nhật</a>
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