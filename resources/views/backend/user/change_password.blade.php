@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="content-body" style="min-height: 972px;">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Change Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('change.password.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" >Current Password</label>
                                    <input type="password" id="current_password" name="oldpassword" class="form-control input-default">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" >New Password</label>
                                    <input type="password" id="password" name="password" class="form-control input-default">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" >Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input-default">
                                </div>
                                <input type="submit" class="btn btn-success" value="Change Password" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection