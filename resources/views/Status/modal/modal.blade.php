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
    
    
    
    <div class="modal fade" id="mdlAddStatus" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="width:80%!important;">
            <div class="modal-content">
                <div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>CREATE NEW STATUS</b></h4>
                  </div>
                  <div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:0px;">
                    <form id="AddStatusForms" action="{{ url('Status') }}" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
                        {!! csrf_field() !!}
                        {{-- <input type="hidden" class="form-control clear" name="action" value="add" style="width:100%!important;" required /> --}}
                        <div id="add_status_msg"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                    <label>Status</label>
                                    <input type="text" class="form-control clear" name="status_desc" id="addtxtstatusdesc" style="width:100%!important;" required />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
                            <button type="submit" class="btn btn-primary submitBtn"><i class="fa fa-save"></i> <b>SAVE</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- UPDATE STATUS -->
    <div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="width:80%!important;">
            <div class="modal-content">
                <div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>UPDATE STATUS</b></h4>
                  </div>
                  <div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:0px;">
                    <form id="editForm" action="/Status" class="form-horizontal" method="POST"  style="margin-top:10px;!important">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <input type="hidden" class="form-control clear" name="id" id="id" style="width:100%!important;" required />
                        {{-- <input type="hidden" class="form-control clear" name="action" value="update" style="width:100%!important;" required /> --}}
                        <div id="edit_status_msg"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group" style="padding-left:20px!important;padding-right:20px!important;">
                                    <label>Status</label>
                                    <input type="text" class="form-control clear" name="status_desc" id="status_desc" style="width:100%!important;" required />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> <b>CLOSE</b></button>
                            <button type="submit" class="btn btn-primary submitBtn"><i class="fa fa-save"></i> <b>UPDATE</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>