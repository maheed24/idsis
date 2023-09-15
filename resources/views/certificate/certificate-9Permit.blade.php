<title>{{ $certificate->cert_type[0]->cert_type_desc }}</title>
<style>
    body {
        margin-top: 150px;
        margin-bottom: 100px;
        margin-right: 25px;
        margin-left: 25px;
    }

    .table,
    .th,
    .td {
        border: 1px solid;
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 15px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .tables
    {
        font-family: Arial, sans-serif;
        font-size: 12px;
        line-height: 15px;
        width: 100%;
        text-align: center;
    }


    .header {
        font-family: Arial, sans-serif;
        font-size: 18px;
        text-align: center;
    }

    .header2 {
        font-family: Arial, sans-serif;
        font-size: 16px;
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
        font-size: 12px;
    }

    .p3 {
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: .5px;
        font-size: 10px;
    }
</style>

<body>
    <h3 class="header">{{ $certificate->cert_type[0]->cert_type_desc }}</h3>
    <table class="table">
        <tr>
            <td class="td" style="width:50%;">Name of Ship
                <br>
                <center><b class="value">{{$Details[0]->ship_name}}</b></center>
            </td>

            <td class="td" style="width:50%;">Official Number
                <br>
                <center><b class="value">{{$Details[0]->official_no}}</b></center>
            </td>
        </tr>
    </table>
<table class="table">
    <tr>
        <td class="td" style="width:25%;">Trading: <br>
            <center><b class="value">{{$trading_area[0]->trading_areas_desc}}</b></center>
        </td>
        <td class="td" style="width:25%;">Hull: <br>
            <center><b class="value">{{$hull_material[0]->hull_material_desc}}</b></center>
        </td>
        <td class="td" style="width:25%;">Type of Service: <br>
            <center><b class="value">{{$operation[0]->operation_desc}}</b></center>
         </td>
        <td class="td" style="width:25%;">Homeport: <br>
            <center><b class="value">{{$Details[0]->homeport}}</b></center>
        </td>
    </tr>
</table>
<br>
    <p class="p2" style='text-align: justify'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>THIS IS TO CERTIFY THAT</i> pursuant to the provisions of Section 38, Article 13 of Republic Act 11054 and its
        impelementing Rules and Regulation, having taken and subscribed to the Oath required bt law and having sworn that:
    </p>
  <br>
  <table class="tables">
    <tr>
        <td><b>OMAR N. SALI</b> <br>
           
            Owner</td>
        <td><b>{{$office_place}}</b> <br>
         
            Address</td>
    </tr>

  </table>
    
    <p class="p2" style='text-align: center'>
        Is the sole owner/operator of the herein-named and described vessel is hereby permitted to trade in
    </p>
    <p class="p2" style='text-align: center'>
        <b><u>BARMM WATER ONLY</u></b> <br>
        (Route)
    </p>
    <br>
    <h5 class="header2">REGISTERED DIMENSION AND TONNAGE</h5>
    <table class="table">
        <tr>
            <td class="td" style="width:35%;">GRT:
                <br>
                <center><b class="value">{{$Details[0]->gross_tonnage}}</b></center>
            </td>

            <td class="td" style="width:35%;">NRT: 
                <br>
                <center><b class="value">{{$Details[0]->net_tonnage}}</b></center>
            </td>
            <td class="td" style="width:30%;">Breadth:
                <br>
                <center><b class="value">{{$Details[0]->breadth}}</b></center>
            </td>
        </tr>
        <tr>
            <td class="td" style="width:35%;">Length (Meter): 
                <br>
                <center><b class="value">{{$Details[0]->length}}</b></center>
            </td>
            
            <td class="td" style="width:35%;">Depth:
                <br>
                <center><b class="value">{{$Details[0]->depth}}</b></center>
            </td>
            <td class="td" style="width:30%;">Draught:
                <br>
                <center><b class="value">{{$Details[0]->gross_tonnage}}</b></center>
            </td>
        </tr>
    </table>
    <h3 class="header2">PARTICULARS OF PROPULSION SYSTEM</h3>
    <table class="table">
        <tr>
            <td class="td" style="width:25%;">Engine Make</td>
            <td class="td" style="width:25%;">Engine Model/Serial No.</td>
            <td class="td" style="width:25%;">Horsepower:</td>
            <td  class="td"style="width:25%;">No. of Cylinder:</td>
        </tr>
        @foreach ($results as $item)
        <tr>
            <td class="td">
                <center> <b class="value2">{{ $item->engine_make }}
                </b></center>
                </td>
                <td class="td">
                    <center> <b class="value2">{{ $item->serial_no }}
                    </b></center>
                </td>
                <td class="td">
                    <center> <b class="value2">{{ $item->horsepower }}
                        </b></center>
                </td>
                <td class="td">
                    <center> <b class="value2">{{ $item->no_cyclinder }}
                    </b></center>
                </td>
            </tr>
            @endforeach
        </table>
        
        <p class="p2" style='text-align: center'>
            Issued at <b>Maritime Industry Authority Regional Office, BARMM, Cotabato City {{$date_issue}}.</b>
        </p>
        <p class="p2" style='text-align: left'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This permit will remain in force until <b>{{$valid_date}}</b>.
        </p>
        <br><br><br>
        <p class="p2" style='text-align: right'>
            <b>ATTY. ABUBAKAR A. KATAMBAK</b> <br>
            Regional Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        
    </body>
    