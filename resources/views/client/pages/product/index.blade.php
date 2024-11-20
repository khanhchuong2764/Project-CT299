@extends('client/layouts/default')

@section('content')

<section class=" mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row gx-10">
        <!-- col -->
        <div class="col-lg-3 col-md-4 mb-6 mb-md-0">
          <div class="py-4">
            <!-- title -->
            <h5 class="mb-3">Loại Sản Phẩm</h5>
            <!-- nav -->
            <ul class="nav nav-category" id="categoryCollapseMenu">
              @include('components.submenu2', ['menus' => $category , 'parentID' => "0"])
          </ul>
          </div>

          <div class="py-4">

            <h5 class="mb-3">Bộ Lọc</h5>
            <div class="my-4">
              <!-- input -->
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
            <!-- form check -->
            <div class="form-check mb-2">
              <!-- input -->
              <input class="form-check-input" type="checkbox" value="" id="eGrocery" checked>
              <label class="form-check-label" for="eGrocery">
                Tất Cả
              </label>
            </div>
            {{-- @foreach ($producer as $item)
              <div class="form-check mb-2">
                <!-- input -->
                  <input class="form-check-input" type="checkbox" value="" id="eGrocery" >
                  <label class="form-check-label" for="eGrocery">
                    {{$item->name}}
                  </label>
              </div>
            @endforeach --}}
            <!-- form check -->

          </div>
          <div class="py-4">
            <!-- price -->
           
            <div>
              <!-- range -->
           
              

            </div>



          </div>
          <!-- rating -->
          
          <!-- Banner Design -->
        </div>
        <div class="col-lg-9 col-md-8">
          <!-- card -->
          <div class="card mb-4 bg-light border-0">
            <!-- card body -->
            <div class=" card-body p-9">
              <h1 class="mb-0">{{$titlePage}}</h1>
            </div>
          </div>
          <!-- list icon -->
          <div class="d-md-flex justify-content-between align-items-center">
            <div>
              <p class="mb-3 mb-md-0"> <span class="text-dark">{{$countproduct}} </span> Sản Phẩm </p>
            </div>
            <!-- icon -->
            <div class="d-flex justify-content-between align-items-center">
              <div class="me-2">
                <!-- select option -->
                </div>
              <div>
                <!-- select option -->
                </div>
            </div>
          </div>
          <!-- row -->
          <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
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
          <div class="row mt-8">
            <div class="col">
                     <!-- nav -->
              <nav>
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link  mx-1 rounded-3 " href="#" aria-label="Previous">
                      <i class="feather-icon icon-chevron-left"></i>
                    </a>
                  </li>
                  <li class="page-item "><a class="page-link  mx-1 rounded-3 active" href="#">1</a></li>
                  <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">2</a></li>

                  <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">...</a></li>
                  <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">12</a></li>
                  <li class="page-item">
                    <a class="page-link mx-1 rounded-3 text-body" href="#" aria-label="Next">
                      <i class="feather-icon icon-chevron-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection