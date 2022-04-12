$(document).ready(function () {
   $("#show_hide_password_lm .input-group-append .input-group-text span").on("click", function (event) {
      event.preventDefault();
      if ($("#show_hide_password_lm input").attr("type") == "text") {
         $("#show_hide_password_lm input").attr("type", "password");
         $("#show_hide_password_lm .input-group-append span").addClass("fa-eye-slash");
         $("#show_hide_password_lm .input-group-append span").removeClass("fa-eye");
      } else if ($("#show_hide_password_lm input").attr("type") == "password") {
         $("#show_hide_password_lm input").attr("type", "text");
         $("#show_hide_password_lm .input-group-append span").removeClass("fa-eye-slash");
         $("#show_hide_password_lm .input-group-append span").addClass("fa-eye");
      }
   });

   $("#show_hide_password .input-group-append .input-group-text span").on("click", function (event) {
      event.preventDefault();
      if ($("#show_hide_password input").attr("type") == "text") {
         $("#show_hide_password input").attr("type", "password");
         $("#show_hide_password .input-group-append span").addClass("fa-eye-slash");
         $("#show_hide_password .input-group-append span").removeClass("fa-eye");
      } else if ($("#show_hide_password input").attr("type") == "password") {
         $("#show_hide_password input").attr("type", "text");
         $("#show_hide_password .input-group-append span").removeClass("fa-eye-slash");
         $("#show_hide_password .input-group-append span").addClass("fa-eye");
      }
   });

   $("#show_hide_password_conn .input-group-append .input-group-text span").on("click", function (event) {
      event.preventDefault();
      if ($("#show_hide_password_conn input").attr("type") == "text") {
         $("#show_hide_password_conn input").attr("type", "password");
         $("#show_hide_password_conn .input-group-append span").addClass("fa-eye-slash");
         $("#show_hide_password_conn .input-group-append span").removeClass("fa-eye");
      } else if ($("#show_hide_password_conn input").attr("type") == "password") {
         $("#show_hide_password_conn input").attr("type", "text");
         $("#show_hide_password_conn .input-group-append span").removeClass("fa-eye-slash");
         $("#show_hide_password_conn .input-group-append span").addClass("fa-eye");
      }
   });
});

function previewImg() {
   const foto1 = document.querySelector("#foto");
   const imgPreview = document.querySelector(".img-preview");
   const fileFoto = new FileReader();
   fileFoto.readAsDataURL(foto1.files[0]);
   fileFoto.onload = function (e) {
      imgPreview.src = e.target.result;
   };
}

function previewImg1() {
   const foto1 = document.querySelector("#foto_ktm");
   const imgPreview = document.querySelector(".img-preview1");
   const fileFoto = new FileReader();
   fileFoto.readAsDataURL(foto1.files[0]);
   fileFoto.onload = function (e) {
      imgPreview.src = e.target.result;
   };
}

function previewImg2() {
   const foto1 = document.querySelector("#foto_full");
   const imgPreview = document.querySelector(".img-preview2");
   const fileFoto = new FileReader();
   fileFoto.readAsDataURL(foto1.files[0]);
   fileFoto.onload = function (e) {
      imgPreview.src = e.target.result;
   };
}
function previewImg3() {
   const foto1 = document.querySelector("#foto_jadwal_kuliah");
   const imgPreview = document.querySelector(".img-preview3");
   const fileFoto = new FileReader();
   fileFoto.readAsDataURL(foto1.files[0]);
   fileFoto.onload = function (e) {
      imgPreview.src = e.target.result;
   };
}
function previewImg5() {
   const foto1 = document.querySelector("#ss_mi");
   const imgPreview = document.querySelector(".img-preview5");
   const fileFoto = new FileReader();
   fileFoto.readAsDataURL(foto1.files[0]);
   fileFoto.onload = function (e) {
      imgPreview.src = e.target.result;
   };
}

function tglIndoJam(tgl) {
   var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
   var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

   var tanggal = new Date(tgl).getDate();
   var jam = new Date(tgl).getHours();
   var menit = new Date(tgl).getMinutes();
   var detik = new Date(tgl).getSeconds();
   var xhari = new Date(tgl).getDay();
   var xbulan = new Date(tgl).getMonth();
   var xtahun = new Date(tgl).getYear();

   var hari = days[xhari];
   var bulan = months[xbulan];
   var tahun = xtahun < 1000 ? xtahun + 1900 : xtahun;

   if (jam < 10) {
      jam = "0" + jam;
   }
   if (menit < 10) {
      menit = "0" + menit;
   }
   if (detik < 10) {
      detik = "0" + detik;
   }

   return tanggal + " " + bulan + " " + tahun + " " + jam + ":" + menit;
}

function tglIndo(tgl) {
   var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
   var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

   var tanggal = new Date(tgl).getDate();
   var xbulan = new Date(tgl).getMonth();
   var xtahun = new Date(tgl).getYear();

   var bulan = months[xbulan];
   var tahun = xtahun < 1000 ? xtahun + 1900 : xtahun;

   return tanggal + " " + bulan + " " + tahun;
}

function table_language() {
   let language = {
      sLengthMenu: "_MENU_",
      sSearch: "",
      infoEmpty: "",
      infoFiltered: "",
      sZeroRecords: "<b>Data Tidak Ditemukan</b>",
      processing: '<span class="fas fa-sync" aria-hidden="true"></span> Sedang memuat data',
      sSearchPlaceholder: "Cari ...",
   };
   return language;
}

function formatRupiah(angka) {
   var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

   // tambahkan titik jika yang di input sudah menjadi angka ribuan
   if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
   }

   rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
   return "Rp. " + rupiah;
}

function getAge(dateString) {
   var today = new Date();
   var birthDate = new Date(dateString);
   var age = today.getFullYear() - birthDate.getFullYear();
   var m = today.getMonth() - birthDate.getMonth();
   if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
   }
   return age;
}

function cleanUStr(str) {
   newStr = str.replace("_", "");
   return newStr;
}
