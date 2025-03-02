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

            $(document).ready(function(){
            $('.fade-element').hide();
            $('.fade-element').fadeIn(2000);
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
            @if(Auth::user()->user_type == 'police')

            
            <section class="upload-section container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card mt-5 shadow-sm">
                            <div class="card-body mt-5">
                                <h2 class="card-title text-center mb-4">Upload Legal Resources</h2>
                                <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                <div class="form-group">
                                        <label for="resource-select">Select Resource Type:</label>
                                        <select class="form-control" id="resource-select" name="resource-type" required>
                                            <option value="selectresource" disabled selected>Select Resource</option>
                                            <option value="constitution">Constitution</option>
                                            <option value="statutes">Statutes and Legislation</option>
                                            <option value="regulations">Regulations</option>
                                            <option value="case-law">Case Law</option>
                                            <option value="treaties">Treaties</option>
                                            <option value="court-rules">Court Rules</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="file-upload">Select a file to upload:</label>
                                        <input type="file" class="form-control-file" id="file-upload" name="file-upload" accept=".docx,.pdf,.txt,.xlsx" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-50">Upload File</button>
                                    </div>
                                </form>
                            </div>
                        </div><br>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            @endif

            <div class="container file-cards-container mt-5">
                <div class="col-md-12 text-center mt-5">
                    <h3>Legal Resources</h3>
             </div>    
                @foreach($legalResources as $resource)
                    <div class="file-card mt-5">
                        <div class="card-content">
                            <img src ="img/doc.png" style = "width: 200px; height: 200px;" >
                            <p class="resource-type">Resource Type:<span> {{ $resource->resource_type }}</span></p>
                            <div class="download-links">
                                <a href="{{ asset('storage/'.$resource->file_path) }}" class="btn-download" download>Download File</a>
                            </div>
                        </div>
                    </div>
            
                @endforeach
            </div>


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



