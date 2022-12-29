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
                      {{-- quiz radio start --}}
                        @if($quizRadio != NULL)
                            <p class="main-text">Choose the correct option</p>
                            @foreach ($quizRadio as $rows)
                                @php
                                    $options = json_decode($rows->quizRadio[0]->option_text)  ;  
                                    $correct_ans = json_decode($rows->quizRadio[0]->is_correct)  ;  
                                @endphp
                                <div class="questions_radio">
                                <p class="check_box_font">{{$loop->index+1}}. {{$rows->quizRadio[0]->text}}</p> 
                                    @foreach( $options as $option)
                                        <div class="d-flex">
                                            @if(in_array( $loop->index ,$correct_ans ))
                                            <div class="side-bar-font">
                                                <input type="radio" class="check_box" checked="checked">
                                            </div>
                                            <div class="check_box_font">
                                                <span class="right_radio"> 
                                                    {{$option}} 
                                                        <i class="fa-solid fa-check right_radio"></i>
                                                </span>
                                            </div>
                                            @else
                                                <div class="side-bar-font">
                                                    <input type="radio" class="check_box">
                                                </div>
                                                <div class="check_box_font">
                                                    <span class=""> 
                                                        {{$option}} 
                                                            
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                        {{-- quiz radio end --}}
                        {{-- quiz multiple choice start --}}
                        @if($multipleChoice != NULL)
                            @foreach ($multipleChoice as $rows)
                                @php
                                    $options = json_decode($rows->multipleChoice[0]->option_text);
                                    $correct_ans = json_decode($rows->multipleChoice[0]->is_correct)  ;  
                                @endphp
                                <div class="questions_radio">
                                    <p class="check_box_font">{{$loop->index+1}}. {{$rows->multipleChoice[0]->text}}</p>
                                    <div class="main-text">
                                        @foreach( $options as $option)
                                        <div class="d-flex">
                                            @if(in_array( $loop->index ,$correct_ans ))
                                                <div>
                                                    <p class="mltiple_choice_option_correct">{{$option}}</p>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-check right_radio mx-2"></i>
                                                </div>
                                            @else
                                                <div>
                                                    <p class="mltiple_choice_option">{{$option}}</p>
                                                </div>
                                            @endif
                                        </div>
                                            {{-- <p class="mltiple_choice_option_correct">a piece of cake</p> --}}
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- quiz multiple choice end --}}
                        {{-- fill blanks start --}}
                        @if($fillBlank != NULL)
                            <p class="main-text">Fill in the missing words</p>
                            @foreach ($fillBlank as $rows)
                                <div class="fill_blanks main-text">
                                    @if($rows->fillBlank[0]->is_show == 'yes')
                                        @php
                                            $row_options = json_decode($rows->fillBlank[0]->blank_answer);
                                            $count_row_option = count($row_options);
                                            $options = json_decode($rows->fillBlank[0]->blank_answer);
                                            shuffle($options);
                                        @endphp
                                        <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                            @foreach($options as $option)
                                            <p class="mx-2">{{$option}}</p>
                                            @endforeach
                                        </div>
                                    @endif

                                    @php
                                        $raw_content = explode('##blank##',$rows->fillBlank[0]->text);
                                        $processed_content = '';
                                        foreach ($raw_content as $key => $value) {
                                           if($key==0 ){
                                                $processed_content .=$value;
                                           }else{
                                                $processed_content .= '<input type="text" value="'.$row_options[$key-1] .'">' .  $value;
                                           }
                                        }
                                    @endphp
                                        {!!$processed_content!!}
                                    <br>
                                </div>
                            @endforeach
                        @endif
                        {{-- fill blanks end --}}
                        {{-- drop down start --}}
                        @if($dropDown != NULL)
                        <p class="main-text">Drop Down</p>
                            @foreach ($dropDown as $rows)
                                @php
                                    $options = json_decode($rows->dropDown[0]->option_text); 
                                    $correct_ans = json_decode($rows->dropDown[0]->is_correct)  ; 
                                @endphp
                                <div class="questions_radio">
                                    <p class="check_box_font">{{$loop->index+1}}. {{$rows->dropDown[0]->text}}</p>
                                    <div class="main-text">
                                        <select name="" id="" class="drop_down_select">
                                            @foreach( $options as $option)
                                            @if(in_array( $loop->index ,$correct_ans ))
                                                <option value="" selected>{{$option}}</option>
                                                @else
                                                <option value="">{{$option}}</option>
                                            @endif
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- drop down end --}}
                        <!-- check button -->
                        {{-- <div class="mt-4">
                            <a href="{{route('frontend.exam.checked', ['test_id'=>$test_id])}}" class="btn btn-dark fw-bolder">Check</a>
                        </div> --}}
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