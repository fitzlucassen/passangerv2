<?php    
    $urlsByLang = fitzlucassen\FLFramework\Library\Core\Router::GetUrlByLang($this->Model->_controller, $this->Model->_action, $this->Model->_params);
?>

<header>
    <div id="main-navigation-container">
        <nav id="main-navigation">
            <ul>
                <li><a href="javascript:void(0)" class="first nav-link">Home</a></li>
                <li><a href="javascript:void(0)" class="nav-link">Menu Item</a></li>
                <li><a href="javascript:void(0)" class="nav-link">Menu Item</a></li>
                <li><a href="javascript:void(0)" class="last nav-link">Menu Item</a></li>
            </ul>
        </nav>
    </div>
</header>
