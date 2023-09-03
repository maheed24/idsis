<div class="modal fade" id="mdlConfirmation" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#367fa9;color:white;font-family:calibri;font-size:16px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-family:calibri;font-size:16px;"><b>CONFIRMATION MESSAGE</b></h4>
              </div>
              <div class="modal-body" style="font-family:calibri;font-size:14px;font-weight:normal;padding-bottom:0px;">
                <form id="editForm" class="form-horizontal" action="/change_homeport" method="POST" id="frmAcceptHomeport1"  style="margin-top:10px;!important">
                    {!! csrf_field() !!}
                     @method("PATCH")
                    <input type="hidden" class="form-control" name="id" id="updatetxtdetailsidchange" style="width:100%!important;" />
                    <input type="hidden" class="form-control" name="change_homeport"  style="width:100%!important;"  value="0"/>
                    {{-- <input type="hidden" class="form-control" name="action" id="updatetxtaction" value="change" style="width:100%!important;" /> --}}
                    <div id="accept_change_msg"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group" id="container_reset" style="padding-left:20px!important;padding-right:20px!important;text-align:center;font-size:18px;text-align:center;font-weight:bold;">
                                Do you really want to accept Vessel Change of Homeport?
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer atap">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> <b>CLOSE</b></button>
                        <button type="submit" class="btn btn-primary btn-flat" id="btnUpdateChangeHomeport"><i class="fa fa-save"></i> <b>OK</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>