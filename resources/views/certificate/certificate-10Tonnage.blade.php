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
        font-size: 18px;
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
        font-size: 13px;
    }

    .p3 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        font-size: 11px;
    }
    .bottom-image-container {
        position: relative;
        height: 30%; /* Make the container fill the height of its parent */
    }

    img {
        position: absolute;
        bottom: 0;
       /* Optionally, you can make the image fill the width of its container */
    }
</style>

<body>
    <h3 class="header">{{ $certificate->cert_type[0]->cert_type_desc }}
    </h3>
    <p class="p1" style='text-align: center'>{{ $license_no }}</p>


    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued under the provisions of the
        International Convention on Tonnage Measurement of Ships,
        1969, Philippine Merchant Marine Rules and Regulation (PMMRR) 1997 and MARINA Circular No. 2007-04
        by the Government of the Republic of the Philippines for which Convention came into force on July 18, 1982
    </p>

    <table>

        <tr>
            <td style="width:50%">Name of Ship</td>
            <td style="width:50%;">Type of Ship</td>
            <td style="width:50%">Place Built</td>
            <td style="width:50%;">Year Built</td>
        </tr>
        <tr>
            <td style="width:50%">{{$Details[0]->ship_name}}</td>
            <td style="width:50%;">{{$ship_type[0]->ship_type_desc}}</td>
            <td style="width:50%">{{$Details[0]->place_built}}</td>
            <td style="width:50%;">{{$Details[0]->year_built}}</td>

        </tr>

    </table>
    <h2 class="header2">MAIN DIMENSION</h2>
    <table>
        <tr>
            <td style="width:30%;">Length (Article 2[8]) </td>

            <td style="width:35%;">Breath (Regulation 2 [3]) </td>

            <td style="width:35%;">Molded Depth Amidship to Upper Deck
                (Regulation 2 [3])</td>

        </tr>
        <tr>
            <td style="width:30%;">
                <center><b class="value">{{$Details[0]->length}}</b></center>
            </td>
            <td style="width:35%;">
                <center><b class="value">{{$Details[0]->breadth}}</b></center>
            </td>
            <td style="width:35%;">
                <center><b class="value">{{$Details[0]->gross_tonnage}}</b></center>
            </td>
        </tr>
    </table>


    <h4 class="header2">THE TONNAGE OF THE SHIP ARE</h4>

    <p class="p3" style='text-align: center'>
        GROSS TONNAGE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$Details[0]->gross_tonnage}}
    </p>
    <p class="p3" style='text-align: center'>
        NET TONNAGE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$Details[0]->net_tonnage}}
    </p>
    <p class="p3" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that the
        tonnage of the ship has been determined in accordance with the provisions of the
        International Convention of the Tonnage Measurement of Ships, 1969.
    </p>
    <br>
    <p class="p3" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Issued at <b> RECREATIONAL OFFICE, BARMM, COTABATO CITY,</b> this <b>{{$date_issue}}.</b>
    </p>
    <p class="p3" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The undersigned declares that he is duly authorized by the Government of the Republic of the Philippines
to issued this Certificate
       
    </p>
    <br>
    <p class="p3" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        This certificate is valid until <b>{{$valid_date}}.</b>
    </p>
  
    <br><br><br>
    <p class="p3" style='text-align: right'>
        <b>ATTY. ABUBAKAR A. KATAMBAK</b> <br>
               Regional Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p class="bottom-image-container">
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>
</body>
