<style>

    #exTab2 h3 {
      color : white;
      background-color: #428bca;
      padding : 5px 15px;
    }
    
    /* remove border radius for the tab */
    
    #exTab1 .nav-pills > li > a {
      border-radius: 0;
    }
    
    /* change border radius for the tab , apply corners on top*/
    
    #exTab3 .nav-pills > li > a {
      border-radius: 4px 4px 0 0 ;
    }
    
    #exTab3 .tab-content {
      color : #282828;
      background-color: #cecece;
      padding : 5px 15px 20px 20px;
      width:100%;
    }
    
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
        background-color:#767676!important;
        color : #282828;
    }
    
    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        border-top-color:#cfcfcf!important;
        color : white!important;
    }
    </style>
    
    <!-- ADD NEW CO/CPR -->
    <div class="modal fade" id="mdlAddCOCPR" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="width:80%!important;">
            <div class="modal-content">
                <div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>VESSEL PARTICULARS</b></h4>
                  </div>
                  <div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:20px;">
                    <div id="exTab3">	
                        <ul  class="nav nav-pills">
                            <li class="active"><a  href="#transaction_details" data-toggle="tab">VESSEL INFORMATION</a></li>
                            <!--<li><a href="#documentary_requirements" data-toggle="tab">SHIP PROPULSION</a></li>
                            <li><a href="#history" data-toggle="tab">HISTORY</a></li>-->
                        </ul>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="transaction_details">
                                <form id="AddFormVessels" action="{{url('co_cpr')}}" class="form-horizontal" method="POST"  style="margin-top:10px;!important" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    {{-- <input type="hidden" class="form-control clear" name="action" value="add" style="width:100%!important;" required /> --}}
                                    <div id="add_co_cpr_msg"></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Principal Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="principal_name" id="addtxtprincipalname" style="width:100%!important;" required />
                                                <input type="hidden" name="change_homeport" value="0">
                                                
                                                <input type="hidden" class="form-control clear" name="user_id" id="addtxtprincipalname" style="width:100%!important;" readonly value = "{{$User[0]->id}}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Owner/Company<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="company_name" id="addtxtcompanyname" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Business Address<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="business_address" id="addtxtbusinessaddress" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="ship_name" id="addtxtshipname" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Official No.<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="official_no" id="addtxtofficialno" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Call Sign<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="call_sign" id="addtxtcallsign" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>IMO No<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="imo_no" id="addtxtimono" style="width:100%!important;"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Classification<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="ship_classification_id" id="addddlshipclassificationdetailsid" style="width:100%;" required>
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Ship_classification as $item)
                                                    <option value="{{$item->id}}">{{$item->ship_classification_desc}}</option>
                                                    @endforeach						
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="ship_type_id" id="addddlshiptypedetailsid1" style="width:100%;" required>
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Ship_type as $item)
                                                    <option value="{{$item->id}}">{{$item->ship_type_desc}}</option>
                                                    @endforeach						
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Homeport<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="homeport" id="addtxthomeport" style="width:100%!important" readonly value = "{{$Office[0]->office_place}}" required />
                                            </div>
                                        </div>
                                        <!---<div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Homeport(Province)</label>
                                                <select class="form-control select2" name="province_id" id="addddlprovinceid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    <?php 
                                                        // $stmt =("SELECT province.province_id, province.province_desc FROM province WHERE province.office_id = :office_id");
                                                        // $result=$conn->prepare($stmt);
                                                        // $result->bindValue(':office_id', $office_id, PDO::PARAM_INT);
                                                        // $result->execute();
                                                        // while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                                            // echo"<option value=$row[province_id]>$row[province_desc]</option>";
                                                        // }
                                                    ?>							
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Homeport(City/Municipality)</label>
                                                <select class="form-control select2" name="city_municipality_id" id="addddlcitymunicipalityid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    <?php //echo populateCityMunicipality($conn);?>							
                                                </select>
                                            </div>
                                        </div>--->
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Former Ship Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="former_ship_name" id="addtxtformershipname" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Former Owner<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="former_owner" id="addtxtformerowner" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Builder<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="builder" id="addtxtbuilder" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Place Built<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="place_built" id="addtxtplacebuilt" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Year Built<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="year_built" id="addtxtyearbuilt" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Modified by<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="modified_by" id="addtxtmodifiedby" style="width:100%!important;"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Place Modified<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="place_modified" id="addtxtplacemodified" style="width:100%!important;"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Year Modified<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="year_modified" id="addtxtyearmodified" style="width:100%!important;"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Length<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="length" value="0" id="addtxtlength" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Gross Tonnage<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="gross_tonnage" value="0" id="addtxtgrosstonnage" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>No. of Screw<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" name="no_screw" id="addtxtnoscrew" value="0" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>No. of Masts<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" name="no_masts" id="addtxtnomasts" value="0" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Breadth<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="breadth" value="0" id="addtxtbreadth" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group net_tonnage" style="padding-left:20px!important;">
                                                <label>Net Tonnage<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="net_tonnage" value="0" id="addtxtnettonnage" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Deadweight<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="deadweight" value="0" id="addtxtdeadweight" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>No of Decks<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="no_decks" id="addtxtnodecks" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Depth<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="depth" id="addtxtdepth" value="0" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Hull Material<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="hull_material_id" id="addddlhullmaterialid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Hull_material as $item)
                                                    <option value="{{$item->id}}">{{$item->hull_material_desc}}</option>
                                                    @endforeach							
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Type of Stern<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="stern_type_id" id="addddlsterntypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Stern_type as $item)
                                                    <option value="{{$item->id}}">{{$item->stern_type_desc}}</option>
                                                    @endforeach							
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Type of Stem<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="stem_type_id" id="addddlstemtypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Stem_type as $item)
                                                    <option value="{{$item->id}}">{{$item->stem_type_desc}}</option>
                                                    @endforeach						
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Trading Area<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="trading_area_id" id="addddltradingareaid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Trading_area as $item)
                                                    <option value="{{$item->id}}">{{$item->trading_areas_desc}}</option>
                                                    @endforeach							
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Rig Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="rig_type_id" id="addddlrigtypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Rig_type as $item)
                                                    <option value="{{$item->id}}">{{$item->rig_type_desc}}</option>
                                                    @endforeach					
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group operation" style="padding-left:20px!important;">
                                                <label>Operation<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="operation_id" id="addddloperationid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Operation as $item)
                                                    <option value="{{$item->id}}">{{$item->operation_desc}}</option>
                                                    @endforeach						
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group operation" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Acquisition Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="acquisition_type_id" id="addddlacquisitiontypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Acquisition_type as $item)
                                                    <option value="{{$item->id}}">{{$item->acquisition_type}}</option>
                                                    @endforeach						
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 recreational" style="display:none;">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Nationality<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="nationality" id="addtxtnationality" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 recreational" style="display:none;">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Body No<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="body_no" id="addtxtbodyno" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Pictures<span style="color:red;">* Upload size only 5MB</span></label>
                                                <input type="file" class="form-control" name="images[]" style="width:100%!important;" multiple />
                                               
                                            </div>
                                        </div>
                                        <div class="hidden">
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
                                        <button type="submit" class="btn btn-primary btn-flat" id="btnAddVessel"><i class="fa fa-save"></i> <b>SAVE</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- UPDATE CO/CPR -->
    <div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="width:80%!important;">
            <div class="modal-content">
                <div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>UPDATE SHIP PARTICULARS</b></h4>
                  </div>
                  <div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:20px;">
                    <div id="exTab3">	
                        <ul  class="nav nav-pills">
                            <li class="active"><a  href="#vessel_details" data-toggle="tab">VESSEL INFORMATION</a></li>
                            <li><a href="#documentary_requirements" data-toggle="tab">SHIP PROPULSION</a></li>
                            <li><a href="#history" data-toggle="tab">HISTORY</a></li>
                            <li><a href="#homeport" data-toggle="tab">CHANGE HOMEPORT</a></li>
                            <li><a href="#image" data-toggle="tab">VESSEL IMAGE</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="vessel_details">
                                <form id="editForm" action="/co_cpr" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
                                    {!! csrf_field() !!}
                                    @method("PATCH")
                                    <input type="hidden" class="form-control clear" name="id" id="id" style="width:100%!important;" required />
                                    {{-- <input type="hidden" class="form-control clear" name="action" value="update" style="width:100%!important;" required /> --}}
                                    <div id="update_co_cpr_msg"></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Principal Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="principal_name" id="updatetxtprincipalname" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Company Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="company_name" id="updatetxtcompanyname" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Business Address<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="business_address" id="updatetxtbusinessaddress" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="ship_name" id="updatetxtshipname" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Official No.<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="official_no" id="updatetxtofficialno" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Call Sign<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="call_sign" id="updatetxtcallsign" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>IMO No<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="imo_no" id="updatetxtimono" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group adjust-right" style="padding-left:20px!important;">
                                                <label>Ship Classification<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="ship_classification_id" id="updateddlshipclassificationdetailsid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Ship_classification as $item)
                                                    <option value="{{$item->id}}">{{$item->ship_classification_desc}}</option>
                                                    @endforeach								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Ship Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="ship_type_id" id="updateddlshiptypedetailsid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Ship_type as $item)
                                                    <option value="{{$item->id}}">{{$item->ship_type_desc}}</option>
                                                    @endforeach								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Homeport<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="homeport" id="updatetxthomeport" style="width:100%!important" readonly value = "<?php //echo $office_place; ?>" />
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Homeport(Province)</label>
                                                <select class="form-control select2" name="province_id" id="updateddlprovinceid" style="width:100%;">
                                                    <option value="" disabled>PLEASE SELECT</option>
                                                    <?php 
                                                        // $stmt =("SELECT province.province_id, province.province_desc FROM province WHERE province.office_id = :office_id");
                                                        // $result=$conn->prepare($stmt);
                                                        // $result->bindValue(':office_id', $office_id, PDO::PARAM_INT);
                                                        // $result->execute();
                                                        // while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                                            // echo"<option value=$row[province_id] selected=selected>$row[province_desc]</option>";
                                                        // }
                                                    ?>							
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group homeport" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Homeport(City/Municipality)</label>
                                                <select class="form-control select2" name="city_municipality_id" id="updateddlcitymunicipalityid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    <?php //echo populateCityMunicipalityHomeport($conn);?>							
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Former Ship Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="former_ship_name" id="updatetxtformershipname" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Former Owner<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="former_owner" id="updatetxtformerowner" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Builder<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="builder" id="updatetxtbuilder" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Place Built<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="place_built" id="updatetxtplacebuilt" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Year Built<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="year_built" id="updatetxtyearbuilt" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Modified by<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="modified_by" id="updatetxtmodifiedby" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Place Modified<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="place_modified" id="updatetxtplacemodified" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Year Modified<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="year_modified" id="updatetxtyearmodified" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Length<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="length" id="updatetxtlength" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Gross Tonnage<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="gross_tonnage" id="updatetxtgrosstonnage" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>No. of Screw<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" name="no_screw" id="updatetxtnoscrew" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>No. of Masts<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" name="no_masts" id="updatetxtnomasts" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Breadth<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="breadth" id="updatetxtbreadth" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group adjust-right" style="padding-left:20px!important;">
                                                <label>Net Tonnage<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="net_tonnage" id="updatetxtnettonnage" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Deadweight<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="deadweight" id="updatetxtdeadweight" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>No of Decks<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="no_decks" id="updatetxtnodecks" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Depth<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control clear" step=".01" min="0" name="depth" id="updatetxtdepth" style="width:100%!important;" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Hull Material<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="hull_material_id" id="updateddlhullmaterialid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Hull_material as $item)
                                                    <option value="{{$item->id}}">{{$item->hull_material_desc}}</option>
                                                    @endforeach								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Type of Stern<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="stern_type_id" id="updateddlsterntypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Stern_type as $item)
                                                    <option value="{{$item->id}}">{{$item->stern_type_desc}}</option>
                                                    @endforeach								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Type of Stem<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="stem_type_id" id="updateddlstemtypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Stem_type as $item)
                                                    <option value="{{$item->id}}">{{$item->stem_type_desc}}</option>
                                                    @endforeach								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 vessel">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Trading Area<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="trading_area_id" id="updateddltradingareaid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Trading_area as $item)
                                                    <option value="{{$item->id}}">{{$item->trading_areas_desc}}</option>
                                                    @endforeach							
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Rig Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="rig_type_id" id="updateddlrigtypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Rig_type as $item)
                                                    <option value="{{$item->id}}">{{$item->rig_type_desc}}</option>
                                                    @endforeach								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group adjust-right" style="padding-left:20px!important;">
                                                <label>Operation<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="operation_id" id="updateddloperationid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Operation as $item)
                                                    <option value="{{$item->id}}">{{$item->operation_desc}}</option>
                                                    @endforeach							
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group adjust-right" style="padding-left:20px!important;padding-right:20px!important;">
                                                <label>Acquisition Type<span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="acquisition_type_id" id="updateddlacquisitiontypeid" style="width:100%;">
                                                    <option value="" selected="selected" disabled>PLEASE SELECT</option>
                                                    @foreach($Acquisition_type as $item)
                                                    <option value="{{$item->id}}">{{$item->acquisition_type}}</option>
                                                    @endforeach								
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 recreational" style="display:none;">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Nationality<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="nationality" id="updatetxtnationality" style="width:100%!important;" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 recreational" style="display:none;">
                                            <div class="form-group" style="padding-left:20px!important;">
                                                <label>Body No<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control clear" name="body_no" id="updatetxtbodyno" style="width:100%!important;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
                                        <button type="submit" class="btn btn-primary btn-flat" id="btnUpdateVessel"><i class="fa fa-save"></i> <b>SAVE</b></button>
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
       
   
        {{-- <tr>
            @foreach($Ship_propulsion as $item)
            <td style="display:none;">{{$item->id}}<input type="text" class="form-control editInput ship_propulsion_id" name="ship_propulsion_id" id="updatetxtshippropulsionid" style="width:100%!important;" value="{{$item->id}}" /></td>
            <td style="width:14%;"><span class = "editSpan engine_make">{{$item->engine_make}}</span><input type="text" class="form-control editInput engine_make" name="engine_make" id="updatetxtenginemakeps" style="width:100%!important;display:none;" value="{{$item->engine_make}}" /></td>
            <td style="width:14%;"><span class = "editSpan horsepower">{{$item->horsepower}}</span><input type="number" class="form-control editInput horsepower" step=".01" min="0" name="horsepower" id="updatetxthorsepowerps" style="width:100%!important;display:none;" value="{{$item->horsepower}}" /></td>
            <td style="width:14%;"><span class = "editSpan serial_no">{{$item->serial_no}}</span><input type="text" class="form-control editInput serial_no" name="serial_no" id="updatetxtserialnops" style="width:100%!important;display:none;" value="{{$item->serial_no}}"/></td>
            <td style="width:14%;"><span class = "editSpan no_cyclinder">{{$item->no_cyclinder}}</span><input type="number" class="form-control editInput no_cyclinder" name="no_cyclinder" id="updatetxtnocyclinderps" style="width:100%!important;display:none;" value="{{$item->no_cyclinder}}" /></td>
            <td style="width:14%;"><span class = "editSpan cycle">{{$item->cycle}}</span><input type="number" class="form-control editInput cycle" name="cycle" id="txtcycle_ps_edit" style="width:100%!important;display:none;" value="{{$item->cycle}}"/></td>
            <td style="width:14%;"><span class = "editSpan status_desc">{{$item->status->status_desc}}</span><select class="form-control editSelect status_id" name="status_id" id="updateddlstatusidps" style="width:100%!important;display:none;"><option value="1">ACTIVE</option><option value="2">INACTIVE</option></select></td>
            <td style="width:2%;" class="hide_btn"><button type="button" style="background:#367fa9;" class="button btn btn-success btn-sm editshippropulsion btn-flat"><i class="fa fa-edit" style="width:10px;"></i></button><button type="button" style="background:#367fa9;display:none;" class="button btn btn-success btn-sm updateshippropulsion btn-flat" data-id=""><i class="fa fa-save" style="width:10px;"></i></button></td>
            
        </tr>
        @endforeach --}}
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
                                                {{-- <tr>
                                                    @foreach($Certificate as $item)
                                                    <td style="width:14%;">{{$item->desc}}</td>
                                                    <td style="width:14%;">{{$item->certificate_no}}</td>
                                                    <td style="width:14%;">{{$item->sec}}</td>
                                                    <td style="width:14%;">{{$item->issued}}</td>
                                                    <td style="width:12%;">{{$item->date_validity}}</td>
                                                    <td style="width:14%;">{{$item->orno}}</td>
                                                    <td style="width:14%;">{{$item->ordate}}</td>
                                                    <td style="width:2%;"><button type="button" style="background:#367fa9;" class="button btn btn-success btn-sm editPayment btn-flat" value="{{$item->cert_id}}"  ><i class="fa fa-edit" style="width:10px;"></i></button></td>
                                                    <form method="get" action="{{url('generate-pdf')}}" target="_blank">
                                                        <input type="hidden" class="form-control" name="certificate_license_id" id="addtxtcertificatelicenseidcert" style="width:100%!important;" value="{{$item->details}}"/>
                                                    <td style="width:2%;"><button type="submit" style="background:#367fa9;" class="button btn btn-success btn-sm btn-flat" data-id="{{$item->cert_id}}"  ><i class="fa fa-eye" style="width:10px;"></i></button></td>
                                                </form>
                                                    <td style="width:2%;"><a href="{{url('generate-pdf')}}" style="background:#367fa9;" class="button btn btn-success btn-sm btn-flat"><i class="fa fa-eye" style="width:10px;"></i></a></td>
                                                </tr>
                                                @endforeach --}}
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
                                                <input type="text" class="form-control clear" id="addtxthomeport" value = "{{$Office[0]->office_place}}" style="width:100%!important;" readonly />
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
                                                    <?php 
                                                        // $stmt =("SELECT office.office_place FROM office WHERE office.office_id != :office_id");
                                                        // $result=$conn->prepare($stmt);
                                                        // $result->bindValue(':office_id', $office_id, PDO::PARAM_INT);
                                                        // $result->execute();
                                                        // while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                                        //     echo"<option value='$row[office_place]'>$row[office_place]</option>";
                                                        // }
                                                    ?>								
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
                            <div class="tab-pane" id="image">
                                <div class="col-sm-3">
                                    <form id="" action="{{route('image-update')}}" class="form-horizontal" method="POST"  style="margin-top:10px;!important" enctype="multipart/form-data">
                                        @csrf
                                       
                                    <div class="form-group" style="padding-left:20px!important;">
                                        <label>Pictures<span style="color:red;">* Upload size only 5MB</span></label>
                                        <input type="hidden" id="detail_id_image" name="detail_id">
                                        <input type="file" class="form-control" name="images[]" style="width:100%!important;" multiple />
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat" id=""><i class="fa fa-upload"></i> <b>UPLOAD</b></button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                   
                                </div>
                                <br>
                                <br>
                                <div id="images-container">
                                   
                                    {{-- Image Here  --}}
                               
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   