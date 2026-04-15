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

<style>
    h1{
        color:rgb(220, 198, 156);;
    }

body{
   background-color :#2B1103 ;
   /* padding-bottom: 7.5rem; */
}
table
{width: 100%;}

table,td,th
{
   border: 1px solid;
   background-color: rgba(220, 198, 156, .6);
}</style>

<!-- custom css file link  -->
</head>
<body>
    <section id="Voir_Client">
        <h1>Client</h1>
        <table id="Table_Client">
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

    <h1>Room</h1>
        <table id="Table_Room">
            <thead>
                <tr>
                    <th>Room_id</th>
                    <th>Room_name</th>
                    <th>Room_space</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql=' SELECT * FROM Room';
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Room_id"] . "</td>";
                    echo "<td>" . $row["Room_name"] . "</td>";
                    echo "<td>" . $row["Room_space"] . "</td>";
                    echo "</tr>";
                }   

                ?>
            </tbody>
        </table>

    </section>

    <h1>Allocation</h1>
        <table id="Table_Allocation">
            <thead>
                <tr>
                    <th>Allocation_debut </th>
                    <th>Allocation_fin </th>
                    <th>Client_id </th>
                    <th>Room_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql=' SELECT * FROM Room';
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Allocation_debut "] . "</td>";
                    echo "<td>" . $row["Allocation_fin "] . "</td>";
                    echo "<td>" . $row["Client_id "] . "</td>";
                    echo "<td>" . $row["Room_id"] . "</td>";
                    echo "</tr>";
                }   

                ?>
            </tbody>
        </table>

    </section>
    <h1>Messages</h1>
        <table id="Table_Messages">
            <thead>
                <tr>
                    <th>Message </th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql=' SELECT * FROM Messages';
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Message_email"] . "</td>";
                    echo "<td>" . $row["Message_text"] . "</td>";
                    echo "</tr>";
                }   
                echo "hhaha" . $row["Message_text"] ;

                ?>
            </tbody>
        </table>

    </section>

    
</body>
</html>