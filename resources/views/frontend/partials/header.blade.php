<header class="header_style">
    <div class="container">
        <div class="row">
            <div class="col-xl-1 col-lg-1 col-md-1 col-md-1 col-sm-1 col-xs-1">
                <div>
                    <img src="{{asset('frontend/image/logo.png')}}" alt="" class="logo-image-size">
                </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-md-10 col-sm-10 col-xs-10">
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
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <div class="mt-4">
                    <a class="navbar-font text-dark text-decoration-none" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#useLogin">Login</a>
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
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form action="">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn test-start-button mw-100 px-5">Login</button>
                          {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
                        </div>
                    </form>
                  </div>
                  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <h1>OR</h1>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Register</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- LoginModal end-->
    <!-- Registration Modal start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Registration Modal end-->
</header>