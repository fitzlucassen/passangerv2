<!DOCTYPE HTML>
<html>
    <head>
	<title><?php print empty($Model->_extraParams['title']) ? $Model->_headerInformations->getTitle() : $Model->_extraParams['title']; ?></title>
	<?php
	    // La page à modifier pour inclure le CSS le JS et les balises meta
	    include(__partial_directory__ . "/meta.php");
	    
	    // L'inclusion des CSS, JS et HTML personnalisés pour chaque page
	    echo "\n" . $Model->_extraParams['css'];
	    echo "\n" . $Model->_extraParams['js'];
	    echo "\n" . $Model->_extraParams['html'];
	?>
    </head>

    <body>
	<div id="global">
	    <?php
		include(__partial_directory__ . "/header.php");
	    ?>
	    <?php
		// Inclusion de la vue cible
		include($compact['View']);
	    ?>
	    <?php
		include(__partial_directory__ . "/footer.php");
	    ?>
	</div>
    </body>
</html>