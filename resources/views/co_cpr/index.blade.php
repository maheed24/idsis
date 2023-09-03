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
                            <h4><b>LIST OF REGISTERED VESSEL</b></h4>
                            <div class="box-tools pull-right">
                                <a href="#mdlAddCOCPR" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt"
                                    style="margin-top:8px!important;"> NEW VESSEL</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="container_operation">
                                <table id="tblCOCPR" class="table table-striped table-bordered">
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
                                                        class="button btn btn-success btn-sm editbtn btn-flat"
                                                        value="{{ $item->id }}"><i class="fa fa-edit"
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
            @include('co_cpr.modal.modal')
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        @include('co_cpr.script')
    </body>
    <script>
        //CERTIFICATE GET
        // $(document).on('click', '.editPayment', function(e) {
        //     e.preventDefault();
        //     //var cert_id = $(this).val();
        //     var id = $(this).val();

        //     $('#EditCert').show();
        //     //alert(id);

        //     $.ajax({
        //         type: "GET",
        //         url: "/edit-certificate/" + id,
        //         success: function(response) {
        //             if (response.status == 404) {
        //                 alert(response.message);

        //             } else {
        //                 $('#cert_id1').val(id);
        //                 $('#details_id1').val(response.certificate_licenses.details_id);
        //                 $('#or_no1').val(response.certificate_licenses.or_no);
        //                 $('#or_date1').val(response.certificate_licenses.or_date);
        //                 $('#cert_no1').val(response.certificate_licenses.cert_no);
        //                 $('#sec_no1').val(response.certificate_licenses.sec_no);
        //                 $('#cert_type_id1').select2().val(response.certificate_licenses.cert_type_id)
        //                     .trigger('change');
        //                 $('#amount1').val(response.certificate_licenses.amount);
        //                 $('#date_issued1').val(response.certificate_licenses.date_issued);
        //                 $('#validity1').val(response.certificate_licenses.validity);

        //             }
        //         }
        //     });
        //     $('#shiphistory').hide();
        //     $('#AddCert').hide();
        //     $('#btnAddCertPayment').hide();
        //     //getRowCert(cert_id, action);
        // });

        //DETAILS GET
        $(document).on('click', '.editbtn', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#editmodal').modal('show');
            // alert(id);

            $.ajax({
                type: "GET",
                url: "/api/edit-detail/" + id,
                data: {
                    id: id,
                },
                success: function(response) {
                    if (response.status == 404) {
                        alert(response.message);
                        $('#editmodal').modal('hide');
                    } else {

                        loadCertficateByDetailsId(response);
                        loadShipPropulsion(response);


                    }
                }
            });

        });

        function loadCertficateByDetailsId(response) {



            let detail = response.data;
            let certificate_license = response.data['certificate_licenses'];

           

            let certificateTableBody = document.getElementById('certificateTableBody');





            // Clear the existing table rows
            certificateTableBody.innerHTML = '';
            // Loop through ship_propulsions and populate the table
            certificate_license.forEach(function(certificate_license) {
                let newRow = document.createElement('tr');

                // Create table cells for properties (excluding created_at)
                let cell1 = document.createElement('td');
                cell1.textContent = certificate_license.amount;

                let cell2 = document.createElement('td');
                cell2.textContent = certificate_license.cert_type_id;

                let cell3 = document.createElement('td');
                cell3.textContent = certificate_license.date_issued;

                let cell4 = document.createElement('td');
                cell4.textContent = certificate_license.or_no;

                let cell5 = document.createElement('td');
                cell5.textContent = certificate_license.sec_no;

                let cell6 = document.createElement('td');
                cell6.textContent = certificate_license.user_id;

                let cell7 = document.createElement('td');
                cell7.textContent = certificate_license.validity;

                let cell8 = document.createElement('td');

                // Create a button element
                let button = document.createElement('button');
                button.id = 'button' + certificate_license.id; // Example: Unique ID for each button
                // button.textContent = 'Click Me';

                // Add style and class to the button
                button.style.background = '#367fa9'; // Set background color
                button.className = 'button btn btn-success btn-sm editPayment btn-flat'; // Add CSS classes

                // Create an icon element
                let icon = document.createElement('i');
                icon.className = 'fa fa-edit'; // Add the icon's CSS class (Font Awesome icon used as an example)

                // Attach the icon to the button
                button.appendChild(icon);

                // Attach a click event listener to the button with cert_type_id as a parameter
                button.onclick = function(cert_id) {
                    return function() {
                        //alert('Button Clicked for Cert Type ID: ' + certType);
                          $('#EditCert').show();
            //alert(id);

           

            $.ajax({
                type: "GET",
                url: "/api/edit-certificate/" + cert_id,
                success: function(response) {
                    if (response.status == 404) {
                        alert(response.message);

                    } else {
                      

                        let certificate_license = response.data;
                     
                        $('#cert_id1').val(certificate_license.cert_id);
                        $('#details_id1').val(certificate_license.details_id);
                        $('#or_no1').val(certificate_license.or_no);
                        $('#or_date1').val(certificate_license.or_date);
                        $('#cert_no1').val(certificate_license.cert_no);
                        $('#sec_no1').val(certificate_license.sec_no);
                        $('#cert_type_id1').select2().val(certificate_license.cert_type_id)
                            .trigger('change');
                        $('#amount1').val(certificate_license.amount);
                        $('#date_issued1').val(certificate_license.date_issued);
                        $('#validity1').val(certificate_license.validity);

                    }
                }
            });

            $('#shiphistory').hide();
            $('#AddCert').hide();
            $('#btnAddCertPayment').hide();
            //getRowCert(cert_id, action);
        
                    };
                }(certificate_license.cert_id); // Pass certificate_license.cert_type_id as a parameter

                // Append the button to the cell
                cell8.appendChild(button);

                let cell9 = document.createElement('td');

                // // Create an input field
                // let input = document.createElement('input');
                // input.type = 'text';
                // input.value = certificate_license.cert_type_id;


                 // Create a button element for view
                 let button1 = document.createElement('button');
                button1.id = 'button 1' + certificate_license.id; // Example: Unique ID for each button
                // button.textContent = 'Click Me';

                // Add style and class to the button
                button1.style.background = '#367fa9'; // Set background color
                button1.className = 'button btn btn-success btn-sm editPayment btn-flat'; // Add CSS classes

                // Create an icon element
                let icon1 = document.createElement('i');
                icon1.className = 'fa fa-eye'; // Add the icon's CSS class (Font Awesome icon used as an example)

                // Attach the icon to the button
                button1.appendChild(icon1);

                // Append the input field to cell9
                //cell9.appendChild(input);
                cell9.appendChild(button1);

                // Append the cells to the row
                newRow.appendChild(cell1);
                newRow.appendChild(cell2);
                newRow.appendChild(cell3);
                newRow.appendChild(cell4);
                newRow.appendChild(cell5);
                newRow.appendChild(cell6);
                newRow.appendChild(cell7);
                newRow.appendChild(cell8);
                newRow.appendChild(cell9);

                // Append the row to the table body
                certificateTableBody.appendChild(newRow);
            });



            $('#id').val(detail.id);
            $('#detail_id').val(detail.id);
            $('#details_id').val(detail.id);
            $('#updatetxtprincipalname').val(detail.principal_name);
            $('#updatetxtcompanyname').val(detail.company_name);
            $('#updatetxtbusinessaddress').val(detail.business_address);
            $('#updatetxtshipname').val(detail.ship_name);
            $('#updatetxtofficialno').val(detail.official_no);
            $('#updatetxtimono').val(detail.imo_no);
            $('#updatetxtformershipname').val(detail.former_ship_name);
            $('#updatetxtformerowner').val(detail.former_owner);
            $('#updateddlshipclassificationdetailsid').select2().val(detail.ship_classification_id).trigger('change');
            $('#updateddlshiptypedetailsid').select2().val(detail.ship_type_id).trigger('change');
            $('#updateddltradingareaid').select2().val(detail.trading_area_id).trigger('change');
            $('#updatetxtbuilder').val(detail.builder);
            $('#updatetxtplacebuilt').val(detail.place_built);
            $('#updatetxtyearbuilt').val(detail.year_built);
            $('#updatetxtmodifiedby').val(detail.modified_by);
            $('#updatetxtplacemodified').val(detail.place_modified);
            $('#updatetxtyearmodified').val(detail.year_modified);
            $('#updatetxtlength').val(detail.length);
            $('#updatetxtgrosstonnage').val(detail.gross_tonnage);
            $('#updatetxtnoscrew').val(detail.no_screw);
            $('#updatetxtnomasts').val(detail.no_masts);
            $('#updatetxtbreadth').val(detail.breadth);
            $('#updatetxtnettonnage').val(detail.net_tonnage);
            $('#updatetxtdeadweight').val(detail.deadweight);
            $('#updatetxtnodecks').val(detail.no_decks);
            $('#updatetxtdepth').val(detail.depth);
            $('#updateddlhullmaterialid').select2().val(detail.hull_material_id).trigger('change');
            $('#updateddlsterntypeid').select2().val(detail.stern_type_id).trigger('change');
            $('#updateddlstemtypeid').select2().val(detail.stem_type_id).trigger('change');
            $('#updateddlrigtypeid').select2().val(detail.rig_type_id).trigger('change');
            $('#updateddloperationid').select2().val(detail.operation_id).trigger('change');
            $('#updatetxtcallsign').val(detail.call_sign);
            $('#updateddlprovinceid').val(detail.province);
            $('#updatetxtnationality').val(detail.nationality);
            $('#updatetxtbodyno').val(detail.body_no);
            $('#updatetxthomeport').val(detail.homeport);
            $('#updateddlacquisitiontypeid').select2().val(detail.acquisition_type_id).trigger('change');
            $('#editForm').attr('action', '/co_cpr/' + detail.id);


        }




        function loadShipPropulsion(response) {
    let ship_propulsions = response.data['ship_propulsions'];
    let propulsionTableBody = document.getElementById('propulsionTableBody');

    // Clear the existing table rows
    propulsionTableBody.innerHTML = '';

    // Loop through ship_propulsions and populate the table
    ship_propulsions.forEach(function (ship_propulsion) {
        let newRow = document.createElement('tr');

        // Create table cells for properties (excluding created_at)
        let cell1 = document.createElement('td');
        cell1.textContent = ship_propulsion.engine_make;

        let cell2 = document.createElement('td');
        cell2.textContent = ship_propulsion.serial_no;

        let cell3 = document.createElement('td');
        cell3.textContent = ship_propulsion.horsepower;

        let cell4 = document.createElement('td');
        cell4.textContent = ship_propulsion.no_cyclinder;

        let cell5 = document.createElement('td');
        cell5.textContent = ship_propulsion.no_cyclinder;

        let cell6 = document.createElement('td');
        cell6.textContent = ship_propulsion.status_id;

        let cell7 = document.createElement('td');

        if (ship_propulsion.status_id === 1) {
            cell6.textContent = 'Active';
        }
        if (ship_propulsion.status_id === 2) {
            cell6.textContent = 'InActive';
        }

        let edittableRow = document.createElement('tr');
        edittableRow.style.display = 'none';

        // Create cell object
        let cell8 = document.createElement('td');
        let button = document.createElement('button');
        button.id = 'button' + ship_propulsion.id; // Example: Unique ID for each button

        // Add style and class to the button
        button.style.background = '#367fa9'; // Set background color
        button.className = 'button btn btn-success btn-sm updateshippropulsion btn-flat'; // Add CSS classes

        // Create an icon element
        let icon = document.createElement('i');
        icon.className = 'fa fa-edit'; // Add the icon's CSS class (Font Awesome icon used as an example)

        // Attach the icon to the button
        button.appendChild(icon);

        // Attach a click event listener to the button
      // Attach a click event listener to the button
button.onclick = function () {
    // Toggle the display property of the hidden row between 'none' and an empty string to show/hide it
    edittableRow.style.display = edittableRow.style.display === 'none' ? '' : 'none';
};


        cell7.appendChild(button);

        // Append the cells to the row
        newRow.appendChild(cell1);
        newRow.appendChild(cell2);
        newRow.appendChild(cell3);
        newRow.appendChild(cell4);
        newRow.appendChild(cell5);
        newRow.appendChild(cell6);
        newRow.appendChild(cell7);

        // Append the row to the table body
        propulsionTableBody.appendChild(newRow);
        propulsionTableBody.appendChild(addEditRow(edittableRow, ship_propulsion));
    });
}

