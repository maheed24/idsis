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
    <p class="p1" style='text-align: center'>License No.:{{ $license_no }}</p>
    <p class="p2" style='text-align: center'><b>TO WHOM IT MAY THESE PRESENTS MAY COME GREETINGS</b></p>
    <p class="p2" style='text-align: center'>This is to certify that</p>
    <br>
    <p class="p2" style='text-align: center'><b><u style="color:cornflowerblue">SAIDDI AGRI-FARM AND TRADING,
                INC.</u></b></p>
    <p class="p2" style='text-align: center'>has been issued this CERTIFICATE OF PUBLIC CONVENIENCE (CPC)
        for the operations of the motor vessels/launch
    </p>
    <p class="p2" style='text-align: center'><b><u style="color:cornflowerblue">M/V ISLAND PARADISE</u></b></p>

    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For the transportation of the
        cargoes and passengers in the route Lamitan City, Basilan to Polloc Port, Parang, Maguindanao del Norte, BARMM,
        and vice versa on scheduled services only pursuant to BMARINA Board Resolution dated June 14, 2023, under
        Application No. 002-2023 and such shall be subject to all the terms, conditions, duties, limitations herein set
        forth which are made an integral part of this Certificate.
    </p>

    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Certificate
        shall be valid for a period of THREE (3) YEARS from <b style="color:cornflowerblue ">{{ $date_validity }}</b>.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued by the
        Authority of RA No. 11054 and BAA No. 13, under my hand and seal at Cotabato City this <i><b
                style="color:cornflowerblue ">{{ $date_issued }}</b></i>.
    </p>
    <br>

    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Certificate is
        valid until <b style="color:cornflowerblue ">{{ $date_validity }}</b>. </p>


    <br>


    <br><br><br>
    <p class="p2" style='text-align: right'>
        <b>ATTY. ABUBAKAR A. KATAMBAK</b> <br>
        Regional Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p class="p3" style='text-align: left; color:cornflowerblue'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{ $or_number }} <br>
        Date: {{ $or_date }}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>
</body>
