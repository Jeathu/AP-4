<?php

require_once 'config.php'; 
require_once 'client.php';

class ClientDAO {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getById($id) {
        $query = "SELECT * FROM utilisateurs WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        // Construction de l'objet Client à partir des données récupérées de la base de données
        $client = new Client(
            $row['nom'],
            $row['prenom'],
            $row['adresse'],
            $row['code_postal'],
            $row['ville'],
            $row['tel'],
            $row['email'],
            $row['password'],
            $row['role']
        );

        // Affectation de l'ID de l'utilisateur
        $client->setId($row['id']);

        return $client;
    }

    public function create(Client $client) {
        $query = "INSERT INTO utilisateurs (nom, prenom, adresse, code_postal, ville, tel, email, password, role) VALUES (:nom, :prenom, :adresse, :code_postal, :ville, :tel, :email, :password, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':nom' => $client->getNom(),
            ':prenom' => $client->getPrenom(),
            ':adresse' => $client->getAdresse(),
            ':code_postal' => $client->getCodePostal(),
            ':ville' => $client->getVille(),
            ':tel' => $client->getTel(),
            ':email' => $client->getEmail(),
            ':password' => $client->getPassword(),
            ':role' => $client->getRole(),
        ]);

        // Récupération de l'ID généré et affectation à l'objet Client
        $client->setId($this->db->lastInsertId());
    }

    public function update(Client $client) {
        $query = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, adresse = :adresse, code_postal = :code_postal, ville = :ville, tel = :tel, email = :email, password = :password, role = :role WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':nom' => $client->getNom(),
            ':prenom' => $client->getPrenom(),
            ':adresse' => $client->getAdresse(),
            ':code_postal' => $client->getCodePostal(),
            ':ville' => $client->getVille(),
            ':tel' => $client->getTel(),
            ':email' => $client->getEmail(),
            ':password' => $client->getPassword(),
            ':role' => $client->getRole(),
            ':id' => $client->getId(),
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM utilisateurs WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}

?>
