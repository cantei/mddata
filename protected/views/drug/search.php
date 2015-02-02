<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
//	'ajaxUpdate'=>false,
//	'enablePagination'=>false,
//	'pagerCssClass' => 'result-list',
	// 'summaryText' => 'Total '. $pages->itemCount .' Results Found',
));
$this->widget('CLinkPager', array(
	'header' => '',
	'firstPageLabel' => '&lt;&lt;',
	'prevPageLabel' => '&lt;',
	'nextPageLabel' => '&gt;',
	'lastPageLabel' => '&lt;&lt;',
	'pages' => $pages,
));
?>
<?php// echo $pages ;?>