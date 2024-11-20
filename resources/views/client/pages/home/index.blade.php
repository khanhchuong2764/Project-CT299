@extends('client/layouts/default')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-body p-6">
            <div class="d-flex justify-content-between align-items-start ">
              <div>
                <h5 class="mb-1" id="locationModalLabel">Chọn Địa Điểm</h5>
                <p class="mb-0 small">Nhập địa chỉ của bạn và chúng tôi sẽ định vị địa điểm cung cấp cho bạn  </p>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="my-5">
              <input type="search" class="form-control" placeholder="Tìm Địa Chỉ">
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h6 class="mb-0">Chọn Tỉnh</h6>
              <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Xóa Hết</a>


            </div>
            <div>
              <div data-simplebar style="height:300px;">
                <div class="list-group list-group-flush">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!--END TOPpppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp-->
      <section class="mt-8">
        <div class="container">
          <div class="hero-slider ">
            <div
              style="background: url(client/assets/images/slider/banner-bg-5-1024x678.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
              <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                <span class="badge text-bg-warning" >Giảm 50%</span>

                <h2 class="text-dark display-5 fw-bold mt-4" >HKC <br> Pharmacy </h2>
                <p class="lead" s>Hàng siêu rẻ</p>
                <a href="/product" class="btn btn-dark mt-3">Cửa Hàng <i class="feather-icon icon-arrow-right ms-1"></i></a>
              </div>

            </div>
            <div class=" "
              style="background: url(client/assets/images/slider/lovepik-beautiful-doctor-likes-with-one-hand-picture_502367460.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
              <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                <span class="badge text-bg-warning">20%</span>
                <h2 class="text-dark display-5 fw-bold mt-4">HKC <br> Tuyệt đỉnh <span
                    class="text-primary"></span></h2>
                <p class="lead">Giao Tận Nơi
                </p>
                <a href="/product" class="btn btn-dark mt-3">Cửa Hàng <i class="feather-icon icon-arrow-right ms-1"></i></a>
              </div>

            </div>

          </div>
        </div>
      </section>

      <!-- Category Section Start-->
      <section class="mb-lg-10 mt-lg-14 my-8">
        <div class="container">
          <div class="row">
            <div class="col-12 mb-6">

              <h3 class="mb-0">Các Loại Sản Phẩm</h3>

            </div>
          </div>
          <div class="category-slider ">

            @foreach ($record as $item)
            <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
  
                    <!-- badge -->
                    <div class="text-center position-relative ">
                      <div class=" position-absolute top-0 start-0">
                        <span class="badge bg-danger">Sale</span>
                      </div>
                      <a href="/product/detail/{{$item->id}}">
                        <!-- img --><img src={{$item->thumbnail}}
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                      <!-- action btn -->
                     
                    </div>
                    <!-- heading -->
                    <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{$item->category->title}}</small></a></div>
                    <h2 class="fs-6"><a href="/product/detail/{{$item->id}}" class="text-inherit text-decoration-none">{{$item->title}}</a></h2>
                    <div>
                      <!-- rating -->
                      <small class="text-warning"> <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                    </div>
                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <span style="font-size: 1rem; font-weight: bold; color:green;">
                            {{$item->final_price}} vnđ
                        </span>
                        <span style="font-size: 1rem; color: #9e9e9e; text-decoration: line-through;">
                            {{$item->price}} vnđ
                        </span>
                    </div>
                      <!-- btn -->
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            
          </div>


        </div>
      </section>
      <!-- Category Section End-->
      <section>
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
              <div>
                <div class="py-10 px-8 rounded-3"
                style="background: url('client/assets/images/1.jpg') no-repeat center center; 
                background-size: cover; 
                width: 600px; 
                height: 250px;">
                  <div>

                  </div>
                </div>

              </div>

            </div>
            <div class="col-12 col-lg-6 ">

              <div>
                <div class="py-14 px-8 rounded-3"
                  style="background:url(client/assets/images/2.jpg)no-repeat; background-size: 600px; background-position: center;">
                  <div>
                    <h3 class="fw-bold mb-1">Chăm Sóc Da Mặt

                    </h3>
                    <p class="mb-4"><span class="fw-bold"></span></p>
                    <a href="pages/shop-grid.html" class="btn btn-dark">Cửa Hàng</a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Popular Products Start-->
      <section class="my-lg-14 my-8">
        <div class="container">
          <div class="row">
            <div class="col-12 mb-6">

              <h3 class="mb-0">Hàng Hóa<a href=""></a></h3>

            </div>
          </div>

          <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
            @foreach ($record as $item)
            <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
  
                    <!-- badge -->
                    <div class="text-center position-relative ">
                      <div class=" position-absolute top-0 start-0">
                        <span class="badge bg-danger">Sale</span>
                      </div>
                      <a href="/product/detail/{{$item->id}}">
                        <!-- img --><img src={{$item->thumbnail}}
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                      <!-- action btn -->
                     
                    </div>
                    <!-- heading -->
                    <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{$item->category->title}}</small></a></div>
                    <h2 class="fs-6"><a href="/product/detail/{{$item->id}}" class="text-inherit text-decoration-none">{{$item->title}}</a></h2>
                    <div>
                      <!-- rating -->
                      <small class="text-warning"> <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                    </div>
                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <span style="font-size: 1rem; font-weight: bold; color:green;">
                            {{$item->final_price}} vnđ
                        </span>
                        <span style="font-size: 1rem; color: #9e9e9e; text-decoration: line-through;">
                            {{$item->price}} vnđ
                        </span>
                    </div>
                      <!-- btn -->
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section> 
      <!-- Popular Products End-->
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-6">
              <h3 class="mb-0">Siêu Khuyến Mãi</h3>
            </div>
          </div>

          <div class="row row-cols-lg-5 row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class=" pt-8 px-8 rounded-3"
                style="background:url(client/assets/images/4.jpg)no-repeat;  background-size: 690px; height: 470px; background-position: center;">

                <div>
                  <h3 class="fw-bold text-white">Chăm Sóc Cá Nhân
                  </h3>
                  <p class="text-white">Mua Ngay Kẻo Hết</p>
                  <a href="/product" class="btn btn-primary">Cửa Hàng <i class="feather-icon icon-arrow-right ms-1"></i></a>
                </div>
              </div>
            </div>
            @foreach ($record as $item)
            <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
  
                    <!-- badge -->
                    <div class="text-center position-relative ">
                      <div class=" position-absolute top-0 start-0">
                        <span class="badge bg-danger">Sale</span>
                      </div>
                      <a href="/product/detail/{{$item->id}}">
                        <!-- img --><img src={{$item->thumbnail}}
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                      <!-- action btn -->
                     
                    </div>
                    <!-- heading -->
                    <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{$item->category->title}}</small></a></div>
                    <h2 class="fs-6"><a href="/product/detail/{{$item->id}}" class="text-inherit text-decoration-none">{{$item->title}}</a></h2>
                    <div>
                      <!-- rating -->
                      <small class="text-warning"> <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                    </div>
                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <span style="font-size: 1rem; font-weight: bold; color:green;">
                            {{$item->final_price}} vnđ
                        </span>
                        <span style="font-size: 1rem; color: #9e9e9e; text-decoration: line-through;">
                            {{$item->price}} vnđ
                        </span>
                    </div>
                      <!-- btn -->
                    </div>
                  </div>
                </div>
              </div>
            @endforeach


          </div>

        </div>
      </section>


      <section class="my-lg-14 my-8">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <div class="mb-8 mb-xl-0">
                <div class="mb-6"><img src="client/assets/images/icons/clock.svg" alt=""></div>
                <h3 class="h5 mb-3">
                  10 minute grocery now
                </h3>
                <p>Get your order delivered to your doorstep at the earliest from FreshCart pickup stores near you.</p>
              </div>
            </div>
            <div class="col-md-6  col-lg-3">
              <div class="mb-8 mb-xl-0">
                <div class="mb-6"><img src="client/assets/images/icons/gift.svg" alt=""></div>
                <h3 class="h5 mb-3">Best Prices & Offers</h3>
                <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get best pricess &
                  offers.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="mb-8 mb-xl-0">
                <div class="mb-6"><img src="client/assets/images/icons/package.svg" alt=""></div>
                <h3 class="h5 mb-3">Wide Assortment</h3>
                <p>Choose from 5000+ products across food, personal care, household, bakery, veg and non-veg & other
                  categories.</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="mb-8 mb-xl-0">
                <div class="mb-6"><img src="client/assets/images/icons/refresh-cw.svg" alt=""></div>
                <h3 class="h5 mb-3">Easy Returns</h3>
                <p>Not satisfied with a product? Return it at the doorstep & get a refund within hours. No questions asked
                  <a href="#!">policy</a>.</p>
              </div>
            </div>
          </div>
        </div>
      </section>



    <!--BOTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

      <!-- Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-body p-8">
              <div class="d-flex justify-content-end">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <!-- img slide -->
                    <div class="product productModal" id="productModal">
                      <img src={{$item->thumbnail}} alt="" >
                    <div>
                      <div>
                        <!-- img -->
                        <img src={{$item->thumbnail}} alt="" >
                      </div>

                    </div>
                    
                    <div>
                      </div>

                    </div>
                    <!-- product tools -->
                    <div class="product-tools">
                      <div class="thumbnails row g-3" id="productModalThumbnails">
                        <div class="col-3">
                          <div class="thumbnails-img">
                            <!-- img -->
                            <img src={{$item->thumbnail}} alt="">
                          </div>
                        </div>
                        
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="ps-md-8">
                    <a href="#!" class="mb-4 d-block"></a>
                    <h2 class="mb-1 h1">{{$item->title}}</h2>
                    <div class="mb-4">   <small class="text-warning"> <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">30 đánh giá</a></div>
                    <div class="fs-4"><span class="fw-bold text-dark">{{$item->final_price}}đ</span> <span
                            class="text-decoration-line-through text-muted">{{$item->price}}đ</span><span><small
                                class="fs-6 ms-2 text-danger">Giảm {{$item->discountPercentage}}% </small></span>
                    </div>
                    <hr class="my-6">
                      <div>
                        <button type="button" class="btn btn-outline-secondary">{{$item->unit->title}}</button>
                      </div>
                    <div class="mt-5 d-flex justify-content-start">
                        <div class="col-2">
                          <div class="input-group  flex-nowrap justify-content-center ">
                            <input type="button" value="-" class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  " data-field="quantity">
                            <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                            <input type="button" value="+" class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  " data-field="quantity">
                          </div>
                        </div>
                        <div class="ms-2 col-4 d-grid">
                            <button type="button" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>Thêm Vào Giỏ</button>
                            </div>
                            <div class="ms-2 col-4">
                            <a class="btn btn-light" href="#"  data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                              <a class="btn btn-light" href="pages/shop-wishlist.html"  data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="feather-icon icon-heart"></i></a>
                        </div>
                    </div>
                    <hr class="my-6">
                    <div>
                      <table class="table table-borderless">

                        <tbody>
                          <tr>
                            <td style="font-size: 13.5px;">Danh Mục:</td>
                            <td>{{$item->category->title}}</td>

                          </tr>
                          <tr>
                            <td style="font-size: 13.5px;">Công dụng:</td>
                            <td>{!!$item->uses!!}</td>

                          </tr>
                          <tr>
                            <td style="font-size: 13.5px;">Nhà sản xuất:</td>
                            <td>{{$item->producers->name}}</td>

                          </tr>
                          <tr>
                            <td style="font-size: 13.5px;">Nơi sản xuất:</td>
                            <td>{{$item->producers->place}}</td>

                          </tr>
                          <tr>
                            <td style="font-size: 13.5px;">Quy cách: </td>
                            <td><small>{{$item->specifications}}</td>

                          </tr>


                        </tbody>
                      </table>

                    </div>
                  </div>
                  

                </div>
                
                <div class="col-12 product__main-content-wrap">
                  <h2 class="product__main-content-heading">
                      Mô Tả Sản Phẩm
                  </h2>

                  <p><span>{!!$item->description!!}</span></p>
                  <h2>Cách dùng Kem dưỡng mềm da</h2>
                  <p><span>{!!$item->howuse!!}</span></p>

                  </span></p>
                  <h2 class="thongtin">    <span>Thông tin chi tiết</span> 
                  </h2>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <tbody>
                                  <tr>
                                      <th>Xuất xứ thương hiệu</th>
                                      <td>{{$item->producers->name}}</td>
                                  </tr>
                                  <tr><th>Nước sản xuất</th><td>{{$item->producers->place}}</td></tr>
                                  <tr><th>Bảo quản</th><td>{!!$item->preserve!!}</td></tr>
                                  <tr><th>Lưu ý</th><td>{!!$item->note!!}</td></tr>
                                  <tr><th>Mã sản phẩm</th><td>{{$item->id_product}}</td></tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="customer-reviews row pb-4 pb-4  py-4 pb-4 py-4 py-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 >Bình luận sản phẩm</h3>
                            <form id ="formgroupcomment" method="post">
                                <div class="form-group">
                                    <label>Tên:</label>
                                    <input name="comm_name" required="" type="text" id ='form-name' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="comm_mail" required="" type="email"  class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung:</label>
                                    <textarea name="comm_details" required="" rows="8" id ='formcontent' class="form-control"></textarea>     
                                </div>
                                <button type="submit" name="sbm" id= "submitcomment" class="btn btn-primary">Gửi</button>
                            </form> 
                        </div>
                      </div>
                                  
            
                        <section class="product__love col-12 mt-4">
                            <div class="row bg-white">
                            <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                                <h2 class="product__love-heading">
                                    Sản phẩm tương tự
                                </h2>
                            </div>
                        </div>
                        <div class="row bg-white">
                          @foreach ($record as $item)
                          <div class="col">
                              <!-- card -->
                              <div class="card card-product">
                                <div class="card-body">
                
                                  <!-- badge -->
                                  <div class="text-center position-relative ">
                                    <div class=" position-absolute top-0 start-0">
                                      <span class="badge bg-danger">Sale</span>
                                    </div>
                                    <a href="/product/detail/{{$item->id}}">
                                      <!-- img --><img src={{$item->thumbnail}}
                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                                    <!-- action btn -->
                                   
                                  </div>
                                  <!-- heading -->
                                  <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{$item->category->title}}</small></a></div>
                                  <h2 class="fs-6"><a href="/product/detail/{{$item->id}}" class="text-inherit text-decoration-none">{{$item->title}}</a></h2>
                                  <div>
                                    <!-- rating -->
                                    <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                      <i class="bi bi-star-fill"></i>
                                      <i class="bi bi-star-fill"></i>
                                      <i class="bi bi-star-fill"></i>
                                      <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                                  </div>
                                  <!-- price -->
                                  <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                      <span style="font-size: 1rem; font-weight: bold; color:green;">
                                          {{$item->final_price}} vnđ
                                      </span>
                                      <span style="font-size: 1rem; color: #9e9e9e; text-decoration: line-through;">
                                          {{$item->price}} vnđ
                                      </span>
                                  </div>
                                    <!-- btn -->
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </section>
                    </div>
                    
              
              </div>
            </div>
            </div>

          </div>
        </div>
      </div>
@endsection








  


