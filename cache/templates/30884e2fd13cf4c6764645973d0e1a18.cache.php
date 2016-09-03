<div class="meganav-content meganav-content--tall" data-pane="about">
    <div class="meganav-content__description">
        <div class="row">
            <div class="small-12 columns">
                致力于改善全球状况
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
            <div class="mega-list-group__header">
                <span class="list-group__title">如何参与</span>
            </div>
            <div class="row">
                <div class="columns">
                    <div class="tout-list tout-list--grid tout-list--grid-x2">
                        <div class="tout-list--grid__container">
                            <article class="tout tout--default tout--page">
                                <a class="tout__link" href="">
                                    <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                                    <div class="tout__details">
                                        <h3 class="tout__title">如何参与</h3>
                                    </div>
                                </a>
                            </article>
                            <article class="tout tout--default tout--page">
                                <a class="tout__link" href="">
                                    <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                                    <div class="tout__details">
                                        <h3 class="tout__title">联系我们 </h3>
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