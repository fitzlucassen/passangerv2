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
    <div id="home-news-container">
        <?php /** NEWS - ARTICLE **/ ?>
        <div class="left" id="home-news-article">
            <?php /** ITEM NEWS **/ ?>
            <div class="news-article-line">
                <div class="left news-article-img">
                    <img src="<path to img>" />
                </div>
                <div class="left">
                    <h3>News title</h3> 
                    <p>News short description</p> 
                </div>
                <div class="clear"></div>
            </div>
             <?php /** ITEM NEWS **/ ?>
            <div class="news-article-line">
                <div class="left news-article-img">
                    <img src="<path to img>" />
                </div>
                <div class="left">
                    <h3>News title</h3> 
                    <p>News short description</p> 
                </div>
                <div class="clear"></div>
            </div>
            
        </div>
        <?php /** NEWS - EVENT **/ ?>
        <div class="left" id="home-news-event">
            
        </div>
    </div>
</div>
<?php /** MEDIA **/ ?>
<div class="home-sequence home-sequence-media">
    <div id="home-media-container">
        <div id="media-slideshow">
            
        </div>
    </div>
</div>