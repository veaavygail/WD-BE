<?php 
include('connect.php');

$islandsQuery="SELECT * FROM islandsofpersonality";
$islandResult=executeQuery($islandsQuery);

if (isset($_GET['islandOfPersonalityID'])) {
    $islandOfPersonalityID = $_GET['islandOfPersonalityID'];
    
    $islandQuery = "SELECT * FROM islandsofpersonality WHERE islandOfPersonalityID = '$islandOfPersonalityID'";
    $result = executeQuery($islandQuery);

    if ($result) {
        $islandDetails = mysqli_fetch_assoc($result);
       
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Islands of Personality</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body{
        }
    </style>
</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button">Home</a>
            <!-- Float links to the right. Hide them on small screens -->
            <div class="w3-right w3-hide-small">
                <a href="#projects" class="h1 w3-bar-item w3-button"> Island of Personality </a>
                <a href="#about" class="h1 w3-bar-item w3-button"> Islands of Personality Description</a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
        <img class="w3-image"
            src="https://corn-exchange.transforms.svdcdn.com/production/images/2-Film/2024-Films/Inside-Out-2.png?w=648&h=432&q=85&auto=format&fit=clip&dm=1719587842&s=7b15f90daec481f8426c297167f4389c"
            alt="Architecture" width="1500" height="800">
        <div class="w3-display-middle w3-margin-top w3-center">
        </div>
    </header>

    <!-- Page content -->
    <div class="w3-content w3-padding" style="max-width:1564px">

        <!-- Project Section -->
        <div class="w3-container w3-padding-32" id="projects">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Islands of Personality</h3>
        </div>

        <div class="w3-row-padding">

        <?php if(mysqli_num_rows($islandResult) >0){
            while($islandsrows=mysqli_fetch_assoc($islandResult)){?>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding"><?php echo ($islandsrows['name']); ?> </div>
                    <img src="./image/<?php echo($islandsrows['image']); ?>" alt="House" style="width:100%">
                </div>
            </div>

        <?php }}?>

        <!-- About Section -->
        <div class="w3-container w3-padding-32" id="about">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
            <p>Each of these islands beautifully connects to an emotion from Inside Out, highlighting how our feelings shape and enrich who we are. These islands of personality form the foundation of who I am today. Through experiencing the journeys each one offers, I’ve grown stronger and braver with every step. Join me as I take you through these magical worlds that have offered me an escape from reality and helped me discover my true self.
            </p>
        </div>

        <div class="w3-row-padding w3-grayscale">
        <?php 
            $islandResult=executeQuery($islandsQuery);

         ?>
            <?php 
                while($islandsrows1=mysqli_fetch_assoc($islandResult)){?>

                <div class="w3-col l3 m6 w3-margin-bottom" style="background-color: <?php echo ($islandsrows1['color']); ?>">
                    <img src="./image/<?php echo ($islandsrows1['image']); ?> " alt="John" style="width:100%">
                    <h3><?php echo ($islandsrows1['name']); ?> </h3>
                    <p class="w3-opacity"><?php echo ($islandsrows1['status']); ?> </p>
                    <p><?php echo ($islandsrows1['shortDescription']); ?></p>
                    <form action="view.php" method="GET">
                    <input type="hidden" name="islandOfPersonalityID" value="<?php echo ($islandsrows1['islandOfPersonalityID']); ?>">
                    <button type="submit" class="w3-button w3-light-grey w3-block">Show more</button>
                    </form>
                 </div>

            <?php }?>
        </div>



        <!-- Image of location/map -->
        <div class="container">
            <img src="./image/1.png" class="w3-image" style="width:100%">
        </div>

        <!-- End page content -->
    </div>


    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-16">
        <p>
           &copy; 2024 Vea Avygail. All rights reserved.</p>
    </footer>

</body>

</html>