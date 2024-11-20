@extends('client/layouts/default')

@section('content')

<section class="my-lg-14 my-8">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <!-- text -->
          <div class="mb-5">
            <div class="mb-3 text-center"><a href="#!"></a></div>
            <h1 class="fw-bold text-center">{{$record->title}}</h1>
            <div class="d-flex justify-content-center text-muted mt-4"><span class="me-2"><small>{{$record->created_at->format('d/m/Y H:i')}}</small></span>
            </div>
          </div>
          <!-- img -->
          <div class="mb-8">
            <img src="{{$record->thumbnail}}" alt="" class="img-fluid rounded-3" style="width: 80%; max-width: 600px;">
            </div>

          <div>
            <!-- text -->
                {!!$record->content!!}
          <hr class="mt-8 mb-5">
          <div class="d-flex justify-content-between align-items-center mb-5">
            
            <div>
              <!-- social -->
              <span class="ms-2 text-muted">Share</span>
              <a href="#" class="ms-2 text-muted"><i class="bi bi-facebook fs-6"></i></a>
              <a href="#" class="ms-2 text-muted"><i class="bi bi-twitter fs-6"></i></a>
              <a href="#" class="ms-2 text-muted "><i class="bi bi-linkedin fs-6"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





@endsection