@extends('layout')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    {{-- <div class="col-xs-12 carausel-sliderWidget">
       <section id="halim-advanced-widget-4">
          <div class="section-heading">
             <a href="danhmuc.php" title="Phim Chiếu Rạp">
             <span class="h-text">Phim Chiếu Rạp</span>
             </a>
             <ul class="heading-nav pull-right hidden-xs">
                <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
             </ul>
          </div>
          <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
             <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                <div class="halim-item">
                   <a class="halim-thumb" href="{{ route('movie') }}" title="GÓA PHỤ ĐEN">
                      <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                      <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">GÓA PHỤ ĐEN</p>
                            <p class="original_title">Black Widow</p>
                         </div>
                      </div>
                   </a>
                </div>
             </article>

            
          </div>
       </section>
       <div class="clearfix"></div>
    </div> --}}
    <div id="halim_related_movies-2xx" class="wrap-slider">
      <div class="section-bar clearfix">
         <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
         @foreach ($phimhot as $key => $value)
             
        
         <article class="thumb grid-item post-38498">
            <div class="halim-item">
               <a class="halim-thumb" href="{{ route('movie',$value ->slug) }}" title="{{ $value ->title }}">
                  <figure><img class="lazy img-responsive" src="{{ asset('uploads/movie/'.$value ->image) }}" alt="{{ $value ->title }}" title="{{ $value ->title }}"></figure>
                  <span class="status">
                     @if($value->resolution==0)
                     HD
                   @elseif($value->resolution==1)
                     SD
                   @elseif($value->resolution==2)
                     HDCam
                   @elseif($value->resolution==3)
                     Cam
                   @else
                    FullHD
                 @endif
                     </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                        {{ $value->episode_count }}/{{ $value->sotap }}
                        @if($value->phude==0)
                        Phụ đề
                        @if ($value->season!=0)
                            Season-{{ $value->season }}
                        @endif
                      @elseif($value->phude==1)
   
                        Thuyết minh
                        @if ($value->season!=0)
                            Season-{{ $value->season }}
                        @endif
                      @else
                        Đang cập nhật
                        @if ($value->season!=0)
                            Season-{{ $value->season }}
                        @endif
                     
                    @endif
                     </span> 
                  <div class="icon_overlay"></div>
                  <div class="halim-post-title-box">
                     <div class="halim-post-title ">
                        <p class="entry-title">{{ $value ->title }}</p>
                        <p class="original_title">{{ $value ->name_eng }}</p>
                     </div>
                  </div>
               </a>
            </div>
         </article>
         @endforeach
        
      </div>
      <script>
         jQuery(document).ready(function($) {				
         var owl = $('#halim_related_movies-2');
         owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
      </script>
   </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
@foreach ($category_home as $key => $cate_home)
    

       <section id="halim-advanced-widget-2">
          <div class="section-heading">
             <a href="{{ route('category',$cate_home ->slug) }}" title="Phim Bộ">
             <span class="h-text">{{ $cate_home ->title }}</span>
             </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">

            @foreach ($cate_home->movie->take(12) as $key => $value)
             <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                   <a class="halim-thumb" href="{{ route('movie',$value ->slug) }}">
                      <figure><img class="lazy img-responsive" src="{{ asset('uploads/movie/'.$value ->image) }}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="{{ $value->title }}"></figure>
                      <span class="status">
                        @if($value->resolution==0)
                        HD
                      @elseif($value->resolution==1)
                        SD
                      @elseif($value->resolution==2)
                        HDCam
                      @elseif($value->resolution==3)
                        Cam
                      @else
                       FullHD
                    @endif
                  </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                     
                        {{ $value->episode_count }}/{{ $value->sotap }}
                         
                     @if($value->phude==0)
                     Phụ đề
                     @if ($value->season!=0)
                         Season-{{ $value->season }}
                     @endif
                   @elseif($value->phude==1)

                     Thuyết minh
                     @if ($value->season!=0)
                         Season-{{ $value->season }}
                     @endif
                   @else
                     Đang cập nhật
                     @if ($value->season!=0)
                         Season-{{ $value->season }}
                     @endif
                  
                 @endif
                  </span> 
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">{{ $value->title }}</p>
                            <p class="original_title">{{ $value ->name_eng }}</p>
                         </div>
                      </div>
                   </a>
                </div>
             </article>
     @endforeach
       <div class="clearfix"></div>
       @endforeach
    </main>

    {{-- sidebar --}}
    @include('pages.include.sidebar')
 </div>

@endsection