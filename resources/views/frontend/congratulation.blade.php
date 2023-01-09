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
                    <div class="text-center">
                        <h2 class="fw-bolder mb-3">{{$exams->title}}</h2>
                        <div>
                            <img src="{{asset('image/congratulation.png')}}" alt="" style="width: 15%;">
                        </div>
                        <div class="text-center">
                            <h4 class="fw-bold">Great!</h4>
                            <div class="main-text">
                                <p>Your finished your test.</p>
                                <p>You have got <strong>{{$marks}} out {{$question}}</strong> correct answer.</p>
                                <p class="fw-bold">Your score : Intermediate B1</p>
                                <p>Your time : 30 minutes</p>
                                <p>We are suggest your can start our <strong>B2 Course</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content wrapper end --> 
      </div>
  </section>
    <!-- main section end -->
     <!-- suggest test section start -->
     <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- suggest test start -->
                    <div class="suggest_test">
                        <h2 class="fw-bolder">Suggest test</h2>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- suggest test end -->
                </div>
            </div>
        </div>
    </section>
    <!-- suggest test section end -->
    <!-- popular test section start -->
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- suggest test start -->
                    <div class="suggest_test">
                        <h2 class="fw-bolder">Latest test</h2>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="test-border" style="border: 2px solid rgb(215 215 215);
                                        border-radius: 10px;">
                                            <div>
                                                <img src="{{asset('image/1.png')}}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">Parts of speech</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">Study the grammar lessons that are typically included in each level: A1, A2, B1, B1+, B2. There are three or more exercises and an explanation in each lesson. And you will find feedback for every question!
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <button class="test-start-button">Start Test</button> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- suggest test end -->
                </div>
            </div>
        </div>
    </section>
    <!-- popular test section end -->
@endsection
<script>
    $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
});

</script>