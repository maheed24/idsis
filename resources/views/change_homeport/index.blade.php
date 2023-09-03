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
                    <div class="box" style="display:none;">
                        <div class="box-header with-border">
                            <h4><b>LIST OF CHANGE HOMEPORT</b></h4>
                            <div class="box-tools pull-right">
                                <a href="#mdlAddCOCPR" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt"
                                    style="margin-top:8px!important;"> NEW VESSEL</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="container_operation">
                                <table id="tblChangeHomeport" class="table table-striped table-bordered">
                                    <thead style="font-family:calibri;font-size:15px;">
                                        <th style="background:#367fa9;color:white;width:25%;">OFFICIAL NO</th>
                                        <th style="background:#367fa9;color:white;width:25%;">SHIP NAME</th>
                                        <th style="background:#367fa9;color:white;width:25%;">COMPANY</th>
                                        <th style="background:#367fa9;color:white;width:23%;">SHIP CLASSIFICATION</th>
                                        <th style="background:#367fa9;color:white;width:2%;">EDIT</th>
                                    </thead>
                                    <tbody style="font-family:calibri;font-size:15px;">
                                        @foreach ($Detail as $item)
                                            <tr>
                                                <td style="width:25%;">{{ $item->official_no }}</td>
                                                <td style="width:25%;">{{ $item->ship_name }}</td>
                                                <td style="width:25%;">{{ $item->company_name }}</td>
                                                <td style="width:23%;">
                                                    {{ $item->Ship_classification[0]->ship_classification_desc }}</td>
                                                <td style="width:2%;"><button style="background:#367fa9;"
                                                        class="button btn btn-success btn-sm acceptvessel btn-flat"
                                                        data-id="{{ $item->id }}"><i class="fa fa-edit"
                                                            style="width:10px;"></i></button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div id="divLoading" class="container"><img id="loading" height="150"
                            src="{{ asset('public/images/loading_vessel.gif') }}"></div>
                    <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('section.footer')
            {{-- include '../../modal/admin/modal.php'; --}}
            @include('change_homeport.modal.modal')
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        @include('co_cpr.script')
    </body>
    <script>
        $(document).ready(function() {
            fetchtblChangeHomeport();
        });
    </script>
    <script>
        $(document).on('click', '.acceptvessel', function(e) {
            e.preventDefault();
            var details_id = $(this).data('id');
            $('#mdlConfirmation').modal('show');
            $('#updatetxtdetailsidchange').val(details_id);


            $('#editForm').attr('action', '/change_homeport/' + details_id);

        });



        $('#tblChangeHomeport').DataTable({
            responsive: true,
            "bLengthChange": false,
            "iDisplayLength": 3,
            "language": {
                "emptyTable": "THERE IS NO AVAILABLE DATA FOR CHANGE IN HOMEPORT IN THE DATABASE"
            },
            "columnDefs": [{
                    "targets": [0],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                },
                {
                    "targets": [1],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                },
                {
                    "targets": [2],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                },
                {
                    "targets": [3],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                },
                {
                    "targets": [4],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                }
            ]
        });
    </script>
@endsection
