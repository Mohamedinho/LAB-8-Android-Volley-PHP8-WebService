<?php
include_once '../classes/Etudiant.php';
include_once '../connexion/Connexion.php';
include_once '../dao/IDao.php';

class EtudiantService implements IDao {
    private $connexion;
    function __construct() { $this->connexion = new Connexion(); }

    public function create($o) {
        $query = "INSERT INTO etudiant (nom, prenom, ville, sexe) VALUES (:nom, :prenom, :ville, :sexe)";
        $stmt = $this->connexion->getConnexion()->prepare($query);
        $stmt->execute([
            ':nom' => $o->getNom(),
            ':prenom' => $o->getPrenom(),
            ':ville' => $o->getVille(),
            ':sexe' => $o->getSexe()
        ]);
    }
    public function delete($id) {
        $query = "DELETE FROM etudiant WHERE id = :id";
        $stmt = $this->connexion->getConnexion()->prepare($query);
        $stmt->execute([':id' => $id]);
    }

    public function update($o) {
        $query = "UPDATE etudiant SET nom = :nom, prenom = :prenom, ville = :ville, sexe = :sexe WHERE id = :id";
        $stmt = $this->connexion->getConnexion()->prepare($query);
        $stmt->execute([
            ':nom' => $o->getNom(),
            ':prenom' => $o->getPrenom(),
            ':ville' => $o->getVille(),
            ':sexe' => $o->getSexe(),
            ':id' => $o->getId() // Assurez-vous d'avoir un getId() dans votre classe Etudiant.php
        ]);
    }

    public function findAll() {
        $req = $this->connexion->getConnexion()->query("SELECT * FROM etudiant");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>