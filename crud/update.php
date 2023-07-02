<?php
include "../server.php";
$contact_id = $_GET['contact_id'];

$sqlData = "SELECT * FROM contact WHERE contact_id='$contact_id'";
$result = $conn->query($sqlData);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contact_name = $row['contact_name'];
        $contact_email = $row['contact_email'];
        $contact_message = $row['contact_message'];
    }
}



if (isset($_POST['submit_btn'])) {
    $name = $_POST["contact_name"];
    $email = $_POST["contact_email"];
    $message = $_POST["contact_message"];
    $contact_id = $_POST['submit_btn'];


    $sql = "UPDATE contact SET
    contact_name='$name',
    contact_email='$email',
    contact_message='$message'
    WHERE contact_id='$contact_id'";

    if ($conn->query($sql) === TRUE) {
        header('Location:read.php');
        echo "Data Update successfully";
    } else {
        echo "error";

    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update</h1>
    <p>
        <a href="./create.php">Create new</a>
        <a href="./read.php">Table data</a>
    </p>
    <form action="" method="POST">
        <div class="form-controller">
            <label for="contact_name">Contact name</label>
            <input type="text" name="contact_name" id="contact_name" value="<?php echo $contact_name ?>">
        </div>
        <div class="form-controller">
            <label for="contact_email">Contact email</label>
            <input type="email" name="contact_email" id="contact_email" value="<?php echo $contact_email ?>">
        </div>
        <div class="form-controller">
            <label for="contact_message">Contact message</label>
            <textarea type="text" name="contact_message" id="contact_message"><?php echo $contact_message ?></textarea>

        </div>

        <button type="submit" name="submit_btn" value="<?php echo $contact_id ?>">Update form</button>
    </form>


</body>

</html>