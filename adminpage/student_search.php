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
    <form action="adminlanding.php">
        <button class="fixed-top btn btn-primary m-3" style="width: 5%">Back</button>
    </form>
    <div class="position-absolute row w-100 h-100">
        <form method="POST" action="search_display.php"
            class="border border-2 rounded rounded-2 border-primary bg-light shadow m-2 p-3 w-75 mx-auto my-auto">
            <h2>Record Search</h2>
            <div class="container py-2 px-2">
                <div class="row m-1 p-2 border border-1 border-primary bg-light-subtle rounded-2">
                    <div class="col col-2 m-2">
                        <label class="form-label" for="stud_num">Student Number (year):</label>
                        <input class="form-control border border-1 border-primary-subtle" type="text" id="stud_num" name="stud_num_year">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label" for="stud_num_number">Student Number (num):</label>
                        <input class="form-control border border-1 border-primary-subtle" type="number" id="stud_num_number" name="stud_num_number">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label" for="name">Name (contains): </label>
                        <input class="form-control border border-1 border-primary-subtle" type="text" id="name" name="name">
                    </div>
                    <div class="col col-3 m-2">
                        <label class="form-label" for="address">Address (contains): </label>
                        <input class="form-control border border-1 border-primary-subtle" type="text" id="address" name="address">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label">Sex:</label>
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="radio"
                                value="M" id="male" name="sex">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="radio"
                                value="F" id="female" name="sex">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="radio"
                                value="B" id="both_genders" name="sex" checked aria-checked="true">
                            <label class="form-check-label" for="both_genders">
                                Both
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary bg-light-subtle rounded-2 align-items-center">
                    <div class="col-auto">
                        <h4>Birthday: </h4>
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label" for="bdate_exact">Birthdate (exact):</label>
                        <input class="form-control border border-1 border-primary-subtle" type="date" id="bdate_exact" name="bdate_exact">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label" for="bdate_from">Birthdate (from):</label>
                        <input class="form-control border border-1 border-primary-subtle" type="date" id="bdate_from" name="bdate_from">
                    </div>
                    <div class="col col-2 m-2">
                        <label class="form-label" for="bdate_to">Birthdate (to):</label>
                        <input class="form-control border border-1 border-primary-subtle" type="date" id="bdate_to" name="bdate_to">
                    </div>
                    <div class="col col-2 m-2">
                        <span class="form-text">Note: Only exact date searched if specified, regardless of from or to dates.
                        </span>
                    </div>

                </div>
                <div class="row m-1 p-2 border border-1 border-primary bg-light-subtle rounded-2 align-items-center">
                    <div class="col-auto">
                        <h4>Include Year Levels:</h4>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="1" id="yr_1" name="yr[]">
                            <label class="form-check-label" for="yr_1">
                                1
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="2" id="yr_2" name="yr[]">
                            <label class="form-check-label" for="yr_2">
                                2
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="3" id="yr_3" name="yr[]">
                            <label class="form-check-label" for="yr_3">
                                3
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="4" id="yr_4" name="yr[]">
                            <label class="form-check-label" for="yr_4">
                                4
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="5" id="yr_5" name="yr[]">
                            <label class="form-check-label" for="yr_5">
                                5
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="6" id="yr_6" name="yr[]">
                            <label class="form-check-label" for="yr_6">
                                6
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary bg-light-subtle rounded-2"><!--select colleges to hit-->
                    <div class="row">
                        <h4>Select Courses:</h2>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BA Communication and Media Arts" id="BA Communication and Media Arts" name="courses[]">
                                <label class="form-check-label" for="BA Communication and Media Arts">
                                    BA Communication and Media Arts
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BA English" id="BA English" name="courses[]">
                                <label class="form-check-label" for="BA English">
                                    BA English
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Agribusiness Economics" id="BS Agribusiness Economics" name="courses[]">
                                <label class="form-check-label" for="BS Agribusiness Economics">
                                    BS Agribusiness Economics
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Anthropology" id="BS Anthropology" name="courses[]">
                                <label class="form-check-label" for="BS Anthropology">
                                    BS Anthropology
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Applied Mathematics" id="BS Applied Mathematics" name="courses[]">
                                <label class="form-check-label" for="BS Applied Mathematics">
                                    BS Applied Mathematics
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Architecture" id="BS Architecture" name="courses[]">
                                <label class="form-check-label" for="BS Architecture">
                                    BS Architecture
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Biology" id="BS Biology" name="courses[]">
                                <label class="form-check-label" for="BS Biology">
                                    BS Biology
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Computer Science" id="BS Computer Science" name="courses[]">
                                <label class="form-check-label" for="BS Computer Science">
                                    BS Computer Science
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Food Technology" id="BS Food Technology" name="courses[]">
                                <label class="form-check-label" for="BS Food Technology">
                                    BS Food Technology
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                    value="BS Sports Science" id="BS Sports Science" name="courses[]">
                                <label class="form-check-label" for="BS Sports Science">
                                    BS Sports Science
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary bg-light-subtle rounded-2 align-items-center">
                    <div class="col-auto">
                        <h4>Select Colleges:</h4>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="CSM" id="CSM" name="colleges[]">
                            <label class="form-check-label" for="CSM">
                                CSM
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="CHSS" id="CHSS" name="colleges[]">
                            <label class="form-check-label" for="CHSS">
                                CHSS
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input border border-1 border-primary-subtle" type="checkbox"
                                value="SOM" id="SOM" name="colleges[]">
                            <label class="form-check-label" for="SOM">
                                SOM
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row m-1 p-2 border border-1 border-primary bg-light-subtle rounded-2 align-items-center d-flex align-self-end align-items-end">
                    <div class="col-auto">
                            <label for="result_count">Best Result Count</label>
                            <input class="form-control border border-1 border-primary-subtle" 
                                type="number" id="result_count" name="result_count" value="3">
                    </div>        
                    <div class="col col-1 flex-fill">
                        <button type="submit" class="btn btn-secondary w-100" name="send">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <?php
        echo "<script src=\"../popper.min.js\"></script>
        <script src=\"../node_modules/bootstrap/dist/js/bootstrap.min.js\"></script>"
        ?>


</body>

</html>