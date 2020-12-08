<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm" style="/*height: 300px; overflow: hidden;*/">
    <div class="container custom-container">
    
    <div class="intro-banner-wrap">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach($carousels as $key => $value)
             <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="@if($key == 0) active @endif"></li>
        @endforeach
       {{--  <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
      </ol>
      <div class="carousel-inner" style="/*height: inherit;*/">
        @foreach($carousels as $carousel)
          <div class="carousel-item @if($carousel->id == 1) active @endif">
            <img class="d-block w-100" src="{{url($carousel->image_url)}}" alt="">
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    
    </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->