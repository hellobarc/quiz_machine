@extends('frontend.layouts.master')
@section('title', 'Quiz Machine')
@section('main-content')
    <!-- main section start -->
    <section>
        <div class="container">
            <div class="row">
                @include('frontend.partials.flash-message')

                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-sm-6 col-xs-6"></div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-md-66 col-sm-12 col-xs-12">
                    <div class="mt-3">
                        <form class="form-inline my-2 my-lg-0">
                           <div class="d-flex">
                            <input type="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="search" id="search">
                            <button class="btn btn-warning my-2 my-sm-0" type="submit" id="search_button"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- left-side bar start -->
                <div class="col-xl-3 col-lg-3 col-md-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="left_side_filter">
                        <div class="d-flex justify-content-between fw-bold navbar-font" style="cursor: pointer">
                            <div><p><i class="fa-solid fa-filter"></i> Filter</p></div>
                            <div><p>Clear All</p></div>
                        </div>

                        <div class="mt-4">
                            <p class="navbar-font">Levels</p>
                        </div>
                        @foreach ($levels as $level)
                            <div class="d-flex">
                                <div class="side-bar-font mt-1 d-block">
                                    <input type="checkbox" class="check_box" value="{{$level->id}}" onclick="showExam(this,'level',this.value)">
                                </div>
                                <div class="check_box_font mt-2">
                                    <span>{{$level->name}}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-4">
                            <p class="navbar-font">Subject</p>
                        </div>
                        @foreach ($categories as $category)
                            <div class="d-flex">
                                <div class="side-bar-font mt-1">
                                    <input type="checkbox" class="check_box" value="{{$category->id}}" onclick="showExam(this,'category',this.value)">
                                </div>
                                <div class="check_box_font mt-2">
                                    <span>{{$category->name}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- left-side bar end -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="mt-4">
                        <h1 class="fw-bolder">Prepare for your English exam</h1>
                        <p class="main-text">On test-english.com you will find lots of free practice tests and materials to help you improve your English skills and be more prepared for your English exam: KEY (KET), PET, FCE, IELTS, TOEIC® and TOEFL iBT™. If you don't know your level, you can start by taking a Level Test.</p>
                    </div>
                    <div>
                        <button class="large-button">Assess your level</button>
                    </div>
                    <!-- service section start -->
                    <div class="service">
                        <div class="mt-5">
                            <h3 class="fw-bolder">What would you like to practise today?</h3>
                        </div>
                        <div class="row" id="exam_grid">

                        </div>
                    </div>
                    <!-- service section end -->
                </div>
            </div>

        </div>
    </section>
    <!-- main section end -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        dataLoad(filter_type=null, filter_id = null);
    });


    function dataLoad(filter_var=null){

        $.ajax({
                type:'GET',
                url:"{{route('frontend.exam.show')}}",
                data:{"action":"Exam Show","filter_var":filter_var},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    let list_data =``;
                    $.each(data.data, function(i, item) {
                           list_data += `<div class="col-xl-4 col-lg-4 col-md-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="test-border">
                                            <div class="exam_img">
                                                <img src="image/uploads/exam/original_thumbnail/${item.thumbnail}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">${item.title}</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text"><span class="exam_time">${item.time_limit}</span> Minutes Long Test</p>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">
                                                    ${item.instruction.substring(250)}
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <a href="frontend/exam-info/${item.id}" class="btn test-start-button">Start Test</a>
                                            </div>
                                        </div>
                                    </div> `;

                    });

                    $("#exam_grid").html(list_data);

                },
                error: function(data){
                    console.log(data);
                }
            });
    }

  </script>
  <script>
    var filter_var = [];
    function showExam(event,filter_type,clicked_id){
        if(event.checked){
            filter_var.push({filter_type: filter_type, filter_id: clicked_id});
        }else{
            var index = filter_var.indexOf({filter_type: filter_type, filter_id: clicked_id});
            filter_var.splice(index, 1);
        }
        dataLoad(filter_var);
    }
  </script>

<script>
    $(document).ready(function(){

        $("#search_button").click(function(e){
            e.preventDefault();
            return false;
        });

        $(document).on('keyup', '#search', function(e){
            e.preventDefault();

            let search_string = $('#search').val();

            $.ajax({
                url:"{{ route('frontend.exam.search') }}",
                method:'GET',
                data:{search_string:search_string},
                dataType:'json',
                success:function(data)
                {
                    let list_data =``;
                    $.each(data.data, function(i, item) {
                           list_data += `<div class="col-xl-4 col-lg-4 col-md-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="test-border">
                                            <div class="exam_img">
                                                <img src="image/uploads/exam/original_thumbnail/${item.thumbnail}" alt="" class="image-size">
                                            </div>
                                            <div class="mt-2">
                                                <h2 class="px-3 py-2">${item.title}</h2>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text"><span class="exam_time">${item.time_limit}</span> Minutes Long Test</p>
                                            </div>
                                            <div>
                                                <p class="px-3 main-text">
                                                    ${item.instruction.substring(250)}
                                                </p>
                                            </div>
                                            <div class="pb-4 text-center">
                                                <a href="frontend/exam-info/${item.id}" class="btn test-start-button">Start Test</a>
                                            </div>
                                        </div>
                                    </div> `;

                    });

                    $("#exam_grid").html(list_data);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
