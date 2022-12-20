@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
		<div class="container-full">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="box bg-primary-light">
							<div class="box-body d-flex px-0">
								<div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url({{asset('ed_admin/images/svg-icon/color-svg/custom-1.svg')}})">
									<div class="row">
										<div class="col-12 col-xl-7">
											<h2>Welcome back, <strong>John!</strong></h2>

											<p class="text-dark my-10 fs-16">
												Your students complated <strong class="text-warning">80%</strong> of the tasks.
											</p>
											<p class="text-dark my-10 fs-16">
												Progress is <strong class="text-warning">very good!</strong>
											</p>
										</div>
										<div class="col-12 col-xl-5"></div>
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