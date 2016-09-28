<article class="tout tout--default tout--article">
    <a class="tout__link" href="<?php echo $t['url']; ?>">
            <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
        <div class="tout__details">
            <div class="tout__topic caption"></div>
            <h3 class="tout__title"><?php echo $t['title']; ?></h3>
        </div>
    </a>
</article>
