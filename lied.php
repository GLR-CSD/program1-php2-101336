s<?php
session_start();

// Haal de eventuele fouten en formulier waarden op uit de sessie
$errors = $_SESSION['errors'] ?? [];
$formValues = $_SESSION['formValues'] ?? [];

// Verwijder de sessievariabelen
unset($_SESSION['errors']);
unset($_SESSION['formValues']);

require_once 'db.php';
require_once 'classes/Lied.php';

// Haal alle personen op uit de database
$liedjes = Lied::getAll($db);

// Laad de view
include 'views/lied_view.php';