@extends('admin.layouts.master')

@section('title', 'Manage Quiz')
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
													<h3 class="fw-bolder">All Quiz</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.partials.flash-message')
								<div class="d-flex justify-content-end mb-3">
									<a href="{{route('admin.settings.quiz.create')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></i> Add New</a>
								</div>
								<table class="table table-bordered table-striped">
									<thead>
										<th>SL No</th>
										<th>Title</th>
										<th>Exam Name</th>
										<th>Quiz Type</th>
										<th>Marks</th>
										<th>Status</th>
										<th>Templete</th>
										<th>Action</th>
									</thead>
									<tbody>
										@foreach ($allData as $rows)
										<tr>
											<td>{{$loop->index + 1}}</td>
											<td>{{$rows->title}}</td>
											<td>{{$rows->exam->title}}</td>
											<td>{{$rows->quiz_type}}</td>
											<td>{{$rows->marks}}</td>
											<td>{{$rows->status}}</td>
											<td>{{$rows->templete}}</td>
											<td>
												<a href="{{route('admin.settings.quiz.edit', $rows->id)}}" class="btn btn-success btn-sm">Edit</a>
												<a href="{{route('admin.settings.quiz.delete', ['templete'=>$rows->templete, 'quizType'=>$rows->quiz_type, 'id'=>$rows->id])}}" class="btn btn-danger btn-sm">Delete</a>
												<a href="{{route('admin.settings.quiz.add-question', ['quizType'=>$rows->quiz_type, 'quizId'=>$rows->id])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Add Question</a>
												@if($rows->templete == 'with_passage')
												<a href="{{route('admin.settings.quiz.article', ['quizType'=>$rows->quiz_type, 'quizId'=>$rows->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus"></i> Add Passage</a>
												@elseif($rows->templete == 'with_audio')
												<a href="{{route('admin.settings.quiz.listening', ['quizType'=>$rows->quiz_type, 'quizId'=>$rows->id])}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-circle-plus"></i> Add Audio</a>
												@endif
												@if ($rows->quiz_type =='fill-blank')
												<a href="{{route('admin.settings.quiz.show.box', ['quizType'=>$rows->quiz_type, 'quizId'=>$rows->id])}}" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa-solid fa-circle-plus"></i> Show Box</a>
												@endif
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>
								{{-- Pagination --}}
								<div class="d-flex justify-content-end">
									{!! $allData->links() !!}
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