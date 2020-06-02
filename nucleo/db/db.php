<?php 
/**
 * 
 * @version 1.0
 * @author Edwin Velasquez Jimnez
 * @copyright Corporaciòn Universitarìa Minuto de Dios
 * @link lion_3214@hotmail.com
 * 
 */
include 'conexion.php';

class db extends conexion
{
	public static $conexion;
	
	private static $tabla;
	private static $valor;
	
	public function __construct()
	{
		self::$conexion = new mysqli(conexion::$host, conexion::$usuario_db, conexion::$contrasena_db, conexion::$nombre_db);
        if (self::$conexion->errno){
            echo "Error de Conexion";
        }
        self::$conexion->set_charset("utf8");
	}

	public function insertar($a)
	{
		self::$tabla="";
		self::$valor="";
		
		foreach ($a['array_campos'] as $index => $valor) {
			if ($valor=='NULL'||$valor=='') {//tiene que ser null o '' en el js
				self::$tabla.="`".$index."`,";
				self::$valor.="NULL,";
			}elseif($index=="contrasena"||$index=="password"){
				self::$tabla.="`".$index."`,";
				self::$valor.="'".password_hash($valor, PASSWORD_DEFAULT)."',";
			}else{
				self::$tabla.="`".$index."`,";
				self::$valor.="'".$valor."',";
			}    
		}

		self::$tabla=substr(self::$tabla, 0, -1);
		self::$valor=substr(self::$valor, 0, -1);

		$cadena="INSERT INTO `".$a['nombre_tabla']."` (".self::$tabla.") VALUES (".self::$valor.")";
		
		$query = $cadena;

		//return $res->insert_id;
		if (self::$conexion->query($query)) {
			return self::$conexion->insert_id;
		}else{
			return 0;
		}

	}


	public function mostrar($a)
	{
		$array=array();
		$query ="SELECT * FROM `".$a['nombre_tabla']."` WHERE ";

		foreach ($a['array_campos'] as $index => $valor) {
			$query .="`".$index."`='".$valor."' and ";
		}

		if (isset($a['limites'])&&!isset($a['limites']['min'])&&!isset($a['limites']['max'])) {
			$query=substr($query, 0, -5);
			$query.="LIMIT ".$a['limites']." and ";
		}elseif (isset($a['limites']['tabla'])){
			if (isset($a['limites']['min'])&&isset($a['limites']['max'])) {
				$query .="`".$a['limites']['tabla']."` BETWEEN '".$a['limites']['min']."' and '".$a['limites']['max']."' and ";
			}
		}

		$query=substr($query, 0, -5);

		$res = self::$conexion->query($query);
		while ($row=$res->fetch_assoc()) {
			array_push($array,$row);
		}

		return $array;
	}

	
}
