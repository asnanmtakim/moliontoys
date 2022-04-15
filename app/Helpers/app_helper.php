<?php
function format_rupiah($angka)
{
   $rupiah = number_format($angka, 0, ',', '.');
   return $rupiah;
}
function fromat_substr($string, $length)
{
   $string = substr($string, 0, $length);
   return $string;
}
function format_tanggal($tanggal)
{
   $tanggal = date('Y-m-d', strtotime($tanggal));
   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   $tgl = explode('-', $tanggal);
   return $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0];
}

function getUmur($tanggal_lahir)
{
   $birthDate = new DateTime($tanggal_lahir);
   $today = new DateTime("today");
   if ($birthDate > $today) {
      exit("0");
   }
   $y = $today->diff($birthDate)->y;
   return $y;
}

function tanggal_indo($tanggal)
{
   $tanggal = date('Y-m-d H:i', strtotime($tanggal));
   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   $waktu = explode(' ', $tanggal);
   $tgl = explode('-', $waktu[0]);
   return $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0] . ' ' . $waktu[1];
}

function app_identity()
{
   $db = \Config\Database::connect();
   $builder = $db->table('app_identity');
   $output = $builder->orderBy('conf_order', 'ASC')->get()->getResultArray();
   $appTitle = $output[6]['conf_value'];
   $output = [
      'app_title' => $appTitle,
      'app_name' => $output[5]['conf_value'],
      'app_icon' => base_url() . '/' . $output[4]['conf_value'],
      'app_description' => $output[3]['conf_value'],
      'app_brand' => base_url() . '/' . $output[2]['conf_value'],
      'app_about_us' => $output[1]['conf_value'],
      'app_about' => $output[0]['conf_value'],
      'app_address' => $output[7]['conf_value'],
      'app_phone' => $output[8]['conf_value'],
      'app_email' => $output[9]['conf_value'],
      'app_maps' => $output[10]['conf_value'],
   ];
   return $output;
}
