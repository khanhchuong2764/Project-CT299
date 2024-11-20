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
              <h1 class="fw-bold">Giỏ Hàng</h1>
              <p class="mb-0"></p>
            </div>
          </div>
        </div>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-lg-8 col-md-7">

          <div class="py-3">
            <!-- alert -->
            <div class="alert alert-danger p-2" role="alert">
              Bạn Được Miễn Phí Vận Chuyển<a href="#!" class="alert-link"> Mua Nào!</a>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($productDetails as $item)
                    <li class="list-group-item py-3 py-lg-0 px-0 border-top">
                        <!-- row -->
                        <div class="row align-items-center">
                        <div class="col-3 col-md-2">
                            <!-- img --> <img src="{{$item->cartproduct->thumbnail}}" alt="Ecommerce"
                            class="img-fluid"></div>
                        <div class="col-4 col-md-6">
                            <!-- title -->
                            <a href="/product/detail/{{$item->cartproduct->id}}"><h6 class="mb-0">{{$item->cartproduct->title}}</h6></a>
                            <span><small class="text-muted">{{$item->cartproduct->specifications}}</small></span>
                            <!-- text -->
                            <div class="mt-2 small "> <a href="/cart/delete/{{$item->cartproduct->id}}" class="text-decoration-none text-inherit"> <span
                                class="me-1 align-text-bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-trash-2 text-success">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg></span><span class="text-muted">Xóa</span></a></div>
                        </div>
                        <!-- input group -->
                        <div class="col-3 col-md-3 col-lg-2">
                            <div class="input-group" class="form-group">
                            <input type="number" product-id={{$item->cartproduct->id}} value={{$item->quantity}} name="quantity"
                                class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">    
                            </div>
                            
        
                        </div>
                        <!-- price -->
                        <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <span class="fw-bold">{{$item->cartproduct->totalPrice}} vnđ</span>
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
            <div class="d-flex justify-content-between mt-4">
              <a href="/product" class="btn btn-primary">Tiếp Tục Mua Sắm</a>
            </div>

          </div>
        </div>

        <!-- sidebar -->
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
                    <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit">
                      Thanh Toán <span class="fw-bold">{{$totalPrice}}</span></button>
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

  <script src="{{asset('client/assets/js/cart.js')}}"></script>
  
@endsection