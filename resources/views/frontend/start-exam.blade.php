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
                      <div class="progress" id="progress_wrapper">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>

                      <div class="d-flex justify-content-between mt-1" id="progress_count"></div>
                      <div style="text-align:right;" id="js_timer">
                            <p id="countdown" class="sub-title mt-2"></p>
                        </div>

                      <form action="{{route('frontend.exam.user.ans')}}" method="POST" enctype="multipart/form-data" id="check_form">
                        @csrf
                        <input type="hidden" name="exam_id" value="{{$exams->id}}">
                        {{-- count question start --}}
                        @php
                            $total_question = 0;
                        @endphp
                        {{-- count question end --}}
                      {{-- quiz radio start --}}
                        @if($quizRadio != NULL)
                            <p class="main-text">Choose the correct option</p>
                            @foreach ($quizRadio as $rows)
                                <input type="hidden" name="radio[]" value="{{$rows->id}}">
                                <input type="hidden" name="radio_quiz_type" value="{{$rows->quiz_type}}">
                                @php
                                    $countRadio = $rows->quiz_radio_count;
                                    $big_loop = $loop->index;
                                    $total_question += $countRadio;
                                @endphp
                                @foreach ($rows->quizRadio as $radioQuestion)
                                    <input type="hidden" name="radio_question_id[]" value="{{$radioQuestion->id}}">
                                    @php
                                        $options = json_decode($radioQuestion->option_text);
                                    @endphp
                                    <div class="questions_radio">
                                    <p class="check_box_font">{{$loop->index+1}}. {{$radioQuestion->text}}</p>
                                        @foreach( $options as $option)
                                            <div class="d-flex">
                                                <div class="side-bar-font">
                                                    <input type="radio" class="check_box" name="radioAns[{{$radioQuestion->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)">
                                                </div>
                                                <div class="check_box_font">
                                                    <span>{{$option}}</span>
                                                </div>
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
                                <input type="hidden" name="multiple[]" value="{{$rows->id}}">
                                <input type="hidden" name="multiple_quiz_type" value="{{$rows->quiz_type}}">
                                    @php
                                        $countMultipleChoice = $rows->multiple_choice_count;
                                        $total_question +=$countMultipleChoice;
                                    @endphp
                                @foreach ($rows->multipleChoice as $items)
                                    <input type="hidden" name="multiple_question_id[]" value="{{$items->id}}">
                                    @php
                                        $options = json_decode($items->option_text);
                                    @endphp
                                    <div class="questions_radio">
                                        <p class="check_box_font">{{$loop->index+1}}. {{$items->text}}</p>
                                        <div class="main-text">
                                            <input type="hidden"  value="" id="user_multiple_choice_{{$items->id}}" name="user_multipe_ans[]">
                                            @foreach( $options as $key=>$option)
                                                <div  class="mltiple_choice_option option_item{{$items->id}} col-md-6 col-sm-12" id="multipleColorChange_{{$items->id}}{{$key}}" onclick="hitMultipleChoice({{$key}},{{$items->id}}); countSelected(event)">{{$option}}</div>
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
                            <input type="hidden" name="fillblanks[]" value="{{$rows->id}}">
                            <input type="hidden" name="fillBlank_quiz_type" value="{{$rows->quiz_type}}">
                            <input type="hidden" name="fillBlank_question_id[]" value="{{$rows->fillBlank[0]->id}}">
                                <div class="fill_blanks main-text">
                                    @if($rows->fillBlank[0]->is_show == 'yes')
                                        @php
                                            $options = json_decode($rows->fillBlank[0]->blank_answer);
                                            shuffle($options);
                                            $countFillBlank = count($options);
                                            $total_question +=$countFillBlank;
                                        @endphp
                                        <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                            @foreach($options as $option)
                                            <p class="mx-2">{{$option}}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    <p class="">{!!str_replace('##blank##','<input type="text" name="user_fillBlank_ans[]" onchange="countSelected(event)">', $rows->fillBlank[0]->text)!!}</p>
                                    <br>
                                </div>
                            @endforeach
                        @endif
                        {{-- fill blanks end --}}
                        {{-- drop down start --}}
                        @if($dropDown != NULL)
                            <p class="main-text">Drop Down</p>
                            @foreach ($dropDown as $rows)
                                <input type="hidden" name="dropdown[]" value="{{$rows->id}}">
                                <input type="hidden" name="dropDown_quiz_type" value="{{$rows->quiz_type}}">
                                    @php
                                        $countDropDown = $rows->drop_down_count;
                                        $total_question +=$countDropDown;
                                    @endphp
                                @foreach ($rows->dropDown as $items)
                                    @php
                                        $options = json_decode($items->option_text);
                                    @endphp
                                     <input type="hidden" name="dropDown_question_id[]" value="{{$items->id}}">
                                    <div class="questions_radio">
                                        <p class="check_box_font">{{$loop->index+1}}. {{$items->text}}</p>
                                        <div class="main-text">
                                            <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)">
                                                @foreach( $options as $key=>$option)
                                                    <option value="{{$key}}">{{$option}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                        {{-- drop down end --}}
                        <!-- check button -->
                        <div class="mt-4">
                                @if(auth()->user())
                                    <button type="submit" class="btn btn-dark fw-bolder" name="submitType" value="check">Check</button>
                                    <div class="text_right">
                                        <button type="submit" class="btn btn-dark btn-lg fw-bolder" name="submitType" value="next">Next <i class="fa-solid fa-angle-right"></i></button>
                                    </div>
                                @else
                                    <div id="uncheck_button">
                                        <button type="submit" class="btn btn-dark fw-bolder" id="checkAuth"  name="submitType" value="check" >check</button>
                                        <!-- next page button -->
                                        <div class="text_right">
                                            <button type="submit" class="btn btn-dark btn-lg fw-bolder" id="resultCheckAuth" name="submitType" value="next">Next <i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                @endif
                                {{-- <!-- next page button -->
                                <div class="text_right">
                                    <button type="submit" class="btn btn-dark btn-lg fw-bolder" id="resultCheckAuth">Next <i class="fa-solid fa-angle-right"></i></button>
                                </div> --}}
                            </form>
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

<script>
    function hitMultipleChoice(key,option_key) {
        let input_var = "user_multiple_choice_"+option_key;
        var element = document.getElementById(input_var).value = key;
        let myid = "#multipleColorChange_"+option_key+key;
        let myclass = ".option_item"+option_key;
        $(myclass).removeClass("mltiple_choice_option_correct");
        $(myid).addClass("mltiple_choice_option_correct");
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#checkAuth').click(function (e) {
            e.preventDefault();
            $("#useLogin").modal('show');
        });
        $('#resultCheckAuth').click(function (e) {
            e.preventDefault();
            $("#useLogin").modal('show');
        });
    });
