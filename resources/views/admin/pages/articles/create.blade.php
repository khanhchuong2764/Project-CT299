@extends('admin/layouts/default')


@section('content')
    @include('admin/mixins/alert')
    <form action="/admin/article/create" method="Post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Tiêu Đề</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Nhập Tiêu Đề">
            </div>
            <div class="form-group">
                <label for="parentID">Danh Mục</label>
                <select name="categoryarticle_id" class="form-control" id="parent_id">
                    <option selected value="0">--Chọn Danh Mục--</option>
                     {!! App\Helpers\CategoryHelper::Menu($record) !!}
                </select>
            </div>
            <div class="form-group">
                <label for="content">Mô Tả Ngắn</label>
                <textarea name="description" id="editor1" class="form-control" rows ="5"></textarea>
            </div>
            <div class="form-group">
                <label for="content1">Nội Dung</label>
                <textarea name="content" id="content1" class="form-control" rows ="5"></textarea>
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
@endsection 