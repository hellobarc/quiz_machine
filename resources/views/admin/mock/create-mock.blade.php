@extends('admin.layouts.master')

@section('title', 'Create Mock')
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
													<h3 class="fw-bolder">Create Mock</h3>
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
											<form action="{{route('admin.settings.mock.store')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="mock_name" class="mb-2">Mock Name</label>
													<input type="text" class="form-control" name="mock_name" id="mock_name" placeholder="Enter Mock Name">
												</div>

												<div class="form-group">
													<label for="slug" class="mb-2">Slug</label>
													<input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Mock slug">
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