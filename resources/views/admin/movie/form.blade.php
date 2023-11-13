@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt Kê Danh Sách Phim</a>
                <div class="card-header">{{ __('Quẩn lí phim') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($movie))
                        {!! Form::open(['method' => 'POST', 'route' => 'movie.store', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['method' => 'PUT', 'route' => ['movie.update', $movie->id],'enctype'=>'multipart/form-data']) !!}
                        
                    @endif

                    {!! Form::open(['method' => 'POST', 'route' => 'movie.store', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title',[]) !!}
                        {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập title', 'id' => 'slug','onkeyup'=>'ChangeToSlug()']) !!}

                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug',[]) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập title', 'id' => 'convert_slug']) !!}
                            
                            </div>
                            <div class="form-group">
                                {!! Form::label('sotap', 'Số tập phim',[]) !!}
                                {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', ['class' => 'form-control', 'placeholder' => 'Nhập số tập ']) !!}
        
                                </div>
                            <div class="form-group">
                                {!! Form::label('name_eng', 'name_eng',[]) !!}
                                {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', ['class' => 'form-control', 'placeholder' => 'Nhập name english', 'id' => 'name_eng']) !!}
        
                                </div>
                            <div class="form-group">
                                {!! Form::label('trailer', 'trailer',[]) !!}
                                {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', ['class' => 'form-control', 'placeholder' => 'Nhập trailer']) !!}
                                
                                </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description',[]) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập mô tả', 'id' => 'description']) !!}
                       
                        </div>
                        <div class="form-group">
                            {!! Form::label('Từ khóa phim', 'Từ khóa phim',[]) !!}
                            {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['class' => 'form-control', 'placeholder' => 'Nhập tag cách nhau bằng dấu phẩy cho mỗi tag']) !!}
                       
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Active',[]) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'] , isset($movie) ? $movie->status : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Định dạng',[]) !!}
                            {!! Form::select('resolution', ['0'=>'HD', '1'=>'SD', '2'=>'HDCam', '3'=>'Cam', '4'=>'FullHD'] , isset($movie) ? $movie->resolution : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phude', 'Phụ đề',[]) !!}
                            {!! Form::select('phude', ['0'=>'Phụ đề', '1'=>'Thuyết minh', '2'=>'Đang cập nhập'] , isset($movie) ? $movie->phude : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thời lượng', 'Thời lượng',[]) !!}
                            {!! Form::text('movie_time', isset($movie) ? $movie->movie_time : '', ['class' => 'form-control', 'placeholder' => 'Nhập thời lượng']) !!}
    
                            </div>
                        <div class="form-group">
                            {!! Form::label('Category', 'Category',[]) !!}
                            {!! Form::select('category_id', $category , isset($movie) ? $movie->category : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Country', 'Country',[]) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Genre', 'thể loại',[]) !!}</br>
                            {{-- {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre : '', ['class' => 'form-control']) !!} --}}
                            @foreach ($list_genre as $key => $gen)
                                @if (isset($movie))
                                {!! Form::checkbox('genre[]',  $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                                @else
                                {!! Form::checkbox('genre[]',  $gen->id) !!}
                                @endif
                                
                                {!! Form::label('genre', $gen->title) !!}
                                
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('hot', 'Hot',[]) !!}
                            {!! Form::select('phimhot', ['1'=>'Có', '0'=>'Không'] , isset($movie) ? $movie->phimhot : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Image',[]) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($movie))
                            <img width="60%" src="{{ asset('uploads/movie/'.$movie ->image) }}" >
                            @endif
                            
                        </div>
                        @if (!isset($movie))
                        {!! Form::submit('Nhập dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                
                    {!! Form::close() !!}
                  
                </div>
                
            </div>
            {{-- <table class="table" id="tablephim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name english</th>
                    <th scope="col">hình ảnh</th>
                    <th scope="col">Description</th>
                    <th scope="col">Active</th>
                    <th scope="col">Category</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Hot không</th>
                    <th scope="col">Định dạng</th>
                    <th scope="col">Phụ đề</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $gen)
                  <tr>
                    
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $gen ->title }}</td>
                    <td>{{ $gen ->name_eng }}</td>
                    <td><img width="60%" src="{{ asset('uploads/movie/'.$gen ->image) }}" ></td>
                  
                    <td>{{ $gen ->description }}</td>
                    <td>
                        @if ($gen ->status)
                            Hiển thị
                            @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>{{ $gen ->category->title }}</td>
                    <td>{{ $gen ->genre->title }}</td>
                    <td>{{ $gen ->country->title }}</td>
                    <td> 
                        @if($gen->phimhot==0)
                            Không
                        @else
                            Có
                        @endif
                    </td>
                    <td> 
                        @if($gen->resolution==0)
                            HD
                          @elseif($gen->resolution==1)
                            SD
                          @elseif($gen->resolution==2)
                            HDCam
                          @elseif($gen->resolution==3)
                            Cam
                          @else
                           FullHD
                        @endif
                    </td>
                    <td> 
                        @if($gen->phude==0)
                            Phụ đề
                          @elseif($gen->phude==1)
                            Thuyết minh
                          @else
                            Đang cập nhật
                         
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $gen -> id], 'onsubmit' => 'return confirm("Bạn có muốn xóa không ?")']) !!}
                        
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        <a class="btn btn-warning" href="{{ route('movie.edit',$gen ->id) }}">Sửa</a>
                        
                        {!! Form::close() !!}
                    </td>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table> --}}
        </div>
    </div>
</div>
@endsection
