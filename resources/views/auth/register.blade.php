
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUSTICEHIRE - Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/reg.css')}}">
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
                <a class="btn btn-2" href="{{ route('login')}}">Sign in</a>
            </div>
        </div>
    </nav>

    <section class="registration-section">
        <div class="container form-container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card slide-in">
                        <div class="card-body">
                            <img src="{{asset('img/logo.png')}}" alt="Logo" class="logo-icon">
                            <h3 class="form-header text-center">Sign Up</h3>
                                <div class="form-group">
                                    <label for="user-type">Select User Type</label>
                                    <select class="form-control" name="user_type" onchange="showForm(this.value)">
                                        <option>Select</option>
                                        <option value="client">Client</option>
                                        <option value="lawyer">Lawyer</option>
                                        <option value="police">Police</option>
                                    </select>
                                </div>


                                <form action="{{route('client.post')}}" method="POST">
                                @csrf
                                <div id="client-form" style="display:none;">
                                    <h5>Client Registration</h5>
                                    <div class="form-group">
                                        <label for="client-name">Name</label>
                                        <input type="text" class="form-control" name="client_name" placeholder="Enter name">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="client-nic">NIC Number</label>
                                        <input type="text" class="form-control" name="client_nic" placeholder="Enter NIC number">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="client-address">Address</label>
                                        <input type="text" class="form-control" name="client_address" placeholder="Enter address">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="client-contact">Contact Number</label>
                                        <input type="text" class="form-control" name="client_contact" placeholder="Enter contact number">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="client-email">Email</label>
                                        <input type="email" class="form-control" name="client_email" placeholder="Enter email">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="c-password">Confirm Password</label>
                                        <input type="password" class="form-control" name="c_password" placeholder="Re-enter password">
                                    </div><br>
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button><br>
                                </div>
                                </form>

                                <form action="{{route('lawyer.post')}}" method="POST">
                                @csrf
                                <div id="lawyer-form" style="display:none;">
                                    <h5>Lawyer Registration</h5><br>
                                    <div class="form-group">
                                        <label for="lawyer-reg-number">Government Registration Number</label>
                                        <input type="text" class="form-control" name="lawyer_reg_number" placeholder="Enter registration number">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="lawyer-name">Name</label>
                                        <input type="text" class="form-control" name="lawyer_name" placeholder="Enter name">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="lawyerCategory">Lawyer Category:</label>
                                        <select class="form-control" id="lawyerCategory" name="lawyerCategory" required>
                                            <option value="" disabled selected>Select Lawyer Category</option>
                                            <option value="Criminal Lawyer">Criminal Lawyer</option>
                                            <option value="Civil Litigation Lawyer">Civil Litigation Lawyer</option>
                                            <option value="Corporate Lawyer">Corporate Lawyer</option>
                                            <option value="Family Lawyer">Family Lawyer</option>
                                            <option value="Immigration Lawyer">Immigration Lawyer</option>
                                            <option value="Personal Injury Lawyer">Personal Injury Lawyer</option>
                                            <option value="Intellectual Property Lawyer">Intellectual Property Lawyer</option>
                                            <option value="Employment and Labor Lawyer">Employment and Labor Lawyer</option>
                                            <option value="Tax Lawyer">Tax Lawyer</option>
                                            <option value="Bankruptcy Lawyer">Bankruptcy Lawyer</option>
                                            <option value="Environmental Lawyer">Environmental Lawyer</option>
                                            <option value="Real Estate Lawyer">Real Estate Lawyer</option>
                                            <option value="Estate Planning Lawyer">Estate Planning Lawyer</option>
                                            <option value="Human Rights Lawyer">Human Rights Lawyer</option>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="courtCategory">Court Category:</label>
                                        <select class="form-control" id="courtCategory" name="courtCategory" required>
                                            <option value="" disabled selected>Select Court Category</option>
                                            <option value="Supreme Court">Supreme Court</option>
                                            <option value="High Court">High Court</option>
                                            <option value="Court of Appeals">Court of Appeals</option>
                                            <option value="District Court">District Court</option>
                                            <option value="Magistrates' Court">Magistrates' Court</option>
                                            <option value="Circuit Court">Circuit Court</option>
                                            <option value="County Court">County Court</option>
                                            <option value="Family Court">Family Court</option>
                                            <option value="Juvenile Court">Juvenile Court</option>
                                            <option value="Sessions Court">Sessions Court</option>
                                            <option value="Crown Court">Crown Court</option>
                                            <option value="Tribunals">Tribunals</option>
                                            <option value="Coroner’s Court">Coroner’s Court</option>
                                            <option value="Local Court">Local Court</option>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="yearsOfExperience">Years of Experience:</label>
                                        <input type="number" class="form-control" id="yearsOfExperience" name="yearsOfExperience" required placeholder="Enter Years of Experience">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="lawyer-email">Email</label>
                                        <input type="email" class="form-control" name="lawyer_email" placeholder="Enter email">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="lawyer-contact">Contact Number</label>
                                        <input type="text" class="form-control" name="lawyer_contact" placeholder="Enter contact number">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="lawyer-address">Address</label>
                                        <input type="text" class="form-control" name="lawyer_address" placeholder="Enter address">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Enter password">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="c-password">Confirm Password</label>
                                        <input type="text" class="form-control" name="c_password" placeholder="Re-enter password">
                                    </div><br>
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button><br>
                                </div>
                                </form>

                                <form action="{{route('police.post')}}" method="POST">
                                @csrf
                                <div id="police-form" style="display:none;">
                                    <h5>Police Registration</h5>
                                    <div class="form-group">
                                        <label for="police-division-name">Police Division Name</label>
                                        <input type="text" class="form-control" name="police_division_name" placeholder="Enter division name">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="police-division-id">Division ID</label>
                                        <input type="text" class="form-control" name="police_division_id" placeholder="Enter division ID">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Enter password">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="c-password">Confirm Password</label>
                                        <input type="text" class="form-control" name="c_password" placeholder="Re-enter password">
                                    </div><br>
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button><br>
                                </div>
                                </form>

                                <div class="text-center mt-3">
                                    <p>Already have an account? <a href="{{route('login')}}"> Sign in</a></p>
                                </div>
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
                        <li><a href="interface.html">Sign in</a></li>
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

    <script>
        function showForm(userType) {
            document.getElementById('client-form').style.display = 'none';
            document.getElementById('lawyer-form').style.display = 'none';
            document.getElementById('police-form').style.display = 'none';

            if (userType === 'client') {
                document.getElementById('client-form').style.display = 'block';
            } else if (userType === 'lawyer') {
                document.getElementById('lawyer-form').style.display = 'block';
            } else if (userType === 'police') {
                document.getElementById('police-form').style.display = 'block';
            }
        }
    </script>
</body>
</html>

