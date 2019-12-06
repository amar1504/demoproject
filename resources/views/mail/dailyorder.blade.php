<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>order Mail</title>

    <style>
        .border{
            border:1px solid black; 
            height:100%; 
            width:60%; 
            padding: 2%; 
            margin:2%0%0%18%; 
            font-family: Arial, Helvetica, sans-serif;
        }
        .jumbotron{
            width:100%;
            padding: 1rem 1rem; 
            border:1px solid #e0f0f8; margin-bottom: 2rem; 
            background-color: #e0f0f8; 
            font-size: 103%;
            border-radius: .2rem;
        }
        td,p{
        color:#484848;
        font-size: 85% ;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        .imgsm{
            height:100px;
            width:100px;
        }
        
        td{
            padding:1%;
            text-align:center;
        }
        .col-md-6{
            width:80%;
        }
    </style>
    
</head>
<body class="border">
   
    <table class="jumbotron">
        <tr>
            <td style="width:300px; word-wrap:break-word;">
                <img src="http://localhost:8000/Eshopper/images/home/logo.png">
                <p><b> Daily ORDER FROM ESHOPPER.</b></p>
                <p style="text-align:center;">Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.</p>
            
            </td>
            <td style="color:grey; font-size:10px;"><p>|<br>|<br>|<br>|<br>|<br>|<br/>|<br>|<br>|<br/>|<br>|<br>|<br>|<br>|<br></p></td>
            <td style="width: 280px; word-wrap:break-word; word-break: break-all;">
                <p><b>Call Us:</b>+91 -22 -40500699</p>
                <p><b>Email:</b>info@shoppingcompany.com</p>
            </td>
        </tr>
    </table>    
    
   
    <table border="1" style="width:100%;  font-size:85%; border: 1px solid black;  border-collapse: collapse;">
        <thead>
            <th class="text-center">#</th>
            <th class="text-center">Order Id</th>
            <th class="text-center">User Id</th>
            <th class="text-center">Transction Mode</th>
            <th class="text-center">Transction  Id</th>
            <th class="text-center">Order Date</th>
        </thead>
        <tbody>    
        
        @foreach($data as $order)
         
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>@if($order->payment_mode==0){{ 'COD' }} @else {{ 'PAYPAL' }} @endif</td>
            <td>{{ $order->transaction_id }}</td>
            <td>{{ $order->created_at }}</td>

            
        </tr>
        @endforeach
            
        
        </tbody>
    </table> 
    
</body>
</html>

