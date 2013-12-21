<?php
    // HEAD
    // inclure ici les balises à inclure dans la balise <head> du layout
?>

<link type="text/css" rel="stylesheet" href="<?php echo __css_directory__;?>/entreprise.css" />
<title>Page entreprise</title>

<?php
    $head = ob_get_clean();
    // END HEAD
    ob_start();
    // CONTENT
?>

<div class="EntreprisePage">
</div>