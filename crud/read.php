<?php
include "../server.php";
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete'];
    $sqlDelete = "DELETE FROM contact WHERE contact_id='$delete_id'";
    if ($conn->query($sqlDelete) === TRUE) {
        echo "delete success";
        header('Location:read.php');
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
    <h1>Read</h1>
    <p>
        <a href="./create.php">Create new</a>
    </p>
    <table border="1">
        <tr>
            <th>sn</th>
            <th>name</th>
            <th>email</th>
            <th>message</th>
            <th>action</th>
        </tr>


        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['contact_id'] . "</td>";
                echo "<td>" . $row['contact_name'] . "</td>";
                echo "<td>" . $row['contact_email'] . "</td>";
                echo "<td>" . $row['contact_message'] . "</td>";
                echo "<td><a href='update.php?contact_id=" . $row['contact_id'] . "'>update</a>
        <form method='POST'>
        <button type='submit' name='delete' value='" . $row['contact_id'] . "'>delete</button>
        </form>
        
        </td> ";
                echo "</tr>";
            }
        }

        ?>
    </table>


</body>

</html>