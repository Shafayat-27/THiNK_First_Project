<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Table with database</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand h1 mx-auto">Temperature Monitoring System</span>
    </nav>
    <div class="mx-5">
        <div class="alert alert-success text-center" role="alert">
            Temperature Log
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr class="mx-auto">
                <th scope="col">Sl No.</th>
                <th scope="col">Temperature</th>
                </tr>
            </thead>
        <?php
        require '../inc/dbcon.php';
        global $conn;

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT Tempno_,Temp_ FROM temp_log";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Tempno_"]. "</td><td>" . $row["Temp_"] . "</td></tr>";
            }
            echo "</table>";
        } else { echo "0 results"; }
        $conn->close();
        ?>
        </table>
    </div>

    <div class="mx-5">
        <div class="alert alert-danger text-center" role="alert">
            Alarm Log
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr class="mx-auto">
                <th scope="col">Sl No.</th>
                <th scope="col">Temperature</th>
                </tr>
            </thead>
        <?php
        require '../inc/dbcon.php';
        global $conn;

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT Alarmno_,Alarm_ FROM alarm_log";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Alarmno_"]. "</td><td>" . $row["Alarm_"] . "</td></tr>";
            }
            echo "</table>";
        } else { echo "0 results"; }
        $conn->close();
        ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>