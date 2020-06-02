<?php
/**
 * 
 * @version 1.0
 * @author Edwin Velasquez Jimnez
 * @copyright Corporaciòn Universitarìa Minuto de Dios
 * @link lion_3214@hotmail.com
 * 
 */
include 'db/db.php';
class generarQR
{
    private $db;
	private $fecha;
    private $hora;
    
    //---------------------constructor/conexion---------------------
	/**
	 * El constructor inicializa la conexion a base de datos y inicializa la fecha, hora.
	 */
	function __construct()
	{
		$this->db= new db();

		date_default_timezone_set('America/Bogota');
		$this->fecha= date("d-m-Y");
		$this->hora = date("h:i:s a");
	}
	//---------------------constructor/conexion---------------------
    
    public function hacer_insercion($a)
    {
        $p=array();
		$p["nombre_tabla"]="estudiante";
		$p["array_campos"]["correo"]=$a['correo'];
		$existe=$this->db->mostrar($p);

		$estudiante=0;
		if(count($existe)<=0){

			$b=array();
			$b["nombre_tabla"]="estudiante";
			$b["array_campos"]["nombre"]=$a['nombre'];
			$b["array_campos"]["correo"]=$a['correo'];
			$b["array_campos"]["facultad"]=$a['facultad'];
			$b["array_campos"]["ID_"]=$a['ID_'];
			
			$estudiante=$this->db->insertar($b);

		}else{
			$estudiante=$existe[0]['id'];
		}

		$h=array();
		$h["nombre_tabla"]="libros";
		$h["array_campos"]["n_clasificacion"]=$a['n_clasificacion'];
		$h["array_campos"]["n_registro"]=$a['n_registro'];
		$existe=$this->db->mostrar($h);

		$libro=0;
		if(count($existe)<=0){

			$s=array();
			$s["nombre_tabla"]="libros";
			$s["array_campos"]["n_clasificacion"]=$a['n_clasificacion'];
			$s["array_campos"]["n_registro"]=$a['n_registro'];
			$s["array_campos"]["titulo"]=$a['titulo'];
			$s["array_campos"]["autor"]=$a['autor'];
			
			$libro=$this->db->insertar($s);

		}else{
			$libro=$existe[0]['id'];
		}

		$consul=0;
		if($estudiante!=0&&$libro!=0){

			$c=array();
			$c["nombre_tabla"]="consulta";
			$c["array_campos"]["fecha"]=$this->fecha;
			$c["array_campos"]["horas"]=$this->hora;
			$c["array_campos"]["estudiante"]=$estudiante;
			$c["array_campos"]["libros"]=$libro;
			
			$consul=$this->db->insertar($c);
        }
        
        return $consul;
    }

    public function crear_QR($a,$consul)
    {
        require 'librerias/phpqrcode/qrlib.php';

        //rutas de almacenamiento
        $ruta_almacen="almacenamiento/QR/";
        $nombre_archivo=$ruta_almacen.$consul.'.png';

        //parametros del QR
        $tamano=7;
        $level='H';
        //parametros del QR

        $margin=3;

        $contenido  = '--------Datos Para El Bibliotecrio--------'."\n";
        $contenido .= 'ID: '.$a['ID_']."\n";
        $contenido .= 'Estudiante: '.$a['nombre']."\n";
        $contenido .= 'Correo: '.$a['correo']."\n";
        $contenido .= 'Facultad: '.$a['facultad']."\n";
        $contenido .= 'No. Clasificacion: '.$a['n_clasificacion']."\n";
        $contenido .= 'No. Registro: '.$a['n_registro']."\n";
        $contenido .= 'Titulo del Libro: '.$a['titulo']."\n";
        $contenido .= 'Autor del Libro: '.$a['autor']."\n";

        QRcode::png($contenido, $nombre_archivo, $level, $tamano,$margin, false);


        // Añadir logo
        $nombre_archivo_logo=$ruta_almacen."logo".$consul.'.png';
        $logo="logo.png";

        $crearLOGOQR=true;

        $originalQR=@imagecreatefrompng($nombre_archivo);
        if (FALSE===$originalQR){
            $crearLOGOQR=false;
            // Error al leer el QR generado
            return $consul;
        }
        $logoYT=@imagecreatefrompng($logo);
        if (FALSE===$logoYT){
            $crearLOGOQR=false;
            // Error al leer el logo de YT	
            return $consul;
        }

        if($crearLOGOQR){
            $dataQR=getimagesize($nombre_archivo);
            $dataYT=getimagesize($logo);

            list($width, $height) = getimagesize($nombre_archivo);
            list($ytwidth, $ytheight) = getimagesize($logo);

            $newQR = imagecreatetruecolor($width, $height);

            imagecopy(  $newQR // Pegar en
                        ,$originalQR // Pegar desde
                        ,0 // Destino X
                        ,0 // Destino Y
                        ,0 // X Origen (copiar desde esta coordenada)
                        ,0 // Y Origen (copiar desde esta coordenada)
                        ,$width // Ancho de la imagen que se va a pegar
                        ,$height // Alto de la imagen que se va a pegar
                    );

            imagecopy(  $newQR // Pegar en
                        ,$logoYT // Pegar desde
                        ,($width/2)-($ytwidth/2)
                        ,($height/2)-($ytheight/2)
                        ,0
                        ,0
                        ,$ytwidth
                        ,$ytheight
                    );

            imagepng($newQR,$nombre_archivo_logo,0);

            return "logo".$consul;
        }
    }
}
?>