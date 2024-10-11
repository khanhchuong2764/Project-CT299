@extends('admin/layouts/default')


@section('content')
    @include('admin/mixins/alert')
    <form action="/admin/product/edit/{{$record->id}}" method="Post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Tiêu Đề</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Nhập Tiêu Đề" value='{{$record->title}}'>
            </div>
            <div class="form-group">
                <label for="desc">Mô Tả</label>
                <textarea name="description" id="desc" class="form-control textarea-timymce" rows ="5">{{$record->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" name='price' id="price" value={{$record->price}} min="0">
            </div>
            <div class="form-group">
                <label for="discountpercent">% Giảm Giá</label>
                <input type="number" class="form-control" name='discountPercentage' id="discountpercent" value={{$record->discountPercentage}} min="0">
            </div>
            <div class="form-group">
                <label for="stock">Số Lượng</label>
                <input type="number" class="form-control" name='stock' id="stock" value={{$record->stock}} min="0">
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
@endsection 