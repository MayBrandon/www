<?php
function get_categories() {
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=district;charset=utf8", "root", "");
    } catch(PDOException $e) {
        die('La connexion à la base de données a échoué : ' . $e->getMessage());
    }

    $categories = array("ramen", "burger", "pates", "salades", "sandwichs", "Pizzas");

    $category_data = array();

    foreach ($categories as $category) {
        $sql = "SELECT image, libelle FROM categorie WHERE active = 'on'";
        $result = $bdd->query($sql);

        $category_items = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $category_items[] = $row;
        }

        $category_data[$category] = $category_items;
    }

    $bdd = null; // Ferme la connexion à la base de données

    return $category_data;
}


// Appel de la fonction pour obtenir les données des catégories
$categories_data = get_categories();

// Affichage des données dans le HTML
foreach ($categories_data as $category => $items) {
    echo '<h1 class="name-categorie">Nos ' . ucfirst($category) . ' : </h1>';
    
    foreach ($items as $item) {
        // Conversion des données binaires BLOB en base64
        $image_data = base64_encode($item["image"]);

        echo '<div class="div-categorie">';
        echo '<div class="img-categorie">';
        // Utilisation de la balise <img> avec la chaîne base64
        echo '<img src="data:image/jpeg;base64,' . $image_data . '" class="img-categorie">';
        echo '</div>';
        echo '<div class="div-text">';
        echo '<p class="text-categorie">' . $item["libelle"] . '</p>';
        echo '</div>';
        echo '<div class="div-button">';
        echo '<a class="lien-categorie" href="/pages/pages-categorie/categories-plats/' . $category . '/categorie-' . $category . '.php">';
        echo 'Accédez à la catégorie';
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }
}
?>
