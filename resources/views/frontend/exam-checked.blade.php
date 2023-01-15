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
                          @foreach ($rows->quizRadio as $radioQuestion)
                              @php
                              dd($rows->quizRadio );
                                  $options = json_decode($radioQuestion->option_text);
                                  $correct_ans = json_decode($radioQuestion->is_correct);
                                  $submitted_ans = json_decode($radioExamSubmission[$loop->index]['submitted_ans']);
                              @endphp
                              <div class="questions_radio">
                                  <p class="check_box_font">{{$loop->index+1}}. {{$radioQuestion->text}}</p>
                                  @foreach( $options as $key=>$option)
                                      <div class="d-flex">
                                          @if(in_array( $loop->index ,$correct_ans))
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
                                                  @if($correct_ans != $submitted_ans[0])
                                                      @if($key == $submitted_ans[0])
                                                          <span class="wrong_radio">
                                                              {{$option}}
                                                                  <i class="fa-solid fa-xmark wrong_radio"></i>
                                                          </span>
                                                      @else
                                                          <span class="">
                                                              {{$option}}

                                                          </span>
                                                      @endif
                                                  @endif
                                              </div>
                                          @endif
                                      </div>
                                  @endforeach
                              </div>
                          @endforeach
                      @endforeach
                  @endif
                        {{-- quiz radio end --}}
                        {{-- quiz multiple choice start --}}
                        @if($multipleChoice != NULL)
                            @foreach ($multipleChoice as $rows)

                                @foreach ($rows->multipleChoice as $items)
                                    @php
                                        $options = json_decode($items->option_text);
                                        $correct_ans = json_decode($items->is_correct)  ;
                                        $submitted_ans = json_decode($multipleChoiceExamSubmission[$loop->index]['submitted_ans']);
                                    @endphp
                                    <div class="questions_radio">
                                        <p class="check_box_font">{{$loop->index+1}}. {{$items->text}}</p>
                                        <div class="main-text">
                                            @foreach( $options as $key=>$option)
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
                                                            @if($correct_ans != $submitted_ans[0])
                                                                @if($key == $submitted_ans[0])
                                                                    <div class="d-flex">
                                                                        <p class="mltiple_choice_option_wrong">{{$option}}</p>
                                                                        <p class="multiple_choice_cross"><i class="fa-solid fa-xmark"></i></p>
                                                                    </div>
                                                                @else
                                                                    <p class="mltiple_choice_option">{{$option}}</p>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
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
                                            $submitted_ans = json_decode($fillBlankExamSubmission[$loop->index]['answered_text']);
                                            print_r($submitted_ans);
                                        @endphp
                                        <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                            {{-- print upper box --}}
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
                                                $show_ans = $row_options[$key-1] . '<i class="fa-solid fa-check right_radio mx-2"></i>';

                                                if($row_options[$key-1] != $submitted_ans[$key-1]){
                                                    $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa-solid fa-xmark wrong_radio mx-2"></i>'.'</span>'."&emsp; " .$row_options[$key-1]. '<i class="fa-solid fa-check right_radio mx-2"></i>';
                                                }

                                              $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';

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
                                @foreach ($rows->dropDown as $items)
                                    @php
                                        $options = json_decode($items->option_text);
                                        $correct_ans = json_decode($items->is_correct)  ;
                                        $dropDown_submitted_ans = json_decode($dropDownExamSubmission[$loop->index]['submitted_ans']);
                                    @endphp
                                    <div class="questions_radio">
                                        <p class="check_box_font">{{$loop->index+1}}. {{$items->text}}</p>
                                        <div class="main-text">
                                            <select name="" id="" class="drop_down_select">
                                                @foreach( $options as $key=>$option)
                                                    @if( $key == $dropDown_submitted_ans )
                                                        <option value="" selected="selected">{{$option}}</option>
                                                    @else
                                                        <option value="">{{$option}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @foreach( $options as $key=>$option)
                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                    @if($key == $correct_ans[0])
                                                        <span class="right_drop" >{{$option}} <i class="fa-solid fa-check right_radio mx-2"></i></span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                        {{-- drop down end --}}
                        <!-- check button -->
                        {{-- <div class="mt-4">
                            <a href="{{route('frontend.exam.checked', ['test_id'=>$test_id])}}" class="btn btn-dark fw-bolder">Check</a>
                        </div> --}}
                        {{-- marks show start --}}
                        <div class="mt-4">
                            <div class="check_box">
                                <div class="progress result_progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div><span class="result_star"><i class="fa-solid fa-star"></i></span><span class="result_marks">{{$marks}}/{{$question}}</span> <a href="#" class="btn btn-warning retry_button"><i class="fa-solid fa-rotate-right"></i> Retry</a>
                            </div>
                       </div>
                        {{-- marks show end --}}
                        <!-- next page button -->
                        <div class="text_right">
                            <a href="{{route('frontend.exam.congratulation', ['test_id'=>$exams])}}" class="btn btn-dark btn-lg fw-bolder">Next <i class="fa-solid fa-angle-right"></i></a>
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
