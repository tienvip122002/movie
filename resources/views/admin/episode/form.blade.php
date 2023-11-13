@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt Kê Danh Sách tập Phim</a>
                <div class="card-header">{{ __('Quẩn lí tập phim') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($episode))
                        {!! Form::open(['method' => 'POST', 'route' => 'episode.store', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['method' => 'PUT', 'route' => ['episode.update', $episode->id],'enctype'=>'multipart/form-data']) !!}
                        
                    @endif

                    
                        <div class="form-group">
                            {!! Form::label('movie', 'Phim',[]) !!}
                            {!! Form::select('movie_id',['0'=>'Chọn phim', 'Phim' =>$list_movie], isset($episode) ? $episode->movie_id : '', ['class' => 'form-control select-movie']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link phim', 'link phim',[]) !!}
                            {!! Form::text('link_movie', isset($episode) ? $episode->link_movie : '', ['class' => 'form-control', 'placeholder' => 'Nhập link']) !!}
    
                            </div>
                            @if (isset($episode))
                            <div class="form-group">
                                {!! Form::label('tập phim', 'tập phim',[]) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '', ['class' => 'form-control', 'placeholder' => '',isset($episode) ? 'disabled' : '']) !!}
    
                                </div>
                            @else
                                <div class="form-group">
                                    {!! Form::label('tập phim', 'tập phim',[]) !!}
                                    <select name="episode" id="episode" class="form-control select-movie"></select>
                                </div>
                            @endif
                       
                        @if (!isset($episode))
                        {!! Form::submit('Nhập dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                
                    {!! Form::close() !!}
                  
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection
