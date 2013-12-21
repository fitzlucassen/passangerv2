<?php
    // HEAD
    // inclure ici les balises à inclure dans la balise <head> du layout
?>

<link type="text/css" rel="stylesheet" href="<?php echo __css_directory__;?>/home.css" />
<title>404 - Cette page n'existe pas ou plus...</title>

<?php
    $head = ob_get_clean();
    // END HEAD
    ob_start();
    // CONTENT
?>

<div class="ErrorPage">
</div>