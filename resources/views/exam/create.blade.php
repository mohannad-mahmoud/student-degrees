@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Exam</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create</span>
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
									<h2>انشاء دورة امتحانية</h2>
								</div>
								<p class="mg-b-20"></p>
								<div class="pd-30 pd-sm-40 bg-gray-200">
									<form action="" method="post">
										@csrf

										{{-- Exam Name --}}
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">اسم الدورة الامتحانية</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<input class="form-control" placeholder="ادخل اسم الدورة الامتحانية" type="text">
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
@endsection