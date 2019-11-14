@extends('admin.admin')




@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('lang.product')
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
                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.product')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/admin/product')}}" enctype="multipart/form-data" >
                                <div class="modal-body">
                                    @csrf
                                    <div class="box-body col-md-10 col-sm-offset-1">

                                        <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                            <label for="name_ar">@lang('lang.name_ar')</label>
                                            <input type="text" id="name_ar" name="name_ar" class="form-control" value="{!! old('name_ar') !!}" />
                                            <span class="help-block">{{ $errors->first('name_ar', ':message') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <label for="name_en">@lang('lang.name_en')</label>
                                            <input type="text" id="name_en" name="name_en" class="form-control" value="{!! old('name_en') !!}" />
                                            <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                                        </div>

                                        <div class="form-group {{ $errors->has('name_ur') ? ' has-error' : '' }} ">
                                            <label for="titleAr">@lang('lang.name_ur')</label>
                                            <input type="text" id="name_ur" name="name_ur" class="form-control"  value="{!! old('name_ur') !!}" />
                                            <span class="help-block">{{ $errors->first('name_ur', ':message') }}</span>
                                        </div>



                                        <div class="form-group {{ $errors->has('info_ar') ? ' has-error' : '' }}">
                                            <label for="bodyAr">@lang('lang.info_ar')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="info_ar"> </textarea>
                                        </div>

                                        <div class="form-group {{ $errors->has('info_en') ? ' has-error' : '' }}">
                                            <label for="info_en">@lang('lang.info_en')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="info_en"> </textarea>
                                        </div>

                                        <div class="form-group {{ $errors->has('info_ur') ? ' has-error' : '' }}">
                                            <label for="info_ur">@lang('lang.info_ur')</label>
                                            <textarea type="body" rows="5" class="form-control"  name="info_ur"> </textarea>
                                        </div>

                                        <div class="form-group {{ $errors->has('SoldBy') ? ' has-error' : '' }}">
                                            <label for="SoldBy">@lang('lang.SoldBy')</label>
                                            <input type="text"  class="form-control"  name="SoldBy"/>
                                        </div>

                                        <div class="form-group {{ $errors->has('condition_ar') ? ' has-error' : '' }}">
                                            <label for="condition_ar">@lang('lang.condition_ar')</label>


                                        <select>
                                            <option value="new">جديد</option>
                                            <option value="used">مستعمل</option>
                                        </select>
                                        </div>


                                        <div class="form-group {{ $errors->has('condition_en') ? ' has-error' : '' }}">
                                            <label for="condition_en">@lang('lang.condition_en')</label>
                                            <select>
                                                <option value="new">New</option>
                                                <option value="used">Used</option>
                                            </select>
                                        </div>

                                        <div class="form-group {{ $errors->has('condition_ur') ? ' has-error' : '' }}">
                                            <label for="condition_ur">@lang('lang.condition_ur')</label>


                                            <select>
                                                <option value="new">نيا</option>
                                                <option value="used">پرانا</option>
                                            </select>
                                        </div>



                                        <div class="form-group col-lg-4 {{ $errors->has('price') ? ' has-error' : '' }} ">
                                            <label for="price">@lang('lang.price')</label>
                                            <input type="number" id="price" name="price" class="form-control"   />
                                            <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                                        </div> <span> LE</span>



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

                                <th scope="col">@lang('lang.img')</th>

                                <th scope="col">@lang('lang.operation')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                                {{$product->name_ar}}
                                            @endif

                                            @if (LaravelLocalization::getCurrentLocale() == 'en')
                                                {{$product->name_en}}
                                            @endif</td>
                                        @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                        {{$product->name_ur}}
                                        @endif</td>
                                        <td>  <img class="img-responsive" src="{{asset('images/products/'.$product->img)}}" style="width:70px;height:70px; border-radius: 50% "></td>
                                        <td>


                                            <a class="btn">
                                                <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn" style="color: darkred;font-size:20px "><i class="far fa-trash-alt"></i></button>
                                                </form>
                                            </a>
                                            <button type="button" class="btn" style="color: #0d6aad ; font-size: 20px" data-toggle="modal" data-target="#editModal">
                                                <i class="far fa-edit"></i>
                                            </button>

                                            <button type="button" class="btn" style="color: #405e0c; font-size: 20px" >
                                                <a href="/admin/product/{{$product->id}}" style="color: #405e0c"> <i class="far fa-eye"></i></a>
                                            </button>



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
                        <form  method="POST" action="{{action('ProductController@update',$product->id)}}" enctype="multipart/form-data" >
                            <div class="modal-body">
                                @csrf
                                {{ method_field('PUT') }}                                <input name="id" type="hidden" value="{{$product->id}}">
                                <div class="box-body col-md-10 col-sm-offset-1">

                                    <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                        <label for="name_ar">@lang('lang.name_ar')</label>
                                        <input type="text" id="name_ar" name="name_ar" class="form-control" value="{{$product->name_ar}}" />
                                        <span class="help-block">{{ $errors->first('name_ar', ':message') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}"></label>

                                        <label for="name_en">@lang('lang.name_en')</label><input type="text" id="name_en" name="name_en" class="form-control" value="{{$product->name_en}}" />
                                        <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>

                                    </div>
                                    <div class="form-group {{ $errors->has('name_ur') ? ' has-error' : '' }} ">
                                        <label for="titleAr">@lang('lang.name_ur')</label>
                                        <input type="text" id="name_ur" name="name_ur" class="form-control"  value="{{$product->name_ur}}" />
                                        <span class="help-block">{{ $errors->first('name_ur', ':message') }}</span>
                                    </div>



                                    <div class="form-group {{ $errors->has('info_ar') ? ' has-error' : '' }}">
                                        <label for="bodyAr">@lang('lang.info_ar')</label>
                                        <textarea type="body" rows="5" class="form-control"  name="info_ar" > {{$product->info_ar}}</textarea>
                                    </div>

                                    <div class="form-group {{ $errors->has('info_en') ? ' has-error' : '' }}">
                                        <label for="bodyAr">@lang('lang.info_en')</label>
                                        <textarea type="body" rows="5" class="form-control"  name="info_en">{{$product->info_en}} </textarea>
                                    </div>

                                    <div class="form-group {{ $errors->has('info_ur') ? ' has-error' : '' }}">
                                        <label for="bodyAr">@lang('lang.info_ur')</label>
                                        <textarea type="body" rows="5" class="form-control"  name="info_ur"> {{$product->info_ur}}</textarea>
                                    </div>

                                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }} ">
                                        <label for="price">@lang('lang.price')</label>
                                        <input type="number" id="price" name="price" class="form-control"  value="{{$product->price}}" />
                                        <span class="help-block">{{ $errors->first('price', ':message') }}</span>
                                    </div>


                                    <div class="box-body">
                                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                                            <label for="image">@lang('lang.img')</label>
                                            <input type="file" name="image1" multiple class="form-control-file" id="img"
                                                   aria-describedby="fileHelp" > <img class="card-img-top"src="{{asset('images/products/' . $product->img) }}">
                                            <span class="help-block">{{ $errors->first('img', ':message') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label  for="filter">@lang('lang.condition_ar')</label>
                                        <select id="condition_ar" name="condition_ar" class="form-control" style="height: 46px;">
                                            <option value="">جديد</option>
                                            <option value="used">مستعمل</option>
                                        </select> </div>



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


        <!-- View Modal -->


        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                {{$product->name_ar}}
                            @endif
                            @if (LaravelLocalization::getCurrentLocale() == 'en')
                                {{$product->name_en}}
                            @endif
                                @if (LaravelLocalization::getCurrentLocale() == 'ur')
                                    {{$product->name_ur}}
                                @endif
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.img') : </h6> <img class="img-responsive" src="{{asset('images/products/'.$product->img)}}" style="width:300px;height:200px; ">

                        </div>

                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.name_ar') : </h6><p class="lead">{{$product->name_ar}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.name_en') : </h6><p class="lead">{{$product->name_en}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.name_ur') : </h6><p class="lead">{{$product->name_ur}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.info_ar') : </h6><p class="lead">{{$product->info_ar}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.info_en') : </h6><p class="lead">{{$product->info_en}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.info_ur') : </h6><p class="lead">{{$product->info_ur}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.price') : </h6><p class="lead">{{$product->price}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.soldBy') : </h6><p class="lead">{{$product->SoldBy}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.condition_ar') : </h6><p class="lead">{{$product->condition_ar}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.condition_en') : </h6><p class="lead">{{$product->condition_en}}</p>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">@lang('lang.condition_ur') : </h6><p class="lead">{{$product->condition_ur}}</p>
                        </div>








                    </div>
                </div>
            </div>
        </div>
        <!-- End View Modal -->
    </section>


@endsection

