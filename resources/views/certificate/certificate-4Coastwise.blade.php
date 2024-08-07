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
        line-height: 30px;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        line-height: 0cm;
    }

    .p2 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        line-height: 20px;
        font-size: 15px;
    }

    .p3 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        font-size: 10px;
    }

    .bottom-image-container {
        position: relative;
        height: 30%;
        /* Make the container fill the height of its parent */
    }
</style>

<body>
    <h3 class="header">{{ $certificate->cert_type[0]->cert_type_desc }}</h3>
    <p class="p1" style='text-align: center'>License No.:{{ $license_no }}</p>


    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued by BMARINA Regional Office
        No. 16 pursuant to the provisions of Section 38, Article 13 of the Republic Act 11054 paragraph D of Executive
        Order No. 435 and Chapter of RA 9295 and existing MARINA Circular No. 110.
    </p>
    <h4 class="header2">VESSEL DATA</h4>
    <table>

        <tr>
            <td style="width:50%">Name of Ship <br>
                <center> <b class="value">{{ $Details[0]->ship_name }}</b></center>
            </td>
            <td style="width:50%;">Former Name of Vessel<br>
                <center><b class="value">{{ $Details[0]->former_ship_name }}</b></center>
            </td>

        </tr>
    </table>
    <table>
        <tr>
            <td style="width:25%;">Official No
                <center><b class="value">{{ $Details[0]->official_no }}</b></center>
            </td>

            <td style="width:25%;">Type of Ship
                <center><b class="value">{{ $ship_classification[0]->ship_classification_desc }}</b></center>
            </td>
            </td>
            <td style="width:25%;">Place of Registry <br>
                <center><b class="value">{{ $office_place }}</b></center>
            </td>
            </td>
            <td style="width:25%;">Homeport <br>
                <center><b class="value">{{ $Details[0]->homeport }}</b></center>
            </td>
            </td>

        </tr>

    </table>
    <table>
        <tr>
            <td style="width:50%;">Gross Tonnage<br>
                <center><b class="value">{{ $Details[0]->gross_tonnage }}</b></center>
            </td>
            <td style="width:25%;">Net Tonnage<br>
                <center><b class="value">{{ $Details[0]->net_tonnage }}</b></center>
            </td>
            <td style="width:25%;">Hull Material<br>
                <center><b class="value">{{ $hull_material[0]->hull_material_desc }}</b></center>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width:50%;">Length (Meter) <br>
                <center><b class="value">{{ $Details[0]->length }}</b></center>
            </td>
            <td style="width:25%;">Breadth (Meter)<br>
                <center><b class="value">{{ $Details[0]->breadth }}</b></center>
            </td>
            <td style="width:25%;">Depth (Meter)<br>
                <center><b class="value">{{ $Details[0]->depth }}</b></center>
            </td>
        </tr>
    </table>


    <h2 class="header2">OWNER/COMPANY DATA</h2>
    <table>
        <tr>
            <td>Name of Owner/Company<br>
                <center> <b class="value">{{ $Details[0]->company_name }}
                    </b></center>
            </td>
        </tr>
        <tr>
            <td>Business Address<br>
                <center> <b class="value">{{ $Details[0]->business_address }}
                    </b></center>
            </td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The above mentioned ship is hereby
        licensed and permitted to engage coastwise
        trading for a period of one year, provided that the other certificates/authorities of the ships are
        valid and subsisting according to the provisions of the law and the regulations applicable
        thereto.
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued by the Authority of BARMM
        Government of the Philippines, under my hand and seal at {{ $office_place }} on
        this <b>{{ $date_issued }}.</b>
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This License is valid until
         <b>{{ $date_validity }}</b>.
    </p>

    <p class="p2" style='text-align: right'>
        By the Authority of the Administrator:
    </p>
    <p class="p2" style='text-align: right'>
        <br>
        @include('certificate.closing')
    </p>
    <br><br><br>
    <p class="p3" style='text-align: left'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{ $or_number }} <br>
        Date: {{ $or_date }}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>

</body>
