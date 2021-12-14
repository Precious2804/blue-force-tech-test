<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> {{env('APP_NAME')}} </title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <!-- <div class="loader"></div> -->
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="d-flex justify-content-center">
                            <div style="margin-right: 10px;">
                                <a href="{{route('all_appointments')}}">
                                    <button class="btn btn-primary">Go Back</button>
                                </a>
                            </div>
                            @if($data['status'] == "Pending")
                            <div style="margin-right: 10px;">
                                <a href="{{route('approve')}}?app_detail={{$data['app_id']}}">
                                    <button class="btn btn-success">Approve</button>
                                </a>
                            </div>
                            <div style="margin-right: 10px;">
                                <a href="{{route('cancel')}}?app_detail={{$data['app_id']}}">
                                    <button class="btn btn-danger">Cancel</button>
                                </a>
                            </div>
                            @elseif($data['status'] == "Approved")
                            <div style="margin-right: 10px;">
                                <a href="{{route('cancel')}}?app_detail={{$data['app_id']}}">
                                    <button class="btn btn-danger">Cancel</button>
                                </a>
                            </div>
                            @elseif($data['status'] == "Cancelled")
                            <div style="margin-right: 10px;">
                                <a href="{{route('approve')}}?app_detail={{$data['app_id']}}">
                                    <button class="btn btn-success">Approve</button>
                                </a>
                            </div>
                            @endif
                            <div style="margin-right: 10px;">
                                <a href="{{route('delete')}}?app_detail={{$data['app_id']}}">
                                    <button class="btn btn-warning">Delete</button>
                                </a>
                            </div>
                            <div style="margin-right: 10px;">
                                <a href="{{route('logout')}}">
                                    <button class="btn btn-danger">Logout</button>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h4>Appointment Details</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::get('approved'))
                                <div class="alert alert-success">
                                    {{Session::get('approved')}}
                                </div>
                                @endif
                                @if(Session::get('cancel'))
                                <div class="alert alert-warning">
                                    {{Session::get('cancel')}}
                                </div>
                                @endif
                                <form method="POST" action="{{route('edit_user')}}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="frist_name">Full name</label>
                                            <input id="frist_name" type="text" class="form-control" name="firstname" value="{{$data['firstname']}} {{$data['lastname']}}" disabled autofocus>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="email">Contact Details</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{$data['email']}} ({{$data['phone']}})" disabled>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="email">Appointment Date/Time</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{$data['date']}} ({{$data['time']}})" disabled>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="email">Brief Description</label>
                                            <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>{{$data['details']}}</textarea>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="">Allowance for a Re-schedule? </label>
                                            <span style="font-weight: bolder; font-size:25px">{{$data['reschedule']}}</span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="">Status: </label>
                                            @if($data['status'] == "Pending")
                                            <span style="font-weight: bolder; font-size:25px" class="text-warning">{{$data['status']}}</span>
                                            @elseif($data['status'] == "Cancelled")
                                            <span style="font-weight: bolder; font-size:25px" class="text-danger">{{$data['status']}}</span>
                                            @else
                                            <span style="font-weight: bolder; font-size:25px" class="text-success">{{$data['status']}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>


<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.html"></script>
<script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/auth-register.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>

</html>