<?php
if (!isset($_SESSION['LOGGED_USER'])) {
    echo "Réservé aux adhérents, créez un compte";
    exit;
}