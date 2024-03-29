<?php
    session_start();
    
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: ../mainpage.php");
        exit;
    }

    $mysqli = new mysqli("localhost", "root", "", "csrs");
    $query = "SELECT * FROM student_info WHERE stud_num = '{$_SESSION["studentnumber"]}'";

    $result = $mysqli -> query($query);
    $data = $result -> fetch_assoc();
?>

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

            <h1>UNIVERSITY OF THE PHILIPPINES (UP) PRIVACY NOTICE FOR STUDENTS</h1>
            <h3>(REVISED AS OF THE 1ST SEMESTER/TRIMESTER 2019-2020)</h3>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <h1>POLICY</h1>
                <p>To exercise and safeguard academic freedom and uphold your right to quality education, the University of the Philippines needs to process your personal and sensitive personal information - that is, information that identifies you as an individual.

                    <br><br>UP is committed to comply with the <a href="https://www.officialgazette.gov.ph/2012/08/15/republic-act-no-10173/">Philippine Data Privacy Act of 2012 (DPA)</a> in order to protect your right to data privacy.
                    
                    <br><br>This notice explains in general terms the purpose and legal basis for the processing of the typical or usual examples of personal and sensitive personal information that UP collects from students like you, the measures in place to protect your data privacy and the rights that you may exercise in relation to such information. Please note that this document does not contain an exhaustive list of all of UP's processing systems as well as the purpose and legal basis for processing.
                    
                    <br><br>Under the DPA, personal information may be processed (e.g. collected, used, stored, disclosed, etc.) with the consent of the data subject, pursuant to a contract with the data subject; when it is necessary in order for UP to comply with a legal obligation; to protect your vitally important interests including life and health; respond to a national emergency, public order, and safety; fulfill the functions of public authority or pursuant to the legitimate interests of the University or a third party; except where such interests are overridden by your fundamental rights.
                    
                    <br><br>Sensitive personal information (e.g. confidential educational records, age/birthdate, civil status, health, religious affiliation etc.) on the other hand may be processed with the consent of the data subject, when such is allowed by laws and regulations, such regulatory enactments provide for the protection of such information, and the consent of the data subject is not required for such law or regulation. For example, under the Education Act of 1982, parents have the right to access the educational records of children who are under their parental responsibility. Processing may also be done when needed to protect the life and health of the data subject or another person, and the data subject is unable to legally or physically express consent; in the case of medical treatment; or needed for the protection of lawful rights and interests of natural or legal persons in court proceedings; and for the establishment, exercise or defense of legal claims; or where provided to government or public authority.
                    
                    <br><br>The term <em>UP/University/us</em> refers to the University of the Philippines System and Constituent University (CU) offices.
                    
                    <br><br>The term <em>you/your</em> refers to all students of the University of the Philippines System, as well as those seeking to be admitted to the University (except for those seeking admission through the UPCAT who are covered by the UP Privacy Notice for UPCAT applicants) and, where the context so indicates, in the case of minors, their parents or guardians who also sign registration related and other forms that students fill out, such as leave of absence and scholarship application forms.
                </p>
            </div>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <h1>PERSONAL AND SENSITIVE PERSONAL INFORMATION COLLECTED FROM STUDENTS, AND THE PURPOSE/S AND LEGAL BASIS FOR PROCESSING SUCH INFORMATION</h1>
                <p>Various UP offices collect your personal information through paper based and online processing systems. UP may likewise collect publicly available information about you. Some application forms require you to provide a photograph. In some instances, your image is captured by UP's closed-circuit television (CCTV) cameras, or when UP documents, records, broadcasts (including live streaming), or publishes University activities or events.

                    <br><br>When you applied for admission to UP you provided us, through the forms you submitted and signed (and in the case of minors that your parents/guardians also signed), among others, your name, sex assigned at birth, date and place of birth, civil status, citizenship, your photograph, information about your family (names of your parents, their citizenship, civil status ), your signature and other personal information that we use, along with other documents you provide us (e.g. information contained in educational records) to be able to verify your identity in the course of determining your eligibility to enroll in UP. We required you to attest that the information that you provided us is true and correct as we also use the information in order to prevent the commission of fraud. Such processing is necessary for compliance with our legal obligation as a publicly funded University and to uphold our legitimate interest as an educational institution as well as that of taxpayers. When you provide UP with the personal and sensitive personal information of third parties you warrant that you have obtained their consent for UP to process their information.
                    
                    <br><br>In the case of students who were admitted through the UPCAT, you also provided the highest educational attainment and occupation of your parents as well as your family's annual household income. UP processed that information along with your permanent address and other information (e.g. grades) as the selection of campus qualifiers also considers socioeconomic and geographic factors as explained in the UPCAT Bulletin. Such processing is pursuant to Section 9 of RA 9500 which requires UP to take affirmative steps to enhance the access of disadvantaged students to the University's programs and services.
                    
                    <br><br>Non-Filipino citizens seeking admission to the University are required to provide personal and sensitive personal information in order for UP to ascertain that their admission and enrollment is allowed under applicable Philippine laws, rules and regulations, and University rules and procedures.
                    
                    <br><br>In order for UP to exercise its right to academic freedom and to uphold academic standards under its Charter it processes the educational records and other personal information provided by prospective students to determine their eligibility to enroll.
                    
                    <br><br>UP processes your personal and sensitive personal information, in the course of fulfilling its obligation, to provide you quality education by exercising its right to academic freedom, and upholding academic standards, when the University's duly authorized personnel process your enrollment; evaluate the work that you submit in fulfillment of your academic requirements and give you grades; act on your applications for change of matriculation, dropping, leave of absence and the like; determine your academic progress and compliance with the University's retention and other rules; evaluate and recommend you for graduation; act on appeals on such matters; and, in the event you are qualified under the rules, recommend that you be awarded honors upon your graduation.
                    
                    <br><br>Aside from sensitive personal information in the form of grades, you also provide UP with health information as part of the admission and registration processes so that the University may determine your physical fitness to enroll; and be able to provide you with the proper care when you avail of UP's health services; or in case of an emergency; or in compliance with University rules that are meant to uphold academic standards (e.g., submission of medical certificates in order for your absences to be excused, for you to drop a subject, go on leave of absence, or justify underloading in an appeal to graduate with honors, etc.).
                    
                    <br><br>UP processes information regarding your religious affiliation in the course of verifying your identity (e.g. offices match information in your birth certificate and school records provided to us etc.) to conduct research to see to it that we uphold the principle of democratic access; and that, as a non-sectarian institution, we do not discriminate on the basis of religious creed; and to uphold your right to freedom of religion(e.g. by providing you with services that are consistent with your beliefs in relation to your health needs and food preparation, etc.).
                    
                    <br><br>The University may process your personal and sensitive personal information in order to compile statistics and conduct research, subject to the provisions of the DPA and applicable research ethics guidelines, in order to carry out its mandate as the National University.
                    
                    <br><br>Contact information is processed by UP in order to be able to communicate effectively with you, and to enable us to contact your family or other people you identify, in the case of an emergency. For example, UP offices or your teachers may use the information generated by the applicable registration system in order to contact you via email or via a messaging system for class related and other academic matters, as well as UP related activities and information. UP may also contact you in order to solicit your consent to participate in academic or non-commercial research.
                    
                    <br><br>In some instances, because UP is aware that not all students have access to the Internet at all times, or that you may have failed to update email or contact details, UP may inform you of the need to contact certain UP offices, or to submit certain requirements by a certain date, or otherwise disseminate information that you need to know by posting your name or other relevant personal information on UP bulletin boards. In the case of email correspondence, your email address may be disclosed to other members of the class so that other students to whom you may have disclosed your new email address, or other contact details, will be able to relay email messages to you.
                    
                    <br><br>UP processes personal and sensitive personal information, and, in particular, financial information related to your studies, in order to administer State-funded and privately financed scholarships, as well as grants or other forms of assistance, pursuant to its contractual or legal obligations as part of the University's legitimate interests and that of taxpayers, as well as relevant third parties, such as donors or sponsors.
                    
                    <br><br>Your personal and sensitive personal information may also be processed in order for UP to provide you with services, such as the issuance of your ID card, stickers or gate passes, library, dormitory, health , counseling and guidance services and the like; facilitate the processing of applications for insurance and insurance claims; determine whether the student organization or association to which you belong may be recognized and given access to University services, etc., to enable your participation in student elections, exchange programs, internships, training programs, conferences, etc.; administer scholarships, grants and other forms of assistance, pursuant to UP's contractual or legal obligations; or to protect your vitally important interests.
                    
                    <br><br>CCTVs and other security measures which may involve the processing of your personal information are intended to protect your vitally important interests, for public order and safety, and pursuant to the University's and the public's legitimate interests. UP processes personal and sensitive personal information in order to comply with its duty as an academic institution to exercise due diligence to prevent harm or injury to you or others.
                    
                    <br><br>You may also be required to present your UP ID when you avail of University services, or when you request documents containing your personal and sensitive personal information. If you request such information through a representative, UP will require that you provide a letter of authorization specifying the information or document requested, the purpose(s) for which the same will be used, and the presentation of your UP ID or other valid government-issued identification card (GIID), as well the GIID of your duly authorized representative, in order for UP to see to it that fraud is prevented, and your right to data privacy is upheld.
                    
                    <br><br>UP will process your name, student number and photograph in order to issue your UP radio-frequency enabled identification (RFID). A unique, randomly generated number, as well as your student number, will be encoded in the RFID tag or chip of your UP ID such that these will be the only information that can be read by a compatible RFID reader.
                    
                    <br><br>UP, using its RFID readers, will process the abovementioned information when you tap or wave your UP ID card in close proximity to such readers in order to:
                
                    <br><br>
                </p>

                <ol type="1">
                    <li>regulate access to libraries and other University buildings in order to supplement other existing security measures in place;</li>
                    <li>provide you with RFID enabled services in UP offices where these are applicable or available; and</li>
                    <li>provide benefits to qualified students pursuant to the UP Charter and relevant internal rules.</li>
                </ol>

                <p>
                    <br>UP has a legitimate interest in securing the UP community, its buildings and other assets and adopting means in order to provide services in a more efficient manner. UP is also required under its Charter to adopt measures in order to provide democratic access to its services. Rest assured that the University will process the above UP RFID information only for legitimate purposes, and for such periods allowed by the DPA and other applicable laws. UP has adopted appropriate measures to safeguard your right to data privacy over your abovementioned information.
                    
                    <br><br>The University provides for the secure processing and, when applicable, secure archival of the educational record and other relevant personal information of its students that are needed to verify their identity so that UP will be able to provide the proper transcripts, certifications, and other documents that current or former students or alumni may request as required by the Education Act of 1982, and comply with obligations to the UP Alumni Association under the UP Charter and University rules, as well as for historical and research purposes as permitted by law. The relevant application forms and supporting documents submitted by those who are not qualified to enroll in UP, including those who are not accepted as shiftees or transferees, as well as qualified applicants who do not thereafter enroll in UP are securely disposed of within a reasonable period of time as determined by the University pursuant to applicable laws and regulations.
                </p>
            </div>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <h1>INSTANCES WHEN YOUR RELEVANT PERSONAL AND/OR SENSITIVE PERSONAL INFORMATION MAY BE DISCLOSED BY <em>UP</em> TO THIRD PARTIES AND THE PURPOSE/S AND LEGAL BASIS FOR SUCH DISCLOSURES</h1>
                <p>The University will disclose or share your relevant personal and/or sensitive personal information to third parties in order to carry out its mandate as an academic institution, comply with legal obligations, perform its contractual obligations to you, promote and protect your interests, and in order to pursue its legitimate interests or that of a third party. UP discloses such information when required or allowed by law, or with your consent. Examples of these include:
                    <br><br>
                </p>

                <ol type="1">
                    <li>posting the list of students qualified to enroll in UP as well as waitlisted applicants online or on bulletin boards pursuant to its functions under its Charter, and for transparency in the admissions process;</li>
                    <li>submission of information required by the UNIFAST Board and the Commission on Higher Education in order to implement the <a href="https://www.officialgazette.gov.ph/2017/08/03/republic-act-no-10931/">Universal Access to Quality Tertiary Education Act of 2017 (RA 10931)</a> and the <a href="https://www.officialgazette.gov.ph/2015/10/15/republic-act-no-10687/">UNIFAST Act (RA 10687)</a>;</li>
                    <li>disclosure of information to the proper bodies to enable you to take licensure, board, bar examinations and the like;</li>
                    <li>information sharing with the UP Alumni Association in order for UP to comply with its mandate under the UP Charter.</li>
                    <li>disclosure of your personal and/or sensitive personal information to relevant third parties in order for UP to respond to an emergency and comply with its duty to exercise due diligence to prevent harm or injury to you and/or others;</li>
                    <li>disclosure of your personal and/or sensitive personal information in compliance with University policies, rules and processes adopted pursuant to the UP Charter, or with your consent, in order to uphold or promote your interest and/or the principle of transparency, promote the legitimate interests of the University or third parties, such as in relation to the processing of applications for leave of absence; the conduct of student elections (e.g. posting of list of candidates and results); disclosures contained in the minutes of University bodies such as the Board of Regents in connection with graduation, student discipline, and the like;</li>
                    <li>providing information pursuant to the provisions of the Data Privacy Act or other applicable laws, and lawful orders or processes issued by government agencies, courts, and law enforcement agencies.</li>
                    <li>disclosures to enable UP to participate in university ranking exercises and other similar activities;</li>
                    <li>sharing personal and sensitive personal information with your parent(s)/ guardian/spouse, or other next of kin, in order to promote your best interests as required by law, or when necessary in order for the University to respond to an emergency, uphold your vitally important interests, or to prevent harm to you and/or others, or with your consent;</li>
                    <li>disclosures for your benefit, or in support of your interests, such as those intended to enable you to participate in exchange programs, conferences, trainings and the like, academic, athletic and other similar competitions or events; to apply for, receive and comply with terms and conditions of scholarships, grants and other forms of assistance; to be granted Civil Service eligibility based on Latin honors under PD 907 or in relation to internship, employment or other career opportunities with your consent;</li>
                    <li>disclosures to recognize your achievements such as through the publication and distribution of the commencement program, and other materials containing the names of graduates, their respective courses/certificates and honors received, or sharing of relevant information with honor societies or entities that confer awards with your consent;</li>
                    <li>information that we share with third parties who process your information in order to provide products or services to you or UP (e.g. cloud service providers) for registration systems that contain your enrollment information and grades, email providers, entities that provide insurance, process your UP ID and the like for which we require your consent. Unless your consent is given, it will not be possible for such products or services to be provided to you;</li>
                    <li>in the exercise of the sound discretion of UP pursuant to its mandate as a research university we may share your name, email, and other relevant personal information, with your consent, with researchers conducting academic or non-commercial research who have put in place applicable measures required by ethical guidelines and the DPA to uphold your privacy so that they can solicit your consent to participate in research;</li>
                    <li>news or feature articles about your achievements, awards received, research and public service activities and the like in University publications, websites or social media posts, disclosures that the University may make in the exercise of its sound discretion in response to inquiries from the press, or press releases and other similar disclosures for journalistic purposes, as allowed by the DPA, or with your consent;</li>
                    <li>publishing, broadcasting or live streaming of University activities or events pursuant to the legitimate interests of the University and third parties or for journalistic purposes, as allowed by the DPA;</li>
                    <li>other instances analogous to the foregoing.</li>
                </ol>

                <p>
                    <br>Where applicable, UP will take reasonable steps to require third parties who receive your information to uphold your right to data privacy.
                </p>
            </div>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <h1>HOW <em>UP</em> PROTECTS YOUR PERSONAL AND SENSITIVE PERSONAL INFORMATION</h1>
                <p>Even prior to the effectivity of the DPA, UP put in place physical, organizational and technical measures to protect your right to privacy and is committed to reviewing and improving the same, so as to be able to comply, among others, with its obligations under the applicable provisions of the Education Act of 1982, which require us to keep your educational records confidential. You may wish, for instance, to read UP's Acceptable Use Policy for Information Technology (IT) Resources (AUP).

                    <br><br>From time to time UP posts information on relevant sites and sends emails that explain how you can secure and maintain the confidentiality of your personal information.
                    
                    <br><br>UP System and CU offices are permitted by the DPA and other laws to share information with each other for the purpose of carrying out the mandate of UP pursuant to the Constitution, its Charter and other applicable laws. For instance, the UP System Office of Admissions transmits or shares your relevant information to the proper CU Registrar. Registrars disclose or share information required by System officials or offices such as the Board of Regents, the UP President, the Executive Vice President, the Vice Presidents, the Secretary of the University, or the Office of Alumni Relations, to carry out their respective functions. Rest assured that UP officials and personnel in such offices are allowed to process your personal and sensitive personal information only when such processing is part of their official duties. This is enforced in the case of ICT-based processing systems (e.g. SAIS, CRS etc.) by assigning access to modules (e.g. to give grades, enlist, give advice, or tag students as ineligible, etc.) based on the official functions of said UP personnel. all students of the University of the Philippines System, as well as those seeking to be admitted to the University (except for those seeking admission through the UPCAT who are covered by the UP Privacy Notice for UPCAT applicants) and, where the context so indicates, in the case of minors, their parents or guardians who also sign registration related and other forms that students fill out, such as leave of absence and scholarship application forms.
                </p>
            </div>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <h1>ACCESS TO AND CORRECTION OF YOUR PERSONAL AND SENSITIVE PERSONAL INFORMATION AND YOUR RIGHTS UNDER THE DPA</h1>
                <p>You have the right to access personal and sensitive personal information being processed by UP about you. You may access your personal and sensitive personal information, for instance, through UP's information systems such as SAIS or CRS or request documents from relevant offices (e.g. the University Registrar or your College Secretary). In order for UP to see to it that your personal and sensitive personal information are disclosed only to you, these offices will require the presentation of your UP ID or other documents that will enable UP to verify your identity. In case you process or request documents through a representative, in order to protect your privacy, UP requires you to provide a letter of authorization specifying the purpose for the request of documents or the processing of information, and your UP ID or other valid government-issued ID (GIID), as well as the valid GIID of your representative.

                    <br><br>As mentioned above, UP requires you to provide correct information. In the event that your information needs to be updated please follow the instructions found in the relevant website, or kindly get in touch with the proper University office(s). Please note that the correction of grades is subject to University rules and procedures.
                    
                    <br><br>Aside from the right to access and correct your personal data, you have the following rights subject to the conditions and limitations provided under the DPA and other applicable laws and regulations:
                    
                    <br><br>
                </p>

                <ol type="1">
                    <li>The right to be informed about the processing of your personal data through this and other applicable privacy notices.</li>
                    <li>The right to object to the processing of your personal data, to suspend, withdraw or order the blocking, removal or destruction thereof from our filing system. Kindly note however that, as mentioned above, there are various instances when the processing of personal data you have provided is necessary for us to comply with UP's mandate, statutory and regulatory requirements, or is processed using a lawful basis other than consent. In the case of your UP ID it is your duty to immediately report the loss of such card to your University Registrar and the UP ITDC so that UP can prevent the unauthorized use of the same.</li>
                    <li>The right to receive, pursuant to a valid decision, damages due to the inaccurate, incomplete, outdated, false, unlawfully obtained, or unauthorized use of personal data, taking into account any violation of your rights and freedoms as a data subject and</li>                    
                    <li>The right to lodge a complaint before the National Privacy Commission provided that you first exhaust administrative remedies by filing a request with the proper offices or a complaint with the proper DPO through the email address indicated below regarding the processing of your information, or the handling of your requests for access, correction, blocking of the processing of your personal data and the like.</li>
                </ol>
            </div>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <h1>HOW WE OBTAIN YOUR CONSENT AND HOW YOU CAN WITHDRAW CONSENT</h1>
                <p>UP obtains your consent for the processing of your personal and sensitive personal information pursuant to this privacy notice by asking you to sign the relevant form. If you are a minor, we will require your parent or guardian to sign the proper form. If you wish to withdraw consent, kindly write or send an email to your University Registrar at (please insert applicable email address) and identify the processing activity for which you are withdrawing consent. Please attach a copy of your UP ID so that the Registrar will be able to verify your identity. Note that consent may be withdrawn only for a processing activity/ies for which consent is the only applicable lawful ground for such processing. Kindly await your Registrar's action regarding your request. Rest assured that once your Registrar confirms that you have validly withdrawn consent for a processing activity/ies the same shall be effective unless you thereafter send a letter or email to the Registrar with a copy of your ID that you are consenting to such processing activity/ies.</p>
            </div>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <h1>REVISIONS TO THE PRIVACY NOTICE AND QUERIES REGARDING DATA PRIVACY</h1>
                <p><b>The previous privacy notices issued for the 1st and 2nd semesters/trimester 2018-19 have been revised. This amended notice will take effect on 27 August 2019.</b>
                        <br><br>We encourage you to visit this site from time to time to see any further updates regarding this privacy notice. We will alert you regarding changes to this notice through this site.
                    
                        <br><br>If you have any Data Privacy queries or concerns as it relates to your student records, you may contact your CU's UP Data Protection Officer through the following:
                
                        <br><br>
                </p>
    
                <ol type="1">
                    <li>Via post</li>
                    <li>Through the following landlines</li>
                    <li>Through email</li>
                </ol>

                <p><br></p>

                <ul>
                    <ul>
                        <li style="position: relative; right: 15px;"><b>UP Manila</b></li>
                        <li>Post: 3/F Information Technology Center, Joaquin Gonzales compound, University of the Philippines Manila, Padre Faura St., Ermita, Manila</li>
                        <li>Landline: +63 (2) 509-1003; (PGH) 554-8400</li>
                        <li>Email: <a href="mailto: dpo.upmanila@up.edu.ph">dpo.upmanila@up.edu.ph</a></li>
                    </ul>
                    <br>
                    <ul>
                        <li style="position: relative; right: 15px;"><b>UP Los Baños</b></li>
                        <li></li>Post: Office of the University Registrar, G/F CAS Annex I Building, UP Los Baños, College 4031, Laguna, Philippines</li>
                        <li></li>Landlines: (049) 536-2553 / (049) 536-2426</li>
                        <li></li>Email: <a href="mailto: dpo.uplb@up.edu.ph">dpo.uplb@up.edu.ph</a></li>
                    </ul>
                    <br>
                    <ul>
                        <li style="position: relative; right: 15px;"><b>UP Baguio</b></li>
                        <li></li>Post: Office of the University Registrar, UP Baguio, Gov. Pack Road, Baguio City 2600</li>
                        <li></li>Landline: +63 (74) 442-5592</li>
                        <li></li>Email: <a href="mailto: dpo.upbaguio@up.edu.ph">dpo.upbaguio@up.edu.ph</a></li>
                    </ul>
                    <br>
                    <ul>
                        <li style="position: relative; right: 15px;"><b>UP Cebu</b></li>
                        <li>Post: Room 242, Arts and Science building, UP Cebu Lahug Campus</li>
                        <li>Landline: +63 (32) 233-8203 loc 202</li>
                        <li>Email: <a href="mailto: dpo.upcebu@up.edu.ph">dpo.upcebu@up.edu.ph</a></li>
                    </ul>
                </ul>

                <p><br>For queries, comments or suggestions regarding this System-wide privacy notice, please contact the University of the Philippines System Data Protection Officer through the following:
                    <br><br>
                </p>
                    
                <ol type="1">
                    <li>Via post<br>c/o the Office of the President 2F North Wing Quezon Hall (Admin Building) University Avenue, UP Diliman, Quezon City 1101 Philippines</li>
                    <li>Through the following landlines<br>(632)9280110<br>(632)9818500 loc. 2521</li>
                    <li>Through email<br><a href="mailto: dpo@up.edu.ph">dpo@up.edu.ph</a></li>
                </ol>
                    
                <p>
                    <br>Reference: <a href="https://privacy.up.edu.ph/privacy-notices/ups-privacy-notice-for-students.php">https://privacy.up.edu.ph/privacy-notices/ups-privacy-notice-for-students.php</a>
                </p>
                
            </div>

            <div class="border border-primary-subtle bg-light-subtle rounded p-4 my-4">
                <p>
                    I have read the University of the Philippines' Privacy Notice for Students.

                    <br><br>I understand that for the UP System to carry out its mandate under the 1987 Constitution, the UP Charter, and other laws, that the University must necessarily process my personal and sensitive personal information.

                    <br><br>Therefore, I grant my consent to and recognize the authority of the University to process my personal and sensitive personal information pursuant to the UP Privacy Notice and applicable laws.
                </p>
            </div>

            <p>[DIGITALLY SIGNED] <em><?php echo $data["fname"] . " " . $data["mname"] . " " . $data["lname"] ?></em></p>

        </div>

        <footer>
            <p>Copyright © 2023 NALASA PLARIZA</p>
        </footer>
  
        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

        <?php $mysqli -> close(); ?>

    </body>
</html>