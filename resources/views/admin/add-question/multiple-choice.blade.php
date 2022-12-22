@extends('admin.layouts.master')

@section('title', 'Add Question')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
		<div class="container-full">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="card-header">
								<div class="box bg-primary-light mb-0">
									<div class="box-body d-flex px-0">
										<div class="flex-grow-1 px-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url({{asset('ed_admin/images/svg-icon/color-svg/custom-1.svg')}})">
											<div class="row">
												<div class="col-12 col-xl-7">
													<h3 class="fw-bolder">
                                                        @if($quizType == 'multiple-choice')
                                                        Multiple Choice
                                                        @elseif($quizType == 'radio')
                                                        Radio
                                                        @elseif($quizType == 'drop-down')
                                                        Drop Down
                                                        @endif
                                                    </h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
                                        <div class="d-flex justify-content-end mb-3">
                                            <a href="#" class="btn btn-success btn-sm" onclick="myFunction()"><i class="fa-solid fa-plus"></i></i> Add Option</a>
                                        </div>
                                        <div>
                                            @include('admin.partials.flash-message')
                                            <form action="{{route('admin.settings.quiz.multiple-choice.store-question')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="quiz_id" value="{{$quizId}}">
                                                <input type="hidden" name="quiz_type" value="{{$quizType}}">
                                                <div class="form-group">
                                                    <label for="name" class="mb-2">Question Text</label>
                                                    <input type="text" class="form-control" name="text" placeholder="Write your question">
                                                    
                                                </div>
                                                <div id="add-option">
                                                    <label for="name" class="mb-2 fw-bold">Question Option</label>
                                                    <div class="d-flex justify-content-start">
                                                        <div class="form-group">
                                                            <input type="text" name="blank_answer[]" class="form-control" placeholder="option">
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" name="is_correct[]" value="0" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">is correct</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
								    </div>
								</div>
                                <div class="row">
                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
                                        <div class="mt-4 text-center">
                                            <h3 class="fw-bolder">All Question</h3>
                                        </div>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <th>SL No</th>
                                                <th>Quiz Name</th>
                                                <th>Question</th>
                                                <th>Question Option</th>
                                                <th>Action</th>
                                            </thead>
                                           
                                            <tbody>
                                                @if($quizType == 'multiple-choice')
                                                    @foreach ($multipleChoice as $items)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{$items->quiz->title}}</td>
                                                            <td>{!!$items->text!!}</td>
                                                            <td>{!!$items->option_text!!}</td>
                                                            <td>
                                                                <a href="{{route('admin.settings.quiz.multiple-choice.delete-question', $items->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @elseif($quizType == 'radio')
                                                    @foreach ($radio as $items)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{$items->quiz->title}}</td>
                                                            <td>{!!$items->text!!}</td>
                                                            <td>{!!$items->option_text!!}</td>
                                                            <td>
                                                                <a href="{{route('admin.settings.quiz.multiple-choice.delete-question', ['id'=>$items->id, 'quizType'=>$quizType])}}" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @elseif($quizType == 'drop-down')
                                                    @foreach ($dropDown as $items)
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{$items->quiz->title}}</td>
                                                            <td>{!!$items->text!!}</td>
                                                            <td>{!!$items->option_text!!}</td>
                                                            <td>
                                                                <a href="{{route('admin.settings.quiz.multiple-choice.delete-question', ['id'=>$items->id, 'quizType'=>$quizType])}}" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
							</div>
						</div>							
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
  	</div>
  <!-- /.content-wrapper -->
@endsection
