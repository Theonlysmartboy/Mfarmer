@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#">Products</a> <a href="#" class="current">Add Products</a> 
        </div>
        <h1>Add Products</h1>
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
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Product Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('admin/add_product')}}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Category </label>
                                <div class="controls">
                                    <select name="category_id" style="width: 220px;">
                                        <?php echo $categories_dropdown?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Code</label>
                                <div class="controls">
                                    <input type="text" name="product_code" id="product_code">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Color</label>
                                <div class="controls">
                                    <input type="text" name="product_color" id="product_color">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="product_desc" id="product_desc"></textarea>
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Cost</label>
                                <div class="controls">
                                    <input type="text" name="product_cost" id="product_cost">
                                </div>
                                <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Add Product" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection