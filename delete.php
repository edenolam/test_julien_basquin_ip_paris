<?php
require_once('inc/db.inc.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `user` WHERE `id`=:id;";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    header('Location: index.php');
}
require_once('close.php');
