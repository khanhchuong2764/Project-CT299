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
                        <a href='/admin/account/create' class="btn btn-dark btn-outline-success">+Thêm Mới</a>
                    </div>
                <!-- /.card -->
                </div>
                @include('admin/mixins/alert')
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    @foreach ($FillterStatus as $item)
                                        <button class="btn btn-sm ml-1 btn-outline-success {{$item['class']}} "  button-status={{$item['status']}}>{{$item['name']}}</button>
                                    @endforeach
                                </div>
                                <div class="col-4">
                                    <form action="/admin/account/changeMulti" method="post" form-changed-multi>
                                        <div class="d-flex align-items-start">
                                            <div class="form-group">
                                                <select name="type" class="form-control">
                                                    <option selected disabled>--Chọn Hành Động--</option>
                                                    <option value="active">Hoạt Động</option>
                                                    <option value="inactive">Dừng Hoạt Động</option>
                                                    <option value="delete">Xóa Tất Cả</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="ids" class="form-control d-none" inputchangemulti>
                                            </div>
                                            @csrf
                                            @method("PATCH")
                                            <button type="submit" class="btn btn-primary">Áp Dụng</button>
                                        </div>
                                    </form>
                                </div>
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
                <table class="table table-hover" checkbox-multi>
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th>STT</th>
                            <th>Avatar</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($record as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id" value={{$item->id}}>
                                    </td>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>
                                        <img src='{{$item->avatar}}', width="120px" height="auto">
                                    </td>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <a href="#" class="badge badge-success" button-change-status data-id={{$item->id}}  data-status={{$item->status}}>Hoạt Động</a>
                                        @else
                                            <a href="#" class="badge badge-danger"  button-change-status data-id={{$item->id}} data-status={{$item->status}} >Dừng Hoạt Động</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm btn-detail" href="/admin/account/detail/{{$item->id}}">Chi Tiết</a>
                                        <a class="btn btn-warning btn-sm" href="/admin/account/edit/{{$item->id}}">Sửa</a>
                                        <button class="btn btn-danger btn-sm ml-1" button-delete data-id={{$item->id}}>Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation">
                    <ul class="pagination" ulpagination>
                        @if ($objectPagi['currentPage'] > 1)
                            <li class="page-item">
                                <button class="page-link" buttonpagi={{$objectPagi['currentPage'] - 1}}><span aria-hidden="true">«</span></button>
                            </li>
                        @endif
                        @for ($i = 1; $i <= $objectPagi['totalPage']; $i++)
                            <li class="page-item">
                                <button class="page-link" buttonpagi={{$i}}>{{$i}}</button>
                            </li>
                        @endfor
                        @if ($objectPagi['currentPage'] < $objectPagi['totalPage'])
                        <li class="page-item">
                            <button class="page-link" buttonpagi={{$objectPagi['currentPage'] + 1}}><span aria-hidden="true">&raquo;</span></button>
                        </li>
                        @endif
                    </ul>
                  </nav>
            
                  <form action="" id="formchangeStatus" method="POST" data-path='/admin/account/ChangeStatus/'>
                    @csrf
                    @method('Patch')
                  </form>
                  <form action="" id="formDelete" method="POST" data-path ='/admin/account/delete/'>
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





