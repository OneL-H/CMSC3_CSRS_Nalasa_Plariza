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
        <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top" style="width: 97%">
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
                            <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                                <li><a href="about.php">about</a></li>
                                <li><a href="privacy.php">privacy notice</a></li>
                                <li><a href="up_email.php">up email</a></li>
                                <li><a href="faq.php">faq</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Student Info</button>
                            <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                                <li><a href="../pages_student_info/sdis.php">sdis</a></li>
                                <li><a href="../pages_student_info/prospectus.php">prospectus & grades</a></li>
                                <li><a href="../pages_student_info/sched.php">class schedule</a></li>
                                <li><a href="../pages_student_info/residency.php">residency</a></li>
                                <li><a href="../pages_student_info/matric.php">matriculation</a></li>
                                <li><a href="../pages_student_info/calendar.php">personal calendar</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Account</button>
                            <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                                <li><a href="../pages_account/pwchange.php">change password</a></li>
                                <li><a href="../mainpage.php">log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        <div id="space"></div>

        <div class="solo">
            <h1>FREQUENTLY ASKED QUESTIONS</h1>
            <div>
                <h1>Who are the CSRS Administrators?</h1>
                <ul style="list-style-type: disc">
                    <li>Office of the Registrar</li>
                    <li>Offices of the College Secretary</li>
                </ul>
            </div>

            <div>
                <h1>What if I forgot my password?</h1>
                <p>Go to your adviser, department chair or to the Office of the College Secretary and ask them to change your password.
                    <br>You may contact your respective Office of the College Secretary through the following email addresses:<br><br></p>

                <ul style="list-style-type: none">
                    <li>CHSS OCS <a href="mailto: chsscs.upmindanao@up.edu.ph">chsscs.upmindanao@up.edu.ph</a></li>
                    <li>CSM OCS <a href="mailto: csmcs.upmindanao@up.edu.ph">csmcs.upmindanao@up.edu.ph</a></li>
                    <li>SOM OCS <a href="mailto: somcs.upmindanao@up.edu.ph">somcs.upmindanao@up.edu.ph</a></li>
                </ul>

                <p><br><strong>TIP:</strong> It's good to establish and maintain good communication lines with your registration adviser.</p>
            </div>

            <div>
                <h1>Who is my registration adviser?</h1>
                <p>Registration advisers are assigned by your respective department chairs.</p>
            </div>
        </div>

        <footer>
            <p>Copyright © 2022 NALASA PLARIZA</p>
        </footer>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>