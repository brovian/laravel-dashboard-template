@if ($paginator->hasPages())
<div class="col c12 page">
    <a class="firstpage" href="{{$paginator->url(1)}}">首页</a><?php 
	        // 分页方式一：
	        /*
            foreach($elements as $element){
                if (is_array($element)){
                    foreach ($element as $page => $url){
                        if ($page == $paginator->currentPage()){
                            echo '<a class="pagenum current" href="javascript:;">'.$page.'</a>';
                        } else {
                            echo '<a class="pagenum" href="'.$url.'">'.$page.'</a>';
                        }
                    }
                }
            }
	         */
	        
            // 分页方式二
            if($paginator->lastPage() >= 9){
                if($paginator->currentPage() < 5){
                    $pagemin = 1;
                    $pagemax = 9;
                } elseif ($paginator->currentPage() >= 5 && $paginator->currentPage() <= $paginator->lastPage() - 5){
                    $pagemin = $paginator->currentPage() - 4;
                    $pagemax = $paginator->currentPage() + 4;
                } else {
                    $pagemin = $paginator->lastPage() - 9;
                    $pagemax = $paginator->lastPage();
                }
            } else {
                $pagemin = 1;
                $pagemax = $paginator->lastPage();
            }
            for($i=$pagemin;$i<=$pagemax;$i++){
                if($paginator->currentPage() == $i){
                    echo '<a class="pagenum current" href="javascript:;">'.$i.'</a>';
                } else {
                    echo '<a class="pagenum" href="'.$paginator->url($i).'">'.$i.'</a>';
                }
            }
	    ?><a class="lastpage" href="{{$paginator->url($paginator->lastPage())}}">尾页</a>
</div>
@endif
{{-- 增加输入框，跳转任意页码和显示任意条数 
        <span title="输入页码，按回车快速跳转">
            第 <input type="text" value="{{ $paginator->currentPage() }}"> 页 / 共 {{ $paginator->lastPage() }} 页
        </span>
        
        <span title="输入每页条数，按回车快速跳转">
            每页 <input type="text" value="{{ $paginator->perPage() }}" > 条 / 共 {{ $paginator->total() }} 条
        </span>
--}}