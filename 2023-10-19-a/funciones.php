<?php

function consultar()
{
    $salida = 0; //Se inicializa la varaible de salida. 
    
    $salida = 10*2/2; //calcula el area de un triángulo.

    return $salida; //retorna la operacion.

}

function funcionar()
{
    $salida = 0; //Se inicializa la varaible de salida. 
    
    $salida = 4*8; //calcula el area de un rectangulo.

    return $salida; //retorna la operacion.
}

function visualizar()
{
    $salida = 0; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select 2+2 as suma"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.
    //recome el recorset 
        while($fila = $resultado->fetch_assoc())//cilo mientras para que muestre en pantalla.
        {
            $salida += $fila['suma'];//los datos del sql al cual apodamos como "suma".
            //puede incrementar o acoumular.
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function visualizar1()
{
    $salida = 0; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select 10 as n1, 20 as n2"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.
    //recome el recorset 
        while($fila = $resultado->fetch_array())//cilo mientras para que muestre en pantalla.
        {
            $salida += $fila['0'];
            $salida += $fila['1'];//los datos del sql al cual apodamos como "suma".
            //puede incrementar o acoumular.
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function visualizar2()
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select 21 as edad"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.
    //recome el recorset 
        while($fila = $resultado->fetch_assoc())//cilo mientras para que muestre en pantalla.
        {
            
            if ($fila['edad'] >= 18 )
            {
                $salida.= "Tienes ".$fila['edad']." Eres un adulto muy adultoso";//los datos del sql al cual apodamos como "suma".
                //puede incrementar o acoumular
            }else{
                $salida.="Tienes ".$fila['edad']." Eres un crio . :)";//los datos del sql al cual apodamos como "suma".
                //puede incrementar o acoumular
            }
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function contar_usuarios()
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select count(*) from personas"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.
    //recome el recorset 
        while($fila = $resultado->fetch_array())//cilo mientras para que muestre en pantalla.
        {
            $salida = $fila[0];//los datos del sql al cual apodamos como "suma".
            //puede incrementar o acoumular
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function InsertarPersona($nombre,$clave)
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "insert into personas(nombre,clave) values('$nombre','$clave')"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.

        if($conexion->affected_rows > 0)//si a sucedio algun cambio en la base 
        {
            $salida .= "Te has ingresado correctamente :)";//mensaje si se registro de manera correcta
        }else{
            $salida .= "Error: 502";//mensaje en caso dee erro 
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function Encontarpersona($nombre,$clave)
{
    $salida = 0; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $sql  = "select id from personas where nombre='$nombre' and clave='$clave'"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.

        while($fila = $resultado->fetch_assoc())
        {
            $salida += $fila['id'] ;
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna   
}


function EliminarPersona($nombre,$clave)
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $eliminar = Encontarpersona($nombre,$clave);
    //echo $eliminar;

    $sql  = "delete from personas where id='$eliminar'"; // opera sql

    $resultado = $conexion->query($sql);//ejecuta la consulta.

        if($conexion->affected_rows > 0)//si a sucedio algun cambio en la base 
        {
            $salida .= "Espero que regreses pronto :(";//mensaje si se elimina de manera correcta
        }else{
            $salida .= "Error: 502";//mensaje en caso dee erro 
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function AptualizarSitios($nombre,$clave,$sitio)
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $usuario = Encontarpersona($nombre,$clave);

    $sql  = "update personas set sitio ='$sitio' where id='$usuario'"; // opera sql
    //echo $sql;

    $resultado = $conexion->query($sql);//ejecuta la consulta.

        if($conexion->affected_rows > 0)//si a sucedio algun cambio en la base 
        {
            $salida .= "tu sitio se a cargado a:  "."$sitio";//mensaje si se elimina de manera correcta
        }else{
            $salida .= "Error: 502";//mensaje en caso dee erro 
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}

function VisitarSitios($nombre,$clave,)
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $buscar = Encontarpersona($nombre,$clave);

    $sql  = "select sitio, mensaje from personas where id='$buscar'"; // opera sql
 
    $resultado = $conexion->query($sql);//ejecuta la consulta.

       while($fila =$resultado->fetch_assoc())
       {
        $salida.= "<a href='".$fila['sitio']."'>".$fila['mensaje']."<a/>";//url de un sitio 

       }    

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}
function AptualizarInvitacion($nombre,$clave,$invitacion)
{
    $salida = ""; //se inicializa la salida 

    $conexion = mysqli_connect('localhost','root','','db_pruebas'); //conexion a la base de datos.

    $usuario = Encontarpersona($nombre,$clave);

    $sql  = "update personas set mensaje ='$invitacion' where id='$usuario'"; // opera sql
    //echo $sql;

    $resultado = $conexion->query($sql);//ejecuta la consulta.

        if($conexion->affected_rows > 0)//si a sucedio algun cambio en la base 
        {
            $salida .= "tu sitio se a cargado a:  "."$invitacion";//mensaje si se elimina de manera correcta
        }else{
            $salida .= "Error: 502";//mensaje en caso dee erro 
        }

        $conexion->close(); //para terminar la conexion con la base de datos
    return $salida ;  //retorna 
}