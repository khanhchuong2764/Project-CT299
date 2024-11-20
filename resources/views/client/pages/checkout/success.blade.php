@extends('client/layouts/default')

@section('content')
<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
      <!-- row -->
      
      <div class="row">
        <div class="col-12">
          <!-- card -->
          <div class="card py-1 border-0 mb-8">
            <div>
              <h1 class="fw-bold">{{$titlePage}}</h1>
              <p class="mb-0"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="alert alert-success p-2" role="alert">
        Chúc mừng bạn đã đặt hàng thành công! Chúng tôi sẽ xử lý đơn hàng sớm nhất cho bạn
      </div>
      <div class="col-lg-8 col-md-7">
        <h2 class="h5 mb-4">Thông Tin Cá Nhân</h2>
          <div class="py-3">
            <!-- alert -->
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" value='{{$order->fullname}}' disabled>
            </div>
            <div class="mb-5">
                <label class="form-label">SĐT</label>
                <input type="text" class="form-control" value={{$order->phone}} disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Địa Chỉ</label>
                <input type="email" class="form-control" value='{{$order->address}}' disabled>
            </div>
            <!-- button -->
            <!-- btn -->

          </div>
        </div>  
      <!-- row -->
      <div class="row">
        <div class="col-lg-8 col-md-7">
        <h2 class="h5 mb-4">Thông Tin Đơn Hàng</h2>
          <div class="py-3">
            <!-- alert -->
            <ul class="list-group list-group-flush">
                @foreach ($productDetails as $item)
                    <li class="list-group-item py-3 py-lg-0 px-0 border-top">
                        <!-- row -->
                        <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                            <!-- img --> <img src="{{$item->orderproduct->thumbnail}}" alt="Ecommerce"
                            class="img-fluid"></div>
                        <div class="col-4 col-md-6">
                            <!-- title -->
                            <a href="/product/detail/{{$item->orderproduct->id}}"><h6 class="mb-0">{{$item->orderproduct->title}}</h6></a>
                            <span><small class="text-muted">{{$item->orderproduct->specifications}}</small></span>
                            <!-- text -->
                            
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-2">
                            <div class="input-group" class="form-group">
                                <span class="form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0">{{$item->quantity}}</span>   
                            </div>
                            
        
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <span class="fw-bold">{{$item->totalPrice}} vnđ</span>
                        </div>
                        </div>
        
                    </li>
                @endforeach
              <!-- list group -->
              <!-- list group -->
              <!-- list group -->
              <!-- list group -->
              <!-- list group -->
              

            </ul>
            <!-- btn -->

          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-5">
            <!-- card -->
            <div class="mb-5 card mt-6">
              <div class="card-body p-6">
                <!-- heading -->
                <h2 class="h5 mb-4">Thông Tin Cụ Thể</h2>
                <div class="card mb-2">
                  <!-- list group -->
                  <ul class="list-group list-group-flush">
                    <!-- list group item -->
                    <!-- list group item -->
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="fw-bold">Tổng Giá</div>
  
                      </div>
                      <span class="fw-bold">{{$totalPrice}}</span>
                    </li>
                  </ul>
  
                </div>
                <a href="/checkout">
                  <div class="d-grid mb-1 mt-4">
                      <!-- btn -->
                    </div>
                </a>
                <!-- text -->
                <p><small>Bạn có đồng ý với các <a href="#!">Điều Khoản Dịch Vu</a>
                    và <a href="#!">Chính Sách Bảo mật.</a> của chúng tôi trước khi đặt hàng? </small></p>
  
                <!-- heading -->
            </div>
          </div>
        </div>
        
      </div>
      
    </section>
        

  
@endsection