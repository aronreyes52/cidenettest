<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

        <?php /* Template Name: Call FTP */ 

// credenciales del servidor FTP
$ftp_host = "192.168.1.103";
$ftp_user = "user1";
$ftp_password = "cidenet";

// Conecta al servidor FTP
$conn = ftp_connect($ftp_host);
ftp_login($conn, $ftp_user, $ftp_password);

// lista de los archivos en el directorio

$files = ftp_nlist($conn, "/");


echo "<ul>";

foreach ($files as $file) {
    $link = "//localhost/callftp/testcidenet$file";

    // Agregue el enlace al contenido de la página
    echo "<li><a href='$link'>$file</a></li>";
  
}
echo "</ul>";

?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>



