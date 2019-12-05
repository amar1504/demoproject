<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist</title>

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
                <p><b> Wishlist By Customer</b></p>
                
            </td>
            <td style="color:grey; font-size:10px;"><p>|<br>|<br>|<br>|<br>|<br>|<br/>|<br>|<br>|<br/>|<br>|<br>|<br>|<br>|<br></p></td>
            <td style="width: 280px; word-wrap:break-word; word-break: break-all;">
                <p><b>Call Us:</b>+91 -22 -40500699</p>
                <p><b>Email:</b>info@shoppingcompany.com</p>
            </td>
        </tr>
    </table>    
    
    <table border="1" style="width:100%;  font-size:85%;  border: 1px solid black;  border-collapse: collapse;">
        <thead>
            <th >Product Id</th>
            <th >Product Name</th>
            <th >Product Price</th>
            <th >Product Image</th>
           
        </thead>
        <tbody>
            <tr>     
                <td>{{ $data[0]->product_id }}</td>
                <td>{{ $data[0]->wishlistProduct[0]->product_name }}</td>
                <td>{{ $data[0]->wishlistProduct[0]->price }}</td>
                <td><img src="{{ asset('storage/'.$data[0]->ProductImage->first()->product_image) }}" class="imgsm"> </td>
                
            </tr>
        </tbody>
    </table> 
   
    
</body>
</html>

