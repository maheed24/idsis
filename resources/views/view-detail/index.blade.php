@extends('view-detail.layout')
@section('content')
    <!-- Site wrapper -->
	
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content" style="background-color: white;">
                <!-- Default box -->
                <div class="box mx-auto" style="width: 80%;  ">
                    <div class="box-header with-border">
						<br><br>
                        {{-- <img src="{{asset('imports/dist/img/Civil Aeronautics Board of The Bangsamoro.png')}}" alt="Sample Image" class="img-fluid"
						style="max-width: 200px; max-height: 200px; display: block; margin: 0 auto; "> --}}
                        
                        <br><br><br>
                        <form class="form-horizontal" style="margin-top: 10px; border: 1px solid #000; width: 100%; background-color: white; padding: 20px;">
							<br>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Issued To:</label>
										<input type="text" class="form-control" value="" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Address:</label>
										<input type="text" class="form-control" value="" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Nature Of Business:</label>
										<input type="text" class="form-control" value="" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Date Effective:</label>
										<input type="text" class="form-control"  value="" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Date Expired:</label>
										<input type="text" class="form-control" value="" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">CABB No:</label>
										<input type="text" class="form-control" value="" readonly>
									</div>
								</div>
							</div>
							{{-- <img src="{{asset('imports/dist/img/verified.png')}}" alt="Sample Image" class="img-fluid"
								 style="max-width: 180px; max-height: 180px; display: block; margin: 0 auto;"> --}}
							<br>
						</form>
                    </div>
<br>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    @include('script')
@endsection
