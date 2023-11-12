<title>{{ $certificate->cert_type[0]->cert_type_desc }}</title>
<style>
    body {
        margin-top: 150px;
        margin-bottom: 5px;
        margin-right: 25px;
        margin-left: 25px;
    }

    table,
    th,
    td {
        border: 1px solid;
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 12px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }


    .header {
        font-family: Arial, sans-serif;
        font-size: 18px;
        text-align: center;
    }

    .header2 {
        font-family: Arial, sans-serif;
        font-size: 15px;
        text-align: center;
    }

    .value {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        text-align: center;
        line-height: 23px;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        line-height: 0cm;
    }

    .p2 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 0px;
        line-height: 20px;
        font-size: 15px;
    }

    .p3 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        font-size: 10px;
    }
</style>

<body>
    <h3 class="header">CERTIFICATE</h3>
    <p class="p1" style='text-align: center'><b>(Private/Commercial Use)</b>
    </p>
    <br>

    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>THIS IS TO CERTIFY THAT</b>
        pursuant to Section 10 of Republic Act No. 9295 and Section 12 of
        Executive Order No. 125-A and Memorandum Circular No. DS-2019-01,<u><b
                class="value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{ $Details[0]->ship_name }}___________</b></u><br>having made the required declaration, deposses and
        says that:
    </p>

    <table>

        <tr>
            <td style="width:35%">Owner/Company </td>
            <td style="width:35%">Business Address </td>
            <td style="width:30%;">Nationality</td>


        </tr>
        <tr>
            <td>
                <center> <b class="value">{{ $Details[0]->company_name }}</b></center>
            </td>
            <td>
                <center><b class="value">{{ $Details[0]->business_address }}</b></center>
            </td>
            <td>
                <center><b class="value">{{ $Details[0]->nationality }}</b></center>
            </td>
        </tr>
    </table>
    <p class="p2">is the owner/operator of the herein named and described vessel.</p>
    <table>
        <tr>
            <td style="width:25%;">Name of Vessel <br>
                <center>
                    <b class="value">{{ $Details[0]->ship_name }}</b>
                </center>
            </td>
            <td style="width:25%;">Body Number <br>
                <center>
                    <b class="value">{{ $Details[0]->body_no }}&nbsp;&nbsp;</b>
                </center>
            </td>
            <td style="width:25%;">Call Sign <br>
                <center>
                    <b class="value">{{ $Details[0]->call_sign }}</b>
                </center>
            </td>
            <td style="width:25%;">Officail No <br>
                <center>
                    <b class="value">{{ $Details[0]->official_no }}</b>
                </center>
            </td>
        </tr>
    </table>
    <h3 class="header">GENERAL PARTICULARS</h3>
    <table>
        <tr>
            <td style="width:35%;">Type of Recreational Boat<br>
                <center>
                    <b class="value">{{ $ship_type[0]->ship_type_desc }}</b>
                </center>
            </td>
            <td style="width:35%;">Hull Material<br>
                <center>
                    <b class="value">{{ $hull_material[0]->hull_material_desc }}</b>
                </center>
            </td>
            <td style="width:30%;">Home Port<br>
                <center>
                    <b class="value">{{ $Details[0]->home_port }}&nbsp;&nbsp;</b>
                </center>
            </td>
        </tr>
        <tr>
            <td style="width:35%;">Builder<br>
                <center>
                    <b class="value">{{ $Details[0]->builder }}</b>
                </center>
            </td>
            <td style="width:35%;">Place Built<br>
                <center>
                    <b class="value">{{ $Details[0]->place_built }}</b>
                </center>
            </td>
            <td style="width:30%;">Year Built<br>
                <center>
                    <b class="value">{{ $Details[0]->year_built }}&nbsp;&nbsp;</b>
                </center>
            </td>
        </tr>

    </table>
    <table>
        <tr>
            <td style="width:50%;">Former Vessel Name<br>
                <center><b class="value">{{ $Details[0]->former_ship_name }}</b></center>
            </td>
            <td style="width:50%;">Former Owner<br>
                <center><b class="value">{{ $Details[0]->former_owner }}</b></center>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width:25%;">Gross Tonnage<br>
                <center><b class="value">{{ $Details[0]->gross_tonnage }}</b></center>
            </td>
            <td style="width:25%;">Length (Meter)<br>
                <center><b class="value">{{ $Details[0]->length }}</b></center>
            </td>
            <td style="width:25%;">Breadth (Meter) <br>
                <center><b class="value">{{ $Details[0]->breadth }}</b></center>
            </td>
            <td style="width:25%;">Depth (Meter)
                <br>
                <center><b class="value">{{ $Details[0]->depth }}</b></center>
            </td>
        </tr>
    </table>
    <h3 class="header">PROPULSION PARTICULARS</h3>
    <table>
        <tr>
            <td style="width:25%;">No. of Engine</td>
            <td style="width:25%;">Engine Make</td>
            <td style="width:25%;">Serial Number</td>
            <td style="width:25%;">KW</td>
        </tr>
        @foreach ($results as $item)
            <tr>
                <td>
                    <center> <b class="value2">{{ $item->rank }}
                        </b></center>
                </td>
                <td>
                    <center> <b class="value2">{{ $item->engine_make }}
                        </b></center>
                </td>
                <td>
                    <center> <b class="value2">{{ $item->serial_no }}
                        </b></center>
                </td>
                <td>
                    <center> <b class="value2">{{ $item->horsepower }}
                        </b></center>
                </td>
            </tr>
        @endforeach
    </table>



    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHEREAS, the Maritime Industry
        Authority has approved the registration of the above vessel,
        after compliance by the owner with the requirements for registration.
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHEREFORE,
        _______<b><u>{{ $Details[0]->ship_name }}</u></b>_______
        is hereby entered in the Recreational Boat Registry and is entitled to the rights appurtenant thereto
        and the protection of the Government of the Republic of the Philippines.
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued by the Authority of the
        Government of the Philippines under my hand and seal at
        {{$office_place}} this {{$date_issued}}.
    </p>

    <p class="p2" style='text-align: right'>
        <br>
         <b>ATTY. ABUBAKAR A. KATAMBAK</b> <br>
               Regional Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <br><br><br>
    <p class="p3" style='text-align: left'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{$or_number}} <br>
        Date: {{$or_date}}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>

</body>
