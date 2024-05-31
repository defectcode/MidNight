<?php
include 'functions.php';

// Rutele API-ului
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'shorten_url') {
        // Scurtarea URL-ului și returnarea rezultatului
        echo shorten_url($_POST['url']);
    } elseif ($_POST['action'] === 'login') {
        // Logarea utilizatorului
        echo login($_POST['username'], $_POST['password']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] === 'redirect') {
        // Redirecționarea către URL-ul original
        redirect_url($_GET['short']);
    } elseif ($_GET['action'] === 'get_links') {
        // Obținerea tuturor linkurilor pentru utilizator
        echo get_links($_GET['user']);
    }
}
?>
