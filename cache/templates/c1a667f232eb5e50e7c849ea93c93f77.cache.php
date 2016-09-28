<div class="meganav-content meganav-content--tall" data-pane="about">
    <div class="meganav-content__description">
        <div class="row">
            <div class="small-12 columns">
               <?php echo man_block(8); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-4 columns">   
            <div class="gutter-marking"></div>
            <div class="mega-list-group__header">
                <span class="list-group__title">关于我们</span>
            </div>
            <ul class="mega-list-group">
                <?php $return = $this->list_tag("action=page module=index pid=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <li class="mega-list-group__item"><a href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a> </li>
                <?php } } ?>
            </ul>
        </div>
        <div class="small-8 columns">
             <?php $imgnav1 = $ci->get_cache('page-1', 'data', 'index', 8, 'thumb');
                                 $imgnav2 = $ci->get_cache('page-1', 'data', 'index', 7, 'thumb');
                                 $navurl1 = $ci->get_cache('page-1', 'data', 'index', 8, 'url');
                                 $navurl2 = $ci->get_cache('page-1', 'data', 'index', 7, 'url');
                                 $navname1 = $ci->get_cache('page-1', 'data', 'index', 8, 'name');
                                 $navname2 = $ci->get_cache('page-1', 'data', 'index', 7, 'name');
                             ?>
            <div class="mega-list-group__header">
                <span class="list-group__title"><?php echo $navname1; ?></span>
            </div>
            <div class="row">
                <div class="columns">
                    <div class="tout-list tout-list--grid tout-list--grid-x2">
                        <div class="tout-list--grid__container">
                           
                            <article class="tout tout--default tout--page">
                                <a class="tout__link" href="<?php echo $navurl1; ?>">
                                    <figure class="placeholder small">
                                        <img class="image" alt="" src="<?php echo man_thumb($imgnav1); ?>" alt="" />
                                        <img class="tiny-fallback" src="<?php echo man_thumb($imgnav1,97,72); ?>" alt="" />
                                    </figure>
                                    <div class="tout__details">
                                        <h3 class="tout__title"><?php echo $navname1; ?></h3>
                                    </div>
                                </a>
                            </article>
                            <article class="tout tout--default tout--page">
                                <a class="tout__link" href="<?php echo $navurl2; ?>">
                                    <figure class="placeholder small">
                                        <img class="image" alt="" src="<?php echo man_thumb($imgnav2); ?>" alt="" />
                                        <img class="tiny-fallback" src="<?php echo man_thumb($imgnav2,97,72); ?>" alt="" />
                                    </figure>
                                    <div class="tout__details">
                                        <h3 class="tout__title"><?php echo $navname2; ?></h3>
                                    </div>
                                </a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>