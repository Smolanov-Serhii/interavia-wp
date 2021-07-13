<?php
/**
 * Header clean template part.
 *
 * @author    Themedelight
 * @package   Themedelight/AdventureTours
 * @version   4.1.5
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/dist-cust/css/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <script src="<?php echo get_template_directory_uri()?>/src/js/jquery-3.5.1.js"></script>
</head>
<body <?php body_class(); ?>>
	<div class="layout-content">
