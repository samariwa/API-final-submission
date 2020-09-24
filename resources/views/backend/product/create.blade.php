@extends('backend.layouts.master')
@section('title')
    Product create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Product Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 130px;">
                            <div class="input-group">
                                <a href="{{route('product.list')}}" class="btn btn-success">View Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Product</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{route('product.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="productcategory_id">Chose ProductCategory</label>
                                    <select class="form-control" id="productcategory_id" name="productcategory_id">
                                        <option value="">--Select Productcategory--</option>
                                        @foreach($productcategory as $m)
                                            <option value="{{$m->id}}">{{$m->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error"><b>
                                       @if($errors->has('productcategory_id'))
                                                {{$errors->first('productcategory_id')}}
                                            @endif</b>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                    <span class="error"><b>
                                           @if($errors->has('name'))
                                                {{$errors->first('name')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="code">Code*</label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Product code">
                                    <span class="error"><b>
                                           @if($errors->has('code'))
                                                {{$errors->first('code')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity*</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                                    <span class="error"><b>
                                         @if($errors->has('quantity'))
                                                {{$errors->first('quantity')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price*</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price per Item">
                                    <span class="error"><b>
                                         @if($errors->has('price'))
                                                {{$errors->first('price')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="radio" name="status" value="1" id="Active" checked=""><label for="Active"> Active</label>
                                    <input type="radio" name="status" id="deactive" value="0"><label for="deactive">Inactive</label>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Save Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('script')
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            var $foo = $('#name');
            var $bar = $('#slug');
            function onChange() {
                $bar.val($foo.val().replace(/\s+/g, '-').toLowerCase());
            };
            $('#name')
                .change(onChange)
                .keyup(onChange);
        });
    </script>
@endsection