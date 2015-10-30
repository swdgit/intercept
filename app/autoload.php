<?php
    $dir_iterator = new RecursiveDirectoryIterator (__DIR__);
    
    $iterator = new RecursiveIteratorIterator ( $dir_iterator, RecursiveIteratorIterator::SELF_FIRST );
    // could use CHILD_FIRST if you so wish
    
    foreach ( $iterator as $file ) {
        if ($file->isFile ()) {
            require_once $file;
        }
    }
?>