</script>
<script>
    var total_question =  "{{$total_question}}";
    $(function(){
        document.getElementById("progress_count").innerHTML =  `<p>0% Completed</p><p>0 of ${total_question}</p>`;
    })();

    function countSelected(event){
        event.target.classList.remove('ans_done')
        event.target.classList.add('ans_done')
        let click_count = document.querySelectorAll('.ans_done').length;
        console.log(click_count);
        let percentages =    percentage(click_count, total_question);
        document.getElementById("progress_wrapper").innerHTML =  `<div class="progress-bar bg-warning" role="progressbar" style="width: ${percentages}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>`;
        document.getElementById("progress_count").innerHTML =  `<p>${percentages}% Completed</p><p>${click_count} of ${total_question}</p>`;
    }

    function percentage(partialValue, totalValue) {
        return Math.round((100 * partialValue) / totalValue);
    }
</script>
<script>
    const startingMinutes = "{{$time_limit}}";
    let time = startingMinutes * 60;
    let myInterval = setInterval(updateCountDown, 1000);
    function updateCountDown(){
        var countdownEle = document.getElementById('countdown');
        const minutes = Math.floor( time /60 );
        let seconds = time % 60;
        //seconds = seconds < 10 ? '0' + seconds : seconds;
        countdownEle.innerHTML = `${minutes} : ${seconds}`;
        time--;
        if(minutes==0 && seconds==0){
            countdownEle.innerHTML = "EXPIRED";
            clearInterval(myInterval);
        }
    }

</script>



