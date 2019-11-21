<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Order Mail</title>

    <style>
        .border{
            border:1px solid black; 
            height:100%; 
            width:49%; 
            padding: 2%; 
            margin:2%0%0%23%; 
            font-family: Arial, Helvetica, sans-serif;
        }
        td,p{
        color:#484848;
        font-size: 85% ;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        .jumbotron{
            
            padding: 0rem 1rem; 
            border:1px solid #e0f0f8; margin-bottom: 2rem; 
            background-color: #e0f0f8; 
            font-size: 103%;
            border-radius: .2rem;
        }
       
        a{
        color: #4b8adb;
         }
        th,td{
            padding:2%;
        }
        
    </style>
    
</head>
<body class="border">
   
    <table class="jumbotron">
        <tr>
            <td style="width:  280px; word-wrap:break-word;">
                <img src="http://localhost:8000/Eshopper/images/home/logo.png">
                <p style="text-align: center;"><b> THANK YOU FOR YOUR ORDER FROM ESHOPPER.</b></p>
                <p style="text-align:center;">You can check the status of your order by <a href="hhttp://localhost:8000/eshopper/login">logging into your account. </a>
                    </p>
            
            </td>
            <td style="color:grey; font-size:10px;"><p>|<br>|<br>|<br>|<br>|<br>|<br/>|<br>|<br>|<br/>|<br>|<br>|<br>|<br>|<br></p></td>
            <td style="width: 297px; padding-left:4%; word-wrap:break-word; word-break: break-all;">
                <a><i>Order Queries ?</i></a>
                <p><b>Call Us:</b><a><u>+91 -22 -40500699</u></a></p>
                <p><b>Email:</b><a><u>info@shoppingcompany.com</u></a></p>
            </td>
        </tr>
    </table>    
    <h4 style="text-align: center;"> Order Id : #{{ $data['order_id']}}</h4>
    
    <table border="1" style="width:100%;  border: 1px solid black;  border-collapse: collapse;">
        <tr>
            <td> Order Id : </td><td>{{ $data['order_id']}}</td>
        </tr>
        <tr>
            <td> Order Status :</td><td> {{ucfirst(trans($data['status'])) }}</td>
        </tr>
        <tr>
            <td> PAYMENT METHOD :</td><td>  @if($data['payment_mode']==0) {{ 'Cash' }} @else {{ 'Paypal' }}@endif</td>
        </tr>
    </table> 
   
</body>
</html>


