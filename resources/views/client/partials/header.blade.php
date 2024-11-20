<nav class="navbar navbar-light py-lg-5 pt-3 px-0 pb-0">
    <div class="container">
      <div class="row w-100 align-items-center g-3">
        <div class="col-xxl-2 col-lg-3">
          <a class="navbar-brand d-none d-lg-block" href="/">
            <img src="/client/assets/images/logo/OIP.jfif" alt="eCommerce HTML Template">

          </a>
          <div class="d-flex justify-content-between w-100 d-lg-none">
            <a class="navbar-brand" href="#">
              <img src="/client/assets/images/logo/freshcart-logo.svg" alt="eCommerce HTML Template">

            </a>

            <div class="d-flex align-items-center lh-1">

              <div class="list-inline me-2">
                <div class="list-inline-item">

                  <a href="#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-user">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                  </a>
                </div>
                <div class="list-inline-item">

                  <a class="text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    href="#offcanvasExample" role="button" aria-controls="offcanvasRight">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-shopping-bag">
                      <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                      <line x1="3" y1="6" x2="21" y2="6"></line>
                      <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                  </a>
                </div>

              </div>
              <!-- Button -->
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
              </button>

            </div>
          </div>

        </div>
        <div class="col-xxl-6 col-lg-5 d-none d-lg-block">

          <form action="/search" class="search-header">


            <div class="input-group">
              <input type="text" value='{{ $keyword ?? '' }}' name="keyword" class="form-control border-end-0" placeholder="Tìm Sản Phẩm.."
                aria-label="Search for products.." aria-describedby="basic-addon2">
              <button type="submit" style="border: unset; padding: unset; background: unset; box-shadow: unset;">
                <span class="input-group-text bg-transparent" id="basic-addon2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-search">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg></span>
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-2 col-xxl-3 d-none d-lg-block">
          <!-- Button trigger modal -->


        </div>
        <div class="col-md-2 col-xxl-1 text-end d-none d-lg-block">

          <div class="list-inline">
            @if (isset($user))
                
            @else
              <div class="list-inline-item">

                <a href="#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                </a></div>
            @endif
            <div class="list-inline-item">

              <a class="text-muted position-relative "
                href="/cart" role="button" aria-controls="offcanvasRight">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-shopping-bag">
                  <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                  <line x1="3" y1="6" x2="21" y2="6"></line>
                  <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                  {{isset($minicart) ? $minicart->totalQuantity : 0}}
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>

            </div>





          </div>
        </div>
      </div>
      </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light navbar-default pt-0 pb-0">
    <div class="container px-0 px-md-3">

      <div class="dropdown me-3 d-none d-lg-block">
        <button class="btn btn-primary px-6 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
          aria-expanded="false">
          <span class="me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-grid">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg></span> Danh Mục
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          @include('components.submenu', ['menus' => $category, 'parentID' =>'0'])
        </ul> 
      </div>



      <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">

        <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
          <div><img src="/client/assets/images/logo/freshcart-logo.svg" alt="eCommerce HTML Template"></div>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="d-block d-lg-none mb-2 pt-2">
          <a class="btn btn-primary w-100 d-flex justify-content-center align-items-center" data-bs-toggle="collapse"
            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-grid">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
              </svg></span> Danh Mục
          </a>
          <div class="collapse mt-2" id="collapseExample">
            <div class="card card-body">
              <ul class="mb-0 list-unstyled">
                <li><a class="dropdown-item" href="shop-grid.html">Thuốc</a></li>
                <li><a class="dropdown-item" href="shop-grid.html">Thuốc</a></li>
                <li><a class="dropdown-item" href="shop-grid.html">Thuốc</a></li>
                <li><a class="dropdown-item" href="shop-grid.html">Thuốc</a></li>
                <li><a class="dropdown-item" href="shop-grid.html">Thuốc</a></li>
                <li><a class="dropdown-item" href="shop-grid.html">Thuốc</a></li>

                <li><a class="dropdown-item" href="shop-grid.html">Thuốc</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="d-lg-none d-block mb-3">
          <button type="button" class="btn  btn-outline-gray-400 text-muted w-100 " data-bs-toggle="modal"
            data-bs-target="#locationModal">
            <i class="feather-icon icon-map-pin me-2"></i>Chọn
          </button>
        </div>
        <div class="d-none d-lg-block">
          <ul class="navbar-nav ">
            <li class="nav-item dropdown">
              <a class="nav-link" href="/" role="button"
                aria-expanded="false">
                Trang Chủ
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="/product" role="button" >
                Sản Phẩm
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Thông Tin
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/article">Blog</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Tài Khoản
              </a>
              <ul class="dropdown-menu">
                @if (isset($user))
                  <li><a class="dropdown-item" href="/user/logout">Đăng Xuất</a></li>
                @else
                  <li><a class="dropdown-item" href="/user/login">Đăng Nhập</a></li>
                  <li><a class="dropdown-item" href="/user/register">Đăng Ký</a></li>
                @endif
                <li class="dropdown-submenu dropend">
                  <a class="dropdown-item dropdown-list-group-item" href="/user/infor">
                    Xem Tài Khoản 
                  </a>
                  {{-- <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pages/account-orders.html">Đã Mua</a></li>
                    <li><a class="dropdown-item" href="pages/shop-cart.html">Giỏ Hàng</a></li>
                    <li><a class="dropdown-item" href="pages/account-settings.html">Cài Đặt</a></li>
                    <li><a class="dropdown-item" href="pages/account-payment-method.html">Thanh Toán</a>
                    </li>
                    


                  </ul> --}}
                </li>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-item" href="pages/contact.html" role="button" 
                  >
                Liên Hệ
              </a>
            
            </li>
          </ul>
        </div>
       <!----> <div class="d-block d-lg-none"> 
          <ul class="navbar-nav ">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Trang Chủ
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../index.html">Home 1</a></li>
                <li><a class="dropdown-item" href="index-2.html">Home 2</a></li>
                <li><a class="dropdown-item" href="index-3.html">Home 3</a></li>

              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Shop
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="shop-grid.html">Shop Grid - Filter</a></li>
                <li><a class="dropdown-item" href="shop-grid-3-column.html">Shop Grid - 3 column</a>
                </li>
                <li><a class="dropdown-item" href="shop-list.html">Shop List - Filter</a></li>
                <li><a class="dropdown-item" href="shop-filter.html">Shop - Filter</a></li>
                <li><a class="dropdown-item" href="shop-fullwidth.html">Shop Wide</a></li>
                <li><a class="dropdown-item" href="shop-single.html">Shop Single</a></li>
                <li><a class="dropdown-item" href="shop-wishlist.html">Shop Wishlist</a></li>
                <li><a class="dropdown-item" href="shop-cart.html">Shop Cart</a></li>
                <li><a class="dropdown-item" href="shop-checkout.html">Shop Checkout</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Stores
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="store-list.html">Store List</a></li>
                <li><a class="dropdown-item" href="store-grid.html">Store Grid</a></li>
                <li><a class="dropdown-item" href="store-single.html">Store Single</a></li>

              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Mega Menu
              </a>
              <ul class="dropdown-menu">

                <li class="dropdown-submenu ">
                  <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                    Dairy, Bread & Eggs
                  </a>
                  <ul class="dropdown-menu">


                    <li><a class="dropdown-item" href="shop-grid.html">Milk Drinks</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Curd & Yogurt</a></li>
                    <li> <a class="dropdown-item" href="shop-grid.html">Eggs</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Buns & Bakery</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Cheese</a></li>
                    <li> <a class="dropdown-item" href="shop-grid.html">Condensed Milk</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Dairy Products</a></li>


                  </ul>
                </li>
                <li class="dropdown-submenu ">
                  <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                    Vegetables & Fruits
                  </a>
                  <ul class="dropdown-menu">


                    <li><a class="dropdown-item" href="shop-grid.html">Vegetables</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Fruits</a></li>
                    <li> <a class="dropdown-item" href="shop-grid.html">Exotics & Premium</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Fresh Sprouts</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Frozen Veg</a></li>



                  </ul>
                </li>
                <li class="dropdown-submenu ">
                  <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                    Cold Drinks & Juices
                  </a>
                  <ul class="dropdown-menu">


                    <li><a class="dropdown-item" href="shop-grid.html">Soft Drinks</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Fruit Juices</a></li>
                    <li> <a class="dropdown-item" href="shop-grid.html">Coldpress</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Soda & Mixers</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Milk Drinks</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Health Drinks</a></li>
                    <li><a class="dropdown-item" href="shop-grid.html">Herbal Drinks</a></li>



                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pages
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                <li><a class="dropdown-item" href="blog-category.html">Blog Category</a></li>
                <li><a class="dropdown-item" href="about.html">About us</a></li>
                <li><a class="dropdown-item" href="404error.html">404 Error</a></li>
                <li><a class="dropdown-item" href="contact.html">Contact</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="signin.html">Sign in</a></li>
                <li><a class="dropdown-item" href="signup.html">Signup</a></li>
                <li><a class="dropdown-item" href="forgot-password.html">Forgot Password</a></li>
                <li class="dropdown-submenu dropend">
                  <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                    My Account
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="account-orders.html">Orders</a></li>
                    <li><a class="dropdown-item" href="account-settings.html">Settings</a></li>
                    <li><a class="dropdown-item" href="account-address.html">Address</a></li>
                    <li><a class="dropdown-item" href="account-payment-method.html">Payment Method</a>
                    </li>
                    <li><a class="dropdown-item" href="account-notification.html">Notification</a></li>


                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../docs/index.html">
                Docs
              </a>

            </li>
          </ul>
        </div>
      </div>
    </div>

  </nav>
</div>
