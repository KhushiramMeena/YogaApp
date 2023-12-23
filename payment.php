<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <div class="container">
        

            <?php

            include "connection.php";

            if (isset($_POST['submit'])) {
                $Card_Number = $_POST['Card_Number'];
                $Expiration = $_POST['Expiration'];
                $cvv = $_POST['cvv'];
            


                $query = "INSERT INTO contact(Card_Number,Expiration,cvv) VALUES(' $Card_Number','$Expiration','$cvv')";

                $data = mysqli_query($conn, $query);



                if ($data) {
                    echo `alert(Message sent successfully ✨)`;

                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                } else {
                    echo
                    `alert(Technical Issue! )`;

                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                }
            }

            ?>

         <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">
<?php 

if ($data) {
  echo `alert(Message sent successfully ✨)`;

  echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
} else {
  echo
  `alert(Technical Issue! )`;

  echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
}
?>
              

            </div>

        </div>
    </section>


          <!-- Pay Registration Fee section  -->

  

    </div>
</body>

</html>