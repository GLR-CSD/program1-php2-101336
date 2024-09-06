<?php
// Start de sessie
// Deze gaan we gebruiken om de form values en de errors op te slaan
session_start();

// Controleer of het verzoek via POST is gedaan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Valideer de ingediende gegevens
    $errors = [];
    $formValues = [
        'naam' => $_POST['naam'] ?? '',
        'duration' => $_POST['duration'] ?? '',
        'BPM' => $_POST['BPM'] ?? '',
        'noot' => $_POST['noot'] ?? '',
    ];

    // Valideer voornaam
    if (empty($_POST['naam'])) {
        $errors['naam'] = "naam is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['duration'])) {
        $errors['duration'] = "duration is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['BPM'])) {
        $errors['BPM'] = "BPM is verplicht.";
    }

    // Valideer achternaam
    if (empty($_POST['noot'])) {
        $errors['noot'] = "noot is verplicht.";
    }

    // Als er geen validatiefouten zijn, voeg de persoon toe aan de database
    if (empty($errors)) {
        require_once 'db.php';
        require_once 'classes/Lied.php';

        // Maak een nieuw Persoon object met de ingediende gegevens
        $lied = new Lied(
            null,
            $_POST['naam'],
            $_POST['duration'],
            $_POST['BPM'],
            $_POST['noot'],
        );

        // Voeg de persoon toe aan de database
        $lied->save($db);

    } else {
        // Sla de fouten en formulier waarden op in sessievariabelen
        $_SESSION['errors'] = $errors;
        $_SESSION['formValues'] = $formValues;
    }

    // Stuur de gebruiker terug naar de index.php
    header("Location: lied.php");
    exit;

} else {
    header("Location: lied.php");
}