// Function to create an editable row
function addEditRow(newRow, ship_propulsion) {
    // Create input fields and elements for the new row
    let input1 = createInput('text', 'details_id', 'detail_id', 'width:100%!important;');
    input1.value = ship_propulsion.details_id; // Set default value
    input1.style.display = 'none'; // Hide the input element

    let idinput = createInput('text', 'id', 'id', 'width:100%!important;');
    idinput.value = ship_propulsion.id; // Set default value
    idinput.style.display = 'none'; // Hide the input element

    let td1 = document.createElement('td');
    td1.appendChild(input1);
    td1.appendChild(idinput);

    let input2 = createInput('text', 'engine_make', 'engine_make', 'width:100%!important;');
    input2.value = ship_propulsion.engine_make; // Set default value
    let td2 = document.createElement('td');
    td2.appendChild(input2);

    let input3 = createInput('number', 'horsepower', 'horsepower', 'width:100%!important;', 0, 0.01);
    input3.value = ship_propulsion.horsepower; // Set default value
    let td3 = document.createElement('td');
    td3.appendChild(input3);

    let input4 = createInput('text', 'serial_no', 'serial_no', 'width:100%!important;');
    input4.value = ship_propulsion.serial_no; // Set default value
    let td4 = document.createElement('td');
    td4.appendChild(input4);

    let input5 = createInput('number', 'no_cyclinder', 'no_cyclinder', 'width:100%!important;', 0);
    input5.value = ship_propulsion.no_cyclinder; // Set default value
    let td5 = document.createElement('td');
    td5.appendChild(input5);

    let input6 = createInput('number', 'cycle', 'cycle', 'width:100%!important;', 0);
    input6.value = ship_propulsion.cycle; // Set default value
    let td6 = document.createElement('td');
    td6.appendChild(input6);

    let select = createSelect('status_id', 'status_id', 'width:100%!important;');
    select.innerHTML = '<option value="1">ACTIVE</option><option value="2">INACTIVE</option>';
    select.value = ship_propulsion.status_id; // Set default value
    let td7 = document.createElement('td');
    td7.appendChild(select);

    let td8 = document.createElement('td');
    let button = createButton('button', 'btn btn-primary btn-flat ', '', '<i class="fa fa-save"></i> Submit');
    button.addEventListener('click', function () {
        let my_current_data = {
            'id': idinput.value,
            'details_id': input1.value,
            'engine_make': input2.value,
            'horsepower': input3.value,
            'serial_no': input4.value,
            'no_cyclinder': input5.value,
            'cycle': input6.value,
            'status_id': select.value,
        };

        updateShipPropulsion(newRow,my_current_data);
    });
    td8.appendChild(button);

    let td9 = document.createElement('td');

    // Append the table cells to the new row
    newRow.appendChild(td1);
    newRow.appendChild(td2);
    newRow.appendChild(td3);
    newRow.appendChild(td4);
    newRow.appendChild(td5);
    newRow.appendChild(td6);
    newRow.appendChild(td7);
    newRow.appendChild(td8);
    newRow.appendChild(td9);

    return newRow;
}

