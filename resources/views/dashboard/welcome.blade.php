@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.home')</h1>
            <ol class="breadcrumb">
                <li><a href="{{-- route('adminbanel') --}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.users')</li>
            </ol>
        </section>
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">عدد الرسائل</span>
                            <span class="info-box-number">{{ $countContact }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">عدد الخدمات</span>
                            <span class="info-box-number">{{ $serviceContact }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">عدد الاعضاء</span>
                            <span class="info-box-number">{{-- $usersCount --}}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Main row -->
            <div class="row">
                
                <div class="col-md-8">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">آخر الرسائل</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.phone')</th>
                                            <th>@lang('site.subject')</th>
                                            <th>@lang('site.message')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $key => $msg)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><a
                                                        href="{{ route('contact', $msg->id) }}">{{ $msg->name }}</a>
                                                </td>
                                                <td>{{ $msg->phone }}</td>
                                                <td>{{ $msg->subject }}</td>
                                                <td>{{ $msg->message }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{-- route('contact_us.index') --}}" class="btn btn-sm btn-info btn-flat pull-left">كل
                                الرسائل</a>
                        </div><!-- /.box-footer -->
                    </div><!-- /.box -->
                </div>
                <!-- /.col -->
            <div class="row">

                <div class="col-md-3">
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">تغييير كلمة المرور</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            @include('partials._errors')

                            <form action="{{route('change_pass')}}" method="POST">
                                @csrf
                                {{method_field('post')}}                 
            
                                <div class="form-group">
                                    <label>@lang('site.old_password')</label>
                                    <input type="password" name="old_password" class="form-control">
                                </div>  
                                
                                <div class="form-group">
                                    <label>@lang('site.new_password')</label>
                                    <input type="password" name="new_password" class="form-control">
                                </div> 
            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class=" fa fa-edit">@lang('site.change')</i></button>
                                </div>                
                                </form>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>
@endsection

@push('scripts')


 
@endpush
