<?php 
include('connect.php');

if (isset($_GET['islandOfPersonalityID'])) {
    $islandOfPersonalityID = $_GET['islandOfPersonalityID'];
    $islandOfPersonalityID = mysqli_real_escape_string($conn, $islandOfPersonalityID);
    
    $islandQuery = "SELECT * FROM islandsofpersonality JOIN islandcontents ON islandsofpersonality.islandOfPersonalityID = islandcontents.islandOfPersonalityID WHERE islandsofpersonality.islandOfPersonalityID=$islandOfPersonalityID;";
    $result = executeQuery($islandQuery);

    if ($result && mysqli_num_rows($result) > 0) {
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
    <link href="https://fonts.cdnfonts.com/css/noto-serif-hebrew" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @font-face {
            font-family: 'Pokemon';
            src: url('./assets/Pokemon.ttf') format('truetype');
        }

        @font-face {
            font-family: 'HeyComic';
            src: url('./assets/HeyComic.ttf') format('truetype');
        }

        <?php if (isset($islandDetails)) { ?>
            body {
                background-color: <?php echo $islandDetails['color']; ?>;
            }

            .card-title {
                font-family: 'Pokemon', sans-serif;
                font-size: 100px;
            }

            .card-text {
                font-size: 20px;
                font-family: 'HeyComic', sans-serif;
                line-height: 1.5;
            }
        <?php } ?>
    </style>
</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="index.php" class="w3-bar-item w3-button">Home</a>
            <div class="w3-right w3-hide-small">
                <a href="index.php#projects" class="w3-bar-item w3-button">Island of Personality</a>
                <a href="index.php#about" class="w3-bar-item w3-button">Islands of Personality Description</a>
            </div>
        </div>
    </div>

    <?php if (isset($islandDetails)) { ?>
        <div class="w3-content w3-padding" style="max-width:1564px; background-color: <?php echo $islandDetails['color']; ?>;">
            <div class="w3-container w3-padding-32" id="projects" style="max-width:1564px; background-color: <?php echo $islandDetails['color']; ?>;">
                <h3 class="card-title w3-padding-16 text-center mt-5"><?php echo $islandDetails['name']; ?></h3>
                <h3 class="card-title1 w3-padding-16 text-center mt-5"><?php echo $islandDetails['longDescription']; ?></h3>
            </div>

            <?php 
            mysqli_data_seek($result, 0);
            while ($islandsImage = mysqli_fetch_assoc($result)) {
            ?> 
                <div class="w3-container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 d-flex justify-content-center">
                            <img class="Logo2 p-5 img-fluid" src="./image/<?php echo $islandsImage['image']; ?>" alt="Island Image">
                        </div>
                        <div class="col-lg-6 col-sm-12 d-flex align-items-center">
                            <p class="card-text"><?php echo $islandsImage['content']; ?></p>
                        </div>
                    </div> 
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-16">
        <p>&copy; 2024 Vea Avygail. All rights reserved.</p>
    </footer>

</body>

</html>
