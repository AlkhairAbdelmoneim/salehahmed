@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.services')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.services')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title" style="margin-bottom: 15px">@lang('site.services')<small style="color: #f03">{{' '.$services->total()}}</small></h3>
                   
                <form action="{{route('service.index')}}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{ request()->search }}"
                                        placeholder="@lang('site.search')">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat">@lang('site.search')</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                            
                                    <a href="{{route('service.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    @if (isset($services) && $services->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.description')</th>                                                                                                        
                                <th>@lang('site.image')</th>                                                     
                                <th>@lang('site.date')</th>                                                                                                                                                             
                                <th>@lang('site.action')</th>                                                     
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $index=>$msg)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$msg ->name}}</td>
                            <td>{{$msg ->description}}</td>
                            <td><img src="{{ $msg->image_path }}" alt="No image available"
                                style="width: 100px" class="img-thumbnail"></td>
                            <td>{{$msg ->created_at}}</td>
                            <td>
                                <a href="{{route('service.edit',$msg->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                
                                <form method="post" action="{{route('service.destroy',$msg->id)}}" style="display: inline-block">
                                    @csrf
                                    {{method_field('delete')}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>@lang('site.delete')</button>
                                    </div>                          
                                </form>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="content-center">
                        {{$services->appends(request()->query())->links()}}
                    </div>
                    @else
                       <h2> @lang('site.no_data_found')</h2>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection