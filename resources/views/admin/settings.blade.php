@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Settings</a> <a href="#" class="current">Reset Password</a>
        </div>
        <h1>Change Password</h1>
    </div>
    <div class="container-fluid"><hr>   
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Security validation</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('admin/settings')}}" name="password_validate" id="password_validate" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" name="pwd" id="pwd" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm password</label>
                                <div class="controls">
                                    <input type="password" name="pwd2" id="pwd2" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Validate" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection