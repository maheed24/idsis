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
        line-height: 14px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: rgb(235, 235, 235)
    }


    .header {
        font-family: Arial, sans-serif;
        font-size: 28px;
        text-align: center;
    }

    .header2 {
        font-family: Arial, sans-serif;
        font-size: 14px;
        text-align: center;
        margin-bottom: 10px;
    }

    .value {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        text-align: center;
        line-height: 20px;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        line-height: 0cm;
    }

    .p2 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 0px;
        line-height: 20px;
        font-size: 16px;
    }

    .p3 {
        position: absolute;
        bottom: 0;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        font-size: 11px;
    }

    .bottom-image-container {
        position: relative;
        height: 30%;
        /* Make the container fill the height of its parent */
    }

    /* img {
        position: absolute;
        bottom: 0;
        /* Optionally, you can make the image fill the width of its container
    } */
</style>

<body>
    <h3 class="header">{{ $certificate->cert_type[0]->cert_type_desc }}
    </h3>

    <br><br>

    <table>
        <tr>
            <td style="text-align: left">Name of Vessel <br>
                <center><b class="value">{{ $Details[0]->ship_name }}</b></center>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">Official number<br>
                <center><b class="value">{{ $Details[0]->official_no }}</b>
            </td>
            <td style="text-align: left">Call sign<br>
                <center><b class="value">{{ $Details[0]->call_sign }}</b>
            </td>
            <td style="text-align: left">Type of service<br>
                <center><b class="value">{{ $ship_type[0]->ship_type_desc }}</b>
            </td>
            <td style="text-align: left">Hull<br>
                <center><b class="value">{{ $hull_material[0]->hull_material_desc }}</b>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">Owner/Company<br>
                <center><b class="value">{{ $Details[0]->company_name }}</b>
            </td>
            <td style="text-align: left">Address<br>
                <center><b class="value"></b>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">Trading<br>
                <center><b class="value">{{ $trading_area[0]->trading_areas_desc }}</b>
            </td>
            <td style="text-align: left">Homeport<br>
                <center><b class="value">{{ $Details[0]->home_port }}</b>
            </td>
            <td style="text-align: left">Year built<br>
                <center><b class="value">{{ $Details[0]->year_built }}</b>
            </td>
            <td style="text-align: left">Place of built<br>
                <center><b class="value">{{ $Details[0]->place_built }}</b>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">Deadweight </td>
            <td style="text-align: left">Gross tons <br>
                <center><b class="value">{{ $Details[0]->gross_tonnage }}</b>
            </td>
            <td style="text-align: left">Net tons <br>
                <center><b class="value">{{ $Details[0]->net_tonnage }}</b>
            </td>
            <td style="text-align: left">Engine make<br>
                <center><b class="value">{{ $ship_propulsion[0]->engine_make }}</b>
            </td>
            <td style="text-align: left">Horsepower<br>
                <center><b class="value">{{ $results[0]->horsepower }}</b>
            </td>
        </tr>
    </table>
    <p class="p2" style="text-align: center">INSPECTION DATA</p>
    <table>
        <tr>
            <td style="text-align: left">Date last dry-docked<br>
                <center><b class="value">N/A</b>
            </td>
            <td style="text-align: left">Place lats dry-docked<br>
                <center><b class="value">N/A</b>
            </td>
            <td style="text-align: left">Date of inspection/Re-inspection<br>
                <center><b class="value">N/A</b>
            </td>
        </tr>
        <tr>
            <td style="text-align: left">Stability certificate number<br>
                <center><b class="value">N/A</b>
            </td>
            <td style="text-align: left">Date of issue<br>
                <center><b class="value">N/A</b>
            </td>
            <td style="text-align: left">Place of inspection<br>
                <center><b class="value">N/A</b>
            </td>
        </tr>
    </table>
    <p class="p2" style="text-align: center">SOLAS EQUIPMENT</p>
    <table>
        <tr>
            <td style="text-align: left">No. of inflated life craft (Capacity Each) </td>
            <td style="text-align: left">No. of inflated life craft (Capacity Each) </td>
        </tr>
        <tr>
            <td style="text-align: left">No. of life boat (Capacity Each) </td>
            <td style="text-align: left">No. of lifebuoys (Lighted) </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">No. of lifejackets (Children)</td>
            <td style="text-align: left">No. of lifejackets (Adult)</td>
            <td style="text-align: left">Total of lifejackets</td>
        </tr>
        <tr>
            <td style="text-align: left">Smothering system</td>
            <td style="text-align: left">No/Type of fire extinguisher </td>
            <td style="text-align: left">No. of life axe</td>
        </tr>
        <tr>
            <td style="text-align: left">No. of fire pumps</td>
            <td style="text-align: left">No. of fire hydrants</td>
            <td style="text-align: left">No. of fire buckets</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">Length of fire hose (Meter)</td>
            <td style="text-align: left">No. of fire hose</td>
        </tr>
    </table>
    <p class="p2" style="text-align: center">PASSENGER AND MANNING DATA</p>
    <table>
        <tr>
            <td style="text-align: left">No. of crews</td>
            <td style="text-align: left">Total of person</td>
            <td style="text-align: left">Other</td>
            <td style="text-align: left">Total no. of persons allowed</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">Manning requirement<br>
                <center><b class="value">N/A</b>
            </td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The abovementioned vessel is duly
        inspected in accordance with the existing regulations and is found to have complied with Manning Requirements
        regarding the condition of the hull, machinery, navigation, fire-fighting, and life-saving equipment.
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued pursuant to RA 11054, BAA
        No. 13, and Executive Order No. 435, Section 5, Paragraph D, under my hand and seal at BMARINA Regional Office,
        Cotabato City this <i><b style="color: red">{{ $date_issued }}</b></i></p>
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certificate is valid until
        <i><b style="color: red">{{ $valid_date }}</b></i></p>
    </p>
    <br><br><br>
    <p class="p2" style='text-align: right'>
        @include('certificate.closing')
</p>
    <p class="p3" style='text-align: left; color:red'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{ $or_number }} <br>
        Date: {{ $or_date }}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>
</body>
