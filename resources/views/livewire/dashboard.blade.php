<div class="box" style="display:none;">
					<div class="box-header with-border">
						<h4><b>Dashboard</b></h4>
						
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-3 col-6">
							  <!-- small box -->
							  <div class="small-box bg-info">
								<div class="inner">
                                    <h3>{{$totalVessel}}</h3>
                                    <p>Total Vessel</p>
                                <div class="col-sm-3">
                                    <div class="text-primary">
								  <h3>{{$validCount}}</h3>
								  <p>Valid</p>
                                    </div>
                                </div>
                                <div class="text-danger">
								  <h3>{{$expiredCount}}</h3>
								  <p>Expired</p>
                                </div>
								</div>
								<div class="icon">
								  <i class="ion-android-boat"></i>
								</div>
								<a href="{{ url('co_cpr')}}" class="small-box-footer">View info <i class="fas fa-arrow-circle-right"></i></a>
							  </div>
							</div>
							<!-- ./col -->
							
							
							<!-- ./col -->
							<div class="col-lg-3 col-6">
							  <!-- small box -->
							  <div class="small-box bg-warning">
								<div class="inner">
								  <h3>44</h3>
				  
								  <p>Total Passenger</p>
								</div>
								<div class="icon">
								  <i class="ion ion-person-add"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							  </div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
							  <!-- small box -->
							  <div class="small-box bg-danger">
								<div class="inner">
								  <h3>65</h3>
				  
								  <p>Unique Visitors</p>
								</div>
								<div class="icon">
								  <i class="ion ion-pie-graph"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							  </div>
							</div>
							<!-- ./col -->
						  </div>
						 
						
					</div>
					<!-- /.box-body -->
					<hr>
					<div class="box-header with-border">
						<h4><b>Ship Type</b></h4>
						
					</div>
					<div class="box-body">
					<div class="row">
						@foreach ($shipClassification as $item)
						<div class="col-lg-3 col-6">
						  <!-- small box -->
						  <div class="small-box bg-default">
							<div class="inner">
							  <h3>{{\App\Models\Detail::where('ship_classification_id',$item->id)->count()}}<sup style="font-size: 20px"></sup></h3>
			  
							  <p>{{$item->ship_classification_desc}}</p>
							</div>
							<div class="icon">
							  <i class="ion-android-boat"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						  </div>
						</div>
						@endforeach
					  </div>
					</div>
				</div>