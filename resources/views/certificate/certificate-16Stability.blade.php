<title>{{ $certificate->cert_type[0]->cert_type_desc }}</title>
<style>
    body {
        margin-top: 150px;
        margin-bottom: 5px;
        margin-right: 25px;
        margin-left: 25px;
    }

    table,

    td {
        border: 1px solid;
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 20px;
        text-align: center;
    }

    th {
        border: 1px solid;
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 20px;
        text-align: center;
        background-color: rgb(166, 185, 222);
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
        line-height: 40px;

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
    <p class="p1">____________________________________________________________________________</p>
    <p class="p2">Issued under the provisions of the Philippine Merchant Marine Rules and Regulations 1997 and MARINA
        Circular No. 2007-05.</p>

    <br><br>
    <table>
        <tr>
            <th style="text-align: center; width:25%;">NAME OF SHIP</th>
            <th style="text-align: center; width:25%;">TYPE OF SHIP</th>
            <th style="text-align: center; width:25%;">PORT OF REGISTRY</th>
            <th style="text-align: center; width:25%;">GRT</th>
        </tr>
        <tr>
            <td>
                <center><b class="value">{{ $Details[0]->ship_name }}</b>
            </td>
            <td>
                <center><b class="value">{{ $ship_type[0]->ship_type_desc }}</b>
            </td>
            <td>
                <center><b class="value">N/A</b>
            </td>
            <td>
                <center><b class="value">{{ $Details[0]->gross_tonnage }}</b>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <th style="text-align: center; width:75%;">OWNER</th>
            <th style="text-align: center; width:25%;">OFFICIAL NO.</th>
        </tr>
        <tr>
            <td></td>
            <td>
                <center><b class="value">{{ $Details[0]->official_no }}</b>
            </td>
        </tr>
    </table>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THIS IS TO CERTIFY that this ship
        has satisfactory stability for all reasonable loading condition on December 15, 2020 under the following
        requirements and restrictions of the Code on Intact Stability and MARINA Circular No. 2007-05.
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;&nbsp;&nbsp; The Master shall be guided
        strictly by the loading conditions indicated in the approved Stability Booklet, a copy of which shall be kept on
        board for ready references. <br>
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;&nbsp;&nbsp;The number of persons on board
        shall not exceed the authorized number stipulated in the Ship safety
        Certificate.
    </p>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;&nbsp;&nbsp; Draft a loaded condition shall
        not exceed from the calculated summer draft of 1.940 m per Load Line
        Certificate issued under MARINA Circular No. 2007-03.
    </p>

    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issuance of this certificate was
        based on the results of Inclining Experiment and Calculations conducted by JOTAR BOATBUILDING & REPAIR SERVICES
        and Lightweight Survey by JULIE A. DILANGALEN of MARINA-BARMM at BAWING, GENERAL SANTOS CITY.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued at
        MARINA-BARMM Regional Office, BARMM Center, Cotabato City this <i><b
                style="color: red">{{ $date_issued }}</b></i></p>


    <br>

    <p class="p2" style='text-align: left'>
        <i><b>ATTESTED BY:</b></i> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
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
