@extends('admin.admin')




@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('lang.slider')
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('messages')
    <!-- COLOR PALETTE -->
        <div class="box box-default color-palette-box">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" style="color: #ffffff" >
                @lang('lang.Add')
            </button>













            <!-- Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.slider')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/slider')}}" enctype="multipart/form-data" >
                                <div class="modal-body">
                                    @csrf
                                    <div class="box-body col-md-10 col-sm-offset-1">

                                        <div class="form-group {{ $errors->has('title_ar') ? ' has-error' : '' }}">
                                            <label for="title_ar">@lang('lang.title_ar')</label>
                                            <input type="text" id="title_ar" name="title_ar" class="form-control" value="{!! old('title_ar') !!}" />
                                            <span class="help-block">{{ $errors->first('title_ar', ':message') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('title_en') ? ' has-error' : '' }}">
                                            <label for="title_en">@lang('lang.title_en')</label>
                                            <input type="text" id="title_en" name="title_en" class="form-control" value="{!! old('title_en') !!}" />
                                            <span class="help-block">{{ $errors->first('title_en', ':message') }}</span>
                                        </div>

                                        <div class="form-group {{ $errors->has('title_ur') ? ' has-error' : '' }} ">
                                            <label for="titleAr">@lang('lang.title_ur')</label>
                                            <input type="text" id="title_ur" name="title_ur" class="form-control"  value="{!! old('title_ur') !!}" />
                                            <span class="help-block">{{ $errors->first('title_ur', ':message') }}</span>
                                        </div>



                                        <div class="form-group {{ $errors->has('body_ar') ? ' has-error' : '' }}">
                                            <label for="bodyAr">@lang('lang.body_ar')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="body_ar"> </textarea>
                                        </div>

                                        <div class="form-group {{ $errors->has('body_en') ? ' has-error' : '' }}">
                                            <label for="bodyAr">@lang('lang.body_en')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="body_en"> </textarea>
                                        </div>

                                        <div class="form-group {{ $errors->has('body_ur') ? ' has-error' : '' }}">
                                            <label for="bodyAr">@lang('lang.body_ur')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="body_ur"> </textarea>
                                        </div>

                                        <div class="box-body">
                                            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                                                <label for="image">@lang('lang.img')</label>
                                                <input type="file" name="img" multiple class="form-control-file" id="img"
                                                       aria-describedby="fileHelp">
                                                <span class="help-block">{{ $errors->first('img', ':message') }}</span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.cancel')</button>
                                    <button type="submit" class="btn btn-primary"> @lang('lang.save')</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
<!-- End Add Modal-->
<br> <br>
            <!-- Table -->
            <div class="box-body ">
                <div class="row">
                    <div class="box-body col-lg-12">

                        <table class="table table-striped table-light text-center">
                            <thead>
                            <tr>
                                <th scope="col">@lang('lang.ID')</th>
                                <th scope="col">@lang('lang.title')</th>
                                <th scope="col">@lang('lang.body')</th>

                                <th scope="col">@lang('lang.img')</th>

                                <th scope="col">@lang('lang.operation')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($sliders) > 0)
                                @foreach($sliders as $slider)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>@if (LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$slider->title_ar}}
                                    @endif
                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                        {{$slider->title_en}}
                                    @endif</td>
                                @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                {{$slider->title_ur}}
                                @endif</td>

                                <td>@if (LaravelLocalization::getCurrentLocale() == 'ar')
                                        {{$slider->body_ar}}
                                    @endif
                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                        {{$slider->body_en}}
                                    @endif</td>
                                @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                {{$slider->body_ur}}
                                @endif</td>



                                <td>  <img class="img-responsive" src="{{asset('images/sliders/'.$slider->img)}}" style="width:70px;height:70px; border-radius: 50% "></td>
                                <td>


                                    <a class="btn">
                                        <form action="{{action('SliderController@destroy', $slider['id'])}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn" style="color: darkred;font-size:20px "><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </a>
                                    <button type="button" class="btn" style="color: #0d6aad ; font-size: 20px" data-toggle="modal" data-target="#editModal">
                                        <i class="far fa-edit"></i>
                                    </button>

