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
    <p class="p1" style='text-align: center'>Control No.:{{ $Details[0]->official_no }}</p><br>
    
    <p class="p2" style='text-align: center'>TO WHOM IT MAY THESE PRESENTS MAY COME GREETINGS</p> 
   
    <p class="p2" style='text-align: center'>The BMARINA hereby confers this Certificate on</p> 

    <p class="p2" style='text-align: center'><b><u style="color:cornflowerblue">M/V ISLAND PARADISE</u></b></p>
    
    <p class="p2" style='text-align: center'>of</p> 
  
    <p class="p2" style='text-align: center'><b><u style="color:cornflowerblue">SAIDDI AGRI-FARMM AND TRADING,
                INC.</u></b></p>
    
    <p class="p2" style='text-align: center'>In recognition of the fulfillment of the service standards required for
    </p>

    <p class="p2" style='text-align: center'><b><u style="color:cornflowerblue">SECOND CLASS ACCOMMODATION</u></b>
    </p>
    
    <p class="p2" style='text-align: center'>under</p>
    
    <p class="p2" style='text-align: center'><u>CATEGORY-1</u></p>
    
    <p class="p2" style='text-align: center'>(Ship with less than four (4) hours of travel time)
        Of Memorandum Circular No. 65/65-A, thereby granting all the rights,
        Privileges, and honors hereunto appertaining.
    </p>

    <br><br>

    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In witness whereof, this
        Certificate is awarded on this <b style="color:cornflowerblue">{{ $date_issued }}</b> at Bangsamoro Maritime Industry
        Authority, Cotabato City.
    </p>
    <p class="p2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Certificate
        shall be valid until <b style="color:cornflowerblue ">{{ $date_validity }}</b>.</p>


    <br>


    <br><br><br>
    <p class="p2" style='text-align: right'>
        @include('certificate.closing')
    </p>
    <p class="p3" style='text-align: left; color:cornflowerblue'>
        Paid: {{ $amount }} <br>
        O.R. Number: {{ $or_number }} <br>
        Date: {{ $or_date }}<br><br>
        <img src="{{ $qrCodeImagePath }}" alt="QR Code">
    </p>
</body>
