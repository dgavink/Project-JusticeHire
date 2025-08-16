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
    
            <section id="consult" class="consult-section">
                <div class="container container-2">
                    <div class = "col-md-12 mt-5 pt-5" >
                        <h2>Schedule Appointments</h2>
                </div>

                </div>
            </section> 

            <section id="viewLawyers" class="view-section fade-in">
                <div class="container container-2">
                <div class="col-md-6 mt-5">
                        <p>
                        <span>Manage</span> your appointments with lawyers easily. View upcoming appointments or schedule a new one that fits your schedule.
                        </p>
                    </div>
                    <div class = "col-md-12 mt-5 " >
                        <h2 class= "view-title text-center">Lawyer</h2>


                        <table>
                            <thead>
                                <tr>
                                    <th>Lawyer ID</th>
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
                                        <td>{{$lawyer->id}}</td>
                                        <td><strong>{{ $lawyer->name }}</strong></td>
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

            @if(Auth::user()->user_type == 'client')

            <section id="schedule" class="schedule-section">
                <div class="container container-4 mt-5 mb-5">
                    <div class="col-md-12 mt-5">
                        <h3>Schedule a New Appointment</h3>
                        <form action="{{ route('appointments.store') }}" method="POST" id="appointmentForm" class="row">
                            @csrf

                            <!-- Auto-filled Client Name -->
                            <div class="col-md-12 text-left mt-4">
                                <label for="clientid" class="form-label">Your name:</label>
                                <input type="text" class="form-control" id="clientname" name="clientid" value="{{ Auth::user()->client->name }}" readonly>
                            </div>

                            <!-- Dropdown Lawyer List -->
                            <div class="col-md-12 text-left mt-4">
                                <label for="lawyer_id" class="form-label">Select Lawyer:</label>
                                <select class="form-control" name="lawyerName" required>
                                    <option value="" disabled selected>Select Lawyers</option>
                                    @foreach($lawyers as $lawyer)
                                        <option value="{{ $lawyer->name }}">{{ $lawyer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Appointment Date & Time -->
                            <div class="col-md-12 text-left mt-4">
                                <label for="appointment_date_time" class="form-label">Appointment Date & Time:</label>
                                <input type="datetime-local" class="form-control" id="appointment_date_time" name="appointment_date_time" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12 align-items-end mt-3 mb-3">
                                <button type="submit" class="btn btn-success">Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        @endif

        <div class="container mt-5">
            <h3>Your Appointments</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($appointments->isEmpty())
                <p>You have no appointments scheduled yet.</p>
            @else
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Lawyer ID</th>
                            <th>Appointment Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th> <!-- Added this column for actions like delete -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->lawyer_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date_time)->format('F d, Y h:i A') }}</td>
                                <td>
                                    @if($appointment->status === 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($appointment->status === 'accepted')
                                        <span class="badge bg-success">Accepted</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <!-- Delete button -->
                                <td>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>


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

</body>
</html>