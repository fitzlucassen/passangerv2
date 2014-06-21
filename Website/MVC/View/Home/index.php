<link type="text/css" rel="stylesheet" href="<?php echo __css_directory__;?>/home.css" />
<title>FLFramework - Le framework PHP français</title>

<?php

    // inclure ci-dessus les balises à inclure dans la balise <head> du layout
    $head = $this->RegisterViewHead();
    // START CONTENT
    // Intégrer ci-dessous la vue
?>
<?php /** BIO **/ ?>
<div class="home-sequence home-sequence-bio">
    <div id="home-bio-container">
        <div id="portrait-container">
            <div class="portrait" data-uid="<name user>">
                <img src="<path to img>" alt="portrait" />
            </div>
            <div class="portrait" data-uid="<name user>">
                <img src="<path to img>" alt="portrait" />
            </div>
            <div class="portrait" data-uid="<name user>">
                <img src="<path to img>" alt="portrait" />
            </div>
            <div class="portrait" data-uid="<name user>">
                <img src="<path to img>" alt="portrait" />
            </div>
            <div class="portrait" data-uid="<name user>">
                <img src="<path to img>" alt="portrait" />
            </div>
            <div class="clear"></div>
        </div>
        <div id="portrait-description-container">
            <div class="portrait-description portrait-description-groupe" data-uid="<name user>">
                ici description générale du groupe
            </div>
            <div class="portrait-description" data-uid="<name user>">
               
            </div>
            <div class="portrait-description" data-uid="<name user>">
                
            </div>
            <div class="portrait-description" data-uid="<name user>">
               
            </div>
            <div class="portrait-description" data-uid="<name user>">
                
            </div>
            <div class="portrait-description" data-uid="<name user>">
               
            </div>
        </div>
    </div>
</div>
<?php /** NEWS **/ ?>
<div class="home-sequence home-sequence-news">
    
</div>
<?php /** MEDIA **/ ?>
<div class="home-sequence home-sequence-media">
    
</div>