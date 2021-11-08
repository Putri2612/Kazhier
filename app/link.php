<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    $source = "/app/storage/app/public";
    $target = "/app/public/storage";
    
    symlink($root.$source, $root.$target);
?>
