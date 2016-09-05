<?php if ($fn_include = $this->_include("layout/head.html")) include($fn_include);  if ($fn_include = $this->_include("layout/side-drawer.html")) include($fn_include);  if ($fn_include = $this->_include("layout/cookie.html")) include($fn_include); ?>
<div class="content-container">
<?php if ($fn_include = $this->_include("layout/header.html")) include($fn_include);  if ($fn_include = $this->_include("layout/meganav.html")) include($fn_include);  if ($fn_include = $this->_include("data/index-data.html")) include($fn_include);  if ($fn_include = $this->_include("layout/footer.html")) include($fn_include); ?>
</div>
</body>
</html>
