<?php

require 'main.php';


function add_listpasien($data)
{
    global $conn;

    $nama_pasien = $data['nama_pasien'];
    $tahun = $data['tahun'];
    $bulan = $data['bulan'];
    $tanggal = $data['tanggal'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $alamat = $data['alamat'];

    $query = "INSERT INTO pasien VALUES (
        '',
        '$nama_pasien',
        '$tahun-$bulan-$tanggal',
        '$jenis_kelamin',
        '$alamat'
    )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function edit_listpasien($data)
{
    global $conn;

    $pasien_id = $data["pasien_id"];
    $nama_pasien = $data['nama_pasien'];
    $tahun = $data['tahun'];
    $bulan = $data['bulan'];
    $tanggal = $data['tanggal'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $alamat = $data['alamat'];

    $query = "UPDATE pasien SET
        nama_pasien = '$nama_pasien',
        tanggal_lahir = '$tahun-$bulan-$tanggal',
        jenis_kelamin = '$jenis_kelamin',
        alamat = '$alamat'
        WHERE pasien_id = '$pasien_id'
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_listpasien($pasien_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pasien WHERE pasien_id = '$pasien_id'");

    return mysqli_affected_rows($conn);
}
