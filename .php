<?php
$servername = "localhost"; // Replace with your server name if not localhost
$username = "zakaria";        // Replace with your MySQL username
$password = "nzizou123";            // Replace with your MySQL password
$database = "HOTEL_DB";     // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="Voir_Client">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql=' SELECT * FROM Client';
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Client_id"] . "</td>";
                    echo "<td>" . $row["Client_name"] . "</td>";
                    echo "<td>" . $row["Client_email"] . "</td>";
                    echo "<td>" . $row["Client_phone"] . "</td>";
                    echo "</tr>";
                }   

                ?>
            </tbody>
        </table>

    </section>
</body>
</html>