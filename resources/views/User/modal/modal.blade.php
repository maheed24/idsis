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
 <!-- ADD NEW USER -->
<div class="modal fade" id="mdlAddUser" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" style="width:80%!important;">
		<div class="modal-content">
			<div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>CREATE NEW USER</b></h4>
          	</div>
          	<div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:0px;">
				<form id="AddFormUser" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
					<div id="add_user_msg"></div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Lastname</label>
								<input type="text" class="form-control clear" name="last_name" id="addtxtlastname" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Firstname</label>
								<input type="text" class="form-control clear" name="first_name" id="addtxtfirstname" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Middle Initial</label>
								<input type="text" class="form-control clear" name="middle_initial" id="addtxtmiddleinitial" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Suffix</label>
								<input type="text" class="form-control clear" name="suffix" id="addtxtsuffix" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Email Address</label>
								<input type="text" class="form-control clear" name="email_address" id="addtxtemailaddress" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>User Type</label>
								<select class="form-control select2" name="user_type_id" id="addddlusertypeiduser" style="width:100%;">
									<option value="" selected="selected" disabled>PLEASE SELECT USER TYPE</option>
																
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Office</label>
								<select class="form-control select2" name="office_id" id="addddlofficeuser" style="width:100%;">
									<option value="" selected="selected" disabled>PLEASE SELECT OFFICE</option>
															
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
						<button type="button" class="btn btn-primary btn-flat" id="btnAddUser"><i class="fa fa-save"></i> <b>SAVE</b></button>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>


<!-- UPDATE USER -->
<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" style="width:80%!important;">
		<div class="modal-content">
			<div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>UPDATE USER</b></h4>
          	</div>
          	<div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:0px;">
				<form  id="editForm" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
					<input type="hidden" class="form-control clear" name="user_id" id="updatetxtuserid" style="width:100%!important;" required />
					<div id="update_user_msg"></div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Lastname</label>
								<input type="text" class="form-control clear" name="last_name" id="name" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Firstname</label>
								<input type="text" class="form-control clear" name="first_name" id="updatetxtfirstname" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Middle Initial</label>
								<input type="text" class="form-control clear" name="middle_initial" id="updatetxtmiddleinitial" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Suffix</label>
								<input type="text" class="form-control clear" name="suffix" id="updatetxtsuffix" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Email Address</label>
								<input type="email" class="form-control clear" name="email_address" id="email" style="width:100%!important;" required />
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>User Type</label>
								<select class="form-control select2" name="user_type_id" style="width:100%;">
									<option value="" selected="selected" disabled>PLEASE SELECT USER TYPE</option>
									@foreach($User_type as $item)
                                    <option value="{{$item->id}}">{{$item->user_type_desc}}</option>
                                   @endforeach					
								</select>
							</div>
						</div>
						<div class="col-sm-6 marina">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Office</label>
								<select class="form-control select2" name="office_id" id="office_id" style="width:100%;">
									@foreach($Office as $item)
                                    <option value="{{$item->id}}">{{$item->office_desc}}</option>
                                   @endforeach				
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
								<label>Status</label>
								<select class="form-control select2" name="status_id" id="updateddlstatusiduser" style="width:100%;">
									<option value="" selected="selected" disabled>PLEASE SELECT STATUS</option>
									@foreach($Status as $item)
                                    <option value="{{$item->id}}">{{$item->status_desc}}</option>
                                   @endforeach				
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
						<button type="button" class="btn btn-primary btn-flat" id="btnUpdateUser"><i class="fa fa-save"></i> <b>SAVE</b></button>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>