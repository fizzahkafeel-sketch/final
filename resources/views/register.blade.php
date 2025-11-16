<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register - ImageSeal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="image.1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Space+Grotesk&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("bootstrap.min.css")}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('style.css')}}" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
        }

        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        #card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
        }

        .text h3 {
            color: #00796b;
            margin-bottom: 30px;
            text-align: center;
        }

        form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        form input:focus {
            outline: none;
            border-color: #00796b;
        }

        button[type="submit"] {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #005a4f;
        }

        .error-message {
            color: red;
            margin: 10px 0;
            font-size: 14px;
        }

        .success-message {
            color: green;
            margin: 10px 0;
            font-size: 14px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #00796b;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Hero Start -->
    <div class="container-fluid pb-5 bg-light">
        <div class="container py-5" style="justify-content: center;display: flex;">
            <div id="card">
                <!--Profile Info-->
                <div class="media">
                    <div class="left-media">
                        <div class="text" style="margin-top: 40px;">
                            <h3 class="roboto-medium">ImageSeal</h3>
                            <h4 class="roboto-regular">Create Your Account</h4>

                            @if ($errors->any())
                                <div class="error-message">
                                    <ul style="margin: 0; padding-left: 20px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="success-message">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <input type="text" id="username" name="username" placeholder="Username" 
                                    value="{{ old('username') }}" required autofocus>
                                
                                <input type="email" id="email" name="email" placeholder="Email" 
                                    value="{{ old('email') }}" required>
                                
                                <input type="password" id="password" name="password" placeholder="Password" required>
                                
                                <input type="password" id="password_confirmation" name="password_confirmation" 
                                    placeholder="Confirm Password" required>

                                <button type="submit">Register</button>
                            </form>

                            <div class="login-link">
                                <a href="{{ route('login') }}">Already have an account? Login Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>




