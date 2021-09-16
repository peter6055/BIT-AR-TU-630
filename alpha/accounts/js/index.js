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

}


function nextPrev(i) { // Renamed your function
  // Added: Hide all tabs
  for (var j = 0; j < tabs.length; j++) {
    tabs[j].style.display = "none";
  }
  tabs[9].style.display = "none";
  tabs[10].style.display = "none";
  document.getElementById("tab_getCode").style.display = "none";

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
    document.getElementById("tab_getCode").style.display = "block";
  }

  //... and fix the Previous/Next buttons:
  if (n == 3) {
    tabs[9].style.display = "none";
    tabs[10].style.display = "block";
  }
  if (n == 5) {
    tabs[9].style.display = "block";
    tabs[10].style.display = "block";
    document.getElementById("givenNameError").style.display = "none";
    document.getElementById("surNameError").style.display = "none";
    document.getElementById("genderError").style.display = "none";
    document.getElementById("birthdayError").style.display = "none";
  }
  if (n == 7) {
    tabs[9].style.display = "block";
    tabs[10].style.display = "none";
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
  var pattern = /^\+[6][1][4]\d{9}$/;
  if (pattern.test(phoneNumber)) {
    return true;
  } else {
    return false;
  }
}



function showLogin(){
  document.getElementById("Login").style.display = "block";
  document.getElementById("inputCode").style.display = "block";
}

function checkLogin() {
  phoneNumber = document.getElementById("Phone number").value;
  code = document.getElementById("code").value;
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
