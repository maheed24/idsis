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
    <table>
        <tr>
            <td style="text-align: left">Family Name:</td>
            <td style="text-align: left">First Name:</td>
            <td style="text-align: left">Middle Initial:</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left">Address</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: left; width:25%;">Date of Birth</td>
            <td style="text-align: left; width:75%;">Place of Birth</td>
        </tr>
        <tr>
            <td style="text-align: left; width:25%;">Previous MBOL:</td>
            <td style="text-align: left; width:75%;">Date of Issued:</td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This License is hereby granted to
        the above-mentioned operator subject to the following conditions:
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. This license must be carried
        when operating a motorboat vessel below three (3)
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; gross tonnages;
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. The holder of this license is
        authorized to operate any motorboat vessel valid for
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Passenger-type watercraft, Cargo-type
        watercraft,
        Cargo/Passenger-type watercraft, or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; for
        FISHING;
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. This license may be revoked for a
        cause at any time prior to the date of expiration for
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; violation of RA No. 11054, the Revised
        Philippine Merchant
        Marine Rules and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Regulations, and other applicable laws of the
        authority.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued by the
        Authority of BARMM Government of the Philippines, under my hand and seal at Cotabato City this 17th day of July
        2023. <i><b style="color:cornflowerblue ">{{ $date_issued }}</b></i></p>

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
