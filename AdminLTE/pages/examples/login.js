$(document).ready(function () {
  $("#submit").click(function (e) {
    //alert("alert");
    e.preventDefault();
    var email = $("#email_log").val();
    var password = $("#password_log").val();
    if (email != "" && password != "") {
      $.ajax({
        url: "loggingIn.php",
        type: "POST",
        data: {
          email: email,
          password: password,
        },
        success: function (response) {
          // console.log(response);
          // alert("hi");
          // exit;
          var data = $.parseJSON(response);
          //   console.log("data ", data);
          if (data.statuscode == 200) {
            // console.log("hi");
            alert("login sucessfull");
            window.location = "../../index3.html";
          } else {
            console.log("error");
            if (data.statuscode == 201) {
              document.getElementById("error").innerHTML =
                "Invalid EmailId or Password !";
              return false;

              //window.alert(data.message);
            }
          }
        },
      });
    } else {
      alert("Please fill all the field !");
      return false;
    }
  });
});
