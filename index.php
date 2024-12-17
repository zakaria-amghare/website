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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- home section starts  -->

<section class="home" id="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="box swiper-slide">
            <img src="images/home-img-1.jpg" alt="">
            <div class="flex">
               <h3>luxurious rooms</h3>
               <a href="#availability" class="btn">Check Availability</a>
            </div>
         </div>

         <div class="box swiper-slide">
            <img src="images/home-img-2.jpg" alt="">
            <div class="flex">
               <h3>foods and drinks</h3>
               <a href="#reservation" class="btn">Make a Reservation</a>
            </div>
         </div>

         <div class="box swiper-slide">
            <img src="images/home-img-3.jpg" alt="">
            <div class="flex">
               <h3>luxurious halls</h3>
               <a href="#contact" class="btn">Contact Us</a>
            </div>
         </div>

      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- home section ends -->

<!-- availability section starts  -->

<section class="availability" id="availability">

   <form action="" method="post">
      <div class="flex">
         <div class="box">
            <p>Check in <span>*</span></p>
            <input type="date" name="check_in" class="input" required>
         </div>
         <div class="box">
            <p>Check out <span>*</span></p>
            <input type="date" name="check_out" class="input" required>
         </div>
         <div class="box">
            <p>Rooms <span>*</span></p>
            <select name="rooms" class="input" required>
               <option value="1">1 room</option>
               <option value="2">2 rooms</option>
               <option value="3">3 rooms</option>
               <option value="4">4 rooms</option>
               <option value="5">5 rooms</option>
               <option value="6">6 rooms</option>
            </select>
         </div>
      </div>
      <input type="submit" value="check availability" name="check" class="btn">
   </form>
<div id="availability_message"> 
<?php


if(isset($_POST['check']))
{
    $date_debut =$_POST["check_in"];
    $date_fin =$_POST["check_out"];
    $nombre_room_they_want =$_POST["rooms"];

    
    $sql = "SELECT Room_id 
            FROM Room 
            WHERE Room_id NOT IN 
            (
                SELECT Room_id 
                FROM Allocation a 
                WHERE (Allocation_debut < '$date_fin' AND Allocation_fin > '$date_fin') 
                OR (Allocation_debut < '$date_debut' AND Allocation_fin > '$date_debut') 
            )";

        // Execute the query
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result)
        {
                // Get the number of rows
                $rowCount = $result->num_rows;

                // Display the number of rooms

               
                if ($nombre_room_they_want>$rowCount) 
                {
                    $availabilityMessage ="we dont have enough rooms so sorry <br> but we can provide you with ".$rowCount." room";                
                }
                else
                {
                    $availabilityMessage ="we so waiting for book now";                

                }

                // Free result set
            } 
            else 
            {
                
            }
            echo '<div class="content">' . $availabilityMessage . '</div>';
            $result->free();

}



?> </div>
</section>

<!-- availability section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="row">
      <div class="image">
         <img src="images/about-img-1.jpg" alt="">
      </div>
      <div class="content">
         <h3>best staff</h3>
         <p>Hotels boast top-notch staff, friendly, attentive, dedicated to guest satisfaction.</p>
         <a href="#reservation" class="btn">make a reservation</a>
      </div>
   </div>

   <div class="row revers">
      <div class="image">
         <img src="images/about-img-2.jpg" alt="">
      </div>
      <div class="content">
         <h3>best foods</h3>
         <p>Hotel's gourmet cuisine delights guests with every bite and desserts are a sweet and satisfying end to any meal.</p>
         <a href="#contact" class="btn">contact us</a>
      </div>
   </div>

   <div class="row">
      <div class="image">
         <img src="images/about-img-3.jpg" alt="">
      </div>
      <div class="content">
         <h3>swimming pool</h3>
         <p>Swimming pools are a luxurious and relaxing feature, perfect for unwinding and soaking up the sun. It provide a refreshing and inviting oasis for guests.</p>
         <a href="#availability" class="btn">check availability</a>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services">

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>food & drinks</h3>
         <p>Food and drinks are delicious, high-quality and carefully prepared to delight guests.</p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>outdoor dining</h3>
         <p>Outdoor dining offers guests a unique and enjoyable dining experience with picturesque views.</p>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>beach view</h3>
         <p>Beach view rooms provide guests with breathtaking ocean vistas and the sound of waves to make for a relaxing and memorable stay.</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>decorations</h3>
         <p>Hotel's decorations are stylish, elegant and sophisticated, creating a warm and inviting ambiance for guests.</p>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>swimming pool</h3>
         <p>The pool area is beautifully designed and well-maintained for guests to enjoy.</p>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>resort beach</h3>
         <p>Hotel's resort beach is a beautiful and secluded paradise, perfect for swimming, sunbathing, and enjoying the ocean's natural beauty</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- reservation section starts  -->

