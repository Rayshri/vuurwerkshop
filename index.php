<!DOCTYPE html>
<html lang="nl">
<head>
<?php include 'connect.php';?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Deze vuurwerkshop is gemaakt voor een schoolopdracht">
    <meta name="keywords" content="html, css, bootstrap, php, schoolopdracht, vuurwerk, webshop, knalvuurwerk">
    <meta name="author" content="Ricardo Lans">
    <link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/mainstyle.css">
    <title>Vuurwerkshop || Ricardo Lans</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Vuurwerkshop</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="motd col-sm-12">
                <?php
                $time = date("G");

                if($time >= 6 && $time < 12) {
                    echo "<h3>Goedemorgen!</h3>";
                } else if($time >= 12 && $time < 18) {
                    echo "<h3>Goedemiddag!</h3>";
                } else if($time >= 18 && $time < 0) {
                    echo "<h3>Goedeavond!</h3>";
                } else if($time >= 0 && $time < 6) {
                    echo "<h3>Goedenacht!</h3>";
                } else {
                    echo "No time<br>";
                }
                ?>
                <p>Welkom bij de vuurwerkshop, gemaakt voor een schoolporject</p>
            </div>
        </div>
        <div class="row">
            <div class="cat-list col-sm-2">
                <h3>Categorie lijst</h3>
                <ul>
                    <li><a href="vuurwerk.php?cat=sier">Siervuurwerk</a></li>
                    <li><a href="vuurwerk.php?cat=knal">Knalvuurwerk</a></li>
                    <li><a href="vuurwerk.php?cat=ovz">Overzicht</a></li>
                </ul>  
            </div>
            <h2 class="page-header col-sm-9 col-sm-offset-1">Overzicht</h2>
            <br>
            <div class="rec-list col-sm-9 col-sm-offset-1">
            <?php
                $query = $db->prepare("SELECT * FROM products INNER JOIN categorie ON products.category = categorie.id");
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as &$data) {
                    echo "<div style='float: left; width: 49%; max-height: 250px; background-color: rgba(19, 19, 19, 0.671); margin: 3px; padding-left: 10px;'";
                        echo $data["id"] . "<br>";
                        echo "<h3>$data[name] </h3>" . "<br>";
                        echo "<img src='$data[picture]' width='185px'; style='max-height:150px'>";
                        echo "&euro;" . $data["price"] . "<br>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy;Ricardo Lans(lansricardo@gmail.com)</p>
    </footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>