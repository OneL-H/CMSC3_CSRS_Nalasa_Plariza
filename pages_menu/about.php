<html lang="en">
    <head>
        <title>UP Mindanao CSRS Website</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stylesheet.css">
        <link rel="shortcut icon" href="../favicon.ico">

        <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="../scss/custom_colors.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top mx-auto" style="width: 97%">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <img src="../logo_upmin_2.png" id="logo" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    UPMIN CSRS
                </a>
    
                <div class="navbar-collapse justify-content-end" id="">
                    <div class="row justify-content-end navbar-nav btn-group" style="width: 95%">
                        <div class="col-3">
                            <form action="../mainpage_loggedin_bootstrappified.php">
                                <button class="w-100 btn btn-primary text-center nav-link text-white" href="../mainpage_loggedin_bootstrappified.php">Home</button>
                            </form>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle active"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Sections</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="about.php">about</a></li>
                                <li><a href="privacy.php">privacy notice</a></li>
                                <li><a href="up_email.php">up email</a></li>
                                <li><a href="faq.php">faq</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Student Info</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="../pages_student_info/info.php">student details</a></li>
                                <li><a href="../pages_student_info/prospectus.php">prospectus</a></li>
                                <li><a href="../pages_student_info/calendar.php">academic calendar</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Account</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="../pages_account/pwchange.php">change password</a></li>
                                <li><a href="../mainpage.php">log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="space"></div>
        
        <div class="border bg-light rounded p-4 m-4 shadow">
            <h1>ABOUT</h1>
            <div>
                <p>The Computerized Student Records System (CSRS) is a project of the Information Technology Office through the initiative of Engr. Ronald A. Barriga (2005-2010 IT Director) under the University of the Philippines Mindanao Integrated Information Management System (UPMIIMS) project in 2006.
                   <br><br>In partnership with:
                </p>

                <ul style="list-style-type: disc">
                    <li>Office of the Registrar,</li>
                    <li>Offices of the College Secretary,</li>
                    <li>Office of the Student Affairs,</li>
                    <li>Cash Office,</li>
                    <li>All academic departments,</li>
                    <li>Students of UP Mindanao</li>
                </ul>
                    
                <p><br>Computer Science Special Problems:</p>
                    
                <ul style="list-style-type: disc">
                    <li>Lastimado, R.G.P. 2006. Computerized Student Records System (CSRS)</li>
                    <li>Mendez, R.E. 2007. Registration System (RegSys)</li>
                    <li>Ytac, E.M. 2007. Cash Office Information System</li>
                </ul>

                <p><br>For continuing students, please contact your respective Office of the College Secretary (OCS):</p>

                <ul style="list-style-type: disc">
                    <li>College of Humanities and Social Sciences (CHSS): <a href="mailto: chsscs.upmindanao@up.edu.ph">chsscs.upmindanao@up.edu.ph</a></li>
                    <li>College of Science and Mathematics (CSM): <a href="mailto: csmcs.upmindanao@up.edu.ph">csmcs.upmindanao@up.edu.ph</a></li>
                    <li>School of Management (SOM): <a href="mailto: somcs.upmindanao@up.edu.ph">somcs.upmindanao@up.edu.ph</a></li>
                </ul>
                    
                <p><br>For incoming first year students, please contact the Office of the University Registrar: <a href="mailto: registrar.upmindanao@up.edu.ph">registrar.upmindanao@up.edu.ph</a></p>
            </div>
        </div>
        
        <footer>
            <p>Copyright © 2023 NALASA PLARIZA</p>
        </footer>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>