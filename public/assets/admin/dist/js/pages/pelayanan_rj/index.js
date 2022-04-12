var myTable;
$(document).ready(function () {
   myTable = $("#example1").DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: false,
      language: table_language(),
      ajax: {
         url: BASE_URL + "/pelayanan-rj-all",
         data: function (d) {
            d.poli = $("#select_poli").val();
            d.dokter = $("#select_dokter").val();
            d.perawat = $("#select_perawat").val();
            d.status = $("#select_status").val();
         },
      },
      order: [],
      columns: [
         {
            data: "no",
            className: "text-center",
            orderable: false,
         },
         {
            data: "no_rm",
         },
         {
            data: "tgl_daftar",
         },
         {
            data: "nama_poli",
         },
         {
            data: "keluhan",
         },
         {
            data: "keperluan",
         },
         {
            data: "status_pelayanan",
            className: "text-center",
         },
         {
            data: "nama_perawat",
         },
         {
            data: "nama_diagnosis",
         },
         {
            data: "tindak_lanjut",
         },
         {
            data: "action",
            className: "text-center",
            orderable: false,
         },
      ],
   });

   $("#select_poli").change(function (event) {
      var id = $(this).val();
      var name = "poli";
      setSess(name, id).done(function (res) {
         myTable.ajax.reload();
      });
   });
   $("#select_dokter").change(function (event) {
      var id = $(this).val();
      var name = "dokter";
      setSess(name, id).done(function (res) {
         myTable.ajax.reload();
      });
   });
   $("#select_perawat").change(function (event) {
      var id = $(this).val();
      var name = "perawat";
      setSess(name, id).done(function (res) {
         myTable.ajax.reload();
      });
   });
   $("#select_status").change(function (event) {
      var id = $(this).val();
      var name = "status";
      setSess(name, id).done(function (res) {
         myTable.ajax.reload();
      });
   });

   $(".dataTables_filter input")
      .unbind()
      .bind("input", function (e) {
         // If the length is 3 or more characters, or the user pressed ENTER, search
         if (this.value.length >= 3 || e.keyCode == 13) {
            myTable.search(this.value).draw();
         }
         if (this.value == "") {
            myTable.search(this.value).draw();
         }
         return;
      });
});

