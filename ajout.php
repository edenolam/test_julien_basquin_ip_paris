<?php
require_once('inc/db.inc.php');

if (isset($_POST)) {
    if (isset($_POST['prenom']) && !empty($_POST['prenom'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['age']) && !empty($_POST['age'])
        && isset($_POST['pays']) && !empty($_POST['pays'])) {
        $prenom = strip_tags($_POST['prenom']);
        $nom = strip_tags($_POST['nom']);
        $age = strip_tags($_POST['age']);
        $pays = strip_tags($_POST['pays']);

        $sql = "INSERT INTO `user` (`prenom`, `nom`, `age`, `pays` ) VALUES (:prenom, :nom, :age, :pays);";

        $query = $db->prepare($sql);

        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_STR);
        $query->bindValue(':pays', $pays, PDO::PARAM_STR);

        $query->execute();
        header('Location: index.php');
    }
}

require_once('close.php');


include 'inc/header.inc.php';
?>
<h3>Ajout personne</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" min="18" required">
        </div>
        <div class="col-md-6 mb-3">
            <label for="pays">Pays</label>
            <select name="pays" class="custom-select d-block w-100" id="pays" required>
                <option value="0">Pays</option>
                <option value="france">
                    FRANCE
                </option>
                <option value="amerique">
                    AMERIQUE
                </option>
                <option value="espagne">
                    ESPAGNE
                </option>
            </select>
        </div>
    </div>
    <button class="btn btn-primary" type="submit" name="valider">Valider</button>
</form>
<?php
include 'inc/footer.inc.php';
?>


