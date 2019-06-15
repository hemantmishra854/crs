<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="css/home.css" rel="stylesheet">
    <script src="js/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>
    <div class="menubar">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top ">
            <a href="index.php" class="navbar-brand"><span class="text-warning">C</span><span class="text-alert">R</span><span class="text-warning">S</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapseContent">
                <ul class="navbar-nav mr-auto ml-lg-5" id="first-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true">Services</a>
                        <div class="dropdown-menu" arialabelledby="dropdownMenu">
                            <a href="#" class="dropdown-item">Online Test</a>
                            <a href="#" class="dropdown-item">Career advice</a>
                            <a href="#" class="dropdown-item">Interview preparation</a>
                            <a href="#" class="dropdown-item">Help</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="comapanyMenu" data-toggle="dropdown" aria-haspopup="true">Companies</a>
                        <div class="dropdown-menu" arialabelledby="companyMenu">
                            <a href="#" class="dropdown-item">IT</a>
                            <a href="#" class="dropdown-item">Manufacturing</a>
                            <a href="#" class="dropdown-item">HealthCare</a>
                            <a href="#" class="dropdown-item">Hospitality</a>
                            <a href="#" class="dropdown-item">Finance</a>
                            <a href="#" class="dropdown-item">Insurance</a>
                            <a href="#" class="dropdown-item">Banking</a>
                            <a href="#" class="dropdown-item">Education</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="recruiterMenu" data-toggle="dropdown" aria-haspopup="true">Recruiter Zone</a>
                        <div class="dropdown-menu" arialabelledby="dropdownMenu">
                            <a href="employer-login.php" class="dropdown-item">Login</a>
                            <a href="post-job.php" class="dropdown-item">Post Job</a>
                        </div>
                    
                    </li>
                </ul>
                <a href="login.php" class="nav-link btn-primary  mr-lg-2 rounded" id="loginLink">Login</a>
                <a href="signup.php" class="nav-link btn-primary mt-2 mt-lg-0 rounded" id="registerLink">Signup</a>

            </div>
        </nav>
    </div>
