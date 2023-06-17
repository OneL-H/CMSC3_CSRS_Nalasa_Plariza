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

        <style>
            .link_container {
                display: flex;
                flex-wrap: wrap;
                margin-bottom: 2%;
            }

            .link_container>a {
                background-color: #7b1112;
                color: white;
                padding: 1% 1.25%;
                margin: 0.5% 0.625%;
                text-align: center;
                text-decoration: none;
                display: block;
                ;
            }

            .link_container>a:hover {
                background-color: #7b1113dc;
            }
        </style>
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
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Sections</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="../pages_menu/about.php">about</a></li>
                                <li><a href="../pages_menu/privacy.php">privacy notice</a></li>
                                <li><a href="../pages_menu/up_email.php">up email</a></li>
                                <li><a href="../pages_menu/faq.php">faq</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle active"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Student Info</button>
                            <ul class="dropdown-menu dropdown-menu-start w-100 px-2">
                                <li><a href="info.php">student details</a></li>
                                <li><a href="student_search.php">record search</a></li>
                                <li><a href="prospectus.php">prospectus & grades</a></li>
                                <li><a href="calendar.php">academic calendar</a></li>
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

        <div class="border bg-light rounded p-4 m-4 shadow-sm">
            <h1>PROSPECTUS DOCUMENTS</h1>
            
            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">

                <h3>College of Humanities and Social Sciences</h3>
                <div class="btn-group mb-4" role="group">
                    <a href="prospectus_pdfs\BA_Anthropology.pdf" class="btn btn-lg btn-outline-primary">BS Anthropology</a>
                    <a href="prospectus_pdfs\BS_Architecture.pdf" class="btn btn-lg btn-outline-primary">BS Architecture</a>
                    <a href="prospectus_pdfs\BA_English_Creative_Writing.pdf" class="btn btn-lg btn-outline-primary">BA English</a>
                </div>

                <h3>College of Science and Mathematics</h3>
                <div class="btn-group mb-4" role="group">
                    <a href="prospectus_pdfs\BS_Applied_Mathematics.pdf" class="btn btn-lg btn-outline-primary">BS Applied Mathematics</a>
                    <a href="prospectus_pdfs\BS_Biology.pdf" class="btn btn-lg btn-outline-primary">BS Biology</a>
                    <a href="prospectus_pdfs\BS_Computer_Science.pdf" class="btn btn-lg btn-outline-primary">BS Computer Science</a>
                </div>

                <h3>School of Management</h3>
                <div class="btn-group mb-4" role="group">
                    <a href="prospectus_pdfs\BS_Agribusiness_Economics.pdf" class="btn btn-lg btn-outline-primary">BS Agribusiness Economics</a>
                    <a href="prospectus_pdfs\PHD_Research.pdf" class="btn btn-lg btn-outline-primary">PhD by Research</a>
                </div>
            </div>
        </div>

        <footer>
            <p>Copyright © 2023 NALASA PLARIZA</p>
        </footer>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>