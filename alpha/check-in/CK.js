function checkIn() {
    phoneNumber = document.getElementById("phoneNumber").value;
    if (!checkPhoneNumber(phoneNumber)) {
        alert("Phone number should be +61 4xx xxx xxx");
        return false;
    }
    document.getElementById("ShowInformation").style.display = "block";
    document.getElementById("enterPhone").style.display = "none";
}
function goBack() {
    document.getElementById("ShowInformation").style.display = "none";
    document.getElementById("enterPhone").style.display = "block";
}
function checkPhoneNumber(phoneNumber) {
    var pattern = /^\+[6][1][4]\d{9}$/;
    if (pattern.test(phoneNumber)) {
        return true;
    } else {
        return false;
    }
}
