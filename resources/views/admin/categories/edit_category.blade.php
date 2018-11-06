@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="{{url('admin/view_categories')}}">Categories</a> <a href="#" class="current">Edit Category</a> 
        </div>
        <h1>Edit Category</h1>
    </div>
    <div class="container-fluid"><hr>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!!session('flash_message_error')!!}</strong>
        </div>
        @endif
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Category Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('admin/edit_category/'.$categoriesDetails->id)}}" name="edit_category" id="edit_category" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                    <input type="text" name="category_name" id="category_name" value="{{ $categoriesDetails->name }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category Level</label>
                                <div class="controls">
                                    <select name="parent_id" style="width: 220px;">
                                        <option value="0">Main Category</option>
                                        @foreach($levels as $level)
                                        <option value="{{$level->id}}" @if($level->id == $categoriesDetails->parent_id)
                                                selected @endif>{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="description">{{ $categoriesDetails->description }}</textarea>
                                </div>
                            </div> 

                            <div class="control-group">
                                <label class="control-label">URL</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url" value="{{ $categoriesDetails->url }}">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Add Category" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

