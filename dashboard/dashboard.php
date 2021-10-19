<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once('../user.php');
if(!isUserLoggedIn()){
  redirect('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <link rel="stylesheet" href="css/index.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript">
    
  </script>
  <script>
    $(document).ready(function () {
      //if initial
      $("#showDetail").css("display","block");
      $("#bookAppointment").css("display","none");
      // buttons
      $("#booking").css("display","block");
      $("#cancel").css("display","none");
      $("#logout").css("display","block");
      $("#back").css("display","none");
      //using jQuery's on function 
      $("#booking").on("click", function(){
        $("#bookAppointment").css("display","block");
        $("#showDetail").css("display","none");
        $("#booking").css("display","none");
        $("#logout").css("display","none");
        $("#cancel").css("display","none");
        $("#back").css("display","block");
      });
      $("#cancel").on("click", function(){
        $("#bookAppointment").css("display","none");
        $("#showDetail").css("display","block");
        $("#booking").css("display","block");
        $("#logout").css("display","block");
        $("#cancel").css("display","none");
        $("#back").css("display","none");
      });
      $("#back").on("click", function(){
        $("#bookAppointment").css("display","none");
        $("#showDetail").css("display","block");
        $("#booking").css("display","block");
        $("#logout").css("display","block");
        $("#cancel").css("display","none");
        $("#back").css("display","none");
      });
    });
  </script>
</head>

<body>
  <section class="containerThis">
    <img src="screen.jpg" alt="cover" class="layoutImage">
    <div class="meal">
      <div id="showDetail">
        <br><br><br><br><br>
        <h2>Welcome</h2>
      </div>

      <div id="bookAppointment">
        <h1>Hi 
          <?php echo $_SESSION[USER_SESSION_KEY]["givenName"]; ?></h1>
        <h2>This is your First/Second does</h2>
        <form id="form1" method="post" action="##" onsubmit="return false;">
          <div class="input-group mb-3" style="margin-left: 25px; max-width: 800px;">
            <label class="input-group-text" for="inputGroupSelect01">Address</label>
            <select class="form-select" id="inputGroupSelect01">
              <option value="null" disabled selected hidden>Choose a place</option>
              <option value="300 Grattan St, Parkville VIC 3050">300 Grattan St, Parkville VIC 3050</option>
              <option value="41 Victoria Parade, Fitzroy VIC 3065">41 Victoria Parade, Fitzroy VIC 3065</option>
              <option value="135 David St, Dandenong VIC 3175">135 David St, Dandenong VIC 3175</option>
              <option value="8 Arnold St, Box Hill VIC 3128">8 Arnold St, Box Hill VIC 3128</option>
            </select>
          </div>
          <div class="input-group mb-3" style="margin-left: 25px; max-width: 800px;">
            <label class="input-group-text" for="inputGroupSelect02">Time</label>
            <select class="form-select" id="inputGroupSelect02">
             <option value="null" disabled selected hidden>Choose a Time</option>
             <option value="morning">morning</option>
             <option value="afternoon">afternoon</option>
            </select>
          </div>          
          <input type="date" placeholder="Date" name="date" id="date">

          <div class="d-flex align-items-center flex-column">
            <div class="form-check" name="checkbox">
              <input type="checkbox" name="checkbox">
              <label class="form-check-label">
                Click if all information correct
              </label>
            </div>
            <input type="submit" id="submit" class="btn btn-light" value="submit" placeholder="sumbit" />
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Four image links -->
  <section class="containerFourImage">

    <div class="imgbox" id="booking">
      <img src="booking.jpg" />
      <a>
        <div class="mask">
          <summary>booking</summary>
        </div>
      </a>
    </div>
    <div class="imgbox" id="cancel">
      <img src="cancel.jpg" />
      <a>
        <div class="mask">
          <summary>cancel</summary>
        </div>
      </a>
    </div>
    <div class="imgbox" id="logout">
      <img src="back.jpg" />
<!--      <button onclick="logout()">-->
        <div class="mask">
          Click here to <a href = "logout.php">Logout</a>
        </div>
<!--      </button>-->
    </div>

    <div class="imgbox" id="back">
      <img src="back.jpg" />
      <a>
        <div class="mask">
          <summary>back</summary>
        </div>
      </a>
    </div>
  </section>
<script>
    $("#submit").click(function () {
        var address=document.getElementById('inputGroupSelect01').value;
      var  time=document.getElementById('inputGroupSelect02').value;
      var date=document.getElementById('date').value;
      var userid=<?php echo $_SESSION[USER_SESSION_KEY]["userID"] ?>;


      $.ajax({
        url:"https://covid-vaccine.tech/dashboard/send.php",
       type:"post",
       
        data:{
          address:address,
          time:time,
          date:date,
          userid:userid
        },
        success:function(data,status){
          alert(data);
        },
        error:function(request){
          alert("error");
        }
        })
        });
</script>
</body>

</html>


