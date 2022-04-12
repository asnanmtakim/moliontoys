function listTindakan() {
   $.ajax({
      type: "POST",
      url: BASE_URL + "/tindakan-ugd",
      success: function (res) {
         res = JSON.parse(res);
         data = res.data;
         $("#select-tindakan").html("");
         let opt = '<option value="" selected>--Pilih Tindakan dan Tarif--</option>';
         $.each(data, function (i, val) {
            opt += '<option value="' + val.id_tindakan + '">' + val.tindakan + "</option>";
         });
         $("#select-tindakan").html(opt);
      },
   });
}

function tableLoad() {
   $("#tb-tindakan tbody").html(`<tr><td colspan="6" class="text-center"><i class="fas fa-circle-notch fa-spin"></i> Loading ...</td></tr>`);
   $.ajax({
      type: "POST",
      url: BASE_URL + "/tindakan-cart",
      success: function (res) {
         res = JSON.parse(res);
         data = res.data;
         $("#tb-tindakan tbody").html("");
         $.each(data, function (i, val) {
            var t = "<tr>";
            t += "<td>" + val.name + "</td>";
            t += "<td>";
            t += '<form id="ubah-price" method="post">';
            t += '<input type="hidden" name="rowid" value="' + val.rowid + '">';
            t += `<input type="number" class="form-control form-control-sm" style="width: 110px;" name="price" value="` + val.price + `">`;
            t += '<input type="submit" style="display: none;">';
            t += "</form>";
            t += "</td>";
            t += '<td class="text-center">';
            t += '<form id="ubah-qty" method="post" class="form-inline justify-content-center">';
            t += '<input type="hidden" name="rowid" value="' + val.rowid + '">';
            t += '<input type="number" class="form-control form-control-sm" style="width: 60px;" name="qty" value="' + val.qty + '">';
            t += '<input type="submit" style="display: none;">';
            t += "</form>";
            t += '<td class="text-right">' + formatRupiah("" + val.subtotal) + "</td>";
            t += "</td>";
            t +=
               `<td class="text-center">
                        <button class="btn btn-icon btn-xs btn-warning item_hapus" title="Hapus" data-id="` +
               val.rowid +
               `" data-name="` +
               val.name +
               `"><i class="fas fa-trash"></i></button>
                     </td>`;
            $("#tb-tindakan tbody").append(t);
         });
         $("#tb-tindakan tfoot .jumlah-tindakan").html((res.total ? res.total : 0) + " item");
         $("#tb-tindakan tfoot .total-tindakan").html(res.grand ? formatRupiah("" + res.grand) : "Rp. 0");
         if (!res.total) {
            $("table#tb-tindakan button#reset-tindakan").hide();
         } else {
            $("table#tb-tindakan button#reset-tindakan").show();
         }
      },
   });
}

$(".format-summernote").summernote({
   tabsize: 2,
   height: 100,
   toolbar: [
      ["style", ["style"]],
      ["font", ["bold", "italic", "underline", "clear"]],
      ["fontsize", ["fontsize"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["height", ["height"]],
      ["view", ["undo", "redo", "codeview"]],
   ],
});

$("#tgl_keluar").datetimepicker({
   locale: "id",
   format: "DD-MM-YYYY HH:mm",
   icons: {
      time: "fa fa-clock",
      date: "fa fa-calendar",
      up: "fa fa-arrow-up",
      down: "fa fa-arrow-down",
   },
});

$(document)
   .off("submit", "table#tb-tindakan form#ubah-qty")
   .on("submit", "table#tb-tindakan form#ubah-qty", function (e) {
      e.preventDefault();
      var datas = new FormData($(this)[0]);
      $.ajax({
         type: "POST",
         url: BASE_URL + "/tindakan-cart-update-qty",
         data: datas,
         dataType: "json",
         cache: false,
         contentType: false,
         processData: false,
         success: function (res) {
            if (res.status == 200) {
               tableLoad();
            }
         },
      });
      return false;
   });
$(document)
   .off("submit", "table#tb-tindakan form#ubah-price")
   .on("submit", "table#tb-tindakan form#ubah-price", function (e) {
      e.preventDefault();
      var datas = new FormData($(this)[0]);
      $.ajax({
         type: "POST",
         url: BASE_URL + "/tindakan-cart-update-prc",
         data: datas,
         dataType: "json",
         cache: false,
         contentType: false,
         processData: false,
         success: function (res) {
            if (res.status == 200) {
               tableLoad();
            }
         },
      });
      return false;
   });

$(document)
   .off("click", "table#tb-tindakan button.item_hapus")
   .on("click", "table#tb-tindakan button.item_hapus", function (e) {
      e.preventDefault();
      var id = $(this).attr("data-id");
      var name = $(this).attr("data-name");
      Swal.fire({
         title: "Hapus Data Tindakan ?",
         text: name,
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Ya, hapus!",
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               type: "POST",
               url: BASE_URL + "/tindakan-cart-delete",
               data: {
                  id: id,
               },
               dataType: "json",
               success: function (res) {
                  tableLoad();
               },
            });
         }
      });
   });