{{--                                    <button type="button" class="btn" style="color: #405e0c; font-size: 20px" data-toggle="modal" data-target="#viewModal">--}}
{{--                                        <i class="far fa-eye"></i>--}}
{{--                                    </button>--}}




                                </td>
                            </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- Edit Modal -->

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('lang.edit')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  method="POST" action="{{action('SliderController@update',$slider->id)}}" enctype="multipart/form-data" >
                            <div class="modal-body">
                                @csrf
                                {{ method_field('PUT') }}                                <input name="id" type="hidden" value="{{$slider->id}}">
                                <div class="box-body col-md-10 col-sm-offset-1">

                                    <div class="form-group {{ $errors->has('title_ar') ? ' has-error' : '' }}">
                                        <label for="title_ar">@lang('lang.title_ar')</label>
                                        <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{$slider->title_ar}}" />
                                        <span class="help-block">{{ $errors->first('title_ar', ':message') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('title_en') ? ' has-error' : '' }}"></label>

                                        <label for="title_en">@lang('lang.title_en')</label><input type="text" id="title_en" name="title_en" class="form-control" value="{{$slider->title_en}}" />
                                        <span class="help-block">{{ $errors->first('title_en', ':message') }}</span>

                                </div>
                                    <div class="form-group {{ $errors->has('title_ur') ? ' has-error' : '' }} ">
                                        <label for="title_ur">@lang('lang.title_ur')</label>
                                        <input type="text" id="title_ur" name="title_ur" class="form-control"  value="{{$slider->title_ur}}" />
                                        <span class="help-block">{{ $errors->first('title_ur', ':message') }}</span>
                                    </div>



                                    <div class="form-group {{ $errors->has('body_ar') ? ' has-error' : '' }}">
                                        <label for="bodyAr">@lang('lang.body_ar')</label>
                                        <textarea type="body" rows="5" class="form-control"  name="body_ar" > {{$slider->body_ar}}</textarea>
                                    </div>

                                    <div class="form-group {{ $errors->has('body_en') ? ' has-error' : '' }}">
                                        <label for="bodyAr">@lang('lang.body_en')</label>
                                        <textarea type="body" rows="5" class="form-control"  name="body_en">{{$slider->body_en}} </textarea>
                                    </div>

                                    <div class="form-group {{ $errors->has('body_ur') ? ' has-error' : '' }}">
                                        <label for="body_ur">@lang('lang.body_ur')</label>
                                        <textarea type="body" rows="5" class="form-control"  name="body_ur"> {{$slider->body_ur}}</textarea>
                                    </div>

                                    <div class="box-body">
                                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                                            <label for="image">@lang('lang.img')</label>
                                            <input type="file" name="image1" multiple class="form-control-file" id="img"
                                                   aria-describedby="fileHelp" > <img class="card-img-top"src="{{asset('images/sliders/' . $slider->img) }}">
                                            <span class="help-block">{{ $errors->first('img', ':message') }}</span>
                                        </div>
                                    </div>>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.cancel')</button>
                                <button type="submit" class="btn btn-primary"> @lang('lang.save')</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
        <!-- End Edit Modal -->

        <!----------->


        <!-- View Modal -->
{{--        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h4 class="modal-title">--}}
{{--                                {{$slider->id}}--}}
{{--                        </h4>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h6 class="box-title">@lang('lang.title_ar') : </h6><p class="lead">{{$slider->title_ar}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h6 class="box-title">@lang('lang.title_en') : </h6><p class="lead">{{$slider->title_en}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h6 class="box-title">@lang('lang.title_ur') : </h6><p class="lead">{{$slider->title_ur}}</p>--}}
{{--                        </div>--}}

{{--                        <div class="box-header with-border">--}}
{{--                            <h6 class="box-title">@lang('lang.body_ar') : </h6><p class="lead">{{$slider->body_ar}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h6 class="box-title">@lang('lang.body_en') : </h6><p class="lead">{{$slider->body_en}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h6 class="box-title">@lang('lang.body_ur') : </h6><p class="lead">{{$slider->body_ur}}</p>--}}
{{--                        </div>--}}

{{--                        <div class="box-header with-border">--}}
{{--                            <h6 class="box-title">@lang('lang.img') : </h6> <img class="img-responsive" src="{{asset('images/sliders/'.$slider->img)}}" style="width:465px;height:200px; ">--}}

{{--                        </div>--}}



{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- End View Modal -->

    </section>


@endsection

