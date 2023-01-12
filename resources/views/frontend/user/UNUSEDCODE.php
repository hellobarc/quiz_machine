<div class="col-xl-3 col-lg-3 col-md-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="test-border">
                        <div class="exam_img">
                            <img src="{{asset('image/uploads/exam/original_thumbnail/'.$mydata['exam_thumbnail'])}}" alt="" class="image-size">
                        </div>
                        <div class="mt-2">
                            <h2 class="px-3 py-2">{{$mydata['exam_title']}}</h2>
                        </div>
                        <div>
                            <p class="px-3 main-text"><span class="exam_time">{{$mydata['exam_time']}}</span> Minutes Long Test</p>
                        </div>
                        <div>
                            <p class="px-4 main-text">You have got <strong>{{$mydata['exam_total_marks']}} out {{$mydata['exam_total_question']}}</strong> correct answer.</p>
                        </div>
                        <div class="pb-4 text-center">
                            <a href="#" class="btn test-start-button">Learn more</a> 
                        </div>
                    </div>
                </div>