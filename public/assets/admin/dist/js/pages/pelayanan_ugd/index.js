var myTable;
$(document).ready(function () {
   myTable = $("#example1").DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: false,
      language: table_language(),
      ajax: {
         url: BASE_URL + "/pelayanan-ugd-all",
         data: function (d) {
            d.triase = $("#select_triase").val();
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
            data: "keluhan",
         },
         {
            data: "status_pelayanan",
            className: "text-center",
         },
         {
            data: "nama_perawat",
         },
         {
            data: "nama_triase",
            className: "text-center",
         },
         {
            data: "diagnosa_kerja",
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

   $("#select_triase").change(function (event) {
      var id = $(this).val();
      var name = "triase";
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
         url: BASE_URL + "/pelayanan-ugd-one",
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
                  <h5 class="text-center text-bold">Data Pendaftaran UGD</h5>
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
                                                Pengantar
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                  data.pelayanan.nama_pengantar +
                  `(` +
                  data.pelayanan.pengantar +
                  `)
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
               <h5 class="text-center text-bold">Data Hasil Pemeriksaan UGD</h5>
                                <div class="row">
                                    <div class="col-12">`;
               if (data.pelayanan.status_pelayanan == "0") {
                  t += `<hr class="mt-0 mb-2">
                                    <p class="text-center my-0">Tidak ada hasil pemeriksaan pelayanan</p>
                                    <hr class="mt-2 mb-0">`;
               } else {
                  t +=
                     `<div class="row">
                                    <div class="col-sm-6">
                                        <hr class="mt-0 mb-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Triase
                                            </label>
                                            <div class="col-sm-8">
                                            <i class="fa fa-lg fa-square text-` +
                     data.triase.kode_triase +
                     `"></i>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                RPS
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     data.pelayanan.rps +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                RPD
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     data.pelayanan.rpd +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                RPK
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     data.pelayanan.rpk +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Riwayat Alergi
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     (data.pelayanan.riwayat_alergi != "" ? data.pelayanan.riwayat_alergi : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Pernafasan
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     (data.pelayanan.pernafasan != "" ? cleanUStr(data.pelayanan.pernafasan) : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Saturasi Oksigen
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     (data.pelayanan.saturasi != "" ? cleanUStr(data.pelayanan.saturasi) : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
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
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Nadi
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     (data.pelayanan.nadi != "" ? cleanUStr(data.pelayanan.nadi) : "-") +
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
                     (data.pelayanan.suhu != "" ? cleanUStr(data.pelayanan.suhu) : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Skala Nyeri
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     (data.pelayanan.skala_nyeri != "" ? cleanUStr(data.pelayanan.skala_nyeri) : "-") +
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
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Anamnesis
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     data.pelayanan.anamnesis +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-4 my-0">
                                                Keadaan Umum
                                            </label>
                                            <div class="col-sm-8">
                                            ` +
                     data.pelayanan.keadaan_umum +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    </div>
                                </div>`;
                  t +=
                     `<div class="row">
                                            <label class="col-sm-3 my-0">
                                                Hasil Laboratorium
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     (data.pelayanan.pemeriksaan_laboratorium != "" ? data.pelayanan.pemeriksaan_laboratorium : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-3 my-0">
                                                Hasil X-RAY
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     (data.pelayanan.pemeriksaan_xray != "" ? data.pelayanan.pemeriksaan_xray : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-3 my-0">
                                                Hasil ECG
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     (data.pelayanan.pemeriksaan_ecg != "" ? data.pelayanan.pemeriksaan_ecg : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-3 my-0">
                                                Hasil Spirometri
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     (data.pelayanan.pemeriksaan_spirometri != "" ? data.pelayanan.pemeriksaan_spirometri : "-") +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
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
                                                Tanggal Keluar
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     tglIndoJam(data.pelayanan.tgl_keluar) +
                     `
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row">
                                            <label class="col-sm-3 my-0">
                                                Kondisi Pulang
                                            </label>
                                            <div class="col-sm-9">
                                            ` +
                     data.pelayanan.kondisi_pulang +
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
               <h5 class="text-center text-bold">Data Tindakan dan Tarif Pelayanan UGD</h5>`;
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
         url: BASE_URL + "/pelayanan-ugd-one",
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
                        $("form#form-pelayanan-perawat input[name=id_pelayanan_ugd]").val(data.pelayanan.id_pelayanan_ugd);
                        $("form#form-pelayanan-perawat input[name=id_pendaftaran_ugd]").val(data.pelayanan.id_pendaftaran_ugd);
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
      url: BASE_URL + "/pelayanan-ugd-perawat",
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
                     $("form#form-pelayanan-perawat #" + el).removeClass("is-invalid");
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
$(document)
   .off("click", "table#example1 button.edit-perawat")
   .on("click", "table#example1 button.edit-perawat", function (e) {
      e.preventDefault();
      let id = $(this).attr("data-id");
      $.ajax({
         type: "POST",
         url: BASE_URL + "/pelayanan-ugd-one",
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
                        $("form#form-pelayanan-perawat input[name=id_pelayanan_ugd]").val(data.pelayanan.id_pelayanan_ugd);
                        $("form#form-pelayanan-perawat input[name=id_pendaftaran_ugd]").val(data.pelayanan.id_pendaftaran_ugd);
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
      url: BASE_URL + "/pelayanan-ugd-perawat",
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
                     $("form#form-pelayanan-perawat #" + el).removeClass("is-invalid");
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

$(document)
   .off("click", "table#example1 button.edit-triase")
   .on("click", "table#example1 button.edit-triase", function (e) {
      e.preventDefault();
      let id = $(this).attr("data-id");
      $.ajax({
         type: "POST",
         url: BASE_URL + "/pelayanan-ugd-one",
         data: {
            id: id,
         },
         dataType: "json",
         success: function (res) {
            if (res.status == 200) {
               let data = res.data;
               $("#modal-triase").modal("show");
               $("form#form-pelayanan-triase .error-validation").remove();
               $("form#form-pelayanan-triase .form-group .btn-group label").removeClass("active");
               $("form#form-pelayanan-triase .form-group .btn-group input").removeAttr("checked");
               if (data.pelayanan.triage != "") {
                  $("form#form-pelayanan-triase .form-group .btn-group label#label-triase-" + data.pelayanan.triage).addClass("active");
                  $("form#form-pelayanan-triase .form-group .btn-group input#triase-" + data.pelayanan.triage).attr("checked", true);
               }
               $("form#form-pelayanan-triase input[name=id_pelayanan_ugd]").val(data.pelayanan.id_pelayanan_ugd);
               $("form#form-pelayanan-triase input[name=id_pendaftaran_ugd]").val(data.pelayanan.id_pendaftaran_ugd);
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
   .off("click", "button#save-pelayanan-triase")
   .on("click", "button#save-pelayanan-triase", function (e) {
      simpanPelayananTriase();
   });

function simpanPelayananTriase() {
   var datas = new FormData($("form#form-pelayanan-triase")[0]);
   $.ajax({
      type: "POST",
      url: BASE_URL + "/pelayanan-ugd-triase",
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
               $("#modal-triase").modal("hide");
               myTable.ajax.reload();
            });
         } else {
            if (res.status == 400) {
               var frm = Object.keys(res.pesan);
               var val = Object.values(res.pesan);
               $("form#form-pelayanan-triase .error-validation").remove();
               frm.forEach(function (el, ind) {
                  if (val[ind] != "") {
                     var app = '<div id="' + el + '-error" class="error-validation">' + val[ind] + "</div>";
                     $("form#form-pelayanan-triase input[name=" + el + "]")
                        .closest(".form-group")
                        .append(app);
                  } else {
                     $("form#form-pelayanan-triase .error-validation").remove();
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
