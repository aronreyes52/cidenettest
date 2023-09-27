<?php
/*
Plugin Name: Call FTP Shortcode
Description: Plugin creado para el test de Cidenet que agrega un Shortcode para listar archivos de un repositorio local via FTP.
Author: Aron Reyes
Version: 1.0
*/

function call_ftp_shortcode() {
  // Credenciales del servidor FTP
  $ftp_host = "192.168.1.103";
  $ftp_user = "user1";
  $ftp_password = "cidenet";

  // Conecta al servidor FTP
  $conn = ftp_connect($ftp_host);
  ftp_login($conn, $ftp_user, $ftp_password);

  // Lista de los archivos en el directorio
  $files = ftp_nlist($conn, "/");

  $output = "<ul>";

  foreach ($files as $file) {
    $link = "//localhost/callftp/testcidenet$file";

    // Agrega el enlace al contenido de la página
    $output .= "<li><a href='$link'>$file</a></li>";
  }

  $output .= "</ul>";

  return $output;
}

add_shortcode('call_ftp', 'call_ftp_shortcode');