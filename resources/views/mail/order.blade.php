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
                <p><b> THANK YOU FOR YOUR ORDER FROM ESHOPPER.</b></p>
                <p style="text-align:center;">Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.</p>
            
            </td>
            <td style="color:grey; font-size:10px;"><p>|<br>|<br>|<br>|<br>|<br>|<br/>|<br>|<br>|<br/>|<br>|<br>|<br>|<br>|<br></p></td>
            <td style="width: 280px; word-wrap:break-word; word-break: break-all;">
                <p><b>Call Us:</b>+91 -22 -40500699</p>
                <p><b>Email:</b>info@shoppingcompany.com</p>
            </td>
        </tr>
    </table>    
    <h3 style="text-align: center;"> Your order # {{ $data->id }} </h3>
    <h5 style="text-align:center;">Placed on DATE {{$data->created_at}} </h6>
    <h5 style="text-align: left;"> BILL TO :</h5>
    <table border="1" style="width:100%;  font-size:85%;  border: 1px solid black;  border-collapse: collapse;">
        <thead>
            <th >Order Id</th>
            <th >Name</th>
            <th >Order Date</th>
            <th >Order Status</th>
            <th >Payment</th>
            <th >Shipping Address</th>
        </thead>
        <tbody>
            <tr>
           
                
                <td>{{ $data->id }}</td>
                <td>{{ $data->Addresses->name }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->OrderDetails->status }}</td>
                <td>@if($data->OrderDetails->payment_mode==0){{ 'COD' }} @else {{ 'Paypal' }} @endif</td>
                <td>{{ $data->Addresses->address1.' '.$data->Addresses->address2.' '.$data->Addresses->city.' ,'.$data->Addresses->state.' ,'.$data->Addresses->country.' -'.$data->Addresses->zipcode }}</td>

            
            </tr>
        </tbody>
    </table> 
   
    <h5 style="text-align: left;"> PRODUCT :</h5>
    <table border="1" style="width:100%;  font-size:85%; border: 1px solid black;  border-collapse: collapse;">
        <thead>
            <th class="text-center">#</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Subtotal</th>
        </thead>
        <tbody>
         @foreach($data->Orders as $product)
            
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td><img src="{{ asset('storage/'.$product->product_image)}}" class="imgsm"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>${{ $product->price }}</td>

                
            </tr>
            @endforeach
            <tr>
                <td colspan="3">&nbsp;</td>
                <td colspan="2">
                    <table border="1" style="border: 1px solid black;  border-collapse: collapse;">
                        <tr>
                            <td>Sub Total</td>
                            <td class="col-md-6">${{ $data->subtotal }}</td>
                        </tr>
                        <tr>
                            <td>Exo Tax</td>
                            <td>${{ $data->tax }}</td>
                        </tr>
                        <tr class="shipping-cost">
                            <td>Shipping Cost</td>
                            <td>${{ $data->shipping_charge}}</td>										
                        </tr>
                        <tr class="shipping-cost">
                            <td>Discount Cost</td>
                            <td>- ${{ $data->discount }}</td>										
                        </tr>
                        <tr>
                            <td><b>Total</b></td> 
                            <td><span><b>${{ $data->total }}</b></span></td>
                        </tr>

                        
                    </table>
                </td>
            </tr>
        
        </tbody>
    </table> 
    
</body>
</html>

