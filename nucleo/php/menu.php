<?php 
/**
 * 
 * @version 1.0
 * @author Edwin Velasquez Jimnez
 * @copyright Corporaciòn Universitarìa Minuto de Dios
 * @link lion_3214@hotmail.com
 * 
 */
class menu
{
	public function librerias_css_raiz()
	{
		?>
		<!-- Archivos Css Materialize -->
		<link href="librerias/icon.css" rel="stylesheet">
		<!-- Archivos Css propios de la plataforma -->
		<link rel="stylesheet" href="librerias/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="css/stilos.css">
		<?php
	}

	public function librerias_js_raiz()
	{
	    ?>
	    <!-- Archivos JS jQuery -->
		<script type="text/javascript" src="librerias/jquery-3.2.1.min.js"></script>
	    <!-- Archivos JS Materialize -->
	    <script src="librerias/materialize.min.js"></script>
	    <!-- Archivos JS propio -->
	    <script src="js/controlador.js"></script>
	    <?php 
	}

}
?>