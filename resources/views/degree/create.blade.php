@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Degree</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-lg-11 col-md-11">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									<h2>ادخال درجات الطلاب</h2>
								</div>
								<p class="mg-b-20"></p>
								<div class="pd-30 pd-sm-40 bg-gray-200">
									<form action="" method="post">
										@csrf

										{{-- Faculty --}}
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">الكلية</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<select name="" id="" class="form-control">
													<option value="">كلية الهندسة المعلوماتية</option>
												</select>
											</div>
										</div>
										
										{{-- Section --}}
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">الاختصاص</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<select name="" id="" class="form-control">
													<option value="">عام</option>
													<option value="">قسم البرمجيات</option>
												</select>
											</div>
										</div>
										

										{{-- Study Year --}}
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">السنة الدراسية</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<select name="" id="" class="form-control">
													<option value="">2022/2023</option>
												</select>
											</div>
										</div>
										
										{{-- Exam --}}
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">الدورة الامتحانية</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<select name="" id="" class="form-control">
													<option value="">الدورة الفصلية الاولى</option>
												</select>
											</div>
										</div>

										
										{{-- Subject --}}
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">المادة</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<select name="" id="" class="form-control">
													<option value="">برمجة 1</option>
													<option value="">برمجة 2</option>
												</select>
											</div>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table text-md-nowrap" id="example1">
													<thead>
														<tr>
															<th class="wd-10p border-bottom-0">الرقم</th>
															<th class="wd-15p border-bottom-0">اسم الطالب</th>
															<th class="wd-15p border-bottom-0">الرقم الجامعي</th>
															<th class="wd-10p border-bottom-0">الدرجة رقما</th>
															<th class="wd-15p border-bottom-0">الدرجة كتابة</th>
															{{-- <th class="wd-15p border-bottom-0">العمليات</th> --}}
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>الطالب 1</td>
															<td>3333</td>
															<td><input type="text" /></td>
															<td>سبعون درجة فقط</td>
															{{-- <td>
																<button class="btn-primary pd-x-10 mg-r-5"><a class="text-white" href="">تعديل</a></button>
																<button class="btn-danger pd-x-10 mg-r-5"><a class="text-white" data-target="#modaldemo1" data-toggle="modal" href="">حذف</a></button>
															</td> --}}
														</tr>
														<tr>
															
															<td>2</td>
															<td>الطالب 2</td>
															<td>3335</td>
															<td><input type="text" /></td>
															<td>سبعون درجة فقط</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">انشاء</button>
										{{-- <button class="btn btn-dark pd-x-30 mg-t-5">Cancel</button> --}}
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection