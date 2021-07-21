let login = $(document).ready(function () {
  $("#form").submit(function (e) {
    // e.preventDefault();

    let username = $("#username").val();
    let jmlUsername = username.length;
    if (jmlUsername == 0) {
      $("small:first").addClass("pesan");
      $("#username").addClass("error");
    } else if (jmlUsername < 4) {
      $("small:first").text("Minimal 4 karakter !");
      // return false;
    } else {
      $("#username").addClass("success");
      $("small:first").addClass("pSuccess");
    }

    let email = $("#email").val();
    let jmlEmail = email.length;
    if (jmlEmail === 0) {
      $("#email").addClass("error");
      $("small:eq(1)").addClass("pesan");
    } else {
      $("#email").addClass("success");
      $("small:eq(1)").addClass("pSuccess");
    }

    let password = $("#password").val();
    let password2 = $("#password2").val();
    if (password == "" || password2 == "") {
      $("#password , #password2").addClass("error");
      $("small:eq(2)").addClass("pesan");
      $("small:eq(3)").addClass("pesan");
      return false;
    } else if (password != password2) {
      $("#password , #password2").addClass("error");
      $("small:eq(2)").addClass("pesan");
      $("small:last").text("Password tidak sama");
      $("small:eq(2)").addClass("pSuccess");
      return false;
    } else {
      $("#password , #password2").addClass("success");
      $("small:eq(2)").addClass("pSuccess");
    }
  });
});
