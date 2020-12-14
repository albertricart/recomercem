<!DOCTYPE html>
<html lang="es-es" dir="ltr">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=((!empty($pageTitle))?$pageTitle:'reComercem: El teu comerç de proximitat al barri')?></title>
<meta name="description" content="<?=((!empty($pageDescription))?$pageDescription:'reComercem: El teu comerç de proximitat al barri')?>" />
<meta name="keywords" content="<?=((!empty($pageKeywords))?$pageKeywords:'reComercem, comerç, barri, comercio, barri, proximidad, barrio, store, neighbourought')?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="/css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/scripts.js"></script>
<?php 

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
<style>
    @font-face {
      font-family: 'Inter';
      src: url(/third-parties/fonts/inter/Inter-VariableFont_slnt,wght.ttf);
      font-family: 'OpenSans-Regular';
      src: url(/third-parties/fonts/open-sans/OpenSans-Regular.ttf);
      font-family: 'OpenSans-Bold';
      src: url(/third-parties/fonts/open-sans/OpenSans-Bold.ttf);
      font-family: 'OpenSans-Italic';
      src: url(/third-parties/fonts/open-sans/OpenSans-Italic.ttf);
    }
    </style>
