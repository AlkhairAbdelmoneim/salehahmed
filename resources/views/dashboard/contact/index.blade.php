@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.messages')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.messages')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title" style="margin-bottom: 15px">@lang('site.messages')<small style="color: #f03">{{' '.$messages->total()}}</small></h3>
                   
                <form action="{{route('contact.index')}}" method="GET">
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
                            {{-- <div class="col-md-4">
                            
                                    <a href="{{route('contact.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>
                            </div> --}}
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    @if (isset($messages) && $messages->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.email')</th>                                                                                                        
                                <th>@lang('site.phone')</th>                                                     
                                <th>@lang('site.subject')</th>                                                     
                                <th>@lang('site.message')</th>                                                                                                         
                                <th>@lang('site.action')</th>                                                     
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $index=>$msg)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$msg ->name}}</td>
                            <td>{{$msg ->email}}</td>
                            <td>{{$msg ->phone}}</td>
                            <td>{{$msg ->subject}}</td>
                            <td>{{$msg ->message}}</td>
                            <td>
                                <a href="{{route('contact.edit',$msg->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                
                                <form method="post" action="{{route('contact.destroy',$msg->id)}}" style="display: inline-block">
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
                        {{$messages->appends(request()->query())->links()}}
                    </div>
                    @else
                       <h2> @lang('site.no_data_found')</h2>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection