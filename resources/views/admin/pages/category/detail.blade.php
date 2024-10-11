@extends('admin/layouts/default')


@section('content')
    <div class="card-body">
        @if ($record->title)
            <h1 class="mb-4">{{$record->title}}</h1>
        @endif
        @if ($record->thumbnail)
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
            <div class="mb-4">Mô Tả: <b>{{$record->description}}</b></div>
        @endif
        <a class="btn btn-warning btn-sm" href="/admin/category/edit/{{$record->id}}">Sửa</a>
    </div>
@endsection 