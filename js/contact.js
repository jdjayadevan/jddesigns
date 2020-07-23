function forgotpass() {
  alert("hi");
  var email = document.getElementById("email").value;
  if (email == "") {
    var error =
      '<label class=" control-label" style="color:red">Email is Empty.</label>';
    $("#error_login").html(error);
  } else {
    var recovery_email = { recovery_email: email };

    $.ajax({
      url: "https://jddesign.000webhostapp.com/ajax_forgot_password.php",
      type: "POST",
      data: recovery_email,
      success: function (data, textStatus, jqXHR) {
        if (data.trim() == "success") {
          alert("success");
        } else {
          alert("fail");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {},
    });
  }
}
