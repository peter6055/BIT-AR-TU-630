var signUpButton = document.getElementById('signUp')
var signInButton = document.getElementById('signIn')
var container = document.getElementById('dowebok')
var tabs = document.getElementsByClassName("tab");
var prev = document.getElementById("prevBtn");
var next = document.getElementById("nextBtn");
var n = 0;


signUpButton.addEventListener('click', function () {
  container.classList.add('right-panel-active')
})

signInButton.addEventListener('click', function () {
  container.classList.remove('right-panel-active')
})



function getCode() {
  tabs[8].style.display = "block";
  tabs[12].style.display = "block";
  sendSMS();
}


function nextPrev(i) { // Renamed your function
  // Added: Hide all tabs
  for (var j = 0; j < tabs.length; j++) {
    tabs[j].style.display = "none";
  }
  tabs[9].style.display = "none";
  tabs[10].style.display = "none";
  document.getElementById("button1").style.display = "none";

  // This function will display the specified tab of the form...
  n = n + i;

  if (n >= 0 && n <= 3) {
    tabs[0].style.display = "block";
    tabs[1].style.display = "block";
    tabs[2].style.display = "block";
    tabs[3].style.display = "block";
  }

  if (n >= 4 && n <= 6) {
    tabs[4].style.display = "block";
    tabs[5].style.display = "block";
    tabs[6].style.display = "block";
  }

  if (n >= 7 && n <= 10) {
    tabs[7].style.display = "block";
    // tabs[8].style.display = "block";
    tabs[11].style.display = "block";
    // tabs[12].style.display = "block";
    document.getElementById("button1").style.display = "block";
  }

  //... and fix the Previous/Next buttons:
  if (n == 3) {
    tabs[9].style.display = "none";
    tabs[10].style.display = "block";
    document.getElementById("Login").style.display = "none";
    document.getElementById("inputCode").style.display = "none";
    document.getElementById("emailError").style.display = "none";
    document.getElementById("addressError").style.display = "none";
    document.getElementById("idError").style.display = "none";
    document.getElementById("phoneNumberError").style.display = "none";
    document.getElementById("codeError").style.display = "none";
  }
  if (n == 5) {
    tabs[9].style.display = "block";
    tabs[10].style.display = "block";
    document.getElementById("Login").style.display = "none";
    document.getElementById("inputCode").style.display = "none";
    document.getElementById("givenNameError").style.display = "none";
    document.getElementById("surNameError").style.display = "none";
    document.getElementById("genderError").style.display = "none";
    document.getElementById("birthdayError").style.display = "none";
    document.getElementById("phoneNumberError").style.display = "none";
    document.getElementById("codeError").style.display = "none";
  }
  if (n == 7) {
    tabs[9].style.display = "block";
    tabs[10].style.display = "none";
    document.getElementById("Login").style.display = "none";
    document.getElementById("inputCode").style.display = "none";
    document.getElementById("givenNameError").style.display = "none";
    document.getElementById("surNameError").style.display = "none";
    document.getElementById("genderError").style.display = "none";
    document.getElementById("birthdayError").style.display = "none";
    document.getElementById("emailError").style.display = "none";
    document.getElementById("addressError").style.display = "none";
    document.getElementById("idError").style.display = "none";
  }
}
nextPrev(3); // Launch the function on load


// hide error upon successful validation
function hideAllErrors() {
  document.getElementById("givenNameError").style.display = "none";
  document.getElementById("surNameError").style.display = "none";
  document.getElementById("genderError").style.display = "none";
  document.getElementById("birthdayError").style.display = "none";
  document.getElementById("emailError").style.display = "none";
  document.getElementById("addressError").style.display = "none";
  document.getElementById("idError").style.display = "none";
  document.getElementById("phoneNumberError").style.display = "none";
  document.getElementById("codeError").style.display = "none";
}


