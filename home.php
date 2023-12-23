<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

$batch=$age="";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-chat"></i> MyYoga</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">about us</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">contact</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class='nav-link dropdown-toggle' href='edit.php?id=$res_id' id='dropdownMenuLink'
                                    data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-person'></i>
                                </a>


                                <ul class="dropdown-menu mt-2 mr-0" aria-labelledby="dropdownMenuLink">

                                    <li>
                                        <?php

                                        $id = $_SESSION['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

                                        while ($result = mysqli_fetch_assoc($query)) {
                                            $res_username = $result['username'];
                                            $res_email = $result['email'];
                                            $res_id = $result['id'];
                                            $batch=$result['batch'];
                                            $age=$result['age'];
                                        }


                                        echo "<a class='dropdown-item' href='edit.php?id=$res_id'>Change Profile</a>";


                                        ?>

                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="name">
        <center>
            <?php
            // echo $_SESSION['valid'];
            
           

            echo'
            
            <div class="row">
            <div class="col"> Welcome ' . $_SESSION['username'] . '!</div>
            <div class="col"></div>
            <div class="col"></div>
          </div>
          <div class="row">
          <div class="col">Your Age : ' . $age. '</div>
          <div class="col"> </div>
          <div class="col"></div>
  </div>

  <div class="row">
  <div class="col">Your Bacth : ' . $batch. '</div>
  <div class="col"> </div>
  <div class="col"></div>
</div>
    
          
          '

            ?>
            
        </center>
    </div>

    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h3>“Yoga is a mirror to look at ourselves from within”</h3>
                    <p>“Yoga does not just change the way we see things, it transforms the person who sees.”<br/> ― B.K.S Iyengar
                    </p>
                    <button class="btn"><a href="#">Estimate Project</a></button>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    




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




<!-- Pay Registration Fee section  -->

<section class="contact-section" id="contact">
<div class="container">

<div class="row gy-4">

    <h2>Fill Details to Pay</h2>
    

    <div class="row form">
    
<form action="payment.php" method="post" class="php-email-form">
<div class="form-row">
<div class="form-group row">
<label for="cc">Card Number</label>
<input type="number" class="form-control" id="Card_Number" name="Card_Number" placeholder="Enter Card Number" maxlength="12">
</div>

</div>

<div class="form-row row mt-3">
<div class="form-group col-lg-6">
<label for="Expiration">Expiration</label>
<input type="text" class="form-control" id="Expiration" name="Expiration" maxlength="7">
</div>
<div class="form-group col-lg-6">
<label for="inputCity">CVV</label>
<input type="number" class="form-control" name="cvv" id="cvv" maxlength="3">
</div>


</div>

<button type="submit" name="submit" class=" mt-2 btn btn-primary">Pay</button>
</form>

    </div>

</div>

</div>
</section>

                </div>

            </div>
        </div>
    </section>



  

    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><i class="bi bi-chat"></i> MyYoga</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">services</a></li>
                        <li><a href="#">projects</a></li>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;2023_MyYoga</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>