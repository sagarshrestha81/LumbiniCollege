

<?php

// if (isset($_GET['submit_btn'])) {
    include "../server.php";
    $name = $_GET["contact_name"];
    $email = $_GET["contact_email"];
    $message = $_GET["contact_message"];

    $sql = "INSERT INTO contact
    (contact_name,contact_email,contact_message)
    VALUES
    ('$name','$email','$message')
    ";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success"=>true,"message"=>"Data insert successfully"]);
        
    } else {
        echo json_encode(["success"=>false,"message"=>"error"]);
    

    }
    

// }
?>
