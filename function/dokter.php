<?php

require 'main.php';

function add_listdokter($data)
{
    global $conn;

    $nama_dokter = $data['nama_dokter'];
    $poli_id = $data['poli_id'];

    $query = "INSERT INTO dokter VALUES (
        '',
        '$nama_dokter',
        '$poli_id'
    )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function edit_listdokter($data)
{
    global $conn;

    $dokter_id = $data["dokter_id"];
    $nama_dokter = $data['nama_dokter'];
    $poli_id = $data['poli_id'];

    $query = "UPDATE dokter SET
        nama_dokter = '$nama_dokter',
        poli_id = '$poli_id'
        WHERE dokter_id = '$dokter_id'
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_listdokter($dokter_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM dokter WHERE dokter_id = '$dokter_id'");

    return mysqli_affected_rows($conn);
}
