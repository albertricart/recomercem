<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=((!empty($pageTitle))?$pageTitle:'Administracion reComercem')?></title>
    <meta name="description" content="<?=((!empty($pageDescription))?$pageDescription:'reComercem')?>" />
    <meta name="keywords" content="<?=((!empty($pageKeywords))?$pageKeywords:'reComercem')?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="/mybackend/css/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/mybackend/js/scripts.js"></script>
<?

// - - - - - - - - - - - $pageStylesAry
if (!empty($pageStylesAry)) { 
  foreach( $pageStylesAry as $tmpKey => $tmpData ) { 
    echo '<link href="'.$tmpData.'" rel="stylesheet" type="text/css" />'; 
  } 
}

// - - - - - - - - - - - $pageStylesAry
if (!empty($pageScriptsAry)) { 
  foreach( $pageScriptsAry as $tmpKey => $tmpData ) { 
    echo '<link href="'.$tmpData.'" rel="stylesheet" type="text/css" />'; 
  } 
}

?>