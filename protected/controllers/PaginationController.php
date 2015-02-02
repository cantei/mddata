<?php
class PaginationController extends Controller {
    
    public function actionBasicPager() {
        $item_count = 32;  // num_row
        $page_size = 5;  

        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);

        // simulate the effect of LIMIT in a sql query
        $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

        $sample = range($pages->offset + 1, $end);

        $this->render('basic_pager', array(
            'item_count' => $item_count,
            'page_size' => $page_size,
            'items_count' => $item_count,
            'pages' => $pages,
            'sample' => $sample,
        ));
    }
}