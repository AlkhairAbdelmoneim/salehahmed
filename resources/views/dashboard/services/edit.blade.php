@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.services')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{ route('service.index') }}">@lang('site.services')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.add') {{-- <small>Quick Exapm</small> --}}</h3>
                </div>
                <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.name')</label>
                                <input type="text" name="name" class="form-control" value="{{ $service->name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.description')</label>
                                <textarea name="description" id="" class="form-control" cols="4" rows="4">{!! $service->description !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control demo thumbnail" multiple
                                data-jpreview-container="#demo-1-container" alt="Not image found">
                        </div>

                        <div id="demo-1-container" class="jpreview-container image">
                            <img src="{{ $service->image_path }}" style="width: 100px;" class="thumbnail image-preview"
                                alt="Not image found">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i
                                    class=" fa fa-plus">@lang('site.add')</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    use = "strict";

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "منطقة العقار",
            allowClear: true
        });

    });
</script>
@endsection
