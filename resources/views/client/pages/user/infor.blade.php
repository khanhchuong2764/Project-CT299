@extends('client/layouts/default')

@section('content')
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Giỏ Hàng</h5>
            <small>xác nhận nào!!!</small>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
    
        <div class="alert alert-danger" role="alert">
            Bạn được giao hàng miễn phí bắt đầu thành toán ngay!!!
        </div>
    
        <div>
            <div class="py-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item py-3 px-0 border-top">
                <div class="row align-items-center">
                    <div class="col-2">
                    <img src="../assets/images/products/thuoc-bac-tri-mun-khong-bong-da-organic-skin-care.webp" alt="Ecommerce" class="img-fluid"></div>
                    <div class="col-5">
                    <h6 class="mb-0">Thuốc</h6>
                    <span><small class="text-muted">100ml</small></span>
                    <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg></span>Xóa</a></div>
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
                    <span class="fw-bold">1.000vnđ</span>
    
                    </div>
                </div>
    
                </li>
                <li class="list-group-item py-3 px-0">
                <div class="row row align-items-center">
                    <div class="col-2">
                    <img src="../assets/images/products/thuoc-bac-tri-mun-khong-bong-da-organic-skin-care.webp" alt="Ecommerce" class="img-fluid"></div>
                    <div class="col-5">
                    <h6 class="mb-0">Thuốc</h6>
                    <span><small class="text-muted">250ml</small></span>
                    <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg></span>Xóa</a></div>
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
                    <span class="fw-bold">2.000vnđ</span>
                    <span class="text-decoration-line-through text-muted small">1.000vnđ</span>
                    </div>
                </div>
    
                </li>
                <li class="list-group-item py-3 px-0">
                <div class="row row align-items-center">
                    <div class="col-2">
                    <img src="../assets/images/products/thuoc-bac-tri-mun-khong-bong-da-organic-skin-care.webp" alt="Ecommerce" class="img-fluid"></div>
                    <div class="col-5">
                    <h6 class="mb-0">Thuốc</h6>
                    <span><small class="text-muted">100ml</small></span>
                    <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg></span>Xóa</a></div>
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
                    <span class="fw-bold">2.000vnđ</span>
                    <span class="text-decoration-line-through text-muted small">1.000vnđ</span>
                    </div>
                </div>
    
                </li>
                <li class="list-group-item py-3 px-0">
                <div class="row row align-items-center">
                    <div class="col-2">
                    <img src="../assets/images/products/thuoc-bac-tri-mun-khong-bong-da-organic-skin-care.webp" alt="Ecommerce" class="img-fluid"></div>
                    <div class="col-5">
                    <h6 class="mb-0">Thuốc</h6>
                    <span><small class="text-muted">250ml</small></span>
                    <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg></span>Xóa</a></div>
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
                    <span class="fw-bold">2.000vnđ</span>
                    <span class="text-decoration-line-through text-muted small">1.000vnđ</span>
                    </div>
                </div>
    
                </li>
                <li class="list-group-item py-3 px-0 border-bottom">
                <div class="row row align-items-center">
                    <div class="col-2">
                    <img src="../assets/images/products/thuoc-bac-tri-mun-khong-bong-da-organic-skin-care.webp" alt="Ecommerce" class="img-fluid"></div>
                    <div class="col-5">
                    <h6 class="mb-0">Thuốc</h6>
                    <span><small class="text-muted">100ml</small></span>
                    <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg></span>Xóa</a></div>
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
                    <span class="fw-bold">2.000vnđ</span>
                    <span class="text-decoration-line-through text-muted small">1.000vnđ</span>
                    </div>
                </div>
    
                </li>
    
            </ul>
            </div>
            <div class="d-grid">
    
            <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit"> 
                Đặt Hàng <span class="fw-bold">10.000vnđ</span></button>
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
    
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                    <span>An Giang</span><span>Giảm 5%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>An Giang</span><span>Giảm:30%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>An Giang</span><span>Giảm:50%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>An Giang</span><span>Giảm:29%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>Cần Thơ</span><span>Giảm:80%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>Cần Thơ</span><span>Giảm:90%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>An Giang</span><span>Giảm:50%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>Cần Thơ</span><span>Giảm:29%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>Cần Thơ</span><span>Giảm:80%</span></a>
                    <a href="#"
                    class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                    <span>An Giang</span><span>Giảm:90%</span></a>
                </div>
                </div>
            </div>
            </div>
    
        </div>
        </div>
    </div>
        <!-- section -->
        <section>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
            <!-- col -->
            <div class="col-12">
                <div class="p-6 d-flex justify-content-between align-items-center d-md-none">
                <!-- heading -->
                <h3 class="fs-5 mb-0">Account Setting</h3>
                <!-- btn -->
                <button class="btn btn-outline-gray-400 text-muted d-md-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                    <i class="feather-icon icon-menu"></i>
                </button>
                </div>
            </div>
            <!-- col -->
            <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
                <div class="pt-10 pe-lg-10">
                <!-- nav item -->
                <ul class="nav flex-column nav-pills nav-pills-dark">
                    {{-- <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="account-orders.html"><i
                        class="feather-icon icon-shopping-bag me-2"></i>Đã Đặt Mua</a>
                    </li> --}}
                    <!-- nav item -->
                    
                    <!-- nav item -->
                    <!-- nav item -->
                    <li class="nav-item">
                    <a class="nav-link active" href="account-settings.html"><i
                        class="feather-icon icon-settings me-2"></i>Cài Đặt</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/cart"><i
                        class="feather-icon icon-shopping-cart me-2"></i>Giỏ Hàng</a>
                    </li>
                    <!-- nav item -->
                    <li class="nav-item">
                    <hr>
                    </li>
                    <!-- nav item -->
                    <li class="nav-item">
                    <a class="nav-link " href="/user/logout"><i class="feather-icon icon-log-out me-2"></i>Thoát</a>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="p-6 p-lg-10">
                <div class="mb-6">
                    <!-- heading -->
                    <h2 class="mb-0">Cài Đặt Tài Khoản</h2>
                </div>
                <div>
                    <!-- heading -->
                    <h5 class="mb-4">Chi Tiết Tài Khoản</h5>
                   
                    <div class="row">
                    <div class="col-lg-5">
                        <!-- form -->
                        <form method="post" action="/user/edit/{{$user->id}}">
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label">Tên</label>
                            <input type="text" class="form-control" value='{{$user->fullname}}' name="fullname">
                        </div>
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Hung@gmail.com" value='{{$user->email}}'>
                        </div>
                        <!-- input -->
                        <div class="mb-3 col">
                            <label class="form-label">Mật Khẩu Mới</label>
                            <input type="password" name="password" class="form-control" placeholder="**********">
                        </div>
                        <!-- input -->
                        <div class="mb-5">
                            <label class="form-label">SĐT</label>
                            <input type="text" name="phone" class="form-control" value='{{$user->phone != null ?$user->phone:''}}' >
                        </div>
                        <!-- button -->
                        <div class="mb-3">
                            <button class="btn btn-primary">Lưu Thông Tin</button>
                        </div>
                        @csrf
                        @method('PATCH')
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    
    
        <!-- modal -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAccount" aria-labelledby="offcanvasAccountLabel">
        <!-- offcanvas header -->
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasAccountLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- offcanvas body -->
        <div class="offcanvas-body">
            <ul class="nav flex-column nav-pills nav-pills-dark">
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="account-orders.html"><i
                    class="feather-icon icon-shopping-bag me-2"></i>Your Orders</a>
            </li>
            <!-- nav item -->
    
            <li class="nav-item">
                <a class="nav-link active" href="account-settings.html"><i
                    class="feather-icon icon-settings me-2"></i>Settings</a>
            </li>
            <!-- nav item -->
    
            <li class="nav-item">
                <a class="nav-link" href="account-address.html"><i class="feather-icon icon-map-pin me-2"></i>Address</a>
            </li>
            <!-- nav item -->
    
            <li class="nav-item">
                <a class="nav-link" href="account-payment-method.html"><i
                    class="feather-icon icon-credit-card me-2"></i>Payment Method</a>
            </li>
            <!-- nav item -->
    
            <li class="nav-item">
                <a class="nav-link" href="account-notification.html"><i
                    class="feather-icon icon-bell me-2"></i>Notification</a>
            </li>
            </ul>
            <hr class="my-6">
            <div>
            <!-- navs -->
            <ul class="nav flex-column nav-pills nav-pills-dark">
                <!-- nav item -->
                <li class="nav-item">
                <a class="nav-link " href="../index.html"><i class="feather-icon icon-log-out me-2"></i>Log out</a>
                </li>
            </ul>
            </div>
        </div>
        </div>
@endsection








  


