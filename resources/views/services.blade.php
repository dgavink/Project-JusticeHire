<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>justicehire - Lawyer Hiring System</title>
    <link rel="stylesheet" href="{{ asset('css/services.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=New+Amsterdam&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&family=Righteous&display=swap" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const scrollLinks = document.querySelectorAll('a[href^="#"]');

                scrollLinks.forEach(link => {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();

                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);

                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            });
            
        </script>

        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="index.html" style="font-family: century gothic;">
                        <img src="img/logo.png" alt="Logo" style="height: 50px; width: auto;">
                        <img src="img/name0.png" alt="Logo" style="height:30px; width: auto;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

    <body>

            @if(Auth::user()->user_type == 'client')
                            
                <section id="services" class="services-section py-5 "> 
                    <div class="container"><br>
                        <h2>Our Services</h2><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="service-box">
                                    <img src="img/appointments.png" alt="Document Preparation">
                                    <h3>Make Appointments</h3>
                                    <p>Effortlessly book appointments with experienced lawyers, tailored to your schedule to meet your needs.</p>
                                    <a href="/appointments" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service-box">
                                    <img src="img/lc.jpg" alt="Legal Consultation">
                                    <h3>Legal Consultation</h3>
                                    <p>Expert advice and guidance on legal matters to help you make informed decisions via a virtual platform.</p>
                                    <a href="/consultC" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                            <div class="col-md-4 align-items-center">
                                <div class="service-box">
                                    <img src="img/legalr.png" alt="Document Preparation">
                                    <h3>Access Legal Resources</h3>
                                    <p>Access essential legal document templates and resources to help you navigate your legal journey.</p>
                                    <a href="/legalrec" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
             
                @elseif(Auth::user()->user_type == 'lawyer')

                <section id="services" class="services-section py-5 "> 
                    <div class="container"><br>
                        <h2>Our Services</h2><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="service-box">
                                    <img src="img/lc.jpg" alt="Legal Consultation">
                                    <h3>Legal Consultation</h3>
                                    <p>Expert advice and guidance on legal matters to help you make informed decisions via a virtual platform.</p>
                                    <a href="/consultC" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service-box">
                                    <img src="img/appointments.png" alt="Document Preparation">
                                    <h3>View Appointments</h3>
                                    <p>View and manage your scheduled appointments with clients and review all your client appointments in one place. </p>
                                    <a href="/lawyerAppointments" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                            <div class="col-md-4 align-items-center">
                                <div class="service-box">
                                    <img src="img/legalr.png" alt="Document Preparation">
                                    <h3>Access Legal Resources</h3>
                                    <p>Access essential legal document templates and resources to help you navigate your legal journey.</p>
                                    <a href="/legalrec" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @elseif(Auth::user()->user_type == 'police')
                <section id="services" class="services-section py-5 "> 
                    <div class="container"><br>
                        <h2>Our Services</h2><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="service-box">
                                    <img src="img/appointments.png" alt="Document Preparation">
                                    <h3>Provide Legal Resources</h3>
                                    <p>Provide legal resources and templates for Lawyers' & clients' reference </p>
                                    <a href="/legalrec" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                            <div class="col-md-6 align-items-center">
                                <div class="service-box">
                                    <img src="img/legalr.png" alt="Document Preparation">
                                    <h3>Provide case history</h3>
                                    <p>Verify lawyers and Provide Case histories for lawyers to handle cases.</p>
                                    <a href="/chistory" class="btn btn-primary">GET</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                @endif

                <footer id = "footer" class="footer text-center ">
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
                                    <li><a href="#services">Services</a></li> 
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="interface.html">Sign in</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h5>Follow Us</h5>
                                <div class="social-icons">
                                    <a href="#"><img src="img/twitter.png" alt="Facebook" class="img-fluid" style="width: 24px; height: 24px;"></a>
                                    <a href="#"><img src="img/facebook.png" alt="Twitter" class="img-fluid" style="width: 24px; height: 24px;"></a>
                                    <a href="#"><img src="img/linkedin.png" alt="LinkedIn" class="img-fluid" style="width: 24px; height: 24px;"></a>
                                    <a href="#"><img src="img/instagram.png" alt="Instagram" class="img-fluid" style="width: 24px; height: 24px;"></a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-4">&copy; 2024 JusticeHire. All rights reserved.</p>
                    </div>
                </footer>

     </body>
</html>


                
                





