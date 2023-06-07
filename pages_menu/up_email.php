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
        
        <div class="solo">
            <h1>Welcome to Google Apps!</h1>
 
            <div>
                <h1>UP EMAIL</h1>
                <p>Dear [NAME],

                    <br><br>The UP Mail (@up.edu.ph) is an email service available to all currently enrolled UP students and employed faculty and staff, and offices in partnership with Google. To activate your new e-mail, login to your GMail account via <a href="http://google.com/a/up.edu.ph">http://google.com/a/up.edu.ph</a>.
                    
                    <br><br>Your username is [username] and your temporary password is [password].
                    
                    <br><br>Your new e-mail address in Goolge Apps is [username]@up.edu.ph. You will be prompted to change your password upon log-in.
                    
                    <br><br>To know more about the UP Mail, you may visit <a href="https://itdc.up.edu.ph/uis/the-up-mail">https://itdc.up.edu.ph/uis/the-up-mail</a>.
                    
                    <br><br>Please note that you must enroll your UP Mail account to 2-step verification. This is a REQUIRED step in order to fully access your UP Mail account.
                    
                    <br><br>You MUST follow the screenshots/instructions indicated here: <a href="https://itdc.up.edu.ph/faqs/regain-access-to-up-mail-with-2-step-verification">https://itdc.up.edu.ph/faqs/regain-access-to-up-mail-with-2-step-verification</a>. Please start with step 3.
                    
                    <br><br>Make sure to ENROLL your account to 2-step verification or you will get locked out from your account. Specifically, you MUST press "ENROLL" in step number 6.
                    
                    <br><br>Should you have issues regarding your UP Mail, please submit a request via  <a href="https://www2.upmin.edu.ph">www2.upmin.edu.ph</a> > eservices > UP Mail and wait for a technical support personnel to reach you.
                    
                    <br><br>Please also be informed that we are currently receiving voluminous requests from your fellow students. It may take a while before we can respond to your request. 
                    
                    <br><br>Office hours in the University is at 8:00 AM until 5:00 PM from Monday to Fridays except holidays. If you have sent your request outside office hours, please expect that this is queued for service in the next working day.
                </p>

            </div>
            
        </div>

        <footer>
            <p>Copyright © 2022 NALASA PLARIZA</p>
        </footer>

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>