$(document)
   .off("click", "table#example1 button.item_detail")
   .on("click", "table#example1 button.item_detail", function (e) {
      e.preventDefault();
      let id = $(this).attr("data-id");
      $.ajax({
         type: "POST",
         url: BASE_URL + "/pelayanan-rj-one",
         data: {
            id: id,
         },
         dataType: "json",
         success: function (res) {
            if (res.status == 200) {
               let data = res.data;
               $("#modal-detail").modal({
                  backdrop: false,
               });
               var t = "<tr><td>";
               t +=
                  `<div id="printContent">
                  <h5 class="text-center text-bold">Data Pasien</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                No RM
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.no_rm +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Nama Pasien
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.nama_pasien +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Jenis Kelamin
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  (data.pelayanan.jk_pasien == "L" ? "Laki-laki" : "Perempuan") +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                TTL
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.tempat_lahir +
                  `, ` +
                  tglIndo(data.pelayanan.tanggal_lahir) +
                  `
                                            </div>
                                        </div>
                                        <hr class="mt-2 mb-0">
                                    </div>
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Umur
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  getAge(data.pelayanan.tanggal_lahir) +
                  ` tahun
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                No HP
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  (data.pelayanan.no_hp != "" ? data.pelayanan.no_hp : "-") +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                NIK
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.nik +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                No KIS
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  (data.pelayanan.no_kis != "" ? data.pelayanan.no_kis : "-") +
                  `
                                            </div>
                                        </div>
                                        <hr class="mt-2 mb-0">
                                    </div>
                                    </div>
                                </div>`;
               t += "</td></tr>";
               t += "<tr><td>";
               t +=
                  `<div id="printContent2">
                  <h5 class="text-center text-bold">Data Pendaftaran Rawat Jalan</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Keluhan
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.keluhan +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Keperluan
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.keperluan +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Poli
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.poli.nama_poli +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Dokter
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.dokter.fullname +
                  `
                                            </div>
                                        </div>
                                        <hr class="mt-2 mb-0">
                                    </div>
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Tgl Daftar
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  tglIndoJam(data.pelayanan.tgl_daftar) +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Petugas
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.petugas.fullname +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Pembayaran
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.metode_pembayaran +
                  `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Status Pelayanan
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  (data.pelayanan.status_pelayanan == "0" ? "Belum Tertangani" : "Sudah Tertangani") +
                  `
                                            </div>
                                        </div>
                                        <hr class="mt-2 mb-0">
                                    </div>
                                    </div>
                                </div>`;
               t += "</td></tr>";
               t += "<tr><td>";
               t += `<div id="printContent3">
               <h5 class="text-center text-bold">Data Hasil Pemeriksaan Rawat Jalan</h5>
                                <div class="row">
                                    <div class="col-12">`;
               if (data.pelayanan.status_pelayanan == "0") {
                  t += `<hr class="mt-0 mb-2">
                                    <p class="text-center my-0">Tidak ada hasil pemeriksaan pelayanan</p>
                                    <hr class="mt-2 mb-0">`;
               } else {
                  if (data.poli.id_poli == "1" || data.poli.id_poli == "3" || data.poli.id_poli == "4") {
                     t +=
                        `<div class="row">
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Tensi
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        cleanUStr(data.pelayanan.tensi) +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Suhu
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        cleanUStr(data.pelayanan.suhu) +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Kolestrol
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        (data.pelayanan.kolestrol != "" ? cleanUStr(data.pelayanan.kolestrol) : "-") +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Gula Darah
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        (data.pelayanan.gula_darah != "" ? cleanUStr(data.pelayanan.gula_darah) : "-") +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Tinggi Badan
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        (data.pelayanan.tinggi_badan != "" ? cleanUStr(data.pelayanan.tinggi_badan) : "-") +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Berat Badan
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        (data.pelayanan.berat_badan != "" ? cleanUStr(data.pelayanan.berat_badan) : "-") +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                </div>`;
                  }
                  if (data.poli.id_poli == "2") {
                     t +=
                        `<div class="row">
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Tensi
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        (data.pelayanan.tensi != "" ? cleanUStr(data.pelayanan.tensi) : "-") +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Suhu
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        (data.pelayanan.suhu != "" ? cleanUStr(data.pelayanan.suhu) : "-") +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                </div>`;
                  }
                  if (data.poli.id_poli == "3") {
                     t +=
                        `<div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Lebah Perut
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        cleanUStr(data.pelayanan.lebar_perut) +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                TFU
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        cleanUStr(data.pelayanan.tfu) +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                </div>`;
                  }
                  if (data.poli.id_poli == "4") {
                     t +=
                        `<div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Tgl Pasang
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        tglIndo(data.pelayanan.tgl_pasang) +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Tgl Kembali
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        tglIndo(data.pelayanan.tgl_kembali) +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Jenis Pemasangan
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                        data.pelayanan.jenis_pemasangan +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                </div>`;
                  }
                  if (data.poli.id_poli == "5") {
                     t +=
                        `<hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-3 my-0">
                                                Hasil Pemeriksaan
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                        data.pelayanan.hasil_pemeriksaan +
                        `
                                            </div>
                                        </div>
                                        <hr class="my-2">`;
                  }
                  t +=
                     `<div class="row">
                                            <label class="col-sm-3 my-0">
                                                Diagnosis
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     data.pelayanan.nama_diagnosis +
                     ` (` +
                     data.pelayanan.kode_diagnosis +
                     `)
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-3 my-0">
                                                Tindak Lanjut
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     data.pelayanan.tindak_lanjut +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-3 my-0">
                                                Catatan Pelayanan
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     data.pelayanan.catatan_pelayanan +
                     `
                                            </div>
                                        </div>
                                    <hr class="mt-2 mb-0">`;
               }
               t += `</div>
                                </div>
                                </div>`;
               t += "</td></tr>";
               t += "<tr><td>";
               t += `<div id="printContent4">
               <h5 class="text-center text-bold">Data Tindakan dan Tarif Pelayanan Rawat Jalan</h5>`;
               if (data.pelayanan.status_pelayanan == "0") {
                  t += `<div class="row">
                            <div class="col-12">
                                <hr class="mt-0 mb-2">
                                <p class="text-center my-0">Tidak ada hasil pemeriksaan pelayanan</p>
                                <hr class="mt-2 mb-0">
                            </div>
                        </div>`;
               } else {
                  t += `<div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="bg-light">
                            <th>Nama tindakan dan tarif</th>
                            <th>Harga (Rp.)</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>`;
                  $.each(data.dettindakan, function (i, val) {
                     t +=
                        `<tr>
                        <td>` +
                        val.tindakan +
                        `</td>
                        <td>` +
                        formatRupiah(val.hrg_tindakan) +
                        `</td>
                        <td class="text-center">` +
                        val.jml_tindakan +
                        `</td>
                        <td class="text-right">` +
                        formatRupiah(val.sub_total) +
                        `</td>
                    </tr>`;
                  });
                  t +=
                     `</tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th colspan="3" class="text-center align-middle">Total Harga</th>
                                <th class="text-right align-middle total-tindakan">` +
                     formatRupiah(data.tindakan.total_harga) +
                     `</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>`;
               }
               t += `</div>`;
               t += "</td></tr>";
               $("#tb-detail tbody").html("");
               $("#tb-detail tbody").html(t);
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
   });

$(document)
   .off("click", "table#example1 button.edit-perawat")
   .on("click", "table#example1 button.edit-perawat", function (e) {
      e.preventDefault();
      let id = $(this).attr("data-id");
      $.ajax({
         type: "POST",
         url: BASE_URL + "/pelayanan-rj-one",
         data: {
            id: id,
         },
         dataType: "json",
         success: function (res) {
            if (res.status == 200) {
               $.ajax({
                  type: "POST",
                  url: BASE_URL + "/perawat-all",
                  dataType: "json",
                  success: function (response) {
                     if (response.status == 200) {
                        let data = res.data;
                        $("#modal-perawat").modal("show");
                        $("form#form-pelayanan-perawat .invalid-feedback").remove();
                        let list;
                        pelayananPerawat = data.pelayanan.id_perawat;
                        list += `<option value="" disabled selected>--Pilih Perawat--</option>`;
                        $("select#perawat").html("");
                        $.each(response.data, function (i, val) {
                           if (pelayananPerawat == val.id) {
                              selected = "selected";
                           } else {
                              selected = "";
                           }
                           list += `<option value="` + val.id + `" ` + selected + `>` + val.fullname + ` (` + val.phone + `)</option>`;
                        });
                        $("form#form-pelayanan-perawat select#perawat").html(list);
                        $("form#form-pelayanan-perawat input[name=id_pelayanan_rj]").val(data.pelayanan.id_pelayanan_rj);
                        $("form#form-pelayanan-perawat input[name=id_pendaftaran_rj]").val(data.pelayanan.id_pendaftaran_rj);
                     } else {
                        Swal.fire({
                           title: "Error",
                           text: response.pesan,
                           icon: "error",
                           confirmButtonClass: "btn btn-danger",
                           buttonsStyling: false,
                        });
                     }
                  },
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
   });

$(document)
   .off("click", "button#save-pelayanan-perawat")
   .on("click", "button#save-pelayanan-perawat", function (e) {
      simpanPelayananPerawat();
   });

function simpanPelayananPerawat() {
   var datas = new FormData($("form#form-pelayanan-perawat")[0]);
   $.ajax({
      type: "POST",
      url: BASE_URL + "/pelayanan-rj-perawat",
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
               $("#modal-perawat").modal("hide");
               myTable.ajax.reload();
            });
         } else {
            if (res.status == 400) {
               var frm = Object.keys(res.pesan);
               var val = Object.values(res.pesan);
               $("form#form-pelayanan-perawat .invalid-feedback").remove();
               frm.forEach(function (el, ind) {
                  if (val[ind] != "") {
                     $("form#form-pelayanan-perawat #" + el)
                        .removeClass("is-invalid")
                        .addClass("is-invalid");
                     var app = '<div id="' + el + '-error" class="invalid-feedback" for="' + el + '">' + val[ind] + "</div>";
                     $("form#form-pelayanan-perawat #" + el)
                        .closest(".form-group")
                        .append(app);
                  } else {
                     $("form#form-pelayanan-perawat #" + el)
                        .removeClass("is-invalid")
                        .addClass("is-valid");
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
