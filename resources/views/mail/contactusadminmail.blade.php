<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us Admin Mail</title>

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
         
        
    </style>
    
</head>
<body class="border">
   
    <table class="jumbotron">
        <tr>
            <td style="width: 280px; word-wrap:break-word;">
            <img src="http://localhost:8000/Eshopper/images/home/logo.png">
            <p><b> THANK YOU FOR CONTACTING WITH ESHOPPER.</b></p>
                
            </td>
            <td style="color:grey; font-size:10px;"><p>|<br>|<br>|<br/>|<br>|<br>|<br>|<br>|<br></p></td>
            <td style="width: 297px; word-wrap:break-word; word-break: break-all;">
                <p>&nbsp;<b>Call Us:</b>+91 -22 -40500699</p>
                <p>&nbsp;<b>Email:</b>info@shoppingcompany.com</p>
            </td>
        </tr>
    </table>  
    <p>Dear Administrator,</p>
    <p>Please check below details of customer.</p>    
   
    <table border="1" style="width:100%;  border: 1px solid black;  border-collapse: collapse;">
        <tr>
            <td style="padding:2%;"> Name :</td><td style="padding:2%;">{{ $data['name'] }}</td>
        </tr>
        <tr>
            <td style="padding:2%;"> Email :</td><td style="padding:2%;">{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td style="padding:2%;"> Subject :</td><td style="padding:2%;">{{ $data['subject'] }}</td>
        </tr>
        <tr>
            <td style="padding:2%;"> Comment :</td><td style="padding:2%;">{{ $data['message'] }}</td>
        </tr>
    </table> 
   
</body>
</html>


