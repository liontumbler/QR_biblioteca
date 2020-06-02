/**
 * 
 * @version 1.0
 * @author Edwin Velasquez Jimnez
 * @copyright Corporaciòn Universitarìa Minuto de Dios
 * @link lion_3214@hotmail.com
 * 
 */

$(document).ready(function(){
  $("#mostrar_QR").hide();
  $("#crear_qr").on('click',crear_qr);
});

function crear_qr() {

  var parametros={
    ID_:$("#ID_"),
    nombre:$("#nombre"),
    correo:$("#correo"),
    facultad:$("#facultad"),

    n_clasificacion:$("#n_clasificacion"),
    n_registro:$("#n_registro"),
    titulo:$("#titulo"),
    autor:$("#autor"),
  };

  var enviar=true;
  for(var i in parametros){
    if(parametros[i].val()==""||parametros[i].val()==undefined||parametros[i].val()==null||parametros[i].hasClass("invalid")){
      enviar=false;
      parametros[i].focus();
      break;
    }
  }

  if(enviar==true){

    for(var i in parametros){
      parametros[i]=parametros[i].val();
    }
   
    $.ajax({
      type: 'POST',
      url: 'core.php',
      async:false,
      data:{
          class:'administrador',
          metodo:'recogiendo_QR',
          parametros: parametros
      },
      success: function(data) {

        //json=JSON.parse(data);    
        //console.log(json);
        //console.log(data);

        if(data!=0){
          $("#mostrar_QR").attr('src',"almacenamiento/QR/"+data+".png");
          $("#mostrar_QR").show();

          window.scrollTo(0, 1408);
          M.toast({html: 'Se a creado su QR exitosamente', classes: 'rounded'});

          $(".btn_action").html('<button class="btn waves-effect red" id="refrescar_pagina">Refrescar</button>');
          $("#refrescar_pagina").on('click',refrescar_pagina);

        }else{
          M.toast({html: 'Ocurrio un error inesperado, intenta màs tarde', classes: 'rounded'});
        }

      },
      error: function(data) {
        console.log(data);
      }
    });
    
  }else{
    M.toast({html: 'Validar datos faltantes', classes: 'rounded'});
  }
  
}

function refrescar_pagina() {
  location.reload();
}

  