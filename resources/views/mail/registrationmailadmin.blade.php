<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Mail</title>

    <style>
   
   p{
        color:#484848;
        font-size: 85% ;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }

    li{
        color:#484848;
        margin-top:1%;
        font-size: 90% ;
    }
     
    .jumbotron{
            
        padding: 0rem 1rem; 
        border:1px solid #e0f0f8; margin-bottom: 2rem; 
        background-color: #e0f0f8; 
        font-size: 103%;
        border-radius: .2rem;
    }
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
    a{
        color: #4b8adb;
    }


    </style>
    
</head>
<body class="border">
    <h1 style="text-align: center;">Welcome to Eshopper.</h1>
    <table class="jumbotron">
        <tr>
            <td style="width: 280px; word-wrap:break-word;">
            <img src="http://localhost:8000/Eshopper/images/home/logo.png">
            <p>To log in when visiting our site just click <a href="http://localhost:8000/eshopper/login">Login</a> or <a href="http://localhost:8000/eshopper/login">My Account</a> at the top of every page, and then enter your email address and password.</p>
            </td>
            <td style="color:grey; font-size:10px;"><p>|<br>|<br>|<br/>|<br>|<br>|<br>|<br>|<br></p></td>
            <td style="width: 300px; word-wrap:break-word; word-break: break-all;">
                <p>&nbsp;<b>Call Us:</b>+91 -22 -40500699</p>
                <p>&nbsp;<b>Email:</b>info@shoppingcompany.com</p>
            </td>
        </tr>
    </table>
    <div class="jumbotron">
        <p>Use the following values when prompted to log in:</p>
        <p>Email:{{ $data['email'] }}</p>
    </div>
    <p>When you log in to your account, you will be able to do the following:</p>
    <ul>
        <li>Proceed through checkout faster when making a purchase</li>
        <li>Check the status of orders</li>
        <li>View past orders</li>
        <li>Make changes to your account information</li>
        <li>Change your password</li>
        <li>Store alternative addresses (for shipping to multiple family members and friends!)</li>
    </ul>
    <p >If you have any questions, please feel free to contact us atinfo@shoppingcompany. comor by phone at+91 –22 -40500699.</p>
</body>
</html>

