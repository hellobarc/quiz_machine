<header class="header_style">
    <div class="container">
        <div class="row">
            <div class="col-xl-1 col-lg-1 col-md-1 col-md-1 col-sm-1 col-xs-1">
                <div>
                    <img src="{{asset('frontend/image/logo.png')}}" alt="" class="logo-image-size">
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-md-9 col-sm-9 col-xs-9">
                <div class="mt-2 nav_bar">
                    <nav class="navbar navbar-expand-lg navbar-light ml-5">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav navbar-font nav-margin">
                            <li class="nav-item active mx-4">
                              <a class="nav-link text-dark" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mx-4">
                              <a class="nav-link text-dark" href="#">Why Choose Us?</a>
                            </li>
                            <li class="nav-item mx-4">
                              <a class="nav-link text-dark" href="#">Exam and Test <i class="fa-solid fa-angle-down"></i></li></a>
                            </li>
                            <li class="nav-item mx-4">
                              <a class="nav-link text-dark" href="#">Learn English <i class="fa-solid fa-angle-down"></i></li></a>
                            </li>
                            <li class="nav-item mx-4">
                              <a class="nav-link text-dark" href="#">Blog</a>
                            </li>

                          </ul>
                        </div>
                      </nav>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="mt-4">
                  @php
                     //dd(Auth::user()) ;
                  @endphp
                  @if(Auth::check())
                  <div class="custom_dropdown">
                        <a class="navbar-font text-dark text-decoration-none dropbtn" href="#" style="cursor: pointer;">
                        {{Auth::user()->name}} <i class="fa-solid fa-angle-down"></i>
                        </a>
                    <div class="dropdown-content">
                      <a href="{{route('frontend.user.dashboard')}}">Dashboard</a>
                      <a href="{{route('frontend.user.logout')}}">Logout</a>
                    </div>
                  </div>
                  @else
                    <div id="auth_info">
                        <a class="navbar-font text-dark text-decoration-none" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#useLogin">Login</a>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <!-- LoginModal start-->
      <div class="modal fade" id="useLogin" tabindex="-1" aria-labelledby="useLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header main-color">
              <h2 class="modal-title fw-bold" id="useLoginLabel">Login your account</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mb-5">
              <div class="container">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mx-auto">
                    <div class="user_login_registration">
                      <ul>
                        <li id="login">Login</li>
                        <li id="register">Register</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div id="user_login">
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mx-auto">
                      <form  id="handleAjaxLogin">
                        {{-- @csrf --}}
                          <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="*******">
                          </div>
                          <div class="d-flex justify-content-between">
                            <button type="submit" class="btn test-start-button mw-100 px-5">Login</button>
                            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div id="user_register">
                  @include('frontend.partials.flash-message')
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mx-auto">
                      <form id="signUpLogin">

                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" id="register_name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email address</label>
                          <input type="email" class="form-control" name="email" id="register_email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" id="register_password" placeholder="******">
                        </div>
                        <div class="mb-3">
                          <label for="confirm_password" class="form-label">Confirm Password</label>
                          <input type="password" class="form-control" name="confirm_password" id="register_confirm_password" placeholder="******">
                        </div>
                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn test-start-button mw-100 px-5">Register</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- LoginModal end-->
</header>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function(){


  $("#user_login").show();
  $("#user_register").hide();
  $("#login").addClass('user_login_registration_active');

  $("#login").click(function(){
    $("#user_login").show();
    $("#user_register").hide();
    $("#login").addClass('user_login_registration_active');
    $("#register").removeClass('user_login_registration_active');
  });

  $("#register").click(function(){
    $("#user_login").hide();
    $("#user_register").show();
    $("#login").removeClass('user_login_registration_active');
    $("#register").addClass('user_login_registration_active');
  });


  $('#handleAjaxLogin').submit(function (e) {
          e.preventDefault();

          $.ajax({
              type:'POST',
              url:"{{route('frontend.user.login')}}",
              data:{"action":"Login", email:$("#email").val(), password:$("#password").val()},
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                $("#uncheck_button").html(`<button type="submit" class="btn btn-dark fw-bolder" >New check</button>`);
                $("#useLogin").modal('hide');

                 let info_content =  ` <div class="custom_dropdown">
                                            <a class="navbar-font text-dark text-decoration-none dropbtn" href="#" style="cursor: pointer;">
                                           ${data.data.name}<i class="fa-solid fa-angle-down"></i>
                                            </a>
                                        <div class="dropdown-content">
                                        <a href="{{route('frontend.user.dashboard')}}">Dashboard</a>
                                        <a href="{{route('frontend.user.logout')}}">Logout</a>
                                        </div>
                                    </div>`;
                 $("#auth_info").html(info_content);


                 //   console.log(Auth_info);
              },
              error: function(data){
                  console.log(data);
              }
          });

          return false;
      });


      $('#signUpLogin').submit(function (e) {
        //alert('registration');
          e.preventDefault();

          //return false;
          $.ajax({
              type:'POST',
              url:"{{route('frontend.user.register')}}",
              data:{"action":"Registration", name:$("#register_name").val(),email:$("#register_email").val(), password:$("#register_password").val(), confirm_password:$("#register_confirm_password").val()},
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                //alert('Register Successful');
                $("#uncheck_button").html(`<button type="submit" class="btn btn-dark fw-bolder" >New check</button>`);
                $("#useLogin").modal('hide');
                let info_content =  `<a href="{{route('frontend.user.dashboard')}}">Dashboard</a><a href="{{route('frontend.user.logout')}}">Logout</a>`;
                $("#auth_info").html(info_content);
              },
              error: function(data){
                  console.log(data);
              }
          });

          return false;
      });



});
</script>



