@extends('admin.layouts.master')

@section('title', 'Create Mock Question')
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
													<h3 class="fw-bolder">Create Mock Question</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mx-auto">
										<div>
											@include('admin.partials.flash-message')
											<form action="{{route('admin.settings.mock.question.store')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="mock_id" class="mb-2">Mock Name</label>
													<select class="form-control" name="mock_id">
														<option value="">Please Select Mock</option>
														@foreach ($mocks as $items)
															<option value="{{$items->id}}">{{$items->mock_name}}</option>		
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="question_title" class="mb-2">Question Title</label>
													<input type="text" class="form-control" name="question_title" id="question_title" placeholder="Enter Question Title">
												</div>
												<div class="form-group">
													<label for="question_type" class="mb-2">Question Type</label>
													<input type="text" class="form-control" name="question_type" id="question_type" placeholder="Enter Question Type">
												</div>
												<div class="form-group">
													<label for="question_type" class="mb-2">Module</label>
													<select name="module" id="" class="form-control">
														<option value="">Please select a module</option>
														<option value="reading">Reading</option>
														<option value="writing">Writing</option>
														<option value="listening">Listening</option>
														<option value="speaking">Speaking</option>
													</select>
												</div>
												<div class="form-group">
													<label for="passage_id" class="mb-2">Passage ID</label>
													<input type="text" class="form-control" name="passage_id" id="passage_id" placeholder="Enter Passage ID">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
											</form>
										</div>
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