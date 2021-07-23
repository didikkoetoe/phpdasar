$(document).ready(function () {
  $('#cari').hide();

  $('#keyword').keyup(function (e) {
    //   munculkan icon loading
    // Di bawah jQuery load versi sederhan
    $('#data').load(`hasil.php?keyword=` + $('#keyword').val());
    // Di bawah adalah jQuery load versi kompleks tapi fleksibel
    // $.get('index.php?keyword=' + $('#keyword').val(), function (data) {
    //   $('#data').html(data);
    //   //   sembunyikan icon loading
    //   //   $('.loader').hide();
    // });
  });
});
