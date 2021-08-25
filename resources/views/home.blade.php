@extends('parts.template') @section('content')
@if($indexBanner)
<div class = "index-banner">
    <div class="swiper-container indexBannerSwiper">
        <div class="swiper-wrapper">
          @foreach($indexBanner as $banner)
          <div class="swiper-slide">
            <div class=  "index-banner-element" >
                <div class = "index-banner-text-container"></div>
                <div class = "index-banner-image-container">
                  <div class = "index-banner-overlay"></div>
                  <img src = "{{ thumb('width:1000', $banner->image) }}" class = "full-width-cover">
                </div>
            </div>
            <div class = "index-banner-overlay">
              <div class = "container" data-aos="fade-right">
                @if($banner->breif)<div class  ="rotated-text shine">{{$banner->breif}}</div>@endif
                <a href = "/" class = "banner-logo"><img src = "images/logo-new.svg" class = "full-width"></a>
                <div class = "index-banner-title">{{$banner->title}}</div>
                <div class = "index-banner-text">@if(strlen($banner->description)>=460) {!!substr($banner->description,0,460)!!}..  @else {!!$banner->description!!} @endif</div>
                  {{-- <a href = "/" class = "citeste-mai-mult">
                    <div class=  "citeste-text">{{__('site.read-more')}}</div>
                    <div class=  "citeste-sageata"><img src = "images/next.svg" class = "full-width"></div>
                  </a> --}}
                  <div class = "pagination-container">
                    <div class="swiper-pagination index-banner-pagination"></div>
                    <div class = "pagination-container-arrows">
                      <div class="swiper-button-prev index-banner-prev"><img src = "images/left-arrow.svg" class = "full-width"></div>
                      <div class="swiper-button-next index-banner-next"><img src = "images/left-arrow.svg" class = "full-width"></div>
                    </div>
                  </div>
              </div>
              <div class = "arrow-down"><img src = "images/next.svg" class = "full-width"></div>
            </div>
          </div>
          @endforeach


        </div>
      </div>
</div>
@endif
    <div class = "container" id = "pasiune-si-gust">
        <div class = "title pasiune-title">{{$passionTitle}}</div>
        <div class = "title-linie"></div>
        <div class = "subtitle">{{$passionSubtitle}}</div>
        <div class = "pasiune-gust-container" data-aos="zoom-in">
            <div class = "pasiune-imagine"><img src = "{{ thumb('width:700', $passionImage1) }}" class = "full-width-cover"></div>
            <div class = "pasiune-imagine"><img src = "{{ thumb('width:700', $passionImage2) }}" class = "full-width-cover"></div>
            <div class = "pasiune-imagine"><img src = "{{ thumb('width:700', $passionImage3) }}" class = "full-width-cover"></div>
        </div>
        <div class = "pasiune-text-container">
          <div class = "pasiune-text">{!!$passionDescription!!}</div>
            <div class = "pasiune-text-title" data-aos="fade-right">{{$passionBigFont}}</div>
        </div>
    </div>
    @if($bannerMenus)
    <div class = "menu-container-index">
        <div class="swiper-container menuImages">
          <div class="swiper-wrapper">
             @php
                $counter = 0;
            @endphp
            @foreach($bannerMenus as $banner)
            @php
                    $counter++;
                @endphp
            <div class="swiper-slide">
              <div class = "menu-number">0{{$counter}}</div>
              <div class = "banner-menu-image"><img src = "{{ thumb('width:700', $banner->image) }}" class = "full-width-cover"></div>
            </div>
            @endforeach
          </div>
      <div class="swiper-pagination"></div>
      </div>
      <div class = "menu-container-blank"></div>
      <div class = "menu-container-overlay">
        <div class = "menu-container-overlay-left">
<!--           <div class = "menu-number">01</div> -->
          <div class = "menu-item-name-text">
            <div class = "menu-item-name-text-text">{{$banner->title}}</div>
            <div class = "menu-item-name-text-line"></div>
          </div>
        </div>
        <div class = "menu-container-overlay-right">
          <div class = "menu-container-overlay-right-left">
<!--             <div class = "menu-number">01</div> -->
            <div class = "menu-arrows-container">
              <div class="swiper-button-prev menu-banner-prev"><img src = "images/left-arrow.svg" class = "full-width"></div>
              <div class="swiper-button-next menu-banner-next"><img src = "images/left-arrow.svg" class = "full-width"></div>
            </div>
          </div>
          <div class = "menu-container-overlay-right-right" data-aos="fade-left">
              <div class = "menu-titlu-da">Meniu</div>
              <div class = "menu-text-da">Pentru fiecare dintre noi, Pagaia e un motiv de mândrie. Facem ce ne place, pentru că iubim cu adevărat bucătăria.</div>
              <a href = "meniu" class = "menu-btn">Vezi meniul</a>
          </div>
        </div>
      </div>
    </div>
   @endif
    <div class = "container valori-container" data-aos="flip-left">
      <div class = "title pasiune-title">{{$ValoriTitlu}}</div>
      <div class = "title-linie"></div>
      <div class = "subtitle">{{$ValoriSubtitlu}}</div>
      <div class = "valori-container-inside" >
        <div class=  "valori-text">{!!$ValoriText!!}</div>
          <div class=  "valori-text-mare">{{$ValoriBigFont}}</div>
        </div>
  </div>
  <div id="map-canvas"></div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCmM1P-D5Zka0kPEbZSrsR90gpBlDxgm18"></script>
<script>
  
   var indexBannerSwiper = new Swiper(".indexBannerSwiper", {
      effect: "fade",
      pagination: {
        el: ".index-banner-pagination",
        type: "progressbar",
      },
      navigation: {
        nextEl: ".index-banner-next",
        prevEl: ".index-banner-prev",
      },
    });
  
    $indexBannerSwiper = 1.5;
    if(screen.width<=1024){
      $indexBannerSwiper = 1;
    }
    var indexBannerSwiper = new Swiper(".menuImages", {
      slidesPerView: $indexBannerSwiper,
      loop:true,
//       effect: "fade",
      navigation: {
        nextEl: ".menu-banner-next",
        prevEl: ".menu-banner-prev",
      },
    });
    document.addEventListener("DOMContentLoaded", function () {
      $.ajaxSetup({
        
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          }
      });
    
  });
function initialize() {

  var defaultMarkerLat = "{{$latitudine}}";

  var defaultMarkerLng = "{{$longitudine}}";

  var markerImg = 'images/marker.png';

  var markerTitle = "Pagaia";



  // # Show map

  var myLatlng = new google.maps.LatLng(defaultMarkerLat,defaultMarkerLng);

  var mapOptions = {

    zoom: 15,

    center: myLatlng,

    scrollwheel: false,

    mapTypeId: google.maps.MapTypeId.ROADMAP,
    
    disableDefaultUI: true

  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  // # Show marker

  var marker = new google.maps.Marker({
    
    

    position: myLatlng,

    map: map,

// 					icon:{markerImg} ,
    icon:{url: "images/marker.png",
         scaledSize: new google.maps.Size(42,58)} ,

    title: markerTitle
  });

}



google.maps.event.addDomListener(window, 'load', initialize);
  
  </script>
@endpush
{{--  TODO: Dezvoltare touch media footer  --}}
{{--  TODO: Elimin de la footer telefonul  --}}
{{--  TODO: logo banner pe "gatim pentru cei din fata noastra sus"  --}}
{{--  TODO: scoatem citeste mai mult,si textul alin. la mijloc  --}}
{{--  TODO: multilanguage in fotoer, in locul la rezervari telefon  --}}
{{--  TODO: pagini GDPR  --}}