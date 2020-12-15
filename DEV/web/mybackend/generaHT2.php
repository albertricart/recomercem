<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" >
<head>
<title>Generador de archivos .htaccess y .htpasswd</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?

$elpath = getcwd().'/';

if (empty($_POST['htaccess_path'])) $_POST['htaccess_path'] = $elpath;

if (empty($_POST['htpasswd_path'])) $_POST['htpasswd_path'] = $elpath;

if(isset($_POST['submit'])) {

	if(empty($_POST['user']) || empty($_POST['password']) || empty($_POST['htaccess_path']) || empty($_POST['htpasswd_path'])) {

		echo "<p>Debe rellenar todos los datos del formulario.</p>";

	} else {

		$codehtaccess = 'AuthType Basic'."\n".
						'AuthName "Acceso restringido"'."\n".
						'AuthUserFile '.trim($_POST['htpasswd_path']).'/.htpasswd'."\n".
						'Require valid-user'."\n";

		//$codehtpasswd = trim($_POST['user']) . ":" . crypt(trim(base64_encode($_POST['password']))) . "\n";
		$codehtpasswd = trim($_POST['user']) . ":" . password_hash( $_POST['password'], PASSWORD_BCRYPT );

?>

<h1>Archivo <code>.htaccess</code></h1>

<p>Cree el archivo <code><?=$_POST['htaccess_path']?>/.htaccess</code> con el siguiente contenido:</p>

<pre><?=$codehtaccess?></pre>

<h1>Archivo <code>.htpasswd</code></h1>

<p>Cree el archivo <code><?=$_POST['htpasswd_path']?>/.htpasswd</code> con el siguiente contenido:</p>

<pre><?=$codehtpasswd?></pre>
		
<?
		$consLog = "";

		if ( !file_exists ( $elpath.".htaccess" ) ) { 

			$consLog.= ((!empty($consLog))?' | ':'').$elpath.".htaccess"." NO existe, graba nuevo";

			if ( file_put_contents( $elpath.".htaccess", trim( $codehtaccess ), LOCK_EX ) ) {

				$consLog.= ((!empty($consLog))?' | ':'').$elpath.".htaccess"." guardado ok";

			} else {

				$consLog.= ((!empty($consLog))?' | ':'').$elpath.".htaccess"." guardado KO";

			}

		} else { 

			$consLog.= ((!empty($consLog))?' | ':'').$elpath.".htaccess"." ya existe";

		}

		if ( file_put_contents( $elpath.".htpasswd", trim($codehtpasswd)."\n", FILE_APPEND | LOCK_EX ) ) {

			$consLog.= ((!empty($consLog))?' | ':'').$elpath.".htpasswd"." guardado ok";

		} else {

			$consLog.= ((!empty($consLog))?' | ':'').$elpath.".htpasswd"." guardado KO";

		}

		echo "<script>console.log('".$consLog."')</script>" ;

	}

}

?>

<p>Rellene los campos del siguiente formulario con los valores deseados para generar los archivos <code>.htaccess</code> y <code>.htpasswd</code>:</p>

<form action="<?="http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']?>" method="post">

	Usuario: <input type="text" name="user" /><br /><br />

	Contrase&ntilde;a: <input type="text" name="password" /><br /><br />

	Directorio del archivo <code>.htaccess</code> (relativo al directorio donde se encuentra esta página):<br />

	<input name="htaccess_path" type="text" value="<?=$_POST['htaccess_path']?>" size="120" /><br /><br />

	Directorio del archivo <code>.htpasswd</code> (relativo al directorio donde se encuentra esta página):<br />

	<input name="htpasswd_path" type="text" value="<?=$_POST['htpasswd_path']?>" size="120" /><br /><br />

	<input type="submit" name="submit" value="Generar" />

</form>

</body>

</html>
