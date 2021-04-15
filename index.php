<?php
require_once('inc/db.inc.php');
$sql = 'SELECT * FROM `user`';
$query = $db->prepare($sql);
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
include 'inc/header.inc.php';
?>
<h3>Liste des personnes</h3>
<table class="table table-hover">
    <thead>
    <th>Id</th>
    <th>Prenom</th>
    <th>Nom</th>
    <th>Age</th>
    <th>Pays</th>
    <th><i class="fa fa-trash"></i></th>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['prenom'] ?></td>
            <td><?= $user['nom'] ?></td>
            <td><?= $user['age'] ?></td>
            <td><?= $user['pays'] ?></td>
            <td><a href="delete.php?id=<?= $user['id'] ?>"><i title="supprimer" class="fa fa-trash" style="color:red;"></i></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<a class="btn btn-primary" href="ajout.php">Ajouter</a>
<?php
include 'inc/footer.inc.php';
?>

