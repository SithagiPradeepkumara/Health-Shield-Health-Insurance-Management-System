<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display details</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body style="margin: 0px; ">
    <div class="image">
        <div class="image1">
            <div style="margin-top: 10px;">

                <div>
                    <img style="width: 100px; height: 100px; margin-left: 50px; margin-top: 20px;" src="logo.jpg">
                    <label class="text" style=" margin-left: 250px;">Health Shield Health Insurance</label>
                </div>
                <hr>
                <div style="margin-top: 50px; margin-left: 250px;" class="div3">
                    <table class="table1">
                        <thead class="table">
                            <tr class="table">
                                <th class="table" scope="col">First Name</th>
                                <th class="table" scope="col">Last Name</th>
                                <th class="table" scope="col">Email</th>
                                <th class="table" scope="col">Password</th>
                                <th class="table" scope="col">RePassword</th>
                                <th class="table" scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming you have a valid database connection
                            // $conn = mysqli_connect("localhost", "admin2", "Healthshield", "health_insurance");
                            
                 include 'dbh copy.php'; 
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            if (isset($_POST['deleteemail'])) {
                                $email = $_POST['deleteemail'];

                                $deleteSql = "DELETE FROM admin WHERE admin_email='$email'";

                                if (mysqli_query($conn, $deleteSql)) {
                                    echo "Record deleted successfully";
                                } else {
                                    echo "Error deleting record: " . mysqli_error($conn);
                                }
                            }

                            $selectSql = "SELECT * FROM admin;";
                            $result = mysqli_query($conn, $selectSql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $email = $row['admin_email'];
                                    $fname = $row['admin_fname'];
                                    $lname = $row['admin_lname'];
                                    $password = $row['admin_password'];
                                    $repassword = $row['admin_repassword'];

                                    echo '<tr>
                                        <td>' . $fname . '</td>
                                        <td>' . $lname . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $password . '</td>
                                        <td>' . $repassword . '</td>
                                        <td>
                                            <form method="post" action="">
                                                <input type="hidden" name="deleteemail" value="' . $email . '">
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                            }

                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>