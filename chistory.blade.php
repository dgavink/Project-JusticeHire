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

            
    <section class="upload-section container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5 shadow-sm">
                    <div class="card-body mt-5">
                        <h2 class="card-title text-center mb-4">Submit Case History</h2>

                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('chistory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="case_id">Select Case ID:</label>
                                <select class="form-control" id="case_id" name="case_id" required>
                                    <option value="" disabled selected>Select Case</option>
                                    @foreach($cases as $case)
                                        <option value="{{ $case->id }}">{{ $case->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="file_attachment">Upload Case History Document:</label>
                                <input type="file" class="form-control-file" id="file_attachment" name="file_attachment" accept=".docx,.pdf" required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary w-50">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
    <h3>Cases List</h3>

    @if($cases->isEmpty())
        <p>No cases available.</p>
    @else
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Case ID</th>
                    <th>Client Name</th>
                    <th>Lawyer Name</th>
                    <th>Holder Name</th>
                    <th>NIC</th>
                    <th>Contact</th>
                    <th>Case Category</th>
                    <th>Court Type</th>
                    <th>Venue</th>
                    <th>Case Date & Time</th>
                    <th>File Attachment</th>

                </tr>
            </thead>
            <tbody>
                @foreach($cases as $case)
                    <tr>
                        <td>{{ $case->id }}</td>
                        <td>{{ $case->client_name }}</td>
                        <td>{{ $case->lawyer_name }}</td>
                        <td>{{ $case->holder_name }}</td>
                        <td>{{ $case->nic }}</td>
                        <td>{{ $case->contact }}</td>
                        <td>{{ $case->case_category }}</td>
                        <td>{{ $case->court_type }}</td>
                        <td>{{ $case->venue }}</td>
                        <td>{{ \Carbon\Carbon::parse($case->case_date_time)->format('F d, Y h:i A') }}</td>
                        <td>
                            @if($case->file_attachment)
                                <a href="{{ asset('uploads/' . $case->file_attachment) }}" target="_blank">View File</a>
                            @else
                                No file uploaded
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<style>
    table {
        background-color: #fff;
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
    }
    thead {
        background-color: #343a40;
        color: white;
    }
    tbody tr:hover {
        background-color: #f2f2f2;
    }
    tbody tr {
        transition: background-color 0.2s ease-in-out;
    }
    .table-hover tbody tr:hover td {
        background-color: #e9ecef;
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }
    h3 {
        color: #d1ae6c;
        font-weight: bold;
    }
    .btn-outline-primary {
        text-decoration: none;
    }
    .badge {
        font-size: 0.9rem;
    }
</style>

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