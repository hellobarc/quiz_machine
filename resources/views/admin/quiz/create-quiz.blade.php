@extends('admin.layouts.master')

@section('title', 'Create Quiz')
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
													<h3 class="fw-bolder">Create Quiz</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mx-auto">
								<div class="d-flex justify-content-end mb-3">
									<a href="#" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></i> Add New</a>
								</div>
								<div>
									@include('admin.partials.flash-message')
									<form action="{{route('admin.settings.quiz.store')}}" method="POST">
										@csrf
										<div class="form-group">
											<label for="name" class="mb-2">Exam Name</label>
											<select class="form-control" name="exam_id">
											  <option value="">Please select one</option>
											  @foreach ($exams as $rows)
											  	<option value="{{$rows->id}}">{{$rows->title}}</option>
											  @endforeach
											</select>
										  </div>
										<div class="form-group">
										  <label for="name" class="mb-2">Quiz Title</label>
										  <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter Level Name">
										</div>
										<div class="form-group">
											<label for="name" class="mb-2">Instruction</label>
											<textarea name="instruction" id="" cols="30" rows="5" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label for="name" class="mb-2">Quiz Type</label>
											<select class="form-control" name="quiz_type">
											  <option value="">Please select one</option>
											  <option value="fill-blank">Fill Blanks</option>
											  <option value="multiple-choice">Multiple Choice</option>
											  <option value="drop-down">Drop Down</option>
											  <option value="radio">Radio</option>
											  <option value="true-false">True-False</option>
											</select>
										</div>
										<div class="form-group">
											<label for="name" class="mb-2">Marks</label>
											<input type="text" class="form-control" name="marks" id="marks" aria-describedby="emailHelp" placeholder="Enter Level Name">
										</div>
										<div class="form-group">
											<label for="name" class="mb-2">Status</label>
											<select class="form-control" name="status">
											  <option value="">Please select one</option>
											  <option value="active">Active</option>
											  <option value="pause">Pause</option>
											</select>
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