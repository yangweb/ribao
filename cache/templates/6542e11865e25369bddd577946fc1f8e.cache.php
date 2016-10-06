<div class="side-drawer">
    <ul class="side-drawer__nav">
        <?php $return = $this->list_tag("action=cache name=module order=displayorder"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  if ($t['dirname']=='press') {  } else { ?>
        <li class="side-drawer__item" >
            <a class="side-drawer__link" href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a>
        </li>
        <?php }  } } ?>
        <li class="side-drawer__item">
            <a class="side-drawer__link" href="<?php echo $ci->get_cache('page-1', 'data', 'index', 1, 'url'); ?>">关于</a>
            <ul class="side-drawer__sublinks">
                <?php $return = $this->list_tag("action=page module=index pid=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <li class="side-drawer__sublink">
                    <a href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a>
                </li>
                <?php } } ?>
            </ul>
        </li>
    </ul>
    <!--<ul class="side-secondary-nav">
        <li><a href="">English</a></li>
    </ul>-->
</div>
<div class="side-drawer__close"></div>