<!DOCTYPE html>
<html>
<head>
<title>Proto-Lounge Printer and Material Intercept Database</title>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<meta name="description" content="3D Printer and Material intercection of usage and specs." />
<meta name="keywords" content="3D Print Printing filament PLA ABS " />
<meta name="robots" content="index, follow" />
<!-- 	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />  -->
<link rel="stylesheet" type="text/css" href="public/css/screen.css" media="screen" />
</head>
<?php
    $dir_iterator = new RecursiveDirectoryIterator ( "../app" );
    
    $iterator = new RecursiveIteratorIterator ( $dir_iterator, RecursiveIteratorIterator::SELF_FIRST );
    // could use CHILD_FIRST if you so wish
    
    foreach ( $iterator as $file ) {
        if ($file->isFile ()) {
            require_once $file;
        }
    }
    $intercept = new Intercept ();
    $matrix = $intercept->getMatrix ();
    
    $printers = $intercept->getPrinters ();
    
    $materials = $intercept->getMaterials ();
?>
<body>
 <div id="header">
  <h1>The Perfect 3 Column Liquid Layout (Percentage widths)</h1>
  <h2>No CSS hacks. SEO friendly. No Images. No JavaScript. Cross-browser &amp; iPhone compatible.</h2>
  <ul>
   <li>>title bar --</li>
  </ul>
  <p id="layoutdims">Measure columns in:</p>
 </div>
 <div class="colmask threecol">
  <div class="colmid">
   <div class="colleft">
    <div class="col1">
     <!-- Column 1 start -->
     <h2>Materials</h2>
     <ul>
    <?php
        foreach ( $materials as $m ) {
            echo '<li>' . $m->type . '</li>';
        }
    ?>
                </ul>
     <!-- Column 1 end -->
    </div>
    <div class="col2">
     <!-- Column 2 start -->
     <h2>Printers</h2>
     <ul>
    <?php
        foreach ( $printers as $p ) {
            echo '<li>' . $p->name . '</li>';
        }
    ?>
                </ul>
     <!-- Column 2 end -->
    </div>
    <div class="col3">
     <!-- Column 3 start -->
     <div id="ads"></div>
     <h2>Intersection</h2>
     <ul>
    <?php
        foreach ( $matrix as $m ) {
            echo '<li>' . $m->printerName . '</li>';
        }
    ?>
     </ul>
     <!-- Column 3 end -->
    </div>
   </div>
  </div>
 </div>
 <div id="footer">
  <p>This page uses the</p>
 </div>

</body>
</html>