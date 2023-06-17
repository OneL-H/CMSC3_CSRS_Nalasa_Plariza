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
    <form action="../mainpage_loggedin_bootstrappified.php">
        <button class="fixed-top btn btn-primary m-3" style="width: 5%"
            href="../mainpage_loggedin_bootstrappified.php">Back</button>
    </form>
    <div class="position-absolute row w-100 h-100">
        <form method="POST" action="search_display.php"
            class="border border-2 rounded rounded-2 border-primary bg-light m-2 p-3 w-75 mx-auto my-auto">
            <h2>Record Search</h2>
            <div class="container py-2 px-2">
                <div class="row m-1 p-2 border border-1 border-primary-subtle bg-light-subtle rounded-2">
                    <div class="col col-2 m-2">
                        <label class="form-label" for="stud_num">Student Number:</label>
                        <input class="form-control border border-1 border-primary-subtle" type="text" name="stud_num">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label" for="year_level">Year Level:</label>
                        <input class="form-control border border-1 border-primary-subtle" type="number"
                            name="year_level">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label">Sex:</label>
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="M" id="male" name="male" checked aria-checked="true">
                            <label class="form-check-label" for="flexCheckDefault">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="F" id="female" name="female" checked aria-checked="true">
                            <label class="form-check-label" for="flexCheckDefault">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary-subtle bg-light-subtle rounded-2"><!--select colleges to hit-->
                    <div class="row">
                        <h4>Select Courses:</h2>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BA Communication and Media Arts" id="flexCheckDefault" name="BACMA">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BA Communication and Media Arts
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BA English" id="flexCheckDefault" name="BAE">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BA English
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Agribusiness Economics" id="flexCheckDefault" name="ABE">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Agribusiness Economics
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="ANTHRO" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Anthropology
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Applied Mathematics" id="flexCheckDefault" name="AMATH">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Applied Mathematics
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Architecture" id="flexCheckDefault" name="ARKI">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Architecture
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="" id="flexCheckDefault" name="BIO">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Biology
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Computer Science" id="flexCheckDefault" name="CS">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Computer Science
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Food Technology" id="flexCheckDefault" name="FT">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Food Technology
                                </label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Sports Science" id="flexCheckDefault" name="SS">
                                <label class="form-check-label" for="flexCheckDefault">
                                    BS Sports Science
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary-subtle bg-light-subtle rounded-2 align-items-center">
                    <div class="col-auto">
                        <h4>Select Colleges:</h4>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="CSM" id="CSM" name="CSM">
                            <label class="form-check-label" for="CSM">
                                CSM
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="CHSS" id="CHSS" name="CHSS">
                            <label class="form-check-label" for="CHSS">
                                CHSS
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="SOM" id="SOM" name="SOM">
                            <label class="form-check-label" for="SOM">
                                SOM
                            </label>
                        </div>
                    </div>
                    <div class="d-flex col flex-column align-self-end align-items-end">
                        <button type="submit" class="btn btn-secondary" name="send">Submit</button>
                    </div>
                </div>
                <div class="row m-1">

                </div>
            </div>
        </form>
        <div class="border border-2 rounded rounded-2 border-primary bg-light m-2 p-3 w-75 mx-auto my-auto">
            <div class="row border border-1 rounded rounded-1 border-primary-subtle bg-light-subtle my-auto p-2 m-2 mb-2">
                <div class="d-flex align-items-end">
                    <h2 class="m-1">LASTNAME, </h2>
                    <h4 class="m-1">Firstname, Middle Name </h4>
                    <h6 class="m-1"> (M/F) </h6>
                    <h6 class="ms-auto">20XX-#####</h6>
                </div>
                <hr class="text-black" style="margin: 0.125% !important;">
                <div class="d-flex align-items-center justify-content-around">
                    <span class="m-1">CLG - DEGPROG</span>
                    <span class="m-1">YEAR LEVEL: X</span>
                    <span class="m-1">Units Enlisted: XX</span>
                </div>
                <hr class="text-black" style="margin: 0.125% !important;">
                <div class="row">
                    <span>Birthdate: YYYY-MM-DD</span>
                </div>
                <div class="row">
                    <span>AddressLine3</span>
                </div>
                <div class="row">
                    <span>AddressLine2</span>
                </div>
            </div>
            <div class="row border border-1 rounded rounded-1 border-primary-subtle bg-light-subtle my-auto p-2 m-2 mb-2">
                <div class="d-flex align-items-end">
                    <h2 class="m-1">LASTNAME, </h2>
                    <h4 class="m-1">Firstname, Middle Name </h4>
                    <h6 class="m-1"> (M/F) </h6>
                    <h6 class="ms-auto">20XX-#####</h6>
                </div>
                <hr class="text-black" style="margin: 0.125% !important;">
                <div class="d-flex align-items-center justify-content-around">
                    <span class="m-1">CLG - DEGPROG</span>
                    <span class="m-1">YEAR LEVEL: X</span>
                    <span class="m-1">Units Enlisted: XX</span>
                </div>
                <hr class="text-black" style="margin: 0.125% !important;">
                <div class="row">
                    <span>Birthdate: YYYY-MM-DD</span>
                </div>
                <div class="row">
                    <span>AddressLine3</span>
                </div>
                <div class="row">
                    <span>AddressLine2</span>
                </div>
            </div>
        </div>

    </div>


    <?php
        echo "<script src=\"../popper.min.js\"></script>
        <script src=\"../node_modules/bootstrap/dist/js/bootstrap.min.js\"></script>"
        ?>


</body>

</html>