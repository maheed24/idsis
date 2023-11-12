<title>{{ $certificate->cert_type[0]->cert_type_desc }}</title>
<style>
    body {
        margin-top: 140px;
        margin-bottom: 10px;
        margin-right: 25px;
        margin-left: 25px;
    }

    table,
    th,
    td {
        border: 1px solid;
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 10px;
    }
    .value2{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        text-align: center;
        line-height: 20px;
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
        line-height: 30px;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        line-height: -5cm;
    }

    .p2 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        line-height: 20px;
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
                {{ $Details[0]->principal_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u> <br>having made the
        required declaration, deposses and says that:
    </p>


    <table>

        <tr>
            <td style="width:50%">Owner/Company <br>

            </td>
            <td style="width:50%;">Business Address<br>

            </td>
        </tr>
        <tr>
            <td>
                <center> <b class="value">{{ $Details[0]->company_name }}</b></center>
            </td>
            <td>
                <center><b class="value">{{ $Details[0]->business_address }}</b></center>
            </td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>is the owner/operator of the herein named and described vessel.</p>
    <table>
        <tr>
            <td style="width:25%;">Name of Ship
                <center><b class="value">{{ $Details[0]->ship_name }}</b></center>
            </td>
            <td style="width:25%;">Official Number
                <center><b class="value">{{ $Details[0]->official_no }}</b></center>
            </td>
            <td style="width:25%;">Call Sign
                <center><b class="value">{{ $Details[0]->call_sign }}</b></center>
            </td>
            <td style="width:25%;">IMO Number <br>
                <center><b class="value">{{ $Details[0]->imo_no }}</b></center>
            </td>
        </tr>
    </table>
    <h4 class="header2">GENERAL PARTICULARS OF THE SHIP</h4>
    <table>
        <tr>
            <td style="width:30%;">Type of Ship <br>
                <center><b class="value">{{ $ship_classification[0]->ship_classification_desc }}</b></center>
            </td>
            <td style="width:35%;">Trading area<br>
                <center><b class="value">{{ $trading_area[0]->trading_area }}</b></center>
            </td>
            <td style="width:35%;">Homeport<br>
                <center><b class="value">{{ $Details[0]->homeport }}</b></center>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">Builder <br>
                <center><b class="value">{{ $Details[0]->builder }}</b></center>
            </td>
            <td style="width:35%;">Place Builder <br>
                <center><b class="value">{{ $Details[0]->place_built }}</b></center>
            </td>
            <td style="width:35%;">Year Built <br>
                <center><b class="value">{{ $Details[0]->year_built }}</b></center>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width:30%;">Former Vessel Name<br>
                <center><b class="value">{{ $Details[0]->former_ship_name }}</b></center>
            </td>
            <td style="width:70%;">Former Owner <br>
                <center><b class="value">{{ $Details[0]->former_owner }}</b></center>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width:30%;">No of Masts
                <center><b class="value">{{ $Details[0]->no_masts }}-000048</b></center>
            </td>

            <td style="width:35%;">No of Decks
                <center><b class="value">{{ $Details[0]->no_decks }}</b></center>
            </td>

            <td style="width:35%;">Hull Material <br>
                <center><b class="value">{{ $hull_material[0]->hull_material_desc }}</b></center>
            </td>

        </tr>

    </table>
    <table>
        <tr>
            <td style="width:17%;">Length (Meter)<br>
                <center> <b class="value">{{ $Details[0]->length }} m
                    </b></center>
            </td>
            <td style="width:17%;">Breadth (Meter)<br>
                <center> <b class="value">{{ $Details[0]->breadth }}
                    </b></center>
            </td>
            <td style="width:17%;">Depth (Meter)<br>
                <center> <b class="value">{{ $Details[0]->depth }}
                    </b></center>
            </td>
            <td style="width:17%;">Gross Tonnage<br>
                <center> <b class="value">{{ $Details[0]->gross_tonnage }}
                    </b></center>
            </td>
            <td style="width:17%;">Net Tonnage<br>
                <center> <b class="value">{{ $Details[0]->net_tonnage }}
                    </b></center>
            </td>
            <td style="width:17%;">Deadweight<br>
                <center> <b class="value">{{ $Details[0]->deadweight }}
                    </b></center>
            </td>
        </tr>

    </table>
    <h4 class="header2">PARTICULARS OF PROPULSION SYSTEM</h4>

    <table>
        <tr>
            <td style="width:17%;">No. of Engine<br>

            </td>
            <td style="width:17%;">Engine Make<br>

            </td>
            <td style="width:17%;">Serial Number<br>

            </td>
            <td style="width:17%;">KW<br>

            </td>
            <td style="width:17%;">No. of Cylinder<br>

            </td>
            <td style="width:17%;">Cycle<br>

            </td>
        </tr>
        @foreach($results as $item)
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
                <td>
                    <center> <b class="value2">{{ $item->no_cyclinder }}
                        </b></center>
                </td>
                <td>
                    <center> <b class="value2">{{ $item->cycle }}
                        </b></center>
                </td>
            </tr>
            @endforeach
    </table>


    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHEREAS, the Maritime Industry
        Authority has approved the registration of the above named
        ship, after compliance by the owner with the requirements for registration.



    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHEREFORE,
        ____<b><u>{{ $rig_type[0]->rig_type_desc }}</u></b><b><u>"{{ $Details[0]->ship_name }}"</u></b>____
        is hereby entered in the Register of the Philippine Ships and is entitled to the rights appurtenant
        thereto and the protection of the Government of the Republic of the Philippines.
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

    <p class="p3" style='text-align: left'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{$or_number}} <br>
        Date: {{$or_date}}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>

</body>
