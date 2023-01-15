@extends('frontend.layouts.master')
@section('title', 'Quiz Machine')
@section('main-content')
    <!-- main section start -->
    <section>
        <div class="container">
            <div class="row">
                <!-- left-side bar start -->
                <div class="col-xl-2 col-lg-2 col-md-2 col-md-2 col-sm-2 col-xs-2"></div>
                <!-- left-side bar end -->
                <div class="col-xl-10 col-lg-10 col-md-10 col-md-10 col-sm-12 col-xs-12">
                    <!-- content wrapper start -->
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#" class="text-decoration-none text-dark">Home <i class="fa-solid fa-chevron-right"></i></a></li>
                            <li><a href="#" class="text-decoration-none text-dark">Test Info </a></li>
                        </ul>
                    </div>
                    <div class="content">
                        <h2 class="fw-bolder">{{$exams->title}}</h2>
                        <p class="main-text">{{$exams->instruction}}</p>

                        <p class="sub-title mt-4">Learn for Quiz</p>
                        <!-- Learn for Quiz collapse start -->
                        <div class="accordion" id="accordionExample">
                            @foreach ($quizzes as $rows)
                            <div class="accordion-item mt-2">
                                <h2 class="accordion-header" id="heading{{$rows->id}}">
                                  <button class="accordion-button collapsed main-text fw-bold collapse_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$rows->id}}" aria-expanded="false" aria-controls="collapse{{$rows->id}}">
                                    <span class="mx-3"><i class="fa-solid fa-book-open"></i></span>  {{$rows->title}}
                                  </button>
                                </h2>
                                <div id="collapse{{$rows->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$rows->id}}" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                        <p>{{$rows->instruction}}</p>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                        </div>
                        <div class="content_button">
                            <a href="{{route('frontend.exam.start', $exams->id)}}" class="btn btn-warning btn-lg fw-bolder">Start Now</a>
                        </div>
                        <!-- Learn for Quiz collapse end -->
                        <!-- quiz content collapse end-->
                    </div>
                    <!-- content wrapper start -->
                </div>
            </div>
            
        </div>
    </section>
    <!-- main section end -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>