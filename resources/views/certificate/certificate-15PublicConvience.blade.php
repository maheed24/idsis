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
    <p class="p1" style='text-align: center'>Certificate No. ______________</p>
    <p class="p2" style='text-align: center'><b>TO WHOM IT MAY THESE PRESENTS MAY COME GREETINGS</b></p>
    <br>
    <p class="p1" style='text-align: center'>This is to certify that</p>
    <br><br>
    <p class="p2" style='text-align: center'><b><u style="color:cornflowerblue">ABZTAIN RIZAL A. TINGKAHAN</u></b></p>
    <p class="p2" style='text-align: center'>has been issued this CERTIFICATE OF PUBLIC CONVENIENCE (CPC)
        for the operations of the motor vessels/launch
    </p>
    <p class="p2" style='text-align: center'><b><u style="color:cornflowerblue">ML-AMEER</u></b></p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For the transportation of the
        cargoes in the route _________________________ and BARMM on a non-scheduled tramping service only pursuant to a
        decision dated ____________________ in case no. _____________ and such shall to be subject to all the terms,
        conditions, duties, limitations herein set forth which are made an integral part of this Certificate.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Certificate
        shall be valid for a period of <span style="color: red"> (2) YEARS</span> from date hereof or until __________.
    </p>

    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IN WITNESS WHEREOF,
        I have hereunto set my hand and caused the seal of the Maritime Industry Authority-BARMM to be affixed this
        <i><b style="color: red">{{ $date_issued }}</b></i> at MARINA-BARMM Regional Office, Cotabato City.</p>


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
