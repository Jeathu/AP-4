<?php

require_once 'UtilisateurDAO.php'; // Assurez-vous que le fichier UtilisateurDAO.php est correctement inclus
require_once 'Proprietaire.php'; // Inclure le fichier Proprietaire.php

class ProprietaireDAO extends UtilisateurDAO {

    public function create(Proprietaire $proprietaire) {
        $stmt = $this->pdo->prepare("INSERT INTO proprietaires (nom, prenom, adresse, code_postal, ville, tel, email, password, tel_banque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $proprietaire->getNom(), 
            $proprietaire->getPrenom(), 
            $proprietaire->getAdresse(), 
            $proprietaire->getCodePostal(), 
            $proprietaire->getVille(), 
            $proprietaire->getTel(), 
            $proprietaire->getEmail(), 
            $proprietaire->getPassword(), 
            $proprietaire->getTelBanque()
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM proprietaires WHERE id = ?");
        $stmt->execute([$id]);
        // Récupérer les données sous forme d'objet Proprietaire
        $proprietaireData = $stmt->fetch(PDO::FETCH_ASSOC);
        // Créer un objet Proprietaire et le retourner
        $proprietaire = new Proprietaire();
        $proprietaire->setId($proprietaireData['id']);
        $proprietaire->setNom($proprietaireData['nom']);
        $proprietaire->setPrenom($proprietaireData['prenom']);
        $proprietaire->setAdresse($proprietaireData['adresse']);
        $proprietaire->setCodePostal($proprietaireData['code_postal']);
        $proprietaire->setVille($proprietaireData['ville']);
        $proprietaire->setTel($proprietaireData['tel']);
        $proprietaire->setEmail($proprietaireData['email']);
        $proprietaire->setPassword($proprietaireData['password']);
        $proprietaire->setTelBanque($proprietaireData['tel_banque']);
        return $proprietaire;
    }
}

?>
