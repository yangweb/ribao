<?php $return = $this->list_tag("action=module order=updatetime num=10"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
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