<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=test_julien_basquin_ip_paris', 'root', 'root');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