function checkForm() {
  hideAllErrors();
  //collecting user inputs 
  givenName = document.getElementById("Given name").value;
  surname = document.getElementById("Surname").value;
  Gender = document.getElementById("Gender").value;
  Birthday = document.getElementById("Birthday").value;
  Email = document.getElementById("Email").value;
  Address = document.getElementById("Address").value;
  identification = document.getElementById("ID").value;
  phoneNumber = document.getElementById("Phone number").value;
  code = document.getElementById("code").value;


  //checking for empty inputs and displaying error 
  if (givenName == "") {
    hideAllErrors();
    document.getElementById("givenNameError").style.display = "inline";
    nextPrev(-4);
    return false;
  }

  else if (surname == "") {
    hideAllErrors();
    document.getElementById("surNameError").style.display = "inline";
    nextPrev(-4);
    return false;
  }

  else if (Gender == "") {
    hideAllErrors();
    document.getElementById("genderError").style.display = "inline";
    nextPrev(-4);
    return false;
  }

  else if (Birthday == "") {
    hideAllErrors();
    document.getElementById("birthdayError").style.display = "inline";
    nextPrev(-4);
    return false;
  }


  else if (!checkEmail(Email)) {
    hideAllErrors();
    document.getElementById("emailError").style.display = "inline";
    nextPrev(-2);
    return false;
  }

  else if (!checkEmail(Email)) {
    hideAllErrors();
    document.getElementById("emailError").style.display = "inline";
    nextPrev(-2);
    return false;
  }

  else if (Address="") {
    hideAllErrors();
    document.getElementById("addressError").style.display = "inline";
    nextPrev(-2);
    return false;
  }

  else if (!checkPhoneNumber(phoneNumber)) {
    hideAllErrors();
    document.getElementById("phoneNumberError").style.display = "inline";
    return false;
  }

  else if (code == "") {
    hideAllErrors();
    document.getElementById("codeError").style.display = "inline";
    return false;
  }

  return true;

}

//checks if email is in proper email format
function checkEmail(Email) {
  var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.[c][o][m]$/;
  if (pattern.test(Email)) {
    return true;
  } else {
    return false;
  }
}

//!!!!!!
function checkPhoneNumber(phoneNumber) {
  var pattern = /^\+[6][1][4]\d{8}$/;
  if (pattern.test(phoneNumber)) {
    return true;
  } else {
    return false;
  }
}



function showLogin(){
  document.getElementById("Login").style.display = "block";
  document.getElementById("inputCode").style.display = "block";
  sendcode(); 
}

function checkLogin() {
  phoneNumber = document.getElementById("Phone number").value;
  code = document.getElementById("code").value;
  ConfirmCode();
}

function switchToRegister(){
  document.getElementById("Login").style.display = "none";
  document.getElementById("inputCode").style.display = "none";
  document.getElementById("givenNameError").style.display = "none";
  document.getElementById("surNameError").style.display = "none";
  document.getElementById("genderError").style.display = "none";
  document.getElementById("birthdayError").style.display = "none";
  document.getElementById("emailError").style.display = "none";
  document.getElementById("addressError").style.display = "none";
  document.getElementById("idError").style.display = "none";
  document.getElementById("phoneNumberError").style.display = "none";
  document.getElementById("codeError").style.display = "none";
}

