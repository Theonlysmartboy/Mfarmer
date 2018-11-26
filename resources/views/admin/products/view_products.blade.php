@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Products</a> <a href="#" class="current">View Products</a> 
        </div>
        <h1>View Products</h1>
    </div>
    <div class="container-fluid"><hr>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_error')!!}</strong>
        </div>
        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_success')!!}</strong>
        </div>
        @endif
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORY</th>
                                    <th>NAME</th>
                                    <th>PRODUCT CODE</th>
                                    <th>COLOR</th>
                                    <th>PRICE</th>
                                    <th>IMAGE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-center">{{ $product->category_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->product_color }}</td>
                                    <td class="text-center">Ksh &nbsp;{{ $product->price }}</td>
                                    <td>
                                        @if(!empty($product->image))
                                        <img src="{{asset('images/frontend_images/products/small/'. $product->image )}}" style="width:50px;"/>
                                        @endif
                                    </td>
                                    <td><a href="#productModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View <i class="icon icon-eye-open"></i></a> | 
                                        <a href="{{url('admin/edit_product/'.$product->id)}}" class="btn btn-warning btn-mini">Edit <i class="icon icon-edit"></i></a> | 
                                        <a rel="{{$product->id}}" rel1="delete_category" href="javascript:" class="btn btn-danger btn-mini deleteCategory">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
                            <div id="productModal{{ $product->id }}" class="modal hide">
                                <div class="modal-header bg-blue-dark">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3 class="text-center">{{ $product->category_name }} {{ $product->product_name }}</h3>
                                </div>
                                <div class="modal-body">
                                    @if(!empty($product->image))
                                    <p class="text-center">
                                    <img src="{{asset('images/frontend_images/products/medium/'. $product->image )}}" class="img-responsive text-center"/>
                                    </p>
                                    @endif
                                    <p class="text-center bg-primary">DESCRIPTION: {{$product->description}}</p>
                                    <p class="text-center">PRICE: Ksh &nbsp;{{$product->price}}</p>
                                </div>
                            </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection