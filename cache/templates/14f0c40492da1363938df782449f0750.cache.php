<section>
    <div class="global-challenges-page">
        <?php if ($fn_include = $this->_include("category-info.html")) include($fn_include); ?>
        <div class="global-challenge-header" style="background-image: url('<?php echo $image; ?>');">
            <div class="row">
                <div class="small-12 columns">
                    <div class="global-challenge-wrapper">
                        <h1 class="page-title"> 更多<?php echo MODULE_NAME; ?> </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="global-challenge-about"></div>
        </div>
        <div class="row">
            <div class="columns">
                <h2 class="sub-title"><?php echo MODULE_NAME; ?></h2>
                <div class="tout-list tout-list--grid tout-list--grid-x2">
                    <div class="tout-list--grid__container">
                        <?php $return = $this->list_tag("action=module catid=$catid field=title,url,updatetime,description order=updatetime page=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <article class="tout tout--default tout--project">
                            <a class="tout__link" href="<?php echo $t['url']; ?>">
                                <figure class="placeholder small">
                                    <img class="image" alt="<?php echo $t['title']; ?>" src="<?php echo dr_thumb($t['thumb']); ?>" />
                                    <img class="tiny-fallback" alt="<?php echo $t['title']; ?>" src="<?php echo dr_thumb($t['thumb'],97,72); ?>"  />
                                </figure>
                                <div class="tout__details">
                                    <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                    <p class="tout__description"><?php echo $t['description']; ?></p>
                                    <div class="tout__meta">
                                        <div class="caption">
                                            <span class="article__published-at"><?php echo $t['inputtime']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <?php if ($fn_include = $this->_include("layout/pagination.html")) include($fn_include); ?>
        </div>
    </div>
</section>