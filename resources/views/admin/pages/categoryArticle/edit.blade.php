
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
                        <a href='/admin/category-article/create' class="btn btn-dark btn-outline-success">+Thêm Mới</a>
                    </div>
                <!-- /.card -->
                </div>
                @include('admin/mixins/alert')
                <form action="/admin/category-article/edit/{{$record->id}}" method="Post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu Đề</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Nhập Tiêu Đề" value='{{$record->title}}'>
                        </div>
                        <div class="form-group">
                            <label for="parentID">Danh Mục Cha</label>
                            <select name="parentID" class="form-control" id="parent_id">
                                <option  value="0">--Chọn Danh Mục--</option>
                                {!! App\Helpers\CategoryHelper::MenuEdit($recordcategory,$record->parentID) !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="desc">Mô Tả</label>
                            <textarea name="description" id="desc" class="form-control tinymece" rows ="5">{{$record->description}}</textarea>
                        </div>
                        <div class="form-group" uploads-image>
                            <label for="thumbnail">Ảnh</label>
                            <input type="file" id="thumbnail" name="file" class="form-control-file" accept="image/*" uploads-image-input>
                            <img src={{$record->thumbnail}}  alt="" uploads-image-previews class="imguploads">
                            <button type="button" class="btn btn-secondary btn-sm ml-3 btn-delete-uploads" button-delete-uploads>Xóa</button>
                        </div> 
                        <div class="form-group">
                            <label for="position">Vị Trí</label>
                            <input type="number" class="form-control" name="posittion" id="position"  placeholder="Tự Động Tăng" min='1' value={{$record->posittion}}>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input type="radio" id="statusActive" name="status" class="form-check-input" {{$record->status == 'active' ? 'checked' :""}} value="active">
                            <label for="statusActive" class="form-check-lable">Hoạt Động</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input type="radio" id="statusInactive" name="status" class="form-check-input" {{$record->status == 'inactive' ? 'checked' :""}} value="inactive">
                            <label for="statusInactive" class="form-check-lable">Dừng Hoạt Động</label>
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




