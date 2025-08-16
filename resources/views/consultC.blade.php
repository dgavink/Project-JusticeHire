
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>justicehire - Lawyer Hiring System</title>
    <link rel="stylesheet" href="{{ asset('css/consult.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=New+Amsterdam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&family=Righteous&display=swap" rel="stylesheet">
</head>
<body>

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
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="consult" class="consult-section">
        <div class="container container-2">
            <div class = "col-md-12 mt-5 pt-5" >
                <h2>Legal Consultation</h2>
           </div>

        </div>
    </section> 

    @if(Auth::user()->user_type == 'client')

    <section id="viewLawyers" class="view-section fade-in">
        <div class="container container-2">
        <div class="col-md-6 mt-5">
                <p>
                    <span>Get</span> expert legal advice from experienced lawyers through secure virtual consultations, with flexible scheduling to suit your needs from the comfort of your home or office.
                </p>
            </div>
            <div class = "col-md-12 mt-5 " >
                <h2 class= "view-title text-center">Lawyers</h2>

                <table>
                    <thead>
                        <tr>
                        
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Address</th>
                            <th>Gov Registration No</th>
                            <th>Lawyer Category</th>
                            <th>Court Category</th>
                            <th>Years of Experience</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lawyers as $lawyer)
                            <tr>
                                
                                <td>{{ $lawyer->name }}</td>
                                <td>{{ $lawyer->email }}</td>
                                <td>{{ $lawyer->contactNo }}</td>
                                <td>{{ $lawyer->address }}</td>
                                <td>{{ $lawyer->govRegistrationNumber }}</td>
                                <td>{{ $lawyer->lawyerCategory }}</td>
                                <td>{{ $lawyer->courtCategory }}</td>
                                <td>{{ $lawyer->yearsOfExperience }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


           </div>
        </div>
    </section> 

    <section id = "case" class="case-section" > 
        <div class="container container-4 mt-5">
            <div class="col-md-12">
                <h3>Submit your Case Details</h3>
                <form id="consultationForm" method="POST" action="{{ route('case.store') }}" enctype="multipart/form-data" class="row">
    @csrf 
    
    <div class="col-md-12 text-left mt-4">
        <label for="lawyerName" class="form-label">Select lawyer:</label>
        <select class="form-control" name="lawyerName" required>
         <option value="" disabled selected>Select Lawyer</option>
            @foreach($lawyers as $lawyer)
                <option value="{{ $lawyer->name }}">{{ $lawyer->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-12 text-left mt-4">
        <label for="clientName" class="form-label">Client's Name:</label>
        <input type="text" class="form-control" name="clientName" value="{{ Auth::user()->client->name }}" readonly>
    </div>
    <div class="col-md-12 text-left mt-4">
        <label for="holdername" class="form-label">Case Holder's full name:</label>
        <input type="text" class="form-control" name="holdername" placeholder="Enter Case holder's full name" required>
    </div>
    
    <div class="col-md-12 text-left mt-4">
        <label for="nic" class="form-label">NIC (National ID):</label>
        <input type="text" class="form-control" name="nic" placeholder="Enter Your NIC" required>
    </div>

    <div class="col-md-12 text-left mt-4">
        <label for="contact" class="form-label">Contact No:</label>
        <input type="text" class="form-control" name="contact" placeholder="Enter Your Contact" required>
    </div>

    <div class="col-md-12 text-left mt-4">
        <label for="caseCategory" class="form-label">Case Category:</label>
        <input type="text" class="form-control" name="caseCategory" placeholder="Enter Case Category" required>
    </div>

    <div class="col-md-12 text-left mt-4">
        <label for="courtType" class="form-label">Court Type (mostly):</label>
        <input type="text" class="form-control" name="courtType" placeholder="Enter Court Type" required>
    </div>

    <div class="col-md-12 text-left mt-4">
        <label for="venue" class="form-label">Venue:</label>
        <input type="text" class="form-control" name="venue" placeholder="Enter the Venue" required>
    </div>

    <div class="col-md-12 text-left mt-4">
        <label for="caseDateTime" class="form-label">Case Date & Time:</label>
        <input type="datetime-local" class="form-control" name="caseDateTime" required>
    </div>

    <div class="col-md-12 text-left mt-4">
        <label for="fileAttachment" class="form-label">Attach Case Document:</label>
        <input type="file" id="fileAttachment" name="fileAttachment[]" multiple>
    </div>

    <div class="col-md-12 align-items-end mt-3">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>

            </div>
        </div>
    </section>

    @elseif(Auth::user()->user_type == 'lawyer')

    @foreach($lawyerCases as $case)
    <div class="card-body">
    <h3 class = "col-md-12 text-center "><strong>Cases for you</strong></h3>
    <style> 
    h3{
        color:#d1ae6c;
    }
    </style>
                <table class="table table-bordered table-striped mx-auto w-50">
                    <tbody>
                        <tr>
                            <th>Lawyer's Name</th>
                            <td>{{ $case->lawyer_name }}</td>
                        </tr>
                        <tr>
                            <th>Client's Name</th>
                            <td>{{ $case->client_name }}</td>
                        </tr>
                        <tr>
                            <th>Holder's Name</th>
                            <td>{{ $case->holder_name }}</td>
                        </tr>
                        <tr>
                            <th>NIC</th>
                            <td>{{ $case->nic }}</td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td>{{ $case->contact }}</td>
                        </tr>
                        <tr>
                            <th>Case Category</th>
                            <td>{{ $case->case_category }}</td>
                        </tr>
                        <tr>
                            <th>Court Type</th>
                            <td>{{ $case->court_type }}</td>
                        </tr>
                        <tr>
                            <th>Venue</th>
                            <td>{{ $case->venue }}</td>
                        </tr>
                        <tr>
                            <th>Case Date & Time</th>
                            <td>{{ $case->case_date_time }}</td>
                        </tr>
                        <tr>
                            <th>Attached Documents</th>
                            <td>
                            @if($case->file_attachment)
                                <a href="{{ asset('uploads/' . $case->file_attachment) }}" target="_blank">View File</a>
                            @else
                                No file uploaded
                            @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
    
    <form action="{{ route('case.search') }}" method="POST" class="mt-4">
        @csrf
        <div class = "col-md-12 text-center mt-4 ">
            <strong>You can view any case by searching the case holder's NIC here. </strong>
        </div><br>
        <div class="form-group row justify-content-center">
            <label for="nic" class="col-md-12 text-center col-form-label">Enter Case holder's NIC :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nic" name="nic" placeholder="Search" required>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-sm-6 text-center">
                <button type="submit" class="btn btn-primary ">Search</button>
            </div>
        </div>
    </form>

    @if(request()->isMethod('post'))
            <div class="alert alert-danger text-center w-50 mx-auto mt-5">No case files for you by the entered NIC.</div>
            @endif

    
    @if(isset($cases))
    
        <div class="card bg-transparent ">
            <div class="card-header bg-transparent text-center w-50 mx-auto mt-5">
                <h3 class="mb-0">Case Details</h3>
            </div>
            @foreach($cases as $case)

            <div class="card-body">
                <table class="table table-bordered table-striped mx-auto w-50">
                    <tbody>
                        <tr>
                            <th>Lawyer's Name</th>
                            <td>{{ $case->lawyer_name }}</td>
                        </tr>
                        <tr>
                            <th>Client's Name</th>
                            <td>{{ $case->client_name }}</td>
                        </tr>
                        <tr>
                            <th>Holder's Name</th>
                            <td>{{ $case->holder_name }}</td>
                        </tr>
                        <tr>
                            <th>NIC</th>
                            <td>{{ $case->nic }}</td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td>{{ $case->contact }}</td>
                        </tr>
                        <tr>
                            <th>Case Category</th>
                            <td>{{ $case->case_category }}</td>
                        </tr>
                        <tr>
                            <th>Court Type</th>
                            <td>{{ $case->court_type }}</td>
                        </tr>
                        <tr>
                            <th>Venue</th>
                            <td>{{ $case->venue }}</td>
                        </tr>
                        <tr>
                            <th>Case Date & Time</th>
                            <td>{{ $case->case_date_time }}</td>
                        </tr>
                        <tr>
                            <th>Attached Documents</th>
                            <td>
                                @if($case->file_attachment)
                                    @php
                                        $fileNames = explode(',', $case->file_attachment);
                                    @endphp
                                    @foreach($fileNames as $fileName)
                                        <a href="{{ asset('storage/case_attachments/' . $fileName) }}" class="btn btn-link" download="{{ $fileName }}">
                                            {{ $fileName }}
                                        </a><br>
                                    @endforeach
                                @else
                                    <span>No file attached.</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach

        </div>
    </div>

    </div>

        @else
            
        @endif
        

    @endif
    
    <footer id = "footer" class="footer text-center fade-in">
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
 


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    
</body>
</html>
