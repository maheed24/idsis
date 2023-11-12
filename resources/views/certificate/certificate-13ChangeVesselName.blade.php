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
        line-height: 20px;
        text-align: center;
    }

    table {
        width: 100%;
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

<br><br>

    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, <b>ALONTO A. SAHIRON</b>, OIC Regional
        Head of the Maritime Industry Authority-BARMM, do hereby certify that<b><u> MBCA-RADIN 08</u></b> of<b><u> {{ $Details[0]->gross_tonnage }} of Gross Tonnages,
        {{ $Details[0]->net_tonnage }} Net Tonnages</u></b> with Certificate of Philippine Registry and Certificate of Ownership and Vessel Official No.
        {{ $Details[0]->license_no }}, owned by <b><u>TELONG E. JUANDAY</u></b>. resident of <b><u>LEBAK, SULTAN KUDARAT</u></b> has this date changed from
        <b><u>MBCA-RADEN SOLAIMAN 88</u></b> to <b><u>MBCA-RADIN 08</u></b> that changes has been recorded in this office.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>WITHNESS MY
            HAND</b> and Official Seal of the Maritime Industry Authority, Regional Office, BARMM Center, Cotabato City,
        Philippines this <i><b>{{ $date_issued }}</b></i></p>


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
