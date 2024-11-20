@extends('client/layouts/default')

@section('content')

<div class="mt-4">
  <section class="mt-8">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <!-- img slide -->
            <div class="product productModal" id="productModal">
              <img src={{$record->thumbnail}} alt="" >
            <div>
              <div>
                <!-- img -->
                <img src={{$record->thumbnail}} alt="" >
              </div>

            </div>
            
            <div>
              </div>

            </div>
            <!-- product tools -->
        </div>
        <div class="col-md-6">
          <div class="ps-md-8">
            <a href="#!" class="mb-4 d-block"></a>
            <h2 class="mb-1 h1">{{$record->title}}</h2>
            <div class="mb-4">   <small class="text-warning"> <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">30 đánh giá</a></div>
            <div class="fs-4"><span class="fw-bold text-dark">{{$record->final_price}}vnđ /{{$record->unit->title}}</span> <span
                    class="text-decoration-line-through text-muted"> {{$record->price}}vnđ</span><span><small
                        class="fs-6 ms-2 text-danger">Giảm {{$record->discountPercentage}}% </small></span>
                        <div>
                          <span class="fw-bold text-dark">Còn Lại:</span>
                          <button type="button" class="btn btn-outline-secondary">{{$record->stock}} sản phấm</button>
                        </div>
            </div>
            <hr class="my-6">
              <div>
                <button type="button" class="btn btn-outline-secondary">{{$record->unit->title}}</button>
              </div>
            <form action="/cart/add/{{$record->id}}" method="post">
              <div class="mt-5 d-flex justify-content-start">
                <div class="col-2">
                  <div class="input-group flex-nowrap justify-content-center">
                    <input type="button" value="-" class="button-minus form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0" data-field="quantity">
                    <input type="number" step="1" name="quantity" min="1" max="{{ $record->stock }}" value="1" name="quantity" class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0">
                    <input type="button" value="+" class="button-plus form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0" data-field="quantity">
                </div>
                </div>
                <div class="ms-2 col-4 d-grid">
                    <button type="submit" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>Thêm Vào Giỏ</button>
                    </div>
                    <div class="ms-2 col-4">
                    <a class="btn btn-light" href="#"  data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                      <a class="btn btn-light" href="#"  data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="feather-icon icon-heart"></i></a>
                </div>
                @csrf
            </div>              
            </form>
            <!-- hr -->
            <hr class="my-6">
            <div>
                <table class="table table-borderless">

                  <tbody>
                    <tr>
                      <td style="font-size: 13.5px;">Danh Mục:</td>
                      <td>{{$record->category->title}}</td>

                    </tr>
                    <tr>
                      <td style="font-size: 13.5px;">Công dụng:</td>
                      <td>{!!$record->uses!!}</td>

                    </tr>
                    <tr>
                      <td style="font-size: 13.5px;">Nhà sản xuất:</td>
                      <td>{{$record->producers->name}}</td>

                    </tr>
                    <tr>
                      <td style="font-size: 13.5px;">Nơi sản xuất:</td>
                      <td>{{$record->producers->place}}</td>

                    </tr>
                    <tr>
                      <td style="font-size: 13.5px;">Quy cách: </td>
                      <td><small>{{$record->specifications}}</td>

                    </tr>

                    <tr>
                        <td style="font-size: 13.5px;">Thành phần: </td>
                        <td><small>{!!$record->partials!!}</td>
                    </tr>
  


                  </tbody>
                </table>

            </div>
            <div class="mt-8">
              <!-- dropdown -->
              <div class="dropdown">
                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" 
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Chia Sẽ
                </a>

                <ul class="dropdown-menu" >
                  <li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <section class="mt-lg-14 mt-8 ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
              <!-- nav item -->
              <li class="nav-item" role="presentation">
                <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                  data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane"
                  aria-selected="true">Chi Tiết Sản Phẩm</button>
              </li>
              <li class="nav-item" role="presentation">
                <!-- btn --> <button class="nav-link" id="sellerInfo-tab" data-bs-toggle="tab"
                  data-bs-target="#sellerInfo-tab-pane" type="button" role="tab" aria-controls="sellerInfo-tab-pane"
                  aria-selected="false" disabled>
                  </button>
              </li>
            </ul>
            <!-- tab content -->    
            <div class="tab-content" id="myTabContent">
              <!-- tab pane -->
              <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab"
                tabindex="0">
                <div class="my-8">
                  <div class="mb-5">
                    <!-- text -->
                    <h4 class="mb-1">Mô Tả Sản Phẩm</h4>
                    <p class="mb-0">{!!$record->description!!}</p>
                  </div>
                  <div class="mb-5">
                    <h5 class="mb-1">Thành phần sản phẩm</h5>
                    <p class="mb-0">{!!$record->partials!!}</p>
                  </div>
                  <!-- content -->
                  <div class="mb-5">
                    <h5 class="mb-1">Hướng dẫn sử dụng</h5>
                    <p>{!!$record->howuse!!}</p>
                  </div>
                  <div class="mb-5">
                    <h5 class="mb-1">Bảo quản:</h5>
                    <p class="mb-0">{!!$record->preserve!!}</p>
                  </div>
                  <div>
                    <h5 class="mb-1">Lưu ý</h5>
                    <p class="mb-0">{!!$record->note!!}</p>
                  </div>    
                  <div>
                    <h5 class="mb-2">Mã sản phẩm</h5>
                    <p class="mb-2">{{$record->id_product}}</p>
                  </div>
                  <div>
                    <h5 class="mb-2">Nơi Sản Xuất</h5>
                    <p class="mb-2">{{$record->producers->name}}</p>
                  </div>
                </div>
              </div>
              <!-- tab pane -->
              <!-- tab pane -->
              
              <!-- tab pane -->
              <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab"
                tabindex="0">...</div>
            </div>
          </div>
        </div>
      </div>



  </section>

  <!-- section -->
  {{-- <section class="my-lg-14 my-14">
    <div class="container">
      <!-- row -->
      <div class="row">
        <div class="col-12">
          <!-- heading -->
          <h3>Sản Phẩm Liên Quan</h3>
        </div>
      </div>
      <!-- row -->
      <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
        <!-- col -->
           @foreach ($record as $item)
                <div class="product__panel-item col-lg-3 col-md-3 col-sm-6">
                <div class="col">
                    <div class="card card-product">
                    <div class="card-body">
        
                        <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                            <span class="badge bg-danger">Sale</span>
                        </div>
                        <a href="#!"> <img src={{$item->thumbnail}} alt="Grocery Ecommerce Template"
                            class="mb-3 img-fluid"></a>
        
                        <div class="card-product-action">
                            <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                            <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                class="bi bi-heart"></i></a>
                            <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                class="bi bi-arrow-left-right"></i></a>
                        </div>
        
                        </div>
                        <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{$item->category->title}}</small></a></div>
                        <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{$item->title}}</a></h2>
                        <div>
        
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">{{$item->final_price}}</span> <span class="text-decoration-line-through text-muted">{{$item->price}}vnđ</span>
                        </div>
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Thêm</a></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div> 
            @endforeach 
        <!-- col -->
        
      </div>
    </div>
  </section> --}}


@endsection