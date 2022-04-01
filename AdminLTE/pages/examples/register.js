$(document).ready(function () {
  $("#submit").click(function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var pass = $("#pass").val();

    $.ajax({
      method: "post",
      url: "register.php?",
      data: data,
      success: function (data) {
        $("submit_out").html(data);
      },
    });
  });
});
