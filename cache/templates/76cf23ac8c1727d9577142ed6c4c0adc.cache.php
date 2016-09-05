<section>
    <div class="agenda-home">
        <?php $imgid = $ci->get_cache('module-1-agenda', 'category', 8, 'thumb'); $description = $ci->get_cache('module-1-agenda', 'category', 8, 'description');  ?>
        <header class="articles-header" style="background-image:url(<?php echo man_thumb($imgid); ?>)">
            <div class="row">
                <div class="columns">
                    <h1 class="agenda-title"><span><?php echo MODULE_NAME; ?></span></h1>
                    <p class="articles-description"><?php echo $description; ?></p>
                </div>
            </div>
        </header>
        <div class="row">
            <!--循环输出顶级栏目下面的子栏目及其内容，运用到了双list循环标签因此需要定义返回值return=c（都懂得）-->
            <?php $return_c = $this->list_tag("action=category pid=8  return=c"); if ($return_c) extract($return_c); $count_c=count($return_c); if (is_array($return_c)) { foreach ($return_c as $key_c=>$c) { ?>
            <section class="columns">
                <h2 class="sub-title"><?php echo $c['name']; ?>议题</h2>
                <div class="tout-list global-agenda">
                    <?php $return = $this->list_tag("action=module catid=$c[id] order=updatetime num=10"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <article class="tout tout--large tout--article">
                        <a class="tout__link" href="<?php echo $t['url']; ?>">
                                <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                            <div class="tout__details">
                                <div class="tout__topic caption"></div>
                                <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                <p class="tout__description"><?php echo $t['description']; ?></p>
                                <div class="tout__meta">
                                    <div class="caption"><span class="article__author bold"><?php echo $t['author']; ?></span> <span><?php echo $t['inputtime']; ?></span></div>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php } } ?>
                </div>
                <a class="more-items-button" href="<?php echo $c['url']; ?>"><span>更多的<?php echo $c['name'];  echo MODULE_NAME; ?></span><img src="<?php echo HOME_THEME_PATH; ?>build/imgs/link-arrow-9adfe464cd987bc5b3097b1218678552fcdd94a3e6cb7b3664bd1f75205873cc.svg" alt="Link" /></a>
            </section>
            <?php } } ?>
        </div>
    </div>


</section>