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
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3"> 
                                    <form id="form-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Nhập Từ Khóa" name="keyword" class="form-control" width="200px" value='{{$keyword}}'>
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">Tìm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Nhà Sản Xuất</th>
                            <th>Nơi Sản Xuất</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($record as $item)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->place}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="/admin/producers/edit/{{$item->id}}">Sửa</a>
                                        <button class="btn btn-danger btn-sm ml-1" button-delete data-id={{$item->id}}>Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

                <form action="" id="formchangeStatus" method="POST" data-path='/admin/producers/ChangeStatus/'>
                    @csrf
                    @method('Patch')
                </form> 
                <form action="" id="formDelete" method="POST" data-path ='/admin/producers/delete/'>
                    @csrf
                    @method('Delete')
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
