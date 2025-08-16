<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>justicehire - Lawyer Hiring System</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=New+Amsterdam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&family=Righteous&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head> 
<body>
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

        $(document).ready(function(){
            $('.fade-element').hide();
            $('.fade-element').fadeIn(2000);
        });

    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-family: century gothic;">
                <img src="img/logo.png" alt="Logo" style="height: 50px; width: auto;">
                <img src="img/name0.png" alt="Logo" style="height:30px; width: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse slide-in-right" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#footer">Contact Us</a></li>
                </ul>
                <div class="dropdown">
                    <img src="img/user.png" style="height: 25px; width:auto;" alt="profile" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 30px; width: 30px; cursor: pointer;">
                    {{ Auth::user()->username }}
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <a class="dropdown-item  border-radius-30" href="/">LogOut</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
                @if(Auth::user()->user_type == 'client')
                <header class="hero-section d-flex align-items-center fade-in">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Welcome to justice<span>hire</span></h1>
                                <p>Connecting You with Trusted Legal Experts. Welcome {{ Auth::user()->username }}.</p>
                                <a href="#services" class="btn btn-1">Explore our Services</a> 
                            </div>
                        </div>
                    </div>
                </header>

                
                    <section id="services" class="services-section py-5 fade-in"> 
                        <div class="container"><br>
                            <h2>Explore Our Services</h2><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="service-box">
                                        <img src="img/lc.png" alt="Legal Consultation">
                                        <h3>Legal Consultation</h3>
                                    
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="service-box">
                                    <img src="img/app.png" alt="Document Preparation">
                                    <h3>Make Appointments</h3>
                            
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="service-box">
                                        <img src="img/templates.png" alt="Document Preparation">
                                        <h3>Access Legal Resources</h3>
                                        
                                    </div>
                                </div>
                                <a href="/services" class="btn btn-primary">view All</a>
                            </div>
                        </div>
                    </section>

                @elseif(Auth::user()->user_type == 'lawyer')
                <style>               
                        .hero-section {
                            background: url('img/homel.jpg') no-repeat center center;
                            background-size: cover;
                            color: #000;
                            height: 100vh;
                            display: flex;
                            justify-content: center;
                            align-items: center; 
                            text-align: center; 
                        }

                        .hero-section .container {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            flex-direction: column; 
                        }

                        .hero-section h1 {
                            font-size: 5rem;
                            margin-bottom: 20px;
                            white-space: nowrap; 
                            justify-content: center;
                            align-items: center; 
                            text-align: center; 
                        }

                        .hero-section p {
                            font-size: 50px;
                            margin-bottom: 40px;
                            text-align: center;
                            font-weight: 500;
                            white-space: nowrap; 
                            color: #808080;
                        }


                        .hero-section span {
                            color: #d1ae6c;

                        }

                        .hero-section .btn {
                            background-color: #363435;
                            border: none;
                            padding: 10px 20px;
                            color: #fff;
                            width: 200px;
                            font-size: 16px;
                            border-radius: px;
                            text-transform: uppercase;
                            align-self: flex-start;
                            
                        }

                        .hero-section .btn:hover {
                            background-color: #d1ae6c;
                            color: #fff;
                        }


                        .container-4 {
                            width: 800px !important;
                            border-radius: 30px;
                            background:transparent;
                        }

                        .container-4 h3 {
                            color: #d1ae6c;
                            text-align: center;
                            margin-top: 40px;
                        }

                        .container-4 h3 {
                            color: #d1ae6c;
                            text-align: center;
                            margin-top: 40px;
                        }

                        /* Form Row Styling */
                        .row {
                            display: flex;
                            flex-wrap: wrap;
                            margin-bottom: 20px;
                            align-items: center;
                        }

                        /* Label Styling */
                        .form-label {
                            flex-basis: 25%; /* Label takes 25% of the space */
                            font-weight: 600;
                            font-size: 16px;
                            color: #495057;
                            text-align: right; /* Align label text to the right */
                            margin-right: 10px;
                        }

                        .form-control{
                            height: 45px;
                            border-radius: 30px !important;
                            border: 1px solid #d1ae6c !important;
                            font-size: 16px;
                            padding-left: 10px;
                            background: transparent !important;
                        }
                        .form-select {
                            flex-basis: 70%; /* Input/Select takes 70% of the space */
                            height: 45px;
                            border-radius: 30px;
                            border: 1px solid #ced4da;
                            font-size: 16px;
                            padding-left: 10px;
                        }

                        /* Button Styling */
                        .btn-primary {
                            background-color: #333 !important;
                            width: 100px;
                            border-color: #333 !important;
                            padding: 10px 20px;
                            font-size: 16px;
                            border-radius: 30px !important;
                            transition: background-color 0.3s ease;
                            margin-left: auto; /* Align button to the right */
                        }

                        .btn-primary:hover {
                            background-color: #d1ae6c !important;
                            border: #d1ae6c;
                        }

                        .btn-success {
                            background: #333 !important;
                            width: 100px;
                            border-radius: 30px !important;
                        }
                        .btn-success:hover {
                            background-color: #d1ae6c !important;
                            border: #d1ae6c;
                        }

                        .lawyer-specialization-section {
                           background: #fff;
                        }

                        .h3-title {
                            text-align: center !important;
                        }

                        .services-section {
                            margin-top: 10px;
                        }
                        .container h2 {
                            font-size: 2.5rem;
                            text-align: center;
                            margin-bottom: 20px;
                            color: #333;
                        }
                        .service-box {
                            background: #ffffff;
                            border-radius: 20px;
                            text-align: center;
                            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                            position: relative;
                            box-sizing: border-box;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            height: auto;
                            padding-left: 20px;
                            padding-right: 20px;
                            margin-top: 20px;
                            overflow: hidden;
                        }

                        .service-box img {
                            position: relative;
                            max-width: 80px;
                            margin-bottom: 15px;
                            z-index: 2; 
                        }

                        .service-box i {
                            font-size: 3rem;
                            color: #007bff;
                            margin-bottom: 15px;
                            z-index: 2; 
                        }

                        .service-box h3 {
                            margin-top: 10px;
                            font-size: 1.5rem;
                            color: #333;
                            z-index: 2; 
                        }

                        .service-box p {
                            color: #666;
                            margin-top: 15px;
                            z-index: 2; 
                        }


                        .btn-primary {
                            background-color: #060103 !important;
                            border-color: #333 !important;
                            padding: 10px 20px;
                            color: #fff;
                            font-size: 20px !important;
                            border-radius: 10px !important;
                            text-transform: uppercase;
                            text-decoration: none;
                            display: block; 
                            margin-top: 35px;
                            margin-left: auto;
                            margin-right: auto; 
                            height: auto;
                            width: 200px;
                            text-align: center; 
                        }


                        .btn-primary:hover {
                            background-color: #d1ae6c !important;
                            border-color: #d1ae6c !important;
                        }

                </style>
                <header class="hero-section d-flex align-items-center fade-in">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Welcome to justice<span>hire</span></h1>
                                <p>Attorney : {{ Auth::user()->username }}</p>
                                <a href="#services" class="btn btn-1">Explore</a> 
                            </div>
                        </div>
                    </div>
                </header>
          
                
                <section id="lawyer-specialization" class="lawyer-specialization-section">
               
            </section>
            

                <section id="services" class="services-section py-5 fade-in"> 
                    <div class="container"><br>
                        <h2>Explore Our Services</h2><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="service-box">
                                    <img src="img/lc.png" alt="Legal Consultation">
                                    <h3>Legal Consultation</h3>
                                
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="service-box">
                                <img src="img/app.png" alt="Document Preparation">
                                <h3>Make Appointments</h3>
                        
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="service-box">
                                    <img src="img/templates.png" alt="Document Preparation">
                                    <h3>Access Legal Resources</h3>
                                    
                                </div>
                            </div>
                            <a href="/services" class="btn btn-primary">view All</a>
                        </div>
                    </div>
                </section>

                @elseif(Auth::user()->user_type == 'police')

                <style>
                    
                    .hero-section {
                        background: url('../img/homep.jpg') no-repeat center center;
                        background-size: cover;
                        color: #000;
                        height: 100vh;
                        display: flex;
                        justify-content: center;
                        align-items: center; 
                        text-align: center; 
                    }

                    .hero-section .container {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column; 
                    }

                    .hero-section h1 {
                        font-size: 5rem;
                        margin-bottom: 20px;
                        white-space: nowrap; 
                        justify-content: center;
                        align-items: center; 
                        text-align: center; 
                    }

                    .hero-section p {
                        font-size: 50px;
                        margin-bottom: 40px;
                        text-align: center;
                        font-weight: 500;
                        white-space: nowrap; 
                        color: #808080;
                    }


                    .hero-section span {
                        color: #d1ae6c;

                    }

                    .hero-section .btn {
                        background-color: #363435;
                        border: none;
                        padding: 10px 20px;
                        color: #fff;
                        width: 200px;
                        font-size: 16px;
                        border-radius: px;
                        text-transform: uppercase;
                        align-self: flex-start;
                        
                    }

                    .hero-section .btn:hover {
                        background-color: #d1ae6c;
                        color: #fff;
                    }

                    .services-section {
                        margin-top: 10px;
                    }
                    .container h2 {
                        font-size: 2.5rem;
                        text-align: center;
                        margin-bottom: 20px;
                        color: #333;
                    }
                    .service-box {
                        background: #ffffff;
                        border-radius: 20px;
                        text-align: center;
                        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                        position: relative;
                        box-sizing: border-box;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        height: auto;
                        padding-left: 20px;
                        padding-right: 20px;
                        margin-top: 20px;
                        overflow: hidden;
                    }

                    .service-box img {
                        position: relative;
                        max-width: 80px;
                        margin-bottom: 15px;
                        z-index: 2; 
                    }

                    .service-box i {
                        font-size: 3rem;
                        color: #007bff;
                        margin-bottom: 15px;
                        z-index: 2; 
                    }

                    .service-box h3 {
                        margin-top: 10px;
                        font-size: 1.5rem;
                        color: #333;
                        z-index: 2; 
                    }

                    .service-box p {
                        color: #666;
                        margin-top: 15px;
                        z-index: 2; 
                    }


                    .btn-primary {
                        background-color: #060103 !important;
                        border-color: #333 !important;
                        padding: 10px 20px;
                        color: #fff;
                        font-size: 20px !important;
                        border-radius: 10px !important;
                        text-transform: uppercase;
                        text-decoration: none;
                        display: block; 
                        margin-top: 35px;
                        margin-left: auto;
                        margin-right: auto; 
                        height: auto;
                        width: 200px;
                        text-align: center; 
                    }


                    .btn-primary:hover {
                        background-color: #d1ae6c !important;
                        border-color: #d1ae6c !important;
                    }
                </style>
                 <header class="hero-section d-flex align-items-center fade-in">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-12 ">
                                <h1>Welcome to justice<span>hire</span></h1>
                                <p>Police : {{ Auth::user()->username }}</p>
                                <a href="#services" class="btn btn-1">Explore</a> 
                            </div>
                        </div>
                    </div>
                 </header>

                 <section id="services" class="services-section py-5 fade-in"> 
                    <div class="container"><br>
                        <h2>Our Main Services</h2><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="service-box">
                                    <img src="img/case.png" alt="Document Preparation">
                                    <h3>Provide Legal Resources</h3>
                       
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-box">
                                    <img src="img/case.png" alt="Document Preparation">
                                    <h3>Provide Case History</h3>

                                </div>
                            </div>
                            <a href="/services" class="btn btn-primary">VIEW</a>
                        </div>
                    </div>
                 </section>

                @endif

                <section id="about" class="about-section fade-in">
                        <div class="container">
                            <h2>About Us</h2>
                            <p>Welcome to JusticeHire. At JusticeHire, we are dedicated to connecting you with trusted legal experts who can provide the support and guidance you need. Our mission is to simplify the process of finding and hiring legal professionals, ensuring that you have access to top-tier legal services tailored to your unique needs.</p>
                            <p>Founded with a vision to enhance the accessibility and quality of legal services, JusticeHire brings together a team of seasoned professionals and innovative technology. We understand that navigating the legal landscape can be complex and overwhelming. Our goal is to make this journey smoother and more efficient by offering a streamlined platform that connects you with the right legal experts.</p>
                            <p>Our Values:</p>
                            <ul>
                                <li><strong>Integrity:</strong> We prioritize transparency and honesty in all our interactions. Our platform is designed to provide you with clear and reliable information about legal professionals.</li>
                                <li><strong>Expertise:</strong> Our network includes highly qualified attorneys and legal consultants with extensive experience in various fields of law. We are committed to matching you with professionals who have the expertise to handle your specific legal needs.</li>
                                <li><strong>Customer-Centric Approach:</strong> Your satisfaction is our top priority. We strive to understand your requirements and provide personalized solutions that meet your expectations.</li>
                                <li><strong>Innovation:</strong> We continuously invest in technology and process improvements to enhance the efficiency and effectiveness of our services. Our platform is designed to offer a seamless user experience, making it easier for you to find and connect with legal professionals.</li>
                            </ul>
                            <p>With JusticeHire, you gain access to a network of trusted legal experts and a platform that simplifies the process of finding the right legal assistance. Our commitment to excellence and customer satisfaction sets us apart, ensuring that you receive the highest level of service and support.</p>
                            <p>Thank you for choosing JusticeHire. We look forward to helping you navigate your legal journey with confidence and ease.</p>
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
            </div>
        </div>
    </div>