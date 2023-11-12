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

        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 20px;
        text-align: center;
    }

    table {

        border-collapse: collapse;
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
    <p class="p1" style='text-align: center'><u>License No.:{{ $license_no }}</u></p>

    <br><br>

    <p class="p1" style='text-align: center'>THIS IS TO CERTIFY THAT THE__________<u>HOMEPORT</u>_____________of</p>
    <br>
    <table>
        <tr>
            <td style="text-align:left">
                <p class="p2">Name of vessel <br>
                    Owner/Operator <br>
                    Business Address <br>
                    Gross Tonnage <br>
                    Main Propulsion <br>
                    Official Number <br>
                    Certificate of Ownership No. <br>
                    Certificate of Philippine Registry No. <br>
                </p>
            </td>
            <td style="text-align:left">
                <p class="p2">
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$Details[0]->ship_name}} <br>
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$Details[0]->former_owner}} <br>
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DATU ODIN SINSUAT,
                    MAGUINDANAO <br>
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$Details[0]->gross_tonnage}} <br>
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $ship_propulsion[0]->engine_make }} <br>
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$Details[0]->official_no}} <br>
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$Details[0]->official_no}}<br>
                    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$Details[0]->official_no}}<br>
                </p>
            </td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;As of this date has been changed
        from DATU ODIN SINSUAT, MAGUINDANAO to GENERAL SANTOS CITY and that said change has been recorded in this
        Office.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WITNESS MY HAND and
        official seal of the Bangsamoro Maritime Industry Authority at the BMARINA Regional Office, BARMM, Cotabato City
        this <i><b style="color: red">{{ $date_issued }}</b></i></p>


    <br>


    <br><br><br>
    <p class="p2" style='text-align: right'>
        <b>ATTY. ABUBAKAR A. KATAMBAK</b> <br>
        Regional Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p class="p3" style='text-align: left; color:red'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{ $or_number }} <br>
        Date: {{ $or_date }}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>
</body>
