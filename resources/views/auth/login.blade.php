<!DOCTYPE html>
<html>
    <head>
        <title>MailTo</title>
        <link rel="shortcut icon" href="{{ asset('css/images/mail.png') }}">
            <meta charset="utf-8">
            <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <!--webfonts-->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
            <!--//webfonts-->
    </head>
    <style>
        .title{
            text-align: center;
            margin-bottom: 20px
        }
        .forgot{
            color: black
        }
        .loginbtn{
            background-color: aqua
        }
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 5px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
    <body>
    <!-----start-main---->
        <div class="login-form">
            <div class="head">
                <img src="{{ asset('css/images/logo.jpg') }}" alt=""/>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h4 class="title">Welcome, Please Login</h4>
                @if ($messege = Session::get("pesan"))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Error!</strong> {{ Session::get("pesan") }}.
                    </div>
                @endif
                @error('email')
                    <div class="w3-panel w3-red w3-display-container w3-card">
                        <span onclick="this.parentElement.style.display='none'"
                        class="w3-button w3-large w3-display-topright">&times;</span>
                        <h3>Peringatan!</h3>
                        <p>Email atau Password anda tidak terdaftar.</p>
                    </div>
                @enderror
                <li>
                    <input type="text" name="email" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" ><i class=" icon user"></i>
                </li>
                <li>
                    <input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><i class=" icon lock"></i>
                </li>
                <div class="p-container">
                    <label><a class="forgot" href="#">Forgot Password?</a></label>
                    <input type="submit" class="loginbtn" onclick="myFunction()" value="SIGN IN" >
                    <div class="clear"> </div>
                </div>
            </form>
        </div>
    <!--//End-login-form-->		 		
    </body>
</html>