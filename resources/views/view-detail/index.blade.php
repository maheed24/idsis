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
                        <img src="{{asset('img/marina.png')}}" alt="Sample Image" class="img-fluid"
						style="max-width: 200px; max-height: 200px; display: block; margin: 0 auto; ">
                        
                        <br><br><br>
                        <form class="form-horizontal" style="margin-top: 10px; border: 1px solid #000; width: 100%; background-color: white; padding: 20px;">
							<br>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Certicate:</label>
										<input type="text" class="form-control" value="{{$certificate->Cert_type[0]->cert_type_desc}}" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Certicate No.:</label>
										<input type="text" class="form-control" value="{{$certificate->cert_no}}" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Date Issued</label>
										<input type="text" class="form-control" value="{{$certificate->date_issued}}" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Date Validity</label>
										<input type="text" class="form-control" value="{{$certificate->validity}}" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">O.R No.:</label>
										<input type="text" class="form-control"  value="{{$certificate->or_no}}" readonly>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group" style="padding-left: 20px;">
										<label for="">Vessel Name:</label>
										<input type="text" class="form-control" value="{{$Detail[0]->ship_name}}" readonly>
									</div>
								</div>
								
							</div>
							<label>PICTURES:</label><br>
							@foreach($image as $images)
							<img src="{{$images->path}}" alt="Sample Image" class="img-fluid"
								 style="max-width: 180px; max-height: 180px;">
							@endforeach
							<img src="{{asset('img/verified.png')}}" alt="Sample Image" class="img-fluid"
								 style="max-width: 180px; max-height: 180px; display: block; margin: 0 auto;">
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

@endsection
