<?php
    require_once("dbConnection.php");

    $id = $_GET['id'];

    $result = mysqli_query($mysqli, "SELECT * FROM rooms WHERE room_id = $id");

    $resultData = mysqli_fetch_assoc($result);

    $type = $resultData['type'];
    $cost = $resultData['cost'];
    $number_of_guest = $resultData['number_of_guest'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data</h2>
    <p><a href="index.php">Home</a></p>

    <form name="edit" action="editRoomAction.php" method="post">
        <table>
            <tr>
                <td>Room Type</td>
                <td><input type="text" name="type" value="<?php echo $type;?>"></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td><input type="text" name="cost" value="<?php echo $cost;?>"></td>
            </tr>
            <tr>
                <td>Number of Guest</td>
                <td><input type="text" name="number_of_guest" value="<?php echo $number_of_guest;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
