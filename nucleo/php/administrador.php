<?php
/**
 * 
 * @version 1.0
 * @author Edwin Velasquez Jimnez
 * @copyright Corporaciòn Universitarìa Minuto de Dios
 * @link lion_3214@hotmail.com
 * 
 */
include 'vistas/formularioQR.php';
include 'php/generarQR.php';


class administrador extends formularioQR
{
	private $generarQR;
	
	function __construct()
	{
		$this->generarQR= new generarQR();
	}
	
	/**
	 * 
	 * recogiendo_QR 
	 * Funcion principal:
	 * Este metodo recoge los datos solicitados en la pagina y mira: 
	 * Si un estudiante existe ya en nuestra base de datos no se vuelve a poner
	 * Si un libro existe ya en nuestra bases de datos no se vuelve a poner
	 * Inserta campos en en tabla estudiante y libro
	 * Inserta datos en la tabla consulta
	 * Por ultimo crea un QR con todos los datos solicitados y retorna el id de la consulta que es el mismo de la imagen a mostrar
	 * 
	 */
	public function recogiendo_QR($a)
	{
		$consul=$this->generarQR->hacer_insercion($a);

		if($consul!=0){
			echo $this->generarQR->crear_QR($a,$consul);
		}else{
			echo $consul;
		}
	}
	
	//Formulario principal donde contiene los datos
	public function formulario_QR()
	{
		self::vista_QR();
	}

}