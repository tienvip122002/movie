@extends('layout')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{ route('category', $movie->category ->slug) }}">{{ $movie->category->title}}</a> » 
                  <span>
                     <a href="{{ route('country', $movie->country ->slug) }}">{{ $movie->country->title }}</a> » 

               
                     <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span>
                  </span></span></span></div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section id="content" class="test">
          <div class="clearfix wrap-content">
            
             <div class="halim-movie-wrapper">
                <div class="title-block">
                   <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                      <div class="halim-pulse-ring"></div>
                   </div>
                   <div class="title-wrapper" style="font-weight: bold;">
                      Bookmark
                   </div>
                </div>
                <div class="movie_info col-xs-12">
                   <div class="movie-poster col-md-3">
                      <img class="movie-thumb" src="{{ asset('uploads/movie/'.$movie ->image) }}" alt="{{ $movie->title }}">
                      @isset($episode_tapdau)
                      <div class="bwa-content">
                         <div class="loader"></div>
                         
                  
                        
                        <a href="{{ url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode) }}" class="bwac-btn">
                        
                           
                           <i class="fa fa-play"></i>
                        </a>
                        
                     </div>
                     @endisset
                     @if (isset($movie->trailer))
                     <a href="#trailer" style="display: block" class="btn btn-primary trailer">Xem Trailer</a>
                     @endif
                      
                   </div>
                   <div class="film-poster col-md-9">
                      <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{ $movie->title }}</h1>
                      <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->name_eng }}</h2>
                      <ul class="list-info-group">
                         <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                           @if($movie->resolution==0)
                           HD
                         @elseif($movie->resolution==1)
                           SD
                         @elseif($movie->resolution==2)
                           HDCam
                         @elseif($movie->resolution==3)
                           Cam
                         @else
                          FullHD
                       @endif
                           </span><span class="episode">
                               
                                 @if($movie->phude==0)
                                     Phụ đề
                                   @elseif($movie->phude==1)
                                     Thuyết minh
                                   @else
                                     Đang cập nhật
                                  
                                 @endif
                             
                           </span></li>

                           <li class="list-info-group-item"><span>Thời lượng : </span>{{ $movie->movie_time }}</li>
                           <li class="list-info-group-item"><span>Số tập : </span>{{ $episode_current_all.'/'.$movie->sotap }} - 
                           @if ($episode_current_all==$movie->sotap)
                               Hoàn thành
                           @else
                              Đang cập nhật
                           @endif
                           </li>
                           @if ($movie->season!=0)
                           <li class="list-info-group-item"><span>Season : </span>{{ $movie->season }}</li>
                       @endif
                         
                        
                         <li class="list-info-group-item"><span>Thể loại</span> : 
                           
                           
                              @foreach ($movie->movie_genre as $key => $value)
                              <a href="{{ route('genre', $value->slug) }}" rel="category tag">{{ $value->title }}</a>
                              @endforeach
                           
                           
                        </li>
                         <li class="list-info-group-item"><span>Danh mục</span> : 
                           <a href="{{ route('category', $movie->category ->slug) }}" rel="category tag">{{ $movie->category->title }}</a>
                        </li>
                         <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{ route('country', $movie->country ->slug) }}" rel="tag">{{ $movie->country->title }}</a></li>
                         
                         <li class="list-info-group-item halim-episode">
                           <span>Tập phim mới nhất</span> : 
                           @foreach ($episode as $key => $value)
                           <span  class="halim-btn halim-btn-2 active halim-info-1-1 box-shadow" style=" background: rgba(255, 68, 0, 0.5); padding: 6px; margin-left: 2px" >
                           <a href="{{ url('xem-phim/'.$value->movie->slug.'/tap-'.$value->episode) }}" rel="tag">{{ $value->episode }}</a>
                           </span>
                           @endforeach
                        </li>
                        
                      </ul>
                      <div class="movie-trailer hidden"></div>
                   </div>
                </div>
             </div>
             <div class="clearfix"></div>
             <div id="halim_trailer"></div>
             <div class="clearfix"></div>
             <div class="section-bar clearfix">
                <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
             </div>
             <div class="entry-content htmlwrap clearfix">
                <div class="video-item halim-entry-box">
                   <article id="post-38424" class="item-content">
                      Phim <a href="">{{ $movie->title }}</a>
                      <p>{{ $movie->description }}</p>
                      
                   </article>
                </div>
             </div>
             {{-- tags --}}
             <div class="section-bar clearfix">
               <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                  <article id="post-38424" class="item-content">
                     @if ($movie->tags !=null)
                         @php
                              $tags = array();
                             $tags = explode(",", $movie->tags);
                         @endphp
                         @foreach ($tags as $key => $tag)
                             <a href="{{ url('tag/'.$tag) }}">{{ $tag }}</a>
                         @endforeach
                     @else
                     {{ $movie->tags }}
                     @endif
                  </article>
               </div>
            </div>

               {{-- bình luận --}}
               <div class="section-bar clearfix">
                  <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  @php
                      $current_url = Request::url();
                  @endphp
                  <div class="video-item halim-entry-box">
                     <article id="post-38424" class="item-content">
                        <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%" data-colorscheme="light" data-numposts="10"></div>
                     </article>
                  </div>
               </div>

               {{-- trailer --}}
               @if ($movie->trailer != null)
               <div class="section-bar clearfix">
                  <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                     <article id="trailer" class="item-content">
                        <iframe width="100%" height="320" src="https://www.youtube.com/embed/{{ $movie->trailer }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                     </article>
                  </div>
               </div>
               
            </div>
            @endif
       </section>
      
       <section class="related-movies">
          <div id="halim_related_movies-2xx" class="wrap-slider">
             <div class="section-bar clearfix">
                <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
             </div>
             <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
             
              @foreach ($movie_lienquan as $key => $value)
                <article class="thumb grid-item post-38498">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{ route('movie',$value ->slug) }}" title="{{ $value->title }}">
                         <figure><img class="lazy img-responsive" src="{{ asset('uploads/movie/'.$value ->image) }}" alt="{{ $value->title }}g" title="{{ $value->title }}"></figure>
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
               
             </div>
             <script>
                jQuery(document).ready(function($) {				
                var owl = $('#halim_related_movies-2');
                owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
             </script>
          </div>
       </section>
    </main>
    @include('pages.include.sidebar')
 </div>

@endsection