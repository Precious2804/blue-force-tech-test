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
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="d-flex justify-content-center">
                            <div style="margin-right: 10px;">
                                <a href="{{route('admin.dashboard')}}">
                                    <button class="btn btn-primary">All Users</button>
                                </a>
                            </div>
                            <div style="margin-left: 10px;">
                                <a href="{{route('logout')}}">
                                    <button class="btn btn-danger">Logout</button>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h4>Complete Appointment Listings</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::get('deleted'))
                                <div class="alert alert-danger">
                                    {{Session::get('deleted')}}
                                </div>
                                @endif
                                @if($data->isEmpty())
                                <div class="alert alert-warning" style="text-align: center; color:black; font-weight:bolder">
                                    <span>Sorry! NO data is avaliable for this table currently</span>
                                </div>
                                @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Appointment ID</th>
                                            <th>Created By</th>
                                            <th>Contact Details</th>
                                            <th>Date/Time Created</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->app_id}}</td>
                                            <td>{{$item->firstname}} {{$item->lastname}}</td>
                                            <td><a href="mailto:{{$item->email}}" style="color: black;">{{$item->email}}</a> <a href="tel:{{$item->phone}}">({{$item->phone}})</a></td>
                                            <td>{{$item->created_at}}</td>
                                            @if($item->status == "Pending")
                                            <td class="text-warning" style="font-weight: bolder;">{{$item->status}}</td>
                                            @elseif($item->status == "Cancelled")
                                            <td class="text-danger" style="font-weight: bolder;">{{$item->status}}</td>
                                            @else
                                            <td class="text-success" style="font-weight: bolder;">{{$item->status}}</td>
                                            @endif
                                            <td>
                                                <a href="{{route('appoint_details')}}?appoint={{$item->app_id}}">View Details</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $data->links() !!}
                                @endif
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