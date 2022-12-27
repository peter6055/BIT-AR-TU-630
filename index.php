<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    
    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics --> 
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-analytics.js"></script> 
    
    <!-- Add Firebase products that you want to use --> 
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script> <br>
    <!-- CSS only -->
    <meta charset="utf-8">
    <title>LOGIN & REGISTER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/autocomplete.js"></script>
</head>

<body style="background-image: url('images/bg-01.jpg');   
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
    <div class="dowebok" id="dowebok">
        <div class="form-container sign-up-container">
            <form method="post" onsubmit="checkForm();return false;" name="phone2" onkeydown="return event.key != 'Enter';">
                <h1>REGISTER</h1>
                <input type="text" class="tab" id="Given name" placeholder="Given name" name="Givenname">
                <div id="givenNameError">Can't be none</div>
                <input type="text" class="tab" id="Surname" placeholder="Surname" name="Surname">
                <div id="surNameError">Can't be none</div>
                <select name="Gender" class="tab" id="Gender">
                    <option value="null" disabled selected hidden style="color: aqua;">Please select a gender</option>
                    <option value="other">Other</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>                
                <div id="genderError">Can't be none</div>
                <input type="date" class="tab" id="Birthday" placeholder="Birthday" name="Birthday">
                <div id="birthdayError">Can't be none</div>
                <input type="text" class="tab" id="Email" placeholder="Email" name="email">
                <div id="emailError">please input a valid email</div>
                
                <!-- Chnage id to location-->
                <div id="Address" class="tab" style="width:100%;">
                    <input type="text" placeholder="Address" id="location" name="location" />
                </div>
                <!-- how -->
                <div id="addressError">please input a valid email</div>
                <input type="tel" class="tab" id="ID" placeholder="ID" name="ID">
                <!-- how -->
                <div id="idError">Can't be none</div>
        
                <div style="display: flex;width: 100%;">
                    <input type="tel" class="tab" id="Phone number" placeholder="Phone number"
                        style="height: 39px; width: 200px;" name="phonenumber">
                    <button id="button1" href="javascript:" style="font-size: 13.3333px;
margin-top: 8px;
border-radius: 0px;
border: 0px;
font-weight: normal;
letter-spacing: 0px;
color: #757575;
background-color: #EEEEEE;
margin-bottom: 0px;
margin-right: 0px;
margin-left: 0px;
height: 39px;
padding-right: 11px;
align-items: center;
flex-flow: row;
text-align: initial;
padding-left: unset;" onclick="getCode()">GET CODE</button>
                </div>

                <div id="phoneNumberError">please input a valid phone number</div>
                <input type="text" class="tab" id="code" placeholder="Six-digit verification code">
                <div id="codeError">It should be a six-digit verification code</div>
                <div id="botton_form" style="display: flex;
                width: 100%;">
                    <button type="button" id="previous" class="tab" onclick="nextPrev(-2)">Previous</button>
                    <button type="button" id="next" class="tab" onclick="nextPrev(2)" style="display: block;
                    margin-left: auto;">Next</button>
                </div>
                <a class="tab" href="javascript:" style="display: none !important;"></a>
                <!-- <button type="button" id="Submit" class="tab" onclick="checkForm()">REGISTER</button> -->
                <button type="submit" class="tab"  id="Submit" placeholder="REGISTER" value="REGISTER" onclick="ConfirmSMS()">REGISTER</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form onsubmit="return false" name="phone" onkeydown="return event.key != 'Enter';">
                <h1>LOGIN</h1>
                <span>LOGIN WITH YOUR PHONE NUMBER</span>
                <div style="display: flex;width: 100%;">
                    
                    <input type="tel" id="input_phone" placeholder="Phone number"
                        style="height: 39px; width: 200px;">
                    <button id="code1000" href="javascript:" style="font-size: 13.3333px;
margin-top: 8px;
border-radius: 0px;
border: 0px;
font-weight: normal;
letter-spacing: 0px;
color: #757575;
background-color: #EEEEEE;
margin-bottom: 0px;
margin-right: 0px;
margin-left: 0px;
height: 39px;
padding-right: 11px;
align-items: center;
flex-flow: row;
text-align: initial;
padding-left: unset;" onclick="showLogin()">GET CODE</button>
                </div>
                <input id="inputCode" placeholder="Six-digit verification code" style="display: none;">
                <button id="Login" onclick="checkLogin()" style="display: none;">LOGIN</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>ALREADY HAVE ACCOUNT?</h1>
                    <p>Login with your phone number</p>
                    <button class="ghost" id="signIn">LOGIN</button>
                    <a href="#">BACK TO HOMEPAGE</a>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>NO ACCOUNT?</h1>
                    <p>Please complete the information from register.</p>
                    <button class="ghost" id="signUp" onclick="switchToRegister()">REGISTER</button>
                    <a href="#">BACK TO HOMEPAGE</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initMap&channel=GMPSB_addressselection_v1_cA&language=en_US" async defer></script>
    <script src="js/index.js"></script>

</body>

</html>
