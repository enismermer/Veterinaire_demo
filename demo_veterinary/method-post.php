<?php
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=ut8;', 'root');
   // Vérifier si le formulaire est soumis 
   if (isset($_POST['envoi'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
        */
     $prenom = $_POST['prenom']; 
     $nom = $_POST['nom']; 
     $telephone = $_POST['tel'];
     $email = $_POST['email'];
     $date = $_POST['date'];
     $message = $_POST['message']
     // afficher le résultat
     echo '<h3>Informations récupérées en utilisant POST</h3>'; 
     echo 'Prénom : ' . $prenom . ' Nom : ' . $nom . ' Téléphone : ' . $telephone . ' Email : ' . $email . ' Date : ' . $date . ' Message : ' . $message .; 
     exit;
  } else {
    echo 'Le formulaire n\'est pas valide'
  }
?>