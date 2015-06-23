<?php
$hacer=0;
if(isset($_POST['InsertarU']))
{
    $hacer=1;
}
if(isset($_POST['BusquedaU']))
{
    $hacer=2;
}
if(isset($_POST['InsertarT']))
{
    $hacer=3;
}
if(isset($_POST['BusquedaT']))
{
    $hacer=4;
}
switch(true)
{
case ($hacer==1):
 {
if (empty($_POST['valor1'])or empty($_POST['valor4'])or empty($_POST['valor5']))
    {
    echo "Error";
    }
    else
    {
    $yaesta=0;
    $variable=file_get_contents("usuario.txt");
    $algo=explode("\n",$variable);
    $a=count($algo)+1;
        for($i=0;$i<count($algo);$i++)
	       {
	           $prueba=explode(",",$algo[$i]);
                if($prueba[0]==$a)
                    {
                    $yaesta=1;
                    }
	       }
            if($yaesta==1)
                {
                echo "id existe ";
                }
                else
                {
                    for($i=0;$i<count($algo);$i++)
                    {
                    $prueba2=explode(",",$algo[$i]);
                        if($prueba2[1]== $_POST['valor1']and $prueba2[2]== $_POST['valor4']and $prueba2[3]== $_POST['valor5'])
                        {
                        $uexist=1;
                        }
                    }
                    if($uexist==1)
                    {
                    echo "Usuario existente";
                    }
                    else
                    {
                    echo "Guardado ".$_POST['valor1'].", ".$_POST['valor4'].", ".$_POST['valor5'];
                    $text = $a.",".$_POST['valor1'].",".$_POST['valor4'].",".$_POST['valor5'].",".$_POST['valor3']."\n";
                    $fp = fopen("usuario.txt", 'a');
                    fwrite($fp, $text);
                    fclose($fp);
                        if(empty($_POST['valor2']))
                        {
                        echo "<br>";
                        echo "<br>";
                        echo "Usuario Guardado sin Telefono";
                        }
                        else
                        {
                        $text = $a.",".$_POST['valor2']."\n";
                        $fp = fopen("telefono.txt", 'a');
                        fwrite($fp, $text);
                        fclose($fp);
                        }
                    }
                }
    }
 }
break;
case ($hacer==2):
 {
if (empty($_POST['valor1'])or empty($_POST['valor4'])or empty($_POST['valor5']))
    {
    echo "Error";
    }
else
{
    $loencontre = 0;
    $variable=file_get_contents("usuario.txt");
    $algo=explode("\n",$variable);
        for($i=0;$i<count($algo);$i++)
	    {
	    $otro=explode(",",$algo[$i]);
		      if($otro[1]== $_POST['valor1']and $otro[2]== $_POST['valor4']and $otro[3]== $_POST['valor5'])
		      {
              $loencontre = 1;
		      }
	    }
	if($loencontre==1)
    {
    $fileU=file_get_contents("usuario.txt");
	$lineasU=explode("\n", $fileU);
	$fileT=file_get_contents("telefono.txt");
	$lineasT=explode("\n", $fileT);
	   for($i=0;$i<count($lineasU);$i++)
	   {
        $divideU = explode("," , $lineasU[$i]);
           if($divideU[1]==$_POST['valor1']and $divideU[2]==$_POST['valor4']and $divideU[3]==$_POST['valor5'] )
           {
               echo $divideU[1]." ".$divideU[2]." ".$divideU[3]."<br>";
		      for($j=0;$j<count($lineasT);$j++)
		      {
			     $divideT=explode(",", $lineasT[$j]);
			         if($divideU[0]==$divideT[0])
			             {
                         echo " - ".$divideT[1];
				         echo "<br>";
			             }
                    else
                    {
                        $nosta==1;
                    }
		      }
	       }
       }
        if($nosta=1)
        {
        echo " No hay mas telefonos";
        }
    }
	else
    {
	echo "Usuario no encontrado ";
    }
  }
 }
    break;
case ($hacer==3):
 {
if (empty($_POST['valor2']))
    {
    echo " Error Campo vacio";
    }
     else
     {
    $yaesta=0;
    $variable=file_get_contents("telefono.txt");
    $algo=explode("\n",$variable);
    $t=count($algo)+1;
        for($i=0;$i<count($algo);$i++)
	       {
	           $prueba=explode(",",$algo[$i]);
                if($prueba[1]==$_POST['valor2'])
                    {
                    $yaesta=1;
                    }
	       }
            if($yaesta==1)
                {
                echo "Telefono existente ";
                }
                else
                {
                    if(empty($_POST['valor1'])or empty($_POST['valor4'])or empty($_POST['valor5']))
                    {
                    echo "Telefono Guardado sin Usuario";
                    $text = $t.",".$_POST['valor2']."\n";
                    $fp = fopen("telefono.txt", 'a');
                    fwrite($fp, $text);
                    fclose($fp);
                    }
                    else
                    {
                    $variable=file_get_contents("usuario.txt");
                    $algo=explode("\n",$variable);
                    //$a=count($algo)+1;
                        for($i=0;$i<count($algo);$i++)
                        {
                        $prueba2=explode(",",$algo[$i]);
                        $prueba2[0];
                          if($prueba2[1]== $_POST['valor1']and $prueba2[2]== $_POST['valor4']and $prueba2[3]== $_POST['valor5'])
                           {
                            $iden=$prueba2[0];
                           $uexist2==1;
                           }
                         }
                    if($uexist2=1)
                    {
                echo "Telefono: ".$_POST['valor2']." "." Insertado al Usuario ".$_POST['valor1']." ".$_POST['valor4']." ".$_POST['valor5'];
                    $text = $iden.",".$_POST['valor2']."\n";
                    $fp = fopen("telefono.txt", 'a');
                    fwrite($fp, $text);
                    fclose($fp);
                    }
                    }
                }
    }
 }
break;
    case ($hacer==4):
 {
if (empty($_POST['valor2']))
    {
    echo "Error";
    }
     else
     {
    $loencontre = 0;
    $variable=file_get_contents("telefono.txt");
    $algo=explode("\n",$variable);
        for($i=0;$i<count($algo);$i++)
	    {
	    $otro=explode(",",$algo[$i]);
		      if($otro[1]==$_POST['valor2'])
		      {
              $loencontre = 1;
		      }
	    }
	 if($loencontre==1)
     {
	 echo "existe ";
     }
	 else
     {
	 echo "no se encuentra ";
     }
    }
 }
    break;
}

echo "<br>".date('Y-m-d-H:i')

//$localtime = localtime();
//print_r($localtime);
//$hoy = getdate();
//print_r($hoy);

?>
