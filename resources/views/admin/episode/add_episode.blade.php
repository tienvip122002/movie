@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card">
                    <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt Kê Danh Sách Phim</a>

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
                                {!! Form::label('movie_id', 'Phim',[]) !!}
                                {!! Form::hidden('movie_id',isset($movie) ? $movie->id : '', ['class' => 'form-control', 'placeholder' => '','readonly']) !!}
                                {!! Form::text("phim", $movie->title , ['class' => 'form-control', 'placeholder' => '','readonly']) !!}
                               
                            </div>
                            <div class="form-group">
                                {!! Form::label('link phim', 'link phim',[]) !!}
                                {!! Form::text('link_movie', isset($episode) ? $episode->link_movie : '', ['class' => 'form-control', 'placeholder' => 'Nhập link']) !!}
        
                                </div>
                                
                                    <div class="form-group">
                                        {!! Form::label('tập phim', 'tập phim',[]) !!}
                                        {!! Form::selectRange('episode',1,$movie->sotap,$movie->sotap,['class' => 'form-control']) !!}
                                    </div>
                           
                            @if (!isset($episode))
                            {!! Form::submit('Nhập dữ liệu', ['class' => 'btn btn-success']) !!}
                            @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                            @endif
                    
                        {!! Form::close() !!}
                      
                    </div>
                    
                </div>
                
            <a href="{{route('episode.create')}}" class="btn btn-primary">Thêm Tập Phim</a>
            <table class="table" id="tablephim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Tập phim</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Link phim</th>
                    <th scope="col">Active</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody id="order_position">
                    @foreach ($list_episode as $key => $cate)
                    <tr>
                    
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $cate->movie ->title }}</td>
                    <td>{{ $cate ->episode }}</td>
                    <td><img width="100" src="{{asset('uploads/movie/'.$cate->movie->image)}}"></td>
                    <td>{!! $cate ->link_movie !!}</td>
                    <td>
                        @if ($cate ->status)
                            Hiển thị
                            @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['episode.destroy', $cate -> id], 'onsubmit' => 'return confirm("Bạn có muốn xóa không ?")']) !!}
                        
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        <a class="btn btn-warning" href="{{ route('episode.edit',$cate ->id) }}">Sửa</a>
                        
                        {!! Form::close() !!}
                    </td>
                    
                </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
