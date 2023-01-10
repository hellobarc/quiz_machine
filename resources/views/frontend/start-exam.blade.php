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
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                      <div class="d-flex justify-content-between mt-1">
                          <p>10% Completed</p>
                          <p>2 of 5</p>
                      </div>
                      <div style="text-align:right;"><p id="timer" class="sub-title mt-2"></p></div>

                      <form action="{{route('frontend.exam.user.ans')}}" method="POST" enctype="multipart/form-data" id="check_form">
                        @csrf
                        <input type="hidden" name="exam_id" value="{{$exams->id}}">
                      {{-- quiz radio start --}}
                        @if($quizRadio != NULL)
                            <p class="main-text">Choose the correct option</p>
                            @foreach ($quizRadio as $rows)
                                <input type="hidden" name="radio[]" value="{{$rows->id}}">
                                <input type="hidden" name="radio_quiz_type" value="{{$rows->quiz_type}}">
                                <input type="hidden" name="radio_question_id[]" value="{{$rows->quizRadio[0]->id}}">
                                @php
                                    $options = json_decode($rows->quizRadio[0]->option_text)  ;  
                                    $big_loop = $loop->index;
                                @endphp
                                <div class="questions_radio">
                                <p class="check_box_font">{{$loop->index+1}}. {{$rows->quizRadio[0]->text}}</p> 
                                    @foreach( $options as $option)
                                        <div class="d-flex">
                                            <div class="side-bar-font">
                                                <input type="radio" class="check_box" name="radioAns[{{$rows->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)">
                                            </div>
                                            <div class="check_box_font">
                                                <span>{{$option}}</span>  
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                        {{-- quiz radio end --}}
                        {{-- quiz multiple choice start --}}
                        @if($multipleChoice != NULL)
                            @foreach ($multipleChoice as $rows)
                                <input type="hidden" name="multiple[]" value="{{$rows->id}}">
                                <input type="hidden" name="multiple_quiz_type" value="{{$rows->quiz_type}}">
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
                                                <p class="mltiple_choice_option option_item{{$items->id}}" id="multipleColorChange_{{$items->id}}{{$key}}" onclick="hitMultipleChoice({{$key}},{{$items->id}}); countSelected(event)">{{$option}}</p>
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
                                    <button type="submit" class="btn btn-dark fw-bolder">Check</button>
                                @else
                                    <div id="uncheck_button">
                                        <button type="submit" class="btn btn-dark fw-bolder" id="checkAuth" >check</button>
                                    </div>
                                @endif
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
            // $.ajax({
            //     type:'POST',
            //     url:"{{route('frontend.check.authentication')}}",
            //     data:{"action":"check-authentication"},
            //     dataType: 'json',
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     success: function(data){		
            //         let is_login = data.is_login;
            //         if(is_login == false){
            //             $("#useLogin").modal('show');
            //         }else{
            //             $(this).trigger('submit');
            //         }
            //     },
            //     error: function(data){
            //         //console.log($data);
            //         return false;
            //     }
            // });
         
        });
    });
</script>
<script>
    function countSelected(event){
        event.target.classList.add('ans_done')
        const countAll = document.querySelectorAll('.ans_done').length;
        
        console.log(countAll);
    }
</script>



    