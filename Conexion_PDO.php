<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
    <h1>Funciona la Concha tu Madre</h1>
	<?php
		
		
		
                $nick = $_POST["casilla_nick"];
                
		$sexo = $_POST["casilla_sexo"];
		
                $clave = $_POST["casilla_clave"];
		
                
                class db extends PDO
                {
                    
                    public function last_row_count()
                    {
                        return $this->query("SELECT FOUND_ROWS()")->fetchColumn();
                    }
                    
                    
                }
                
		
		try
		{
			
	
                    
		
		$BASE_DATOS  = new db('mysql:host=localhost; dbname=php','root','');	
			
		$BASE_DATOS->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$BASE_DATOS->exec("SET CHARACTER SET utf8");
		
		//$sql = "SELECT NICK, CLAVE, SEXO FROM USUARIO WHERE SEXO=:sex_usuario AND CLAVE=:clave_usuario";	
		//$sql = "insert into usuario (NICK,CLAVE,SEXO) values (?,?,?)";
		
                    $sql = "delete from  usuario where nick=? and sexo=? and clave=?";
                
                $PDO_stmt = $BASE_DATOS->prepare($sql);
		
		$PDO_stmt->execute(array($nick,$sexo,$clave)); //Aqui se inserta el tipo de dato que se quiere extraer del resultSet
		
                
                if($PDO_stmt==true)
                {
                     
                    print "Sentencia ejecutada con éxito";
                    print "<br>";
                if($PDO_stmt->rowCount()==0)
                        
                    {
                        echo "No se encontro el registro a eliminar";
                    }
                    else
                    {
                        echo "Se eliminó de manera satisfactoria el registro insertado";
                    }
                }
                else
                {
                    print "Hubo problemas con la sentencia";
                }
		
			/*
		while($fila = $PDO_stmt->fetch(PDO::FETCH_ASSOC))
		{
			
			print "<br> Nick: $fila[NICK] <br> Clave: $fila[CLAVE] <br> Sexo: $fila[SEXO]";
				
		}
                         
                       */  
		}catch(Exception $ex)
		{
			
			print   "Error de mierda y la reconcha tu madre";
				
		}
		
		
		$PDO_stmt->closeCursor();
			
	
	?>

</body>
</html>

