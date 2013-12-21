<?php    
    $urlsByLang = Router::GetUrlByLang($Model->_controller, $Model->_action, $Model->_params);
?>

<header>
    <h1 class="title alignCenter">Bienvenue chez Emoson</h1>
    <a href="<?php echo $urlsByLang['en']['pattern']; ?>">EN</a>
    
    <a href="<?php echo $urlsByLang['fr']['pattern']; ?>">FR</a>
</header>
