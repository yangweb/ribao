<article class="tout tout--default tout--event">
    <a class="tout__link" href="<?php echo $t['url']; ?>">
        <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
        <div class="tout__details">
            <h3 class="tout__title"><?php echo $t['title']; ?></h3>
            <p class="tout__description"><?php echo $t['description']; ?></p>
            <div class="tout__meta">
                <div class="caption">
                    <span><?php echo man_date($t['_starttime'], 'Y-m-d', ''); ?></span>
                    <span><?php echo $t['address']; ?></span>
                </div>
            </div>
        </div>
    </a>
</article>