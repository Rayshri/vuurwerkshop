<?php 
// COPYRIGHT: RICARDO LANS..,
try {
    $db = new PDO("mysql:host=localhost;dbname=vuurwerkshop", "root", "hpye1362");

} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}
