<?php $webhref = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
     $weibolink = 'http://service.weibo.com/share/share.php?url='.$webhref;
     $inlink = 'https://www.linkedin.com/shareArticle?mini=true&source=WEF&url='.$webhref;
 ?>