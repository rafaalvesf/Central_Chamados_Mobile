<?php
if(!$_SESSION['usuario_digitado']) {
    header('Location:index.php');
    exit();
}