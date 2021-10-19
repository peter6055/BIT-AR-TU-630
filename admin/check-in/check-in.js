function checkIn() {
    phoneNumber = document.getElementById("phoneNumber").value;
    if (!checkPhoneNumber(phoneNumber)) {
        alert("Phone number should be +614XXXXXXXX");
        return false;
    }
    document.getElementById("ShowInformation").style.display = "block";
    document.getElementById("enterPhone").style.display = "none";

    var phoneNum = $('#phoneNumber').val().trim();
    $.ajax({
        url: 'https://covid-vaccine.tech/libraries/check_in/checkInUser.php',
        data: {
            phoneNumber: phoneNum
        },
        success: function(returnData){
            var results = JSON.parse(returnData);
            if(results.length == 0){
                alert("No appointment data found");
                location.reload();
            }
            $('#gName').append(results[7]);
            $('#sName').append(results[8]);
            $('#gender').append(results[9]);
            $('#dob').append(results[10]);
            $('#email').append(results[11]);
            $('#ID').append(results[12]);
            $('#address').append(results[14]);
            $('#Place').append(results[1]+" ("+results[2]+")");
            $('#Date').append(results[3]);
            $('#Time').append(results[4]);
            $('#NUM').append(results[5]);

        }
    });
}
function goBack() {
    document.getElementById("ShowInformation").style.display = "none";
    document.getElementById("enterPhone").style.display = "block";
    location.reload();
}
function checkPhoneNumber(phoneNumber) {
    var pattern = /^\+[6][1][4]\d{8}$/;
    if (pattern.test(phoneNumber)) {
        return true;
    } else {
        return false;
    }
}