$(document)
   .off("click", "table#tb-tindakan button#reset-tindakan")
   .on("click", "table#tb-tindakan button#reset-tindakan", function (e) {
      e.preventDefault();
      Swal.fire({
         title: "Reset Semua Data Tindakan ?",
         text: "Reset",
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Ya, reset!",
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               type: "POST",
               url: BASE_URL + "/tindakan-cart-destroy",
               dataType: "json",
               success: function (res) {
                  Swal.fire({
                     icon: "success",
                     title: res.pesan,
                  }).then(function (ress) {
                     tableLoad();
                  });
               },
            });
         }
      });
   });

$("#select-tindakan").on("change", function () {
   let value = $(this).val();
   $.ajax({
      type: "POST",
      url: BASE_URL + "/tindakan-cart-add",
      data: {
         id: value,
      },
      dataType: "json",
      success: function (res) {
         listTindakan();
         tableLoad();
      },
   });
});

$("form#form-survey-awal button#save-survey-awal").click(function (e) {
   e.preventDefault();
   simpanStatusAwal();
});

function simpanStatusAwal() {
   var datas = new FormData($("form#form-survey-awal")[0]);
   $.ajax({
      type: "POST",
      url: BASE_URL + "/pelayanan-ugd-edit-awal",
      data: datas,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function (res) {
         if (res.status == 200) {
            Swal.fire({
               title: "Sukses",
               text: res.pesan,
               icon: "success",
               confirmButtonClass: "btn btn-info",
               buttonsStyling: false,
            });
         } else {
            if (res.status == 400) {
               var frm = Object.keys(res.pesan);
               var val = Object.values(res.pesan);
               $("form#form-survey-awal .invalid-feedback").remove();
               frm.forEach(function (el, ind) {
                  if (val[ind] != "") {
                     $("form#form-survey-awal #" + el)
                        .removeClass("is-invalid")
                        .addClass("is-invalid");
                     var app = '<div id="' + el + '-error" class="invalid-feedback" for="' + el + '">' + val[ind] + "</div>";
                     $("form#form-survey-awal #" + el)
                        .closest(".form-group")
                        .append(app);
                  } else {
                     $("form#form-survey-awal #" + el).removeClass("is-invalid");
                  }
               });
            } else {
               Swal.fire({
                  title: "Error",
                  text: res.pesan,
                  icon: "error",
                  confirmButtonClass: "btn btn-danger",
                  buttonsStyling: false,
               });
            }
         }
      },
   });
}

$("form#form-pemeriksaan button#save-pemeriksaan").click(function (e) {
   e.preventDefault();
   simpanPemeriksaan();
});

function simpanPemeriksaan() {
   var datas = new FormData($("form#form-pemeriksaan")[0]);
   $.ajax({
      type: "POST",
      url: BASE_URL + "/pelayanan-ugd-edit-pemeriksaan",
      data: datas,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function (res) {
         if (res.status == 200) {
            Swal.fire({
               title: "Sukses",
               text: res.pesan,
               icon: "success",
               confirmButtonClass: "btn btn-info",
               buttonsStyling: false,
            }).then(function (_res_) {
               Swal.fire({
                  title: "Buatkan resep?",
                  text: "Racik resep untuk pasien " + res.data.nama_pasien + "?",
                  icon: "question",
                  showCancelButton: true,
                  confirmButtonClass: "btn btn-success mx-1",
                  cancelButtonClass: "btn btn-outline-light mx-1",
                  buttonsStyling: false,
                  confirmButtonText: "Ya, racik resep!",
                  cancelButtonText: "Tidak",
               }).then((result) => {
                  if (result.isConfirmed) {
                     location.href = BASE_URL + "/resep-add/" + res.data.id_pelayanan_rj;
                  }
               });
            });
         } else {
            if (res.status == 400) {
               var frm = Object.keys(res.pesan);
               var val = Object.values(res.pesan);
               $("form#form-pemeriksaan .invalid-feedback").remove();
               frm.forEach(function (el, ind) {
                  if (val[ind] != "") {
                     $("form#form-pemeriksaan #" + el)
                        .removeClass("is-invalid")
                        .addClass("is-invalid");
                     var app = '<div id="' + el + '-error" class="invalid-feedback" for="' + el + '">' + val[ind] + "</div>";
                     $("form#form-pemeriksaan #" + el)
                        .closest(".form-group")
                        .append(app);
                  } else {
                     $("form#form-pemeriksaan #" + el).removeClass("is-invalid");
                  }
               });
            } else {
               Swal.fire({
                  title: "Error",
                  text: res.pesan,
                  icon: "error",
                  confirmButtonClass: "btn btn-danger",
                  buttonsStyling: false,
               });
            }
         }
      },
   });
}

