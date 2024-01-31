<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="surveyFormStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAP Survey Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="img\logo.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="container pt-2 d-sm-block">
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: center; align-items: center;">
                <div class="card mt-5 mb-5 pt-5 pb-2" id="cardId">
                    <form id="regForm" action="insert.php" method="post" class=" needs-validation" novalidate>
                        
                    <div class="row ">
                            <input type="hidden" name="sn" id="sn">
                            <div style="text-align: center;">
                                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                    <img src="img/logo.png" style="width: 200px;">
                                </div>
                                <div class="row text-center justify-content-center">
                                    <h2 id="title"><strong>NEW MEMBER SURVEY</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row col-12 mb-2 text-center justify-content-center"></div>
                        <h2 class="text-center justify-content-center text-light" style=" color: #ffffff !important;
  text-shadow: 3px 2px 7px #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Share
                            your opinion and get a discount or freebies!</h2>
                        <p class="text-center justify-content-center" style=" color: yellow !important;
  text-shadow: 3px 2px 7px #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Participate in a brief
                            6-question survey and
                            unlock a valuable AAP Membership reward
                        </p>
                        <div class="span" style="text-align:center; height: 50px; margin-top: 20px;">
                            <span class="step"><i class="fas fa-envelope"></i></span>
                            <span class="step"><i class="fas fa-user-check"></i></span>
                            <span class="step"><i class="fas fa-question"></i></span>
                            <span class="step"><i class="fas fa-heart"></i></span>
                            <span class="step"><i class="fas fa-traffic-light"></i></span>
                            <span class="step"><i class="fas fa-comments"></i></span>
                            <span class="step"><i class="fas fa-thumbs-up"></i></span>
                        </div>
                        <div class="tab">
                            <label for="validationCustom01" class="form-label" style="font-size: 1.5rem">Email</label>
                            <input type="email" id="validationCustom01" placeholder="Enter your email." name="Uemail"
                                autocomplete="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                                title="Enter a valid email address" required>
                            <div class="valid-feedback" style="color: #fff">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                        <div class="tab">
                            <h6 id="h6Id">Are you a member?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memberStatus" id="yesRadio"
                                    value="yes" required style="width: 20px; height: 20px;">
                                <label class="form-check-label" for="yesRadio">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memberStatus" id="noRadio" value="no"
                                    required style="width: 20px; height: 20px; ">
                                <label class="form-check-label" for="noRadio">No</label>
                            </div>
                        </div>
                        <div class="tab">
                            <h6 id="h6Id">How did you hear about the Automobile Association
                                Philippines?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Facebook" id="facebook"
                                    name="preferences[]">
                                <label class="form-check-label" for="facebook">Facebook</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Instagram" id="instagram"
                                    name="preferences[]">
                                <label class="form-check-label" for="instagram">Instagram</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Youtube" id="youtube"
                                    name="preferences[]">
                                <label class="form-check-label" for="youtube">Youtube</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Twitter" id="twitter"
                                    name="preferences[]">
                                <label class="form-check-label" for="twitter">Twitter</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Tiktok" id="tiktok"
                                    name="preferences[]">
                                <label class="form-check-label" for="tiktok">Tiktok</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Car Show" id="carShow"
                                    name="preferences[]">
                                <label class="form-check-label" for="carShow">Car Show</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Car Club" id="carClub"
                                    name="preferences[]">
                                <label class="form-check-label" for="carClub">Car Club</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="Referred by a friend or a family member" id="referral" name="preferences[]">
                                <label class="form-check-label" for="referral">Referred by a friend or a family
                                    member</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Advertisement" id="advertisement"
                                    name="preferences[]">
                                <label class="form-check-label" for="advertisement">Advertisement</label>
                            </div>
                        </div>
                        <div class="tab">
                            <h6 id="h6Id">What motivated you to join Automobile Association
                                Philippines?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation1"
                                    value="Roadsafe Safety Advocacy" required>
                                <label class="form-check-label" for="motivation1">Roadsafe Safety Advocacy</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation2"
                                    value="Roadsafe Assistance">
                                <label class="form-check-label" for="motivation2">Roadsafe Assistance</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation3"
                                    value="AAP Insurance">
                                <label class="form-check-label" for="motivation3">AAP Insurance</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation4"
                                    value="AAP Travel">
                                <label class="form-check-label" for="motivation4">AAP Travel</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation5"
                                    value="AAP Motorsports">
                                <label class="form-check-label" for="motivation5">AAP Motorsports</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation6"
                                    value="AAP Annual Car Raffle">
                                <label class="form-check-label" for="motivation6">AAP Annual Car Raffle</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation7"
                                    value="AAP Autocare Services">
                                <label class="form-check-label" for="motivation7">AAP Autocare Services</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation8"
                                    value="LTO Registration Renewal Assistance">
                                <label class="form-check-label" for="motivation8">LTO Registration Renewal
                                    Assistance</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation9"
                                    value="Exclusive deals and promotions">
                                <label class="form-check-label" for="motivation9">Exclusive deals and
                                    promotions</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation" id="motivation10"
                                    value="Others">
                                <label class="form-check-label" for="motivation10">Others</label>
                            </div>
                        </div>
                        <div class="tab">
                            <h6 id="h6Id">Would you like to volunteer in our road Safety
                                events and
                                activities?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="volunteer" id="yes" value="yes"
                                    required>
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="volunteer" id="no" value="no"
                                    required>
                                <label class="form-check-label" for="no">No</label>
                            </div>
                        </div>
                        <div class="tab">
                            <h6 id="h6Id" style="margin-bottom: 20px;">If yes, can you kindly suggest or recommend a
                                specific
                                locality or
                                community where we can conduct road safety activities?</h6>
                            <p>
                                <input type="text" class="form-control custom-input-width"
                                    placeholder="Enter your suggestion or recommendation here"
                                    name="localityRecommendation" style="height: 100px; background: white;" required>
                            </p>
                        </div>
                        <div class="tab">
                            <h6 id="h6Id" style="margin-bottom: 20px;">How Likely are you to recommend Automobile
                                Association
                                Philippines to your friends and family?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="likert" id="flexRadioDefault1"
                                    value="Very Unlikely" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Very Likely
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="likert" id="flexRadioDefault2"
                                    value="Unlikely" required>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Likely
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="likert" id="flexRadioDefault3"
                                    value="Neutral" required>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Neutral
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="likert" id="flexRadioDefault4"
                                    value="Likely" required>
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Unlikely
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="likert" id="flexRadioDefault5"
                                    value="Very Likely" required>
                                <label class="form-check-label" for="flexRadioDefault5">
                                    Very Unlikely
                                </label>
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div class="buttons" style="float:right;">
                                <button type="button" class="btn btn-dark" id="prevBtn"
                                    onclick="nextPrev(-1)">Previous</button>
                                <button type="submit" name="submit" class="btn btn-info" id="nextBtn"
                                    onclick="nextPrev(1); ">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="script.js"></script>
</body>

</html>