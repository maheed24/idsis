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
        line-height: 15px;
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
        font-size: 14px;
        text-align: left;
        margin-bottom: 10px;
    }

    .value {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        text-align: center;
        line-height: 30px;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        line-height: 0cm;
    }

    .p2 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 0px;
        line-height: 20px;
        font-size: 13px;
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
    <br>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued by the Maritime Industry
        Issued under the provisions of the PHILIPPINE MERCHANT MARINE RULES AND REGULATIONS (PMMRR)
        1997 and its subsequent amendments, and the relevant International Maritime Convention relating thereto.
    </p>
    <h5 class="header2">Information of Ship:</h5>

    <table>
        <tr>
            <td style="width:25%;">Name of Ship
                <br><br>
                <center><b class="value">{{$Details[0]->ship_name}}</b></center>
            </td>

            <td style="width:25%;">Official Number
                <br><br>
                <center><b class="value">{{$Details[0]->official_no}}</b></center>
            </td>
            </td>
            <td style="width:25%;">Home Port <br><br>
                <center><b class="value">{{$Details[0]->home_port}} &nbsp;</b></center>
            </td>
            </td>
            <td style="width:25%;">Date of Built <br> <br>
                <center><b class="value">{{$Details[0]->year_built}}</b></center>
            </td>
            <td style="width:25%;">Category of Operation <br><br>
                <center><b class="value">{{$trading_area[0]->trading_areas_desc}}</b></center>
            </td>

        </tr>
        <tr>
            <td style="width:25%;">Ship-Owner/Company<br><br>
                <center><b class="value">{{$Details[0]->company_name}}</b></center>
            </td>

            <td style="width:25%;">IMO Number<br><br>
                <center><b class="value">{{$Details[0]->imo_no}}</b></center>
            </td>
            </td>
            <td style="width:25%;">Gross Tonnage <br><br>
                <center><b class="value">{{$Details[0]->gross_tonnage}}</b></center>
            </td>
            </td>
            <td style="width:25%;">Kilowatt <br><br>
                <center><b class="value">---</b></center>
            </td>
            <td style="width:25%;">Class/Type of Reg. <br><br>
                <center><b class="value">{{$rig_type[0]->rig_type_desc}}</b></center>
            </td>

        </tr>
        <tr>
            <td style="width:25%;">Business Address: <br><br>
                <center><b class="value">{{$Details[0]->business_address}}</b></center>
            </td>

            <td style="width:25%;">Call Sign<br><br>
                <center><b class="value">{{$Details[0]->call_sign}}</b></center>
            </td>
            </td>
            <td style="width:25%;">Net Tonnage  <br><br>
                <center><b class="value">{{$Details[0]->net_tonnage}}</b></center>
            </td>
            </td>
            <td style="width:25%;">Engine Make <br><br>
                <center><b class="value">{{$Details[0]->builder}}</b></center>
            </td>
            <td style="width:25%;">LOA/Hull  <br><br>
                <center><b class="value">{{$hull_material[0]->hull_material_desc}}</b></center>
            </td>

        </tr>

    </table>


    <h5 class="header2">THIS IS TO CERTIFY:</h5>

    <p class="p2" style='text-align: justify'>
      1. That the ship has been inspected in accordance with the requirements of Regulation 11/2 of the PMMRR, 1997 &nbsp;&nbsp;&nbsp;&nbsp;and its 
        its subsequent amendments, and the relevant international maritime convention. <br>
       2. That the inspection showed that at the time of inspection, the condition of the structure, machinery and equipments &nbsp;&nbsp;&nbsp;&nbsp;as 
        define in the above regulation was satisfactory and the ship complied with the requirements of the PMMRR, &nbsp;&nbsp;&nbsp;&nbsp;1997 and
        its subsequent amendments, and the relevant international maritime conventions. <br>
       3. That the last inspection of the outside ship's bottom took place on {{$date_issue}}. <br>
       4. That an Exemption Certificate has/has not been issued.
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Certificate is valid until {{$valid_date}} subject to the annual inspections in accordance with the requirements of the Regulation
        11/2 of the PMMRR, 1997 and its subsequent amendments, and the relevant international maritime conventions.
        
    </p>
    <p class="p2" style='text-align: left'>
        Issued by the Authority of the Government of the Philippines by virtue of EO 435 under my hand and seal at Cotabato City this
        {{$date_issue}}.
    </p> 
    <br> <br>
    <p class="p2" style='text-align: left'>
        This Certificate is valid until {{$valid_date}}.
    </p>
    <br><br><br>
    <p class="p2" style='text-align: right'>
        <b>ATTY. ABUBAKAR A. KATAMBAK</b> <br>
               Regional Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <br><br>
    <p style='text-align: bottom'>
    <img src="{{ $qrCodeImagePath }}" alt="QR Code"></p>
</body>
