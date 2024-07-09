@extends('layout')
@section('content')
    @include('section.header')

    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            @include('section.navbar')
            @include('section.menubar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box" style="">
                        <div class="box-header with-border">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#vessel_details" data-toggle="tab">VESSEL INFORMATION</a></li>
                                <li><a href="#documentary_requirements" data-toggle="tab">SHIP PROPULSION</a></li>
                                <li><a href="#history" data-toggle="tab">HISTORY</a></li>
                                <li><a href="#homeport" data-toggle="tab">CHANGE HOMEPORT</a></li>
                                <li><a href="#image" data-toggle="tab">VESSEL IMAGE</a></li>
                            </ul>
                            {{-- <h4><b> REGISTERED VESSEL</b></h4> --}}

                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="vessel_details">
                                <form id="AddFormVessels" action="{{ url('co_cpr') }}" class="form-horizontal"
                                    method="POST" style="margin-top:10px;!important" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    {{-- <input type="hidden" class="form-control clear" name="action" value="add" style="width:100%!important;" required /> --}}
                                    <div id="add_co_cpr_msg"></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Principal Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="principal_name"
                                                    id="addtxtprincipalname" style="width:100%!important;"
                                                    value="{{ $Detail->principal_name }}" required />

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Owner/Company<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="company_name"
                                                    id="addtxtcompanyname" style="width:100%!important;"
                                                    value="{{ $Detail->company_name }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Business Address<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="business_address"
                                                    id="addtxtbusinessaddress" style="width:100%!important;"
                                                    value="{{ $Detail->business_address }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="ship_name"
                                                    id="addtxtshipname" style="width:100%!important;"
                                                    value="{{ $Detail->ship_name }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Official No.<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="official_no"
                                                    id="addtxtofficialno" style="width:100%!important;"
                                                    value="{{ $Detail->ship_name }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Call Sign<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="call_sign"
                                                    id="addtxtcallsign" style="width:100%!important;"
                                                    value="{{ $Detail->call_sign }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>IMO No<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="imo_no"
                                                    id="addtxtimono" style="width:100%!important;"
                                                    value="{{ $Detail->imo_no }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Classification<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="ship_classification_id"
                                                    id="addddlshipclassificationdetailsid" style="width:100%;" required>
                                                    <option value="{{ $Detail->Ship_classification[0]->id }}">
                                                        {{ $Detail->Ship_classification[0]->ship_classification_desc }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="ship_type_id"
                                                    id="addddlshiptypedetailsid1" style="width:100%;" required>

                                                    <option value="{{ $Detail->Ship_type[0]->id }}">
                                                        {{ $Detail->Ship_type[0]->ship_type_desc }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Homeport<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="homeport"
                                                    id="addtxthomeport" style="width:100%!important" readonly
                                                    value="{{ $Office }}" required />
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Former Ship Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="former_ship_name"
                                                    id="addtxtformershipname" style="width:100%!important;"
                                                    value="{{ $Detail->former_ship_name }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Former Owner<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="former_owner"
                                                    id="addtxtformerowner" style="width:100%!important;"
                                                    value="{{ $Detail->former_owner }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Builder<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="builder"
                                                    id="addtxtbuilder" style="width:100%!important;"
                                                    value="{{ $Detail->builder }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Place Built<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="place_built"
                                                    id="addtxtplacebuilt" style="width:100%!important;"
                                                    value="{{ $Detail->place_built }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Year Built<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="year_built"
                                                    id="addtxtyearbuilt" style="width:100%!important;"
                                                    value="{{ $Detail->year_built }}" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Modified by<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="modified_by"
                                                    id="addtxtmodifiedby" style="width:100%!important;"
                                                    value="{{ $Detail->modified_by }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Place Modified<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="place_modified"
                                                    id="addtxtplacemodified" style="width:100%!important;"
                                                    value="{{ $Detail->place_modified }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Year Modified<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="year_modified"
                                                    id="addtxtyearmodified" style="width:100%!important;"
                                                    value="{{ $Detail->year_modified }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Length<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01"
                                                    min="0" name="length" value="0" id="addtxtlength"
                                                    style="width:100%!important;" required
                                                    value="{{ $Detail->length }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Gross Tonnage<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01"
                                                    min="0" name="gross_tonnage" value="0"
                                                    id="addtxtgrosstonnage" style="width:100%!important;" required
                                                    value="{{ $Detail->gross_tonnage }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>No. of Screw<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" name="no_screw"
                                                    id="addtxtnoscrew" value="0" style="width:100%!important;"
                                                    required value="{{ $Detail->no_srew }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>No. of Masts<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" name="no_masts"
                                                    id="addtxtnomasts" value="0" style="width:100%!important;"
                                                    required value="{{ $Detail->no_masts }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Breadth<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01"
                                                    min="0" name="breadth" value="0" id="addtxtbreadth"
                                                    style="width:100%!important;" required
                                                    value="{{ $Detail->breadth }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group net_tonnage" style="padding-left:20px!important;">
                                                <label>Net Tonnage<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01"
                                                    min="0" name="net_tonnage" value="0"
                                                    id="addtxtnettonnage" style="width:100%!important;" required
                                                    value="{{ $Detail->net_tonnage }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Deadweight<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01"
                                                    min="0" name="deadweight" value="0"
                                                    id="addtxtdeadweight" style="width:100%!important;"
                                                    value="{{ $Detail->deadweight }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>No of Decks<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="no_decks"
                                                    id="addtxtnodecks" style="width:100%!important;" required
                                                    value="{{ $Detail->no_deck }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Depth<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01"
                                                    min="0" name="depth" id="addtxtdepth" value="0"
                                                    style="width:100%!important;" required
                                                    value="{{ $Detail->depth }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Hull Material<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="hull_material_id"
                                                    id="addddlhullmaterialid" style="width:100%;">
                                                    <option value="{{ $Detail->Hull_material[0]->id }}">
                                                        {{ $Detail->Hull_material[0]->hull_material_desc }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Type of Stern<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="stern_type_id"
                                                    id="addddlsterntypeid" style="width:100%;">

                                                    <option value="{{ $Detail->Stern_type[0]->id }}">
                                                        {{ $Detail->Stern_type[0]->stern_type_desc }}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Type of Stem<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="stem_type_id"
                                                    id="addddlstemtypeid" style="width:100%;">

                                                    <option value="{{ $Detail->Stem_type[0]->id }}">
                                                        {{ $Detail->Stem_type[0]->stem_type_desc }}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Trading Area<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="trading_area_id"
                                                    id="addddltradingareaid" style="width:100%;">

                                                    <option value="{{ $Detail->Trading_area[0]->trading_area_desc }}">
                                                        {{ $Detail->Trading_area[0]->trading_area_desc }}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Rig Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="rig_type_id"
                                                    id="addddlrigtypeid" style="width:100%;">

                                                    <option value="{{ $Detail->Rig_type[0]->id }}">
                                                        {{ $Detail->Rig_type[0]->rig_type_desc }}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group operation" style="padding-left:20px!important;">
                                                <label>Operation<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="operation_id"
                                                    id="addddloperationid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT
                                                    </option>

                                                    <option value="{{ $Detail->Operation[0]->id }}">
                                                        {{ $Detail->Operation[0]->operation_desc }}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group operation"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Acquisition Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="acquisition_type_id"
                                                    id="addddlacquisitiontypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT
                                                    </option>

                                                    <option value=""></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 recreational" style="display:none;">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Nationality<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="nationality"
                                                    id="addtxtnationality" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 recreational" style="display:none;">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Body No<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="body_no"
                                                    id="addtxtbodyno" style="width:100%!important;"
                                                    value="{{ $Detail->body_no }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Pictures<span style="color:red;">* Upload size only
                                                        5MB</span></label>
                                                <input type="file" class="form-control" name="images[]"
                                                    style="width:100%!important;" multiple />

                                            </div>
                                        </div>
                                        <div class="hidden">
                                            <div class="form-group"
                                                style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Status</label>
                                                <select class="form-control select2" name="status_id"
                                                    id="updateddlstatusidshipclassification" style="width:100%;">

                                                    <option value=""></option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-flat pull-left"
                                            data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
                                        <button type="submit" class="btn btn-primary btn-flat" id="btnAddVessel"><i
                                                class="fa fa-save"></i> <b>SAVE</b></button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="documentary_requirements">
                                <div id="shippropulsion">
                                        <input type="hidden" class="form-control" name="ship_name" id="addtxtdetails_id" value="'.$details_id.'" style="width:100%!important;" />
	<table id="tblShipPropulsionDetails" class="table table-striped table-bordered" style="width:100%;">
		<thead style="font-family:calibri;font-size:15px;">
		
			<th style="background:#367fa9;color:white;width:14%;display:none;"></th>
			<th style="background:#367fa9;color:white;width:14%;">ENGINE MAKE</th>
			<th style="background:#367fa9;color:white;width:14%;">ENGINE POWER (KW)</th>
			<th style="background:#367fa9;color:white;width:14%;">SERIAL NUMBER</th>
			<th style="background:#367fa9;color:white;width:14%;">NO OF CYCLINDER</th>
			<th style="background:#367fa9;color:white;width:14%;">CYCLE</th>
			<th style="background:#367fa9;color:white;width:14%;">STATUS</th>
			<th style="background:#367fa9;color:white;width:2%;"></th>
		</thead>

    <tbody style="font-family:calibri;font-size:15px;" id="propulsionTableBody" >
       
   
        
    </tbody>
    <tfoot id="footershippropulsion">
        <tr>
            
            {!! csrf_field() !!}
            
                <input type="text" class="form-control" name="details_id" id="detail_id" style="background:#cecece;font-size: 0;width:100%!important;"  />
            <td style="width:14%;"><input type="text" class="form-control" name="engine_make" id="sengine_make" style="width:100%!important;" /></td>
            <td style="width:14%;"><input type="number" class="form-control" step=".01" min="0" name="horsepower" id="shorsepower" style="width:100%!important;" /></td>
            <td style="width:14%;"><input type="text" class="form-control" name="serial_no" id="sserial_no" style="width:100%!important;" /></td>
            <td style="width:14%;"><input type="number" class="form-control" name="no_cyclinder" id="sno_cyclinder" style="width:100%!important;" /></td>
            <td style="width:14%;"><input type="number" class="form-control" name="cycle" id="scycle" style="width:100%!important;" /></td>
            <td style="width:14%;"><select class="form-control" name="status_id" id="sstatus_id" style="width:100%!important;"><option value="1">ACTIVE</option><option value="2">INACTIVE</option></select></td>
            <td style="width:2%;">
                <button type="submit" class="btn btn-primary btn-flat btnAddPropulsion1" id="btnAddPropulsion1">
                    <i class="fa fa-save"></i> Submit
                </button>
               
            </td>
        </tr>
    </tfoot>
    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="history">
                                <div class="col-sm-12" style="padding-bottom:20px;padding-top:20px;" id="BtnPayment">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat" id="btnAddCertPayment" style="float:right;"><i class="fa fa-save"></i> <b>ADD</b></button>
                                    </div>
                                </div>
                                {{-- ADD History --}}
                                <div id="AddCert" style="margin-top:10px;!important;display:none;">	
                                    {!! csrf_field() !!}
                                
                                    <input type="hidden" class="form-control" name="details_id" id="details_id" style="background:#cecece;font-size: 10;width:100%!important;"  required />
                                    {{-- <input type="text" class="form-control " name="user_id" value="{{auth()->user()->id}}" style="width:100%!important;" readonly /> --}}
                                    {{-- <input type="text" class="form-control clear" name="details_id" id="addtxtdetailsidpayment" style="width:100%!important;" required /> --}}
                                    <div id="payment_msg"></div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Amount</label>
                                                <input type="hidden" class="form-control clear" name="qr_code" id="" style="width:100%!important;" />
                                                <input type="number" class="form-control clear" step=".01" min="0" name="amount" id="amount" style="width:100%!important;"  required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>O.R. Date</label>
                                                <input type="date" class="form-control clear" name="or_date" id="or_date" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>O.R. No.</label>
                                                <input type="number" class="form-control clear" name="or_no" id="or_no" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Certificate No</label>
                                                <input type="text" class="form-control clear" name="cert_no" id="cert_no" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Security No</label>
                                                <input type="text" class="form-control clear" name="sec_no" id="sec_no" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Date Issued</label>
                                                <input type="date" class="form-control clear" name="date_issued" id="date_issued" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Validity</label>
                                                <input type="date" class="form-control clear" name="validity" id="validity" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Certificate/License Type</label>
                                                <select class="form-control select2" name="cert_type_id" id="cert_type_id" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Cert_type as $item)
                                                    <option value="{{$item->id}}">{{$item->cert_type_desc}}</option>
                                                    @endforeach							
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-flat pull-left" id="btnPaymentAddBack"><i class="fa fa-arrow-left"></i> <b>BACK</b></button>
                                        <button type="submit" class="btn btn-primary btn-flat btnAddPayment" id="btnAddPayments"><i class="fa fa-save"></i> <b>SAVE</b></button>
                                    </div>
                                </div>
                                {{-- EDIT History --}}
                                <div id="EditCert" class="form-horizontal" method="POST"  style="margin-top:10px;!important;display:none;">	
                                    
                                    {!! csrf_field() !!}
                                    {{-- <input type="hidden" class="form-control clear" name="action" value="update" style="width:100%!important;" required /> --}}
                                    <input type="hidden" class="form-control clear" name="cert_id" id="cert_id1" style="width:100%!important;" required />
                                    <input type="hidden" class="form-control clear" name="details_id" id="details_id1" style="width:100%!important;" required />
                                    <div id="update_payment_msg"></div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Amount</label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="amount" id="amount1" style="width:100%!important;"  required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>O.R. Date</label>
                                                <input type="date" class="form-control clear" name="or_date" id="or_date1" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>O.R. No.</label>
                                                <input type="number" class="form-control clear" name="or_no" id="or_no1" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Certificate No</label>
                                                <input type="text" class="form-control clear" name="cert_no" id="cert_no1" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Security No</label>
                                                <input type="number" class="form-control clear" name="sec_no" id="sec_no1" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Date Issued</label>
                                                <input type="date" class="form-control clear" name="date_issued" id="date_issued1" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Validity</label>
                                                <input type="date" class="form-control clear" name="validity" id="validity1" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Certificate/License Type</label>
                                                <select class="form-control select2" name="cert_type_id" id="cert_type_id1" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Cert_type as $item)
                                                    <option value="{{$item->id}}">{{$item->cert_type_desc}}</option>
                                                    @endforeach					
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-flat pull-left" id="btnPaymentEditBack"><i class="fa fa-arrow-left"></i> <b>BACK</b></button>
                                        <button type="submit" class="btn btn-primary btn-flat" id="btnUpdatePayment"><i class="fa fa-save"></i> <b>SAVE</b></button>
                                    </div>
                                    {{-- asd --}}
                                </div>
                                <div id="shiphistory">
                                    
                                        <input type="hidden" class="form-control" name="certificate_license_id" id="addtxtcertificatelicenseidcert" style="width:100%!important;"/>
                                        <table id="tblShipInfoHist" class="table table-striped table-bordered">
                                            <thead style="font-family:calibri;font-size:15px;">
                                                <th style="background:#367fa9;color:white;width:14%;vertical-align:middle;">CERT/LICENSE</th>
                                                <th style="background:#367fa9;color:white;width:14%;vertical-align:middle;">CERTIFICATE NO</th>
                                                <th style="background:#367fa9;color:white;width:14%;vertical-align:middle;">SECURITY NO</th>
                                                <th style="background:#367fa9;color:white;width:14%;vertical-align:middle;">DATE ISSUED</th>
                                                <th style="background:#367fa9;color:white;width:12%;vertical-align:middle;">VALIDITY</th>
                                                <th style="background:#367fa9;color:white;width:14%;vertical-align:middle;">O.R. NO</th>
                                                <th style="background:#367fa9;color:white;width:14%;vertical-align:middle;">O.R. DATE</th>
                                                <th style="background:#367fa9;color:white;width:2%;vertical-align:middle;">EDIT</th>
                                                <th style="background:#367fa9;color:white;width:2%;vertical-align:middle;">VIEW</th>
                                            </thead>
                                            <tbody style="font-family:calibri;font-size:15px;" id="certificateTableBody">
                                              
                                                <div id="test" ></div>
                                                
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="homeport">
                                <form id="AddChangeHomeport" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
                                    <input type="hidden" class="form-control clear" name="details_id" id="updatetxtdetailsidchangehomeport" style="width:100%!important;" required />
                                    <input type="hidden" class="form-control clear" name="action" value="change" style="width:100%!important;" required />
                                    <div id="change_msg"></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>From<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" id="addtxthomeport" value = "{{$Office}}" style="width:100%!important;" readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>To<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="homeport" id="addddlofficehomeport" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Office_all as $item)
                                                    <option value="{{$item->id}}">{{$item->office_place}}</option>
                                                    @endforeach
                                                  						
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
                                        <button type="submit" class="btn btn-primary btn-flat" id="btnAddChangeHomeport"><i class="fa fa-save"></i> <b>SAVE</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('section.footer')
            {{-- include '../../modal/admin/modal.php'; --}}
            {{-- @include('co_cpr.modal.modal') --}}
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        @include('co_cpr.script')
    </body>
    @if (session()->has('flash_message'))
        <script>
            // Display a Toastr notification
            toastr.success("{{ session('flash_message') }}");
        </script>
    @endif
    @if (session()->has('update_message'))
        <script>
            // Display an "info" Toastr notification
            toastr.info("{{ session('update_message') }}");
        </script>
    @endif
    @if ($errors->any())
        <script>
            // Display a Toastr notification for validation errors
            toastr.error("{{ $errors->first() }}");
        </script>
    @endif
    <script>
        $(document).ready(function() {
            // Configure Toastr options (adjust as needed)
            toastr.options = {
                closeButton: true, // Show a close button
                progressBar: true, // Show a progress bar
                timeOut: 5000, // Time in milliseconds to automatically close the message (5 seconds in this example)
            };
        });
    </script>
