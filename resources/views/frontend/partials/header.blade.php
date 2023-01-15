<header class="header_style">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-md-3 col-sm-3 col-xs-3">
                <div>
                    <a href="{{route('frontend.home')}}"><img src="{{asset('frontend/image/logo.png')}}" alt="" class="logo-image-size"></a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto navbar-font">
                    <li class="nav-item active">
                      <a class="nav-link text-dark" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mx-5">
                      <a class="nav-link text-dark" href="#">Why Choose Us?</a>
                    </li>
                    <li class="nav-item dropdown mx-5">
                      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Exam and Test
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown mx-5">
                      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blog
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                  </ul>
                  <ul class="login_ul navbar-font">
                    <li class="nav-item">
                      @if(!(Auth::check()))
                      <a class="nav-link text-dark" href="#" id="login_button">Login</a>
                      @else
                      <li class="nav-item dropdown mx-5">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{route('frontend.user.dashboard')}}">Dashboard</a>
                          <a class="dropdown-item" href="{{route('frontend.user.logout')}}">Logout</a>
                          {{-- <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                      </li>
                      @endif
                    </li>
                  </ul>
                </div>
              </nav>
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
  $("#login_button").click(function(){
    $("#useLogin").modal('show');

  });
});
</script>
<script>
  $(document).ready(function(){
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
                $("#uncheck_button").html(`<button type="submit" class="btn btn-dark fw-bolder" name="submitType" value="check">Check</button>
                                            <div class="text_right">
                                                <button type="submit" class="btn btn-dark btn-lg fw-bolder" name="submitType" value="next">Next <i class="fa-solid fa-angle-right"></i></button>
                                            </div>`);
                $("#useLogin").modal('hide');
              },
              error: function(data){
                  console.log(data);
              }
          });

          return false;
      });
  });
</script>
<script>
  $(document).ready(function(){
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
                $("#uncheck_button").html(`<button type="submit" class="btn btn-dark fw-bolder" name="submitType" value="check">Check</button>
                                            <div class="text_right">
                                                <button type="submit" class="btn btn-dark btn-lg fw-bolder" name="submitType" value="next">Next <i class="fa-solid fa-angle-right"></i></button>
                                            </div>`);
                $("#useLogin").modal('hide');

                //window.location.reload();
              },
              error: function(data){
                  console.log($data);
              }
          });

          return false;
      });
  });
</script>


