<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
    <h1>Funciona la Concha tu Madre</h1>
	<?php
		
		
		
		
		$sexo = $_POST["casilla_sexo"];
		
                $clave = $_POST["casilla_clave"];
			
		
		try
		{
			
	
		
		$BASE_DATOS  = new PDO('mysql:host=localhost; dbname=php','root','');	
			
		$BASE_DATOS->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$BASE_DATOS->exec("SET CHARACTER SET utf8");
		
		$sql = "SELECT NICK, CLAVE, SEXO FROM USUARIO WHERE SEXO=? AND CLAVE=?";	
		
		$PDO_stmt = $BASE_DATOS->prepare($sql);
		
		$PDO_stmt->execute(array($sexo,$clave)); //Aqui se inserta el tipo de dato que se quiere extraer del resultSet
			
			
			
		while($fila = $PDO_stmt->fetch(PDO::FETCH_ASSOC))
		{
			
			print "<br> Nick: $fila[NICK] <br> Clave: $fila[CLAVE] <br> Sexo: $fila[SEXO]";
				
		}
		}catch(Exception $ex)
		{
			
			print   "Error de mierda y la reconcha tu madre";
				
		}
		
		
		$PDO_stmt->closeCursor();
			
	
	?>

</body>
</html>

