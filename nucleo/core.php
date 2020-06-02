<?php 
/**
 * 
 * @version 1.0
 * @author Edwin Velasquez Jimnez
 * @copyright Corporaciòn Universitarìa Minuto de Dios
 * @link lion_3214@hotmail.com
 * 
 */
class core
{
    private $class;
    private $metodo;
    private $parametros;
    
    public function __construct($class, $metodo, $parametros) {

        if ($class==='') {
            echo "No hay nada en la clase, lo sentimos."; 
        }elseif ($metodo==='') {
            include 'php/'.$class.'.php';
            $this->class = new $class;
        }elseif(isset($parametros)||$metodo!=''){
            include 'php/'.$class.'.php';
            $this->class = new $class;
            $this->class->$metodo($parametros);  
        }else{
            echo "Los datos no corresponden.";
        }
       
    }

}


if (isset($_POST['class'])&&isset($_POST['metodo'])&&isset($_POST['parametros'])) {
    $core = new core($_POST['class'], $_POST['metodo'], $_POST['parametros']);
}
?>