@extends('client/layouts/default')

@section('content')
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header border-0">
          <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign Up</h5>
  
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="fullName" class="form-label">Name</label>
              <input type="text" class="form-control" id="fullName" placeholder="Enter Your Name" required="">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Email address" required="">
            </div>
  
            <div class="mb-5">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password" required="">
              <small class="form-text">By Signup, you agree to our <a href="#!">Terms of Service</a> & <a
                  href="#!">Privacy Policy</a></small>
            </div>
  
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
        <div class="modal-footer border-0 justify-content-center">
  
          Already have an account? <a href="#">Sign in</a>
        </div>
      </div>
    </div>
  </div>
  
  
  
  <!-- Shop Cart -->
  
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
      <div class="text-start">
        <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
        <small>Location in 382480</small>
      </div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
  
      <div class="alert alert-danger" role="alert">
        You’ve got FREE delivery. Start checkout now!
      </div>
  
      <div>
        <div class="py-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item py-3 px-0 border-top">
              <div class="row align-items-center">
                <div class="col-2">
                  <img src="#" alt="Ecommerce" class="img-fluid"></div>
                <div class="col-5">
                  <h6 class="mb-0">Organic Banana</h6>
                  <span><small class="text-muted">.98 / lb</small></span>
                  <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></span>Remove</a></div>
                </div>
                <div class="col-3">
                  <div class="input-group  flex-nowrap justify-content-center  ">
                    <input type="button" value="-"
                      class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                      data-field="quantity">
                    <input type="number" step="1" max="10" value="1" name="quantity"
                      class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                    <input type="button" value="+"
                      class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                      data-field="quantity">
                  </div>
  
  
                </div>
                <div class="col-2 text-end">
                  <span class="fw-bold">$35.00</span>
  
                </div>
              </div>
  
            </li>
            <li class="list-group-item py-3 px-0">
              <div class="row row align-items-center">
                <div class="col-2">
                  <img src="#" alt="Ecommerce" class="img-fluid"></div>
                <div class="col-5">
                  <h6 class="mb-0">Fresh Garlic, 250g</h6>
                  <span><small class="text-muted">250g</small></span>
                  <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></span>Remove</a></div>
                </div>
                <div class="col-3">
                  <div class="input-group  flex-nowrap justify-content-center  ">
                    <input type="button" value="-"
                      class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                      data-field="quantity">
                    <input type="number" step="1" max="10" value="1" name="quantity"
                      class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                    <input type="button" value="+"
                      class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                      data-field="quantity">
                  </div>
  
  
                </div>
                <div class="col-2 text-end">
                  <span class="fw-bold">$20.97</span>
                  <span class="text-decoration-line-through text-muted small">$26.97</span>
                </div>
              </div>
  
            </li>
            <li class="list-group-item py-3 px-0">
              <div class="row row align-items-center">
                <div class="col-2">
                  <img src="#" alt="Ecommerce" class="img-fluid"></div>
                <div class="col-5">
                  <h6 class="mb-0">Fresh Onion, 1kg</h6>
                  <span><small class="text-muted">1 kg</small></span>
                  <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></span>Remove</a></div>
                </div>
                <div class="col-3">
                  <div class="input-group  flex-nowrap justify-content-center  ">
                    <input type="button" value="-"
                      class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                      data-field="quantity">
                    <input type="number" step="1" max="10" value="1" name="quantity"
                      class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                    <input type="button" value="+"
                      class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                      data-field="quantity">
                  </div>
  
  
                </div>
                <div class="col-2 text-end">
                  <span class="fw-bold">$25.00</span>
                  <span class="text-decoration-line-through text-muted small">$45.00</span>
                </div>
              </div>
  
            </li>
            <li class="list-group-item py-3 px-0">
              <div class="row row align-items-center">
                <div class="col-2">
                  <img src="#" alt="Ecommerce" class="img-fluid"></div>
                <div class="col-5">
                  <h6 class="mb-0">Fresh Ginger</h6>
                  <span><small class="text-muted">250g</small></span>
                  <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></span>Remove</a></div>
                </div>
                <div class="col-3">
                  <div class="input-group  flex-nowrap justify-content-center  ">
                    <input type="button" value="-"
                      class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                      data-field="quantity">
                    <input type="number" step="1" max="10" value="1" name="quantity"
                      class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                    <input type="button" value="+"
                      class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                      data-field="quantity">
                  </div>
  
  
                </div>
                <div class="col-2 text-end">
                  <span class="fw-bold">$39.87</span>
                  <span class="text-decoration-line-through text-muted small">$45.00</span>
                </div>
              </div>
  
            </li>
            <li class="list-group-item py-3 px-0 border-bottom">
              <div class="row row align-items-center">
                <div class="col-2">
                  <img src="#" alt="Ecommerce" class="img-fluid"></div>
                <div class="col-5">
                  <h6 class="mb-0">Apple Royal Gala, 4 Pieces Box</h6>
                  <span><small class="text-muted">4 Apple</small></span>
                  <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></span>Remove</a></div>
                </div>
                <div class="col-3">
                  <div class="input-group  flex-nowrap justify-content-center  ">
                    <input type="button" value="-"
                      class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                      data-field="quantity">
                    <input type="number" step="1" max="10" value="1" name="quantity"
                      class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                    <input type="button" value="+"
                      class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                      data-field="quantity">
                  </div>
  
  
                </div>
                <div class="col-2 text-end">
                  <span class="fw-bold">$39.87</span>
                  <span class="text-decoration-line-through text-muted small">$45.00</span>
                </div>
              </div>
  
            </li>
  
          </ul>
        </div>
        <div class="d-grid">
  
          <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit"> Go to
            Checkout <span class="fw-bold">$120.00</span></button>
        </div>
      </div>
    </div>
  </div>
  
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
  <!-- section -->
        <div class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-4 p-2 bg-light rounded">
                              <div class="category-container">
                                @foreach ($categoryArticle as $item)
                                  <a href="/article/{{$item->id}}"><span class="category-item">{{$item->title}}</span></a>
                                @endforeach
                            </div>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    <!-- section -->
    <section class="mt-8">
      <div class="container">
        <div class="row">
          <!-- logo -->
          <div class="col-12">
            <h1 class="fw-bold">{{$titlePage}}</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- section -->
    <section class="mt-6 mb-lg-14 mb-8">
      <!-- container -->
    <div class="container">
      
      <!-- row -->
      <div class="row">
        @foreach ($record as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4"> <!-- Tăng số cột trên mỗi dòng -->
              <div class="mb-3">
                  <a href="/article/detail/{{$item->id}}">
                      <!-- img -->
                      <div class="img-zoom">
                          <img src="{{$item->thumbnail}}" alt="" class="img-fluid rounded-3 w-100" style="height: 180px; object-fit: cover;">
                      </div>
                  </a>
              </div>
              <!-- text -->
              <div class="mb-2">
                  <a href="#" class="text-muted" style="font-size: 0.9rem;">{{$item->category->title}}</a>
              </div>
              <!-- title and description -->
              <div>
                  <h2 class="h6">
                      <a href="/article/detail/{{$item->id}}" class="text-inherit" style="font-size: 1rem;">{{$item->title}}</a>
                  </h2>
                  <p style="font-size: 0.9rem; line-height: 1.4;">
                      {!! Str::limit($item->description, 150, '...') !!}
                  </p>
              </div>
          </div>
        @endforeach
        
      </div>
    </div>
    </section>
@endsection



@php
    use Illuminate\Support\Str;
@endphp








  


