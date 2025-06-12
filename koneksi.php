<?php
$servername = "wsb_generalday";
$username = "wsb_generalday";
$password = "92d05b0270339689fe78df0dfe81feb1db202e27";
$dbs = "wsb_generalday";

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $dbs);

// Check connection
if ($koneksi) {
} else {
    echo "Server not connected";
}
