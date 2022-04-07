$(document).ready(function () {
  $("#submit").click(function (e) {
    // alert("alert");
    e.preventDefault();
    var name = $("#name_val").val();
    var email = $("#email_val").val();
    var pass = $("#pass_val").val();
    var cpass = $("#cpass_val").val();
    var checkbox = $("#agreeTerms").val();
    if (
      name != "" &&
      email != "" &&
      pass != "" &&
      pass == cpass &&
      checkbox.checked == true
    ) {
      $.ajax({
        url: "registration.php",
        type: "POST",
        data: {
          fullname: name,
          email: email,
          password: pass,
        },
        success: function (response) {
          // console.log("success");
          // console.log("res" + response);
          document.getElementById("nerror").innerHTML = response;

          //window.location = "login.html";

          //$("#nerror").text(response);
        },
      });
    } else if (name == "") {
      document.getElementById("fname").innerHTML = "*enter username";
    } else if (name.length <= 2) {
      document.getElementById("fname").innerHTML = "*enter valid username";
    } else if (email == "") {
      document.getElementById("femail").innerHTML = "*enter email";
    } else if (pass == "") {
      document.getElementById("fpass").innerHTML = "*enter valid password";
    } else if (cpass == "") {
      document.getElementById("fcpass").innerHTML = "*enter password";
    } else if (pass != cpass) {
      document.getElementById("fcpass").innerHTML = "*password not matching";
    } else if (checkbox.checked == false) {
      document.getElementById("fterms").innerHTML = "*agree terms";
    }
  });
});
