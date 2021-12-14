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
                                <a href="">
                                    <button class="btn btn-primary">All Appointments</button>
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
                                <h4>All Users on the platform</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::get('deleted'))
                                <div class="alert alert-danger">
                                    {{Session::get('deleted')}}
                                </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
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
                                            <td>{{$item->user_id}}</td>
                                            <td>{{$item->firstname}}</td>
                                            <td>{{$item->lastname}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                <a href="{{route('user_details')}}?user={{$item->user_id}}">View Details</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $data->links() !!}
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