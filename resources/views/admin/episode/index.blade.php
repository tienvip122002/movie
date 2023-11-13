@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
