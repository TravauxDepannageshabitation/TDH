<form action="traitement_formulaire.php" method="post">
  <div>
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
  </div>
  <div>
    <label for="message">Message :</label>
    <textarea id="message" name="message"></textarea>
  </div>
  <button type="submit">Envoyer</button>
</form>
<?php
// Vérifier si le formulaire a été soumis via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs des champs en utilisant les attributs 'name' du formulaire HTML
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Afficher les données récupérées (pour les lire)
    echo "<h2>Données du formulaire reçues :</h2>";
    echo "<p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>";
    echo "<p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Message :</strong> " . htmlspecialchars($message) . "</p>";

    // Ici, vous pouvez ajouter le code pour enregistrer ces données dans une base de données,
    // les envoyer par e-mail, ou effectuer toute autre action souhaitée.
} else {
    // Si quelqu'un essaie d'accéder directement à ce fichier PHP sans soumettre le formulaire
    echo "<p>Ce fichier ne doit être accédé que via la soumission du formulaire.</p>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Adresse e-mail de destination
    $destinataire = "obermeyerquentin@gmail.com"; // Remplacez par votre adresse e-mail

    // Sujet de l'e-mail
    $sujet = "Nouveau chantier";

    // Corps de l'e-mail
    $corps = "Nom: " . $nom . "\n";
    $corps .= "Email: " . $email . "\n";
    $corps .= "Message:\n" . $message;

    // En-têtes de l'e-mail (optionnel mais recommandé)
    $entetes = "From: " . $email . "\r\n";
    $entetes .= "Reply-To: " . $email . "\r\n";
    $entetes .= "X-Mailer: PHP/" . phpversion();

    // Fonction mail() pour envoyer l'e-mail
    if (mail($destinataire, $sujet, $corps, $entetes)) {
        echo "<p>Votre message a été envoyé avec succès à " . htmlspecialchars($destinataire) . " !</p>";
        // Vous pouvez rediriger l'utilisateur vers une page de confirmation ici
        // header("Location: message_envoye.html");
        // exit();
    } else {
        echo "<p>Une erreur est survenue lors de l'envoi de l'e-mail. Veuillez réessayer plus tard.</p>";
    }
} else {
    echo "<p>Ce fichier ne doit être accédé que via la soumission du formulaire.</p>";
}
?>