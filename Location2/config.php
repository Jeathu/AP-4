<?php

try {
    $db = new PDO('pgsql:host=localhost;dbname=AP4', 'postgres', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie! 😁";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>