$("form#form-status-akhir button#save-status-akhir").click(function (e) {
   e.preventDefault();
   simpanStatusAkhir();
});

function simpanStatusAkhir() {
   var datas = new FormData($("form#form-status-akhir")[0]);
   $.ajax({
      type: "POST",
      url: BASE_URL + "/pelayanan-ugd-edit-akhir",
      data: datas,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function (res) {
         if (res.status == 200) {
            Swal.fire({
               title: "Sukses",
               text: res.pesan,
               icon: "success",
               confirmButtonClass: "btn btn-info",
               buttonsStyling: false,
            }).then(function (_res_) {
               Swal.fire({
                  title: "Buatkan resep?",
                  text: "Racik resep untuk pasien " + res.data.nama_pasien + "?",
                  icon: "question",
                  showCancelButton: true,
                  confirmButtonClass: "btn btn-success mx-1",
                  cancelButtonClass: "btn btn-outline-light mx-1",
                  buttonsStyling: false,
                  confirmButtonText: "Ya, racik resep!",
                  cancelButtonText: "Tidak",
               }).then((result) => {
                  if (result.isConfirmed) {
                     location.href = BASE_URL + "/resep-add/" + res.data.id_pelayanan_rj;
                  }
               });
            });
         } else {
            if (res.status == 400) {
               var frm = Object.keys(res.pesan);
               var val = Object.values(res.pesan);
               $("form#form-status-akhir .invalid-feedback").remove();
               frm.forEach(function (el, ind) {
                  if (val[ind] != "") {
                     $("form#form-status-akhir #" + el)
                        .removeClass("is-invalid")
                        .addClass("is-invalid");
                     var app = '<div id="' + el + '-error" class="invalid-feedback" for="' + el + '">' + val[ind] + "</div>";
                     $("form#form-status-akhir #" + el)
                        .closest(".form-group")
                        .append(app);
                  } else {
                     $("form#form-status-akhir #" + el).removeClass("is-invalid");
                  }
               });
            } else {
               Swal.fire({
                  title: "Error",
                  text: res.pesan,
                  icon: "error",
                  confirmButtonClass: "btn btn-danger",
                  buttonsStyling: false,
               });
            }
         }
      },
   });
}

$("form#form-tindakan button#save-tindakan").click(function (e) {
   e.preventDefault();
   simpanTindakan();
});

function simpanTindakan() {
   var datas = new FormData($("form#form-tindakan")[0]);
   $.ajax({
      type: "POST",
      url: BASE_URL + "/pelayanan-ugd-edit-tindakan",
      data: datas,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success: function (res) {
         if (res.status == 200) {
            Swal.fire({
               title: "Sukses",
               text: res.pesan,
               icon: "success",
               confirmButtonClass: "btn btn-info",
               buttonsStyling: false,
            }).then(function (_res_) {
               Swal.fire({
                  title: "Buatkan resep?",
                  text: "Racik resep untuk pasien " + res.data.nama_pasien + "?",
                  icon: "question",
                  showCancelButton: true,
                  confirmButtonClass: "btn btn-success mx-1",
                  cancelButtonClass: "btn btn-outline-light mx-1",
                  buttonsStyling: false,
                  confirmButtonText: "Ya, racik resep!",
                  cancelButtonText: "Tidak",
               }).then((result) => {
                  if (result.isConfirmed) {
                     location.href = BASE_URL + "/resep-add/" + res.data.id_pelayanan_rj;
                  }
               });
            });
         } else {
            Swal.fire({
               title: "Error",
               text: res.pesan,
               icon: "error",
               confirmButtonClass: "btn btn-danger",
               buttonsStyling: false,
            });
         }
      },
   });
}
