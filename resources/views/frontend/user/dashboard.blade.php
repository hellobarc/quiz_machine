@extends('frontend.layouts.master')
@section('title', 'Quiz Machine')
@section('main-content')
    <!-- main section start -->
    <section>
      <div class="container">
         <!-- breadcrumb section start -->
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="#" class="text-decoration-none text-dark">Home <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-dark">Test Info 
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                        <li><a href="#" class="text-decoration-none text-dark">Quiz </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb section end -->
          <!-- content wrapper start -->
          <div class="content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5>Welcome {{auth()->user()->name}}</h5>
                    
                </div>
            </div>
        </div>
        <!-- content wrapper end --> 
      </div>
  </section>
    <!-- main section end -->
    
@endsection
