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
                <form action="/admin/product/create" method="Post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Mã Sản Phẩm</label>
                            <input type="text" name="id_product" class="form-control" placeholder="Nhập Mã Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu Đề</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Nhập Tiêu Đề">
                        </div>
                        <div class="form-group">
                            <label for="parentID">Danh Mục</label>
                            <select name="category_id" class="form-control" id="parent_id">
                                <option selected value="0">--Chọn Danh Mục--</option>
                                 {!! App\Helpers\CategoryHelper::Menu($record) !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nhà Sản Xuất</label>
                            <select name="id_producers" class="form-control">
                                <option selected disabled>--Chọn Nhà Sản Xuất--</option>
                                @foreach ($producers as $item)
                                    <option value={{$item->id}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Đơn Vị</label>
                            <select name="id_unit" class="form-control">
                                <option selected disabled>--Chọn Nhà Đơn Vị--</option>
                                @foreach ($units as $item)
                                    <option value={{$item->id}}>{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Quy Cách</label>
                            <input type="text" name="specifications" class="form-control" placeholder="Nhập Quy Cách">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" class="form-control" name='price' id="price" value="0" min="0">
                        </div>
                        <div class="form-group">
                            <label for="discountpercent">% Giảm Giá</label>
                            <input type="number" class="form-control" name='discountPercentage' id="discountpercent" value="0" min="0">
                        </div>
                        <div class="form-group">
                            <label for="stock">Số Lượng</label>
                            <input type="number" class="form-control" name='stock' id="stock" value="0" min="0">
                        </div>
                        <div class="form-group" uploads-image>
                            <label for="thumbnail">Ảnh</label>
                            <input type="file" id="thumbnail" name="file" class="form-control-file" accept="image/*" uploads-image-input>
                            <img src=""  alt="" uploads-image-previews class="imguploads">
                            <button type="button" class="btn btn-secondary btn-sm ml-3 btn-delete-uploads" button-delete-uploads>Xóa</button>
                        </div> 
                        <div class="form-group">
                            <label for="position">Vị Trí</label>
                            <input type="number" class="form-control" name="posittion" id="position"  placeholder="Tự Động Tăng" min='1'>
                        </div>
                        <div class="form-group">
                            <label for="content">Thành Phần</label>
                            <textarea name="partials" class="form-control tinymece" rows ="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Công Dụng</label>
                            <textarea name="uses" class="form-control tinymece" rows ="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Cách Dùng</label>
                            <textarea name="howuse" class="form-control tinymece" rows ="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Mô Tả</label>
                            <textarea name="description"  class="form-control tinymece" rows ="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Lưu Ý</label>
                            <textarea name="note" class="form-control tinymece" rows ="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Bảo Quản</label>
                            <textarea name="preserve" class="form-control tinymece" rows ="5"></textarea>
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