// Function to update ship propulsion
function updateShipPropulsion(edittableRow,data) {
    $.ajax({
        type: 'GET', // Change to POST
        url: '/api/update-ship',
        data: data, // Pass the data object directly
        dataType: 'json',
        success: function (response) {
            window.location.reload();
            edittableRow.style.display = edittableRow.style.display === 'none' ? '' : 'none';
        },
        error: function (err) {
            $('#update_co_cpr_msg').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>" + err + '</b> </div>');
        }
    });
}
function createInput(type, name, id, style, min = null, step = null) {
    let input = document.createElement('input');
    input.type = type;
    input.name = name;
    input.id = id;
    input.style = style;
    if (min !== null) {
        input.min = min;
    }
    if (step !== null) {
        input.step = step;
    }
    return input;
}

function createSelect(name, id, style) {
    let select = document.createElement('select');
    select.name = name;
    select.id = id;
    select.style = style;
    return select;
}

function createButton(type, className, id, innerHTML) {
    let button = document.createElement('button');
    button.type = type;
    button.className = className;
    button.id = id;
    button.innerHTML = innerHTML;
    return button;
}

    </script>
    <script>
        $(document).ready(function() {
            fetchtblVessel();
        });
    </script>
    <script>
        $('#tblCOCPR').DataTable({
            responsive: true,
            "bLengthChange": false,
            "iDisplayLength": 3,
            "language": {
                "emptyTable": "THERE IS NO AVAILABLE DATA FOR TYPE OF CERTIFICATE IN THE DATABASE"
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


    <script>
        $('#tblShipPropulsionDetails').DataTable({
            responsive: true,
            "bLengthChange": false,
            "iDisplayLength": 6,
            "language": {
                "emptyTable": "THERE IS NO AVAILABLE DATA FOR ACCESS IN THE DATABASE"
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
                    "orderable": false
                },
                {
                    "targets": [2],
                    "visible": true,
                    "searchable": true,
                    "orderable": false
                },
                {
                    "targets": [3],
                    "visible": true,
                    "searchable": true,
                    "orderable": false
                },
                {
                    "targets": [4],
                    "visible": true,
                    "searchable": true,
                    "orderable": false
                },
                {
                    "targets": [5],
                    "visible": true,
                    "searchable": true,
                    "orderable": false
                },
                {
                    "targets": [6],
                    "visible": true,
                    "searchable": true,
                    "orderable": false
                },
                {
                    "targets": [7],
                    "visible": true,
                    "searchable": true,
                    "orderable": false
                }
            ]
        });

        $('#addtxtenginemakeps, #addtxtserialnops, #updatetxtserialnops, #updatetxtshippropulsionid').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });


        $('#tblShipInfoHist').DataTable({
            responsive: true,
            "bLengthChange": false,
            "bInfo": false,
            "iDisplayLength": 3,
            "language": {
                "emptyTable": "THERE IS NO AVAILABLE DATA FOR ACCREDITED COMPANY IN THE DATABASE"
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
                },
                {
                    "targets": [5],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                },
                {
                    "targets": [6],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                },
                {
                    "targets": [7],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                },
                {
                    "targets": [8],
                    "visible": true,
                    "searchable": true,
                    "orderable": true
                }
            ]
        });
    </script>
@endsection
