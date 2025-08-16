
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUSTICEHIRE - Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/sin.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html" style="font-family: century gothic;">
                <img src="{{asset('img/logo.png')}}" alt="Logo" style="height: 50px; width: auto;">
                <img src="{{asset('img/name0.png')}}" alt="Logo" style="height:30px; width: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Home</a></li>
                </ul>
                <a class="btn btn-2" href="{{route('register')}}">Sign Up</a>
            </div>
        </div>
    </nav>
    <section class="sign-in-section d-flex align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card slide-in">
                        <div class="card-body">
                            <img src="{{asset('img/logo.png')}}" alt="Logo" class="logo-icon">
                            <h2 class="text-center mb-4">Sign In</h2>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{route('login.post')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username :</label>
                                    <input type="username" class="form-control" name="username" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                </div><br>
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                <div class="text-center mt-3">
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="text-center mt-3">
                                    <p>Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer text-center fade-in">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p><i class="fas fa-map-marker-alt"></i> 123/A, Justice Lane, Havelock Road, Sri Lanka</p>
                    <p><i class="fas fa-phone"></i> +94 71 218 6656</p>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:info@justicehire.com">info@justicehire.com</a></p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="sin.html">Sign in</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><img src="{{asset('img/twitter.png')}}" alt="Twitter" class="img-fluid" style="width: 24px; height: 24px;"></a>
                        <a href="#"><img src="{{asset('img/facebook.png')}}" alt="Facebook" class="img-fluid" style="width: 24px; height: 24px;"></a>
                        <a href="#"><img src="{{asset('img/linkedin.png')}}" alt="LinkedIn" class="img-fluid" style="width: 24px; height: 24px;"></a>
                        <a href="#"><img src="{{asset('img/instagram.png')}}" alt="Instagram" class="img-fluid" style="width: 24px; height: 24px;"></a>
                    </div>
                </div>
            </div>
            <p class="mt-4">&copy; 2024 JUSTICEHIRE. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
