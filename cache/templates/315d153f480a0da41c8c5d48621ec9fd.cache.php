<header>
    <div class="row nav">
        <ul class="header-container">
            <a class="drawer-icon js-show-hide-menu">
                <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/hamburger-d4a8924e2554b1c8a9206e72c97a44cc624d3da299ccb9e9d4a2a8ef37e76f72.svg" alt="Hamburger" />
            </a>
            <li class="header-item logo">
                <a href="/">
                <?php $return = $this->list_tag("action=navigator type=0 id=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <img class="header-wef__logo" src="<?php echo man_thumb($t['thumb']); ?>" alt="Logo" />
                 <?php } } ?>
                </a>
            </li>

            <div class="header-pane-selectors">
                <?php $return = $this->list_tag("action=cache name=module order=displayorder"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  if ($t['dirname']=='press') {  } else { ?>
                <li class="header-pane" data-pane="<?php echo $t['dirname']; ?>">
                    <a class="header-item__link" href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a>
                </li>
                <?php }  } } ?>
                <li class="header-pane" data-pane="about">
                    <a class="header-item__link" href="<?php echo $ci->get_cache('page-1', 'data', 'index', 1, 'url'); ?>">关于</a>
                </li>
            </div>
        </ul>
    </div>
</header>