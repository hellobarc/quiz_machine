@extends('admin.layouts.master')

@section('title', 'Edit Exam')
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
													<h3 class="fw-bolder">Edit Exam</h3>
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
									<form action="{{route('admin.settings.exam.update', $data->id)}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label for="name" class="mb-2">Exam Title</label>
											<input type="text" class="form-control" name="title" id="title" value="{{$data->title}}">
										  </div>
										  <div class="form-group">
											  <label for="name" class="mb-2">Level</label>
											  <select class="form-control" name="level_id">
												<option value="">Please select one</option>
												@foreach ($levels as $item)
												<option value="{{$item->id}}" {{$data->level_id == $item->id? 'selected' : ''}}>{{$item->name}}</option>
												@endforeach
											  </select>
										  </div>
										  <div class="form-group">
											  <label for="name" class="mb-2">Category</label>
											  <select class="form-control" name="category_id">
												<option value="">Please select one</option>
												@foreach ($category as $rows)
												<option value="{{$rows->id}}" {{$data->category_id == $rows->id? 'selected' : ''}}>{{$rows->name}}</option>
												@endforeach
											  </select>
										  </div>
										  <div class="form-group">
											  <label for="name" class="mb-2">Short Description (Optional)</label>
											  <textarea name="short_description" id="" cols="30" rows="4" class="form-control">{{$data->short_description}}</textarea>
										  </div>
										  <div class="form-group">
											  <label for="name" class="mb-2">Instruction</label>
											  <textarea name="instruction" id="" cols="30" rows="5" class="form-control">{{$data->instruction}}</textarea>
										  </div>
										  <div class="form-group">
											  <label for="name" class="mb-2">Exam Time Limit</label>
											  <input type="text" class="form-control" name="time_limit" id="time_limit" value="{{$data->time_limit}}">
											</div>
										  <div class="form-group">
											  <label for="name" class="mb-2">Previous Thumbnail</label><br>
											  <img src="{{ asset('image/uploads/exam/thumbnail/'.$data->thumbnail) }}" alt="" width="100">
											</div>
										  <div class="form-group">
											  <label for="name" class="mb-2">Upload New Thumbnail</label>
											  <input type="file" class="form-control" name="thumbnail" id="thumbnail" aria-describedby="emailHelp">
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