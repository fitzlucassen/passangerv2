<?php    
    $urlsByLang = fitzlucassen\FLFramework\Library\Core\Router::GetUrlByLang($this->Model->_controller, $this->Model->_action, $this->Model->_params);
?>

<header>
    <div id="main-navigation-container">
        <nav id="main-navigation">
            <ul>
                <li>
                    <a href="javascript:void(0)" class="first nav-link">
                        <i class="fa fa-home fa-fw"></i><?php echo _('Accueil'); ?>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="fa fa-music fa-fw"></i><?php echo _('Bio'); ?>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="fa fa-rss fa-fw"></i><?php echo _('Actualités'); ?>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="last nav-link">
                        <i class="fa fa-image fa-fw"></i><?php echo _('Media'); ?>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="last nav-link">
                        <i class="fa fa-envelope-o fa-fw"></i><?php echo _('Contact'); ?>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
