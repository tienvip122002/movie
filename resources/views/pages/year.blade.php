@extends('layout')
@section('content')


<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <div class="panel-heading">
         <div class="row">
            <div class="col-xs-6">
               <div class="yoast_breadcrumb hidden-xs"><span><span>
                  <span>Phim thuộc năm: </span> » 
                  @for ($i = 2000; $i <= 2028; $i++)
                  <span class="breadcrumb_last" aria-current="page"><a title="{{ $i }}" href="{{ url('year/'.$i) }}">{{ $i }}</span></a> »
                  @endfor
                  
               </span></span>
            </div>
            </div>
         </div>
      </div>
      <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
         <div class="ajax"></div>
      </div>
   </div>
   <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      <section>
         <div class="section-bar clearfix">
            <h1 class="section-title"><span>Năm: {{ $year }}</span></h1>
         </div>
         <div class="halim_box">

            @foreach ($movie as $key => $value)
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
         <div class="clearfix"></div>
         <div class="text-center">
            {!! $movie->links("pagination::bootstrap-4") !!}
            {{-- <ul class='page-numbers'>
               <li><span aria-current="page" class="page-numbers current">1</span></li>
               <li><a class="page-numbers" href="">2</a></li>
               <li><a class="page-numbers" href="">3</a></li>
               <li><span class="page-numbers dots">&hellip;</span></li>
               <li><a class="page-numbers" href="">55</a></li>
               <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
            </ul> --}}
         </div>
      </section>
   </main>
     {{-- sidebar --}}
     @include('pages.include.sidebar')
</div>

@endsection