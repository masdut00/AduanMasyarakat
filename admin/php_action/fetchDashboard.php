<?php

$fetchLaporanSql = "SELECT COUNT(id_pengaduan) FROM pengaduan";
$resultLaporanQuery = $connect->query($fetchLaporanSql);

if ($resultLaporanQuery->num_rows == 1) {
  if ($rowLaporan = $resultLaporanQuery->fetch_array()) {
    $jumlahLaporan = $rowLaporan['0'];
  }
}

$fetchBelumDitanggapi = "SELECT COUNT(status) FROM pengaduan WHERE status = 0";
$resultBelumditanggapi = $connect->query($fetchBelumDitanggapi);

if ($resultBelumditanggapi->num_rows == 1) {
  if ($rowBelum = $resultBelumditanggapi->fetch_array()) {
    $jumlahBelum = $rowBelum['0'];
  }
}

$fethcBookingSql = "SELECT COUNT(status) FROM pengaduan WHERE status = 1";
$resultBookingQuery = $connect->query($fethcBookingSql);

if ($resultBookingQuery->num_rows == 1) {
  if ($rowBooking = $resultBookingQuery->fetch_array()) {
    $jumlahBooking = $rowBooking['0'];
  }
}

$fetchBookedSql = "SELECT COUNT(status) FROM pengaduan WHERE status = 2";
$resultBookedQuery = $connect->query($fetchBookedSql);

if ($resultBookedQuery->num_rows == 1) {
  if ($rowBooked = $resultBookedQuery->fetch_array()) {
    $jumlahBooked = $rowBooked['0'];
  }
}

?>