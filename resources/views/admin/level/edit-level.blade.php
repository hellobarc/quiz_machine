@extends('admin.layouts.master')

@section('title', 'Edit Level')
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
													<h3 class="fw-bolder">Edit Level</h3>
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
									{{-- @include('admin.partials.flash-message') --}}
									<form action="{{route('admin.settings.level.update', $data->id)}}" method="POST">
										@csrf
										<div class="form-group">
										  <label for="name" class="mb-2">Level Name</label>
										  <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{$data->name}}">
										</div>
										<div class="form-group">
										  <label for="name" class="mb-2">Difficulty Level</label>
										  <select class="form-control" name="difficulty">
											<option value="">Please select one</option>
											@foreach ($levels as $rows)
												<option value="{{$rows->difficulty}}" {{$data->difficulty == $rows->difficulty? 'selected' : ''}}>{{$rows->difficulty}}</option>
											@endforeach
											{{-- <option value="beginner">Beginner</option>
											<option value="intermediate">Intermediate</option>
											<option value="advanced">Advanced</option> --}}
										  </select>
										</div>
										<div class="form-group">
											<label for="name" class="mb-2">Short Description (Optional)</label>
											<textarea name="short_description" id="" cols="30" rows="5" class="form-control">{{$data->short_description}}</textarea>
										  </div>
										<button type="submit" class="btn btn-primary">Update</button>
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