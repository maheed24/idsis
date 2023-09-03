<style>
    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 6px;
        cursor: pointer;
        float:center;
    }
    </style>
 <!-- ADD NEW USER TYPE -->
<div class="modal fade" id="mdlAddUserType" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" style="width:80%!important;">
		<div class="modal-content">
			<div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>CREATE NEW STEM TYPE</b></h4>
          	</div>
          	<div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:0px;">
				<form action="{{url('User_type')}}" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
                    {!! csrf_field() !!}
					<div id="add_ship_classification_msg"></div>
					<div class="row">
						<div class="row">
							<div class="col-sm-12">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>User Type</label>
								<input type="text" class="form-control clear" name="user_type_desc" id="addtxtstemtypedesc" style="width:100%!important;" required />
							</div>
						</div>
					</div>
                        <div class="hidden">
                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                <label>Status</label>
                                <select class="form-control select2" name="status_id" id="updateddlstatusidcertificatetype" style="width:100%;">
                                    {{-- <option value="" selected="selected" disabled>PLEASE SELECT STATUS</option> --}}
                                    @foreach($Status as $item)
                                    <option value="{{$item->id}}">{{$item->status_desc}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
						<button type="submit" class="btn btn-primary btn-flat" id="btnAddShipClassification"><i class="fa fa-save"></i> <b>SAVE</b></button>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>

<!-- UPDATE USER TYPE -->
<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" style="width:80%!important;">
		<div class="modal-content">
			<div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>UPDATE STEM TYPE</b></h4>
          	</div>
          	<div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:0px;">
				<form id="editForm" action="/User_type" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
                    {!! csrf_field() !!}
                    @method("PATCH")
					<input type="hidden" class="form-control clear" name="id" id="id" style="width:100%!important;" required />
					
					<div id="edit_ship_classification_msg"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>User Type</label>
								<input type="text" class="form-control clear" name="user_type_desc" id="stem_type_desc"  style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Status</label>
								<select class="form-control select2" name="status_id" id="updateddlstatusidshipclassification" style="width:100%;">
                                    @foreach($Status as $item)
                                    <option value="{{$item->id}}">{{$item->status_desc}}</option>
                                   @endforeach
																
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
						<button type="submit" class="btn btn-primary btn-flat" id="btnUpdateShipClassification"><i class="fa fa-save"></i> <b>UPDATE</b></button>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>