@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Categories</a> <a href="#" class="current">View Categories</a> 
        </div>
        <h1>View Categories</h1>
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
                        <h5>Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>URL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr class="gradeX">
                                    <td class="center">{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="center">{{ $category->description }}</td>
                                    <td>{{ $category->url }}</td>
                                    <td><a href="#" class="btn btn-success btn-mini">View <i class="icon icon-eye-open"></i></a> | 
                                        <a href="{{url('admin/edit_category/'.$category->id)}}" class="btn btn-warning btn-mini">Edit <i class="icon icon-edit"></i></a> | 
                                        <a id="delCat"href="{{url('admin/delete_category/'.$category->id)}}" class="btn btn-danger btn-mini">Delete <i class="icon icon-trash"></i></a></td>
                                </tr>
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