/* if(users) 

else */

    /* Firebase 設定檔 */
    	var firebaseConfig = {
    		apiKey: "AIzaSyDkyfxNanqoKYHzHlmsXx5y4VK0NDhY1p0",
            authDomain: "covid-vaccine.tech",
            projectId: "building-it-2021-s2-g3",
            storageBucket: "building-it-2021-s2-g3.appspot.com",
            messagingSenderId: "913379363960",
            appId: "1:913379363960:web:6a5ba502d5fed6ef03f18d",
            measurementId: "G-HZXTP301PC"
    	};
    
    	/* 初始化 */
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    firebase.auth().languageCode = 'en';
	
	/* 建立 reCAPTCHA 驗證(這是強制需要)，帶入發送按鈕的ID */
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('code1000', {
       'size': 'invisible',
        'callback': function (response) {
            onSignInSubmit();
        }
    });

 function sendcode() {
 	var phoneNumber = document.forms["phone"]["input_phone"].value;
 	alert(document.forms["phone"]["input_phone"].value);
 	var appVerifier = window.recaptchaVerifier;
 
 	firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier).then(function (confirmationResult) {
 	
 		window.confirmationResult = confirmationResult;
 	}).catch(function (error) {

 		console.log(error);
 		
 grecaptcha.reset(window.recaptchaWidgetId);
 	});
 }
 
 function ConfirmCode() {
 	var code = document.getElementById('inputCode').value;
  var phone=document.getElementById('input_phone').value;
  
 	
     /* 檢查驗證碼 */
     confirmationResult.confirm(code).then(function (result) {
         /* 驗證成功 */
         var user = result.user;
 
         // console.log(user);
 
         var url = "https://covid-vaccine.tech/function_login.php";

          var xhr = new XMLHttpRequest();
          xhr.open("POST", url);

          xhr.setRequestHeader("Content-Type", "application/json");

          xhr.onreadystatechange = function () {
             if (xhr.readyState === 4) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                alert(xhr.responseText);
                if (xhr.responseText=="The mobile number is correct! Welcome to login!") {
       location.href="https://covid-vaccine.tech/dashboard/dashboard.php";
     }
             }};

          
           var data2 = '{"Phonenumber":"'+phone+'","userid":"'+user['uid'] +'"}';

          xhr.send(data2);

         
         
 
     }).catch(function (error) {
         /* 驗證失敗 */
         // console.log(error);
         grecaptcha.reset(window.recaptchaWidgetId);
         alert(error);
     } );

 }



 
 /* 建立 reCAPTCHA 驗證(這是強制需要)，帶入發送按鈕的ID */
 window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('button1', {
    'size': 'invisible',
     'callback': function (response) {
         onSignInSubmit();
     }
 });
 function sendSMS() {
        var phoneNumber = document.forms["phone2"]["Phone number"].value;
        alert(document.forms["phone2"]["Phone number"].value);
        var appVerifier = window.recaptchaVerifier;

        firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier).then(function (confirmationResult) {
            /* 發送成功 */
            window.confirmationResult = confirmationResult;

        }).catch(function (error) {
            /* 發送失敗 */
            // console.log(error);
            /* 重置驗證 */
            grecaptcha.reset(window.recaptchaWidgetId);
            alert(error);

        });
    }
 
function ConfirmSMS() {
     var givenname=document.getElementById('Given name').value;
     var Surname=document.getElementById('Surname').value;
     var Gender=document.getElementById('Gender').value;
     var Birthday=document.getElementById('Birthday').value;
     var Email=document.getElementById('Email').value;
     var Location=document.getElementById('location').value;
     var ID=document.getElementById('ID').value;
     var Phone=document.getElementById('Phone number').value;

     var code = document.getElementById('code').value;
     /* 檢查驗證碼 */
     confirmationResult.confirm(code).then(function (result) {
         /* 驗證成功 */
         var user = result.user;
 
         // console.log(user);
 
         var url = "https://covid-vaccine.tech/function.php";

          var xhr = new XMLHttpRequest();
          xhr.open("POST", url);

          xhr.setRequestHeader("Content-Type", "application/json");

          xhr.onreadystatechange = function () {
             if (xhr.readyState === 4) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                alert(xhr.responseText);
                
             }};

          
           var data = '{"givenname":"'+givenname+'","Surname":"'+Surname+'","Gender":"'+Gender+'","Birthday":"'+Birthday+'","email":"'+Email+'","location":"'+Location+'","ID":"'+ID+'","Phonenumber":"'+Phone+'","userid":"'+user['uid'] +'"}';

          xhr.send(data);


        
 
     }).catch(function (error) {
         /* 驗證失敗 */
         // console.log(error);
         grecaptcha.reset(window.recaptchaWidgetId);
         alert(error);
     } );
 }