<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Gestion des Anniversaires</title>
    <!-- Inclure ici vos liens vers les feuilles de style CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Gestion des Anniversaires</h1>
    </header>
    
    <main>
        <h2>Liste des Anniversaires</h2>
        
        <?php
        // Informations de connexion à la base de données
        require_once('config.php');

        try {
            // Requête SQL pour récupérer les anniversaires depuis la base de données
            $sql = "SELECT * FROM anniversaires";
            $stmt = $pdo->query($sql);

            // Vérifier s'il y a des enregistrements
            if ($stmt->rowCount() > 0) {
                echo "<ul>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li>";
                    echo "<strong>Nom :</strong> " . htmlspecialchars($row['nom']) . "<br>";
                    echo "<strong>Prénom :</strong> " . htmlspecialchars($row['prenom']) . "<br>";
                    echo "<strong>Date d'anniversaire :</strong> " . htmlspecialchars($row['date_anniversaire']) . "<br>";
                    if (!empty($row['photo'])) {
                        echo '<img src="' . htmlspecialchars($row['photo']) . '" alt="Photo de la personne" width="100"><br>';
                    }
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "Aucun anniversaire enregistré.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des anniversaires : " . $e->getMessage();
        } finally {
            // Fermer la connexion à la base de données
            $pdo = null;
        }
        ?>

        <a href="ajouter_anniv.php">Ajouter un Anniversaire</a>
    </main>

    <footer>
        <!-- Ajoutez ici des informations de contact ou de crédits -->
    </footer>
</body>
</html>