<section class="reservation" id="reservation">

   <form action="" method="post">
      <h3>make a reservation</h3>
      <div class="flex">
         <div class="box">
            <p>Your name <span>*</span></p>
            <input type="text" name="name" maxlength="50" required placeholder="enter your name" class="input">
         </div>
         <div class="box">
            <p>Your email <span>*</span></p>
            <input type="email" name="email" maxlength="50" required placeholder="enter your email" class="input">
         </div>
         <div class="box">
            <p>Your number <span>*</span></p>
            <input type="number" name="number" maxlength="10" min="0" max="9999999999" required placeholder="enter your number" class="input">
         </div>
         <div class="box">
            <p>Rooms <span>*</span></p>
            <select name="rooms" class="input" required>
               <option value="1" selected>1 room</option>
               <option value="2">2 rooms</option>
               <option value="3">3 rooms</option>
               <option value="4">4 rooms</option>
               <option value="5">5 rooms</option>
               <option value="6">6 rooms</option>
            </select>
         </div>
         <div class="box">
            <p>Check in <span>*</span></p>
            <input type="date" name="check_in" class="input" required>
         </div>
         <div class="box">
            <p>Check out <span>*</span></p>
            <input type="date" name="check_out" class="input" required>
         </div>
      </div>
      <input type="submit" value="book now" name="book" class="btn">
   </form>
<?php
    if(isset($_POST['book']))
    {
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone_number=$_POST["number"];
        $date_debut =$_POST["check_in"];
        $date_fin =$_POST["check_out"];
        $nombre_room_they_want =$_POST["rooms"];
        
        $sql = "INSERT INTO Client (Client_name,Client_email,Client_phone) 
                VALUES ('$name', '$email','$nombre_room_they_want')";
        $conn->query($sql);

        $sql = "SELECT Client_id FROM Client WHERE Client_name = ?";

             }

?>
</section>

<!-- reservation section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

   <div class="swiper gallery-slider">
      <div class="swiper-wrapper">
         <img src="images/gallery-img-1.jpg" class="swiper-slide" alt="">
         <img src="images/gallery-img-2.jpg" class="swiper-slide" alt="">
         <img src="images/gallery-img-3.jpg" class="swiper-slide" alt="">
         <img src="images/gallery-img-4.jpg" class="swiper-slide" alt="">
         <img src="images/gallery-img-5.jpg" class="swiper-slide" alt="">
         <img src="images/gallery-img-6.jpg" class="swiper-slide" alt="">
	     <img src="images/gallery-img-7.jpg" class="swiper-slide" alt="">
	     <img src="images/gallery-img-8.jpg" class="swiper-slide" alt="">
	     <img src="images/gallery-img-9.jpg" class="swiper-slide" alt="">	
      </div>
      <div class="swiper-pagination"></div>
   </div>

</section>

<!-- gallery section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <div class="row">

      <form action="" method="post">
         <h3>send us message</h3>
         <input type="email" name="email" required maxlength="50" placeholder="Enter your email" class="box">
         <textarea name="message" class="box" required maxlength="1000" placeholder="Enter your message" cols="30" rows="10"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>

      <?php
            if(isset($_POST['send']))
            {
               $message=$_POST['message'];
               $email=$_POST['email'];

               $sql = "INSERT INTO Message (Message_text, Message_email) VALUES ('$message', '$email')";
               $conn->query($sql);
               
            }
      ?>

      <div class="faq">
         <h3 class="title">frequently asked questions</h3>
         <div class="box active">
            <h3>How to cancel?</h3>
            <p>You can cancel your reservation or send us a request for a modification by clicking on the link at the bottom of your confirmation email.</p>
         </div>
         <div class="box">
            <h3>How many rooms can I book at once?</h3>
            <p>You can book as many rooms as are available for selected period.</p>
         </div>
         <div class="box">
            <h3>How do I pay for our accommodation??</h3>
            <p>It depends on the room payment conditions. In most cases you will pay directly at the hotel after your arrival. However, there are some exceptions - for example Non refundable rooms, so please refer to the room conditions of each room.</p>
         </div>
         <div class="box">
            <h3>How to claim Voucher code. Can I change my reservation?</h3>
            <p>Yes, you can change the reservation so long as the new, adjusted reservation meets the Voucher code requirements and the changes are made before the original check-in date. Please note, however, that this only applies to reservations that did not require any pre-payment at the time of booking</p>
         </div>
         <div class="box">
            <h3>What are the age requirements?</h3>
            <p>Although individual hotel policies may vary, most hotels have a minimum age requirement of 21 years old. Please call the hotel directly prior to your arrival to make any necessary arrangements.</p>
         </div>
      </div>

   </div>

</section>

<!-- contact section ends -->





<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>