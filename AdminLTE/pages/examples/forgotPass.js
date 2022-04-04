$(document).ready(function () {
  $("#forgetBtn").on("click", function (e) {
    // alert("alert");
    e.preventDefault();
    var email = $("#mail").val();
    // var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    // var validate = regex.test(email);
    if (email != "") {
      //alert(email);
      $.ajax({
        type: "POST",
        url: "recoverPass.php",
        data: {
          email: email,
        },

        success: function (response) {
          //var data = $.parseJSON(response);
          console.log(response);
          // if (data.statuscode == 200) {
          //   alert("reset sucess");
          document.getElementById("passwordResult").innerHTML = response;
          // } else {
          //   if (data.statuscode == 201) {
          //     document.getElementById("error").innerHTML =
          //       "Invalid EmailId or Password !";
          //     return false;
        },
        //}
        //},
      });
    } else {
      alert("Please fill all the field !");
      return false;
    }
  });
});
