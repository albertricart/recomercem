<?php
$files = array();
if ($handle = opendir('./assets/objects')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != '.' && $entry != '..') {
            $files[] = $entry;
        }
    }
    closedir($handle);
}
// var_dump($json);
?>

<script type="text/javascript" >
    var images = <?php echo json_encode($files); ?>;
</script>
