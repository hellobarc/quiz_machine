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
                          <li><a href="#" class="text-decoration-none text-dark">Test Info <i class="fa-solid fa-chevron-right"></i></a></li>
                          <li><a href="#" class="text-decoration-none text-dark">Quiz </a></li>
                      </ul>
                  </div>
                  <!-- main content start -->
                  <div class="content">
                      <h2 class="fw-bolder">{{$exams->title}}</h2>
                      <p>For the questions below, please choose the best option to complete the sentence or conversation.</p>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between mt-1">
                          <p>10% Completed</p>
                          <p>2 of 5</p>
                      </div>
                      <div style="text-align:right;"><p id="timer" class="sub-title mt-2"></p></div>
                      @foreach ($quizzes as $rows)
                        @php
                            $options = json_decode($rows->quizRadio[0]->option_text)  ;  
                        @endphp
                        <div class="questions_radio">
                          <p class="check_box_font">{{$loop->index+1}}. {{$rows->quizRadio[0]->text}}</p> 
                          @foreach( $options as $option)
                            <div class="d-flex">
                                <div class="side-bar-font">
                                    <input type="radio" class="check_box">
                                </div>
                                <div class="check_box_font">
                                    <span> {{$option}}</span>  
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                      <!-- check button -->
                     <div class="mt-4">
                          <form action="">
                              <button type="submit" class="btn btn-dark fw-bolder">Check</button>
                          </form>
                     </div>
                     <!-- next page button -->
                     <div class="text_right">
                          <a href="" class="btn btn-dark btn-lg fw-bolder">Next <i class="fa-solid fa-angle-right"></i></a>
                     </div>
                  </div>
                  <!-- main content start -->
                  <!-- content wrapper start -->
              </div>
          </div>
          
      </div>
  </section>
    <!-- main section end -->
@endsection