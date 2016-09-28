<div class="pagination__container" id="pagination">
</div>
<script>
    function pagination(){
        var pajson = <?php if ($pages) {  echo $pages;  } else { ?>""<?php } ?>;
        if(pajson==""){
            return false;
        }
        var pages = pajson.pages;
        var page_on = pajson.page_on;
        var prev_url = pajson.prev_url;
        var next_url = pajson.next_url;
        var str = '';
        if(prev_url){
            str += '<a rel="prev" class="pagination__direction direction-previous" href="'+ prev_url +'">' +
            '<div class="pagination__nav-text">' +
            '上一页' +
            '</div>' +
            '</a>';
        }else{
            str += '<div class="pagination__direction direction-previous">' +
            '<div class="pagination__nav-text">' +
            '上一页' +
            '</div>' +
            '</div>';
        }
      
        str += '<div class="pagination__page-info">' + page_on +
            '/' + pages +
            '</div>';
        if(next_url){
             str += '<a rel="next" class="pagination__direction direction-next" href="'+ next_url +'">' +
            '<div class="pagination__nav-text">' +
            '下一页' +
            '</div>' +
            '</a>';
        }else{
             str += '<div class="pagination__direction direction-next">' +
            '<div class="pagination__nav-text">' +
            '下一页' +
            '</div>' +
            '</div>';
        }
       
        document.getElementById("pagination").innerHTML = str;
    };
    pagination();
</script>