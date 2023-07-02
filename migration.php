<?php
include "./server.php";

$sqlContact = "CREATE TABLE contact (
    contact_id INT(8) AUTO_INCREMENT PRIMARY KEY,
    contact_name VARCHAR(32),
    contact_email VARCHAR(32),
    contact_message TEXT
)";
$sqlUser = "CREATE TABLE user (
    user_id INT(8) AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(32),
    user_password VARCHAR(32),
    user_email VARCHAR(32),
    user_image VARCHAR(32),
    user_bio TEXT
)";


if ($conn->query($sqlContact) === TRUE) {
    echo "Contact table created";
} else {
    echo "Contact table error";

}
if ($conn->query($sqlUser) === TRUE) {
    echo "User table created";
} else {
    echo "User table error";

}

?>