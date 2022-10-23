<?php

require 'main.php';

function add_listpoli($data)
{
    global $conn;

    $nama_poli = $data['nama_poli'];

    $query = "INSERT INTO poli VALUES (
        '',
        '$nama_poli'
    )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function edit_listpoli($data)
{
    global $conn;

    $poli_id = $data["poli_id"];
    $nama_poli = $data['nama_poli'];

    $query = "UPDATE poli SET nama_poli = '$nama_poli'
        WHERE poli_id = '$poli_id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_listpoli($poli_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM poli WHERE poli_id = '$poli_id'");

    return mysqli_affected_rows($conn);
}
