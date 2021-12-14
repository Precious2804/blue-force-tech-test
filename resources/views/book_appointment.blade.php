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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Book an Appointment Here</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::get('done'))
                                <div class="alert alert-success">
                                    {{Session::get('done')}}
                                </div>
                                @endif

                                <form method="POST" action="{{route('book_now')}}">
                                    @csrf
                                    <div class="row">
                                        <h5>Contact Information</h5>
                                        <div class="form-group col-6">
                                            <label for="frist_name">First Name</label>
                                            <input id="frist_name" type="hidden" class="form-control" name="firstname" value="{{$loggedUser['firstname']}}" autofocus>
                                            <input id="frist_name" type="text" class="form-control" name="firstname" value="{{$loggedUser['firstname']}}" autofocus disabled>
                                            <span class="text-danger"> @error('firstname') {{$message}} @enderror</span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="hidden" class="form-control" name="lastname" value="{{$loggedUser['lastname']}}">
                                            <input id="last_name" type="text" class="form-control" name="lastname" value="{{$loggedUser['lastname']}}" disabled>
                                            <span class="text-danger"> @error('lastname') {{$message}} @enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="hidden" class="form-control" name="email" value="{{$loggedUser['email']}}">
                                            <input id="email" type="email" class="form-control" name="email" value="{{$loggedUser['email']}}" disabled>
                                            <span class="text-danger"> @error('email') {{$message}} @enderror</span>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Phone Number</label>
                                            <input id="email" type="number" class="form-control" name="phone">
                                            <span class="text-danger"> @error('phone') {{$message}} @enderror</span>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h5>Appointment Information</h5>
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Appointment Date</label>
                                            <input id="password" type="date" class="form-control pwstrength" data-indicator="pwindicator" name="date">
                                            <span class="text-danger"> @error('date') {{$message}} @enderror</span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Appointment Time</label>
                                            <input id="password2" type="time" class="form-control" name="time">
                                            <span class="text-danger"> @error('time') {{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="">Appointment Details</label>
                                        <textarea name="details" id="" cols="30" rows="10" class="form-control" placeholder="Briefly Decribe your purpose"></textarea>
                                        <span class="text-danger"> @error('details') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">Would you agree to re-schedule if appointment was cancelled</label>
                                        <div>
                                            <input type="radio" name="reschedule" id="" value="Yes">Yes
                                            <input type="radio" name="reschedule" id="" value="No">No
                                            <span class="text-danger"> @error('reschedule') {{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Book appointment Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
</body>

</html>