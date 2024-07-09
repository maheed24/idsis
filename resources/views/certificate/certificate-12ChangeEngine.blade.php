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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I, <b>ALONTO A. SAHIRON</b>, Regional
        Head of the Bangsamoro Maritime Industry Authority, do hereby certify that <b>FB-MARSHAL</b> of <b>{{ $Details[0]->gross_tonnage }}</b> gross tonnages,
        <b>{{ $Details[0]->net_tonnage }}</b> net tonnages with Certificate of Philippine Registry No.
        {{ $Details[0]->license_no }} and Certificate of Ownership
        No. {{ $Details[0]->license_no }} and Vessel Official No. <b>{{ $Details[0]->license_no }}</b> owned by <b>RTS FISHING
        INDUSTRY</b> a
        resident of DATU
        BLAH SINSUAT, MAGUINDANAO has this date changed from <b>WEICHAI (1491-620600112340)</b> to <b>YANMAR (148840-01020)</b> that
        changes has been recorded in this Office.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WITHNESS MY HAND and official seal of the Bangsamoro Maritime Industry Authority at the BMARINA Regional Office,
        BARMM, Cotabato City this 1st day of <i style="color:red;"><b>{{ $date_issued }}</b></i></p>

   
    <br>
    

    <br><br><br>
    <p class="p2" style='text-align: right'>
       @include('certificate.closing')
    </p>
    <p class="p3" style='text-align: left; color:red'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{$or_number}} <br>
        Date: {{$or_date}}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>
</body>
