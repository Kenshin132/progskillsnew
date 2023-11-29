<html>
<head>
    <title>Add</title>
</head>
<body>
    <h2>Add Room</h2>
    <p>
        <a href="index.php"><button type='button' class='btn btn-warning'>Home</button></a>
    </p>

    <form action="addRoomAction.php" method="post" name="add">
        <table width="25%" border="0">
            <tr> 
                <td>Room Type</td>
                <td><input type="text" name="type"></td>
            </tr>
                <tr> 
                <td>Cost</td>
                <td><input type="number" name="cost"></td>
            </tr>
                    <tr> 
                <td>Number of Guest</td>
                <td><input type="number" name="number_of_guest"></td>
            </tr>
            
            <tr> 
                <td></td>
                <td><button type='submit' name="submit" class='btn btn-success'>Add</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
