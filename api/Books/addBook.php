<?php

require_once 'Insert.php';

$cota = isset($_POST['cota']) ? $_POST['cota'] : '';
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';

$db = new Insert($cota, $titulo);
$db->setBooks($cota, $titulo);