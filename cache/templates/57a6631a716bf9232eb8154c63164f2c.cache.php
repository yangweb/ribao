<section>
    <!--<div class="filter">
        <div class="filter__selector-row">
            <div class="row">
                <div class="small-8 columns">
                    <div class="filter__path">
                        <span class="filter__parent-category"><a href="<?php echo MODULE_URL; ?>"><?php echo MODULE_NAME; ?></a></span>
                    </div>
                </div>
                <div class="small-4 columns">
                </div>
            </div>
        </div>
    </div>-->
    <div class="article-archives-page">
        <div class="row">
            <div class="columns">
                <?php $cname = $ci->get_cache('module-1-agenda', 'category', $catid, 'name');   ?>
                <h1 class="article-archives-title"><?php echo $cname;  echo MODULE_NAME; ?></h1>
                <div class="tout-list tout-list--grid">
                    <div class="tout-list--grid__container">
                         <!--分页显示列表数据-->
                         <?php $return = $this->list_tag("action=module catid=$catid field=title,url,updatetime,thumb,description,inputtime,author order=updatetime page=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <article class="tout tout--default tout--article">
                            <a class="tout__link" href="<?php echo $t['url']; ?>">
                                    <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                                <div class="tout__details">
                                    <div class="tout__topic caption"></div>
                                    <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                    <p class="tout__description"><?php echo $t['description']; ?></p>
                                    <div class="tout__meta">
                                        <div class="caption">
                                            <span class="article__author bold"><?php echo $t['author']; ?></span>
                                            <span><?php echo $t['inputtime']; ?></span>
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