<?php
include_once '../service/EtudiantService.php';
// On récupère les données envoyées par Android (POST)
extract($_POST); 
$es = new EtudiantService();

if(isset($id)) {
    // On crée l'objet Etudiant avec l'ID reçu
    $e = new Etudiant($id, $nom, $prenom, $ville, $sexe);
    $es->update($e);
}

header('Content-Type: application/json');
echo json_encode($es->findAll()); // On renvoie la liste mise à jour
?>