@extends('admin.layouts.master')

@section('title', 'Manage Mock Question')
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
													<h3 class="fw-bolder">All Mock Question</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.partials.flash-message')
								<div class="d-flex justify-content-end mb-3">
									<a href="{{route('admin.settings.mock.question.create')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></i> Add New</a>
								</div>
								<table class="table table-bordered table-striped">
									<thead>
										<th>SL No</th>
										<th>Mock Name</th>
										<th>Question Title</th>
										<th>Question Type</th>
										<th>Module</th>
										<th>Passage ID</th>
										<th>Action</th>
									</thead>
									<tbody>
										@foreach ($allData as $rows)
											<tr>
												<td>{{$loop->index+1}}</td>
												<td>{{$rows->mock->mock_name}}</td>
												<td>{{$rows->question_title}}</td>
												<td>{{$rows->question_type}}</td>
												<td>{{$rows->module}}</td>
												<td>{{$rows->passage_id}}</td>
												<td>
													<a href="{{route('admin.settings.mock.question.edit', $rows->id)}}" class="btn btn-success btn-sm">Edit</a>
													{{-- <a href="{{route('admin.settings.mock.question.delete', $rows->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
													<a href="#" id="deleteModalButton" class="btn btn-danger btn-sm">Delete</a>
													<a href="{{route('admin.settings.mock.add-question', ['questionType'=>$rows->question_type, 'questionId'=>$rows->id])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Add Question</a>
												</td>
											</tr>
											{{-- delete modal start --}}	
											<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
													<h5 class="modal-title text-danger h4" id="exampleModalLabel">Are you sure delete this content !!</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													</div>
													<div class="modal-body">
														<a href="{{route('admin.settings.mock.question.delete', $rows->id)}}" class="btn btn-danger">Permanently Delete</a>
													</div>
												</div>
												</div>
											</div>
											{{-- delete modal end --}}
										@endforeach
									</tbody>
								</table>
								{{-- Pagination --}}
								{{-- <div class="d-flex justify-content-end">
									{!! $allData->links() !!}
								</div> --}}
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#deleteModalButton').click(function (e) {
            e.preventDefault();
            $("#deleteModel").modal('show');
        });
    });
</script>