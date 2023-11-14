@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quốc gia') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($country))
                        {!! Form::open(['method' => 'POST', 'route' => 'country.store']) !!}
                    @else
                        {!! Form::open(['method' => 'PUT', 'route' => ['country.update', $country->id]]) !!}
                        
                    @endif

                    {!! Form::open(['method' => 'POST', 'route' => 'country.store', 'class' => 'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title',[]) !!}
                        {!! Form::text('title', isset($country) ? $country->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập title', 'id' => 'slug','onkeyup'=>'ChangeToSlug()']) !!}
                        <small class="text-danger">{{ $errors->first('inputname') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('slug', 'Slug',[]) !!}
                            {!! Form::text('slug', isset($country) ? $country->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập title', 'id' => 'convert_slug']) !!}
                            <small class="text-danger">{{ $errors->first('inputname') }}</small>
                            </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('description', 'Description',[]) !!}
                        {!! Form::textarea('description', isset($country) ? $country->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập mô tả', 'id' => 'description']) !!}
                        <small class="text-danger">{{ $errors->first('inputname') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                            {!! Form::label('active', 'Active',[]) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'] , isset($country) ? $country->status : '', ['class' => 'form-control']) !!}
                        </div>
                        @if (!isset($country))
                            {!! Form::submit('Nhập dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                        
                       
                   
                
                    {!! Form::close() !!}
                </div>
                
            </div>
            <table class="table" id="tablephim">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Active</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $cate)
                  <tr>
                    
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $cate ->title }}</td>
                    <td>{{ $cate ->description }}</td>
                    <td>
                        @if ($cate ->status)
                            Hiển thị
                            @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['country.destroy', $cate -> id], 'onsubmit' => 'return confirm("Bạn có muốn xóa không ?")']) !!}
                        
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        <a class="btn btn-warning" href="{{ route('country.edit',$cate ->id) }}">Sửa</a>
                        
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
