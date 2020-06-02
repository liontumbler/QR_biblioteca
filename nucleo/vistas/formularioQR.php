<?php
/**
 * 
 * @version 1.0
 * @author Edwin Velasquez Jimnez
 * @copyright Corporaciòn Universitarìa Minuto de Dios
 * @link lion_3214@hotmail.com
 * 
 */
class formularioQR
{
    protected function vista_QR()
    {
        self::input_id();
		self::input_nombre();
		self::input_correo();
		self::input_facultad();

		self::input_n_clasificacion();
		self::input_n_registro();
		self::input_titulo();
		self::input_autor();

		?>
		<div class="input-field col s12 m12 center btn_action">
			<button class="btn waves-effect" id="crear_qr">Crear QR</button>
		</div>
		<label>
			<b>NOTA:</b> Ingrese los datos y haz click en <b>Crear QR</b> ,el codigo QR generado se lo puedes presentar al bibliotecario
		</label>
		<?php 	
    }

    //camps del formulario
	private function input_id()
	{
		?>
		<div class="input-field col s12 m6">
		  	<i class="material-icons prefix">assignment_ind</i>
          	<input id="ID_" name="ID_" type="number" class="validate icon_prefix" min="0" max="99999999999" required>
          	<label for="ID_" class="active">ID Institucional</label>
        </div>
        <?php 
	}

	private function input_nombre()
	{
		?>
		<div class="input-field col s12 m6">
			<i class="material-icons prefix">account_box</i>
          	<input id="nombre" name="nombre" type="text" class="validate icon_prefix" required>
          	<label for="nombre" class="active">Nombres</label>
        </div>
		<?php 
	}

	private function input_correo()
	{
		?>
		<div class="input-field col s12 m6">
    	  	<i class="material-icons prefix">email</i>
          	<input id="correo" name="correo" type="email" class="validate icon_prefix" required>
          	<label for="correo" class="active">Correo</label>
        </div>
		<?php 
	}

	private function input_facultad()
	{
		?>
		<div class="input-field col s12 m6">
			<i class="material-icons prefix">account_balance</i>
          	<input id="facultad" name="facultad" type="text" class="validate icon_prefix" required>
          	<label for="facultad" class="active">Facultad</label>
        </div>
		<?php 
	}

	private function input_n_clasificacion()
	{
		?>
		<div class="input-field col s12 m6">
			<i class="material-icons prefix">assignment</i>
          	<input id="n_clasificacion" name="n_clasificacion" type="text" class="validate icon_prefix" required>
          	<label for="n_clasificacion" class="active">Nº Clasificacion</label>
        </div>
		<?php 
	}

	private function input_n_registro()
	{
		?>
		<div class="input-field col s12 m6">
		  	<i class="material-icons prefix">receipt</i>
          	<input id="n_registro" name="n_registro" type="number" class="validate icon_prefix" min="0" max="99999999999" required>
          	<label for="n_registro" class="active">Nº Registro</label>
        </div>
        <?php 
	}

	private function input_titulo()
	{
		?>
		<div class="input-field col s12 m6">
			<i class="material-icons prefix">spellcheck</i>
          	<input id="titulo" name="titulo" type="text" class="validate icon_prefix" required>
          	<label for="titulo" class="active">Titulo del libro</label>
        </div>
		<?php 
	}

	private function input_autor()
	{
		?>
		<div class="input-field col s12 m6">
			<i class="material-icons prefix">person</i>
          	<input id="autor" name="autor" type="text" class="validate icon_prefix" required>
          	<label for="autor" class="active">Autor del libro</label>
        </div>
		<?php 
	}
	//camps del formulario
    
}

?>