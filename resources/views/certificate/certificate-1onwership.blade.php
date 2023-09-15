<title>{{ $certificate->cert_type[0]->cert_type_desc }}</title>
<style>
    body {
        margin-top: 150px;
        margin-bottom: 100px;
        margin-right: 25px;
        margin-left: 25px;
    }

    table,
    th,
    td {
        border: 1px solid;
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 11px;
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
        font-size: 14px;
        text-align: center;
        line-height: 30px;
    }

    .value1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        text-align: center;
        line-height: 15px;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        line-height: -5cm;
    }

    .p2 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        line-height: 25px;
        font-size: 14px;
    }

    .p3 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        font-size: 10px;
    }
</style>

<body>
    <h3 class="header">{{ $certificate->cert_type[0]->cert_type_desc }}</h3>

    <br>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>THIS IS TO CERTIFY THAT</b>
        pursuant to Section 10 of Republic Act No. 9295 and Section 12 of
        Executive Order No. 125-A &nbsp;<u><b class="value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{ $Details[0]->ship_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u>
    </p>
    <p class="p2" style='text-align: justify'>having made the required declaration, deposses and says that:</p>

    <table>

        <tr>
            <td style="width:50%">Owner/Company <br>

            </td>
            <td style="width:50%;">Business Address<br>

            </td>
        </tr>
        <tr>
            <td>
                <center> <b class="value">{{ $Details[0]->principal_name }}</b></center>
            </td>
            <td>
                <center><b class="value">{{ $Details[0]->business_address }}</b></center>
            </td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>is the owner/operator of the herein named and described vessel.</p>
    <h4 class="header2">GENERAL PARTICULARS OF THE SHIP</h4>
    <table>
        <tr>
            <td style="width:50%;">Name of Ship
                <center><b class="value">{{ $Details[0]->ship_name }}</b></center>
            </td>

            <td style="width:25%;">Official Number
                <center><b class="value">{{ $Details[0]->official_no }}</b></center>
            </td>

            <td style="width:25%;">IMO Number <br>
                <center><b class="value">{{ $Details[0]->imo_no }}</b></center>
            </td>

        </tr>

    </table>
    <table>
        <tr>
            <td style="width:50%;">Former Ship Name<br>
                <center><b class="value">{{ $Details[0]->former_ship_name }}</b></center>
            </td>
            <td style="width:50%;">Type of Ship <br>
                <center><b class="value">{{ $ship_type[0]->ship_type_desc }}</b></center>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width:50%;">Former Owner<br>
                <center><b class="value">{{ $Details[0]->former_owner_name }}</b></center>
            </td>
            <td style="width:50%;">Trading Area <br>
                <center><b class="value">{{ $trading_area[0]->trading_areas_desc }}</b></center>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width:50%;">Builder
                <center><b class="value">{{ $Details[0]->builder }}</b></center>
            </td>

            <td style="width:25%;">Place of Built
                <center><b class="value">{{ $Details[0]->place_built }}</b></center>
            </td>

            <td style="width:25%;">Year Built <br>
                <center><b class="value">{{ $Details[0]->year_built }}</b></center>
            </td>

        </tr>

    </table>
    <table>
        <tr>
            <td style="width:50%;">Converted by / Modified by / Rebuilt by
                <center><b class="value">{{ $Details[0]->modified_by }}</b></center>
            </td>

            <td style="width:25%;">Place Converted
                <center><b class="value">{{ $Details[0]->place_modified }}</b></center>
            </td>

            <td style="width:25%;">Year Converted <br>
                <center><b class="value">{{ $Details[0]->year_modified }}</b></center>
            </td>

        </tr>

    </table>
    <table>
        <tr>
            <td style="width:25%;">Registered Lenght<br>
                <center> <b class="value">{{ $Details[0]->length }}
                    </b></center>
            </td>
            <td style="width:25%;">Gross Tonnage<br>
                <center> <b class="value">{{ $Details[0]->gross_tonnage }}
                    </b></center>
            </td>
            <td style="width:25%;">Number of Screw<br>
                <center> <b class="value">{{ $Details[0]->no_screw }}
                    </b></center>
            </td>
            <td style="width:25%;">Number of Masts<br>
                <center> <b class="value">{{ $Details[0]->no_masts }}
                    </b></center>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width:25%;">Breadth (meter)<br>
                <center> <b class="value">{{ $Details[0]->breadth }}
                    </b></center>
            </td>
            <td style="width:13%;">Net Tonnage<br>
                <center> <b class="value">{{ $Details[0]->net_tonnage }}
                    </b></center>
            </td>
            <td style="width:12%;">Deadweight<br>
                <center> <b class="value">{{ $Details[0]->deadweight }}
                    </b></center>
            </td>
            <td style="width:25%;">Number of Engine<br>
                <center> <b class="value">{{ $no->no }}
                    </b></center>
            </td>
            <td style="width:25%;">Number of Decks<br>
                <center> <b class="value">{{ $Details[0]->no_decks }}
                    </b></center>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width:25%;">Depth (meter)<br>
                <center> <b class="value">{{ $Details[0]->depth }}
                    </b></center>
            </td>
            <td style="width:25%;">Hull Material<br>
                <center> <b class="value">{{ $hull_material[0]->hull_material_desc }}
                    </b></center>
            </td>
            <td style="width:25%;">Type of Stem<br>
                <center> <b class="value">{{ $stem_type[0]->stem_type_desc }}
                    </b></center>
            </td>
            <td style="width:25%;">Type of Stern<br>
                <center> <b class="value">{{ $stern_type[0]->stern_type_desc }}
                    </b></center>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width:25%;">Engine Make<br>
                @foreach ($ship_propulsion as $item)
                    <center> <b class="value1">{{ $item->engine_make }}
                        </b></center>
                @endforeach
            </td>
            <td style="width:13%;">KW<br>
                @foreach ($ship_propulsion as $item)
                    <center> <b class="value1">{{ $item->horsepower }}
                        </b></center>
                @endforeach
            </td>
            <td style="width:12%;">Cycle<br>
                @foreach ($ship_propulsion as $item)
                    <center> <b class="value1">{{ $item->cycle }}
                        </b></center>
                @endforeach
            </td>
            <td style="width:25%;">Number of Cyclinder<br>
                @foreach ($ship_propulsion as $item)
                    <center> <b class="value1">{{ $item->no_cyclinder }}
                        </b></center>
                @endforeach
            </td>
            <td style="width:25%;">Serial Number<br>
                @foreach ($ship_propulsion as $item)
                    <center> <b class="value1">{{ $item->serial_no }}
                        </b></center>
                @endforeach
            </td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued by the Authority of the
        Government of the Philippines under my hand and seal at
        {{ $office_place }} this {{ $date_issued }}.


    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This License is valid from
        {{ $date_issued }} to {{$date_validity}}.
    </p>

    <p class="p2" style='text-align: right'>
        By the Authority of the Administrator: <br><br>
        <b> ATTY. ABUBAKAR A. KATAMBAK</b>
    </p>

    <p class="p3" style='text-align: left'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{$or_number}} <br>
        Date: {{$or_date}}
    </p>

</body>
