<?php $imgid = $ci->get_cache('module-1-challenges', 'category', $catid, 'thumb'); 
     $image = dr_thumb($imgid);
     $cname = $ci->get_cache('module-1-challenges', 'category', $catid, 'name');
     $description = $ci->get_cache('module-1-challenges', 'category', $catid, 'description'); 
 ?>