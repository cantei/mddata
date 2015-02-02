<h1>ทดทอบ page navigator</h1>

<b>Page <?php echo $pages->getCurrentPage()+1; ?></b>

<ul><li><?php echo implode('</li><li>', $sample); ?></li></ul>
<hr>
<?php
$this->widget('CLinkPager', array(
	'pages'=>$pages,
));

$this->widget('CListPager', array(
	'pages'=>$pages,
));
?>

<hr>
<?php
$this->widget('CLinkPager', array(
	'currentPage'=>$pages->getCurrentPage(),
	'itemCount'=>$item_count,
	'pageSize'=>$page_size,
	'maxButtonCount'=>6,
	'nextPageLabel'=>'My text &gt;',
	'header'=>'',
));
?>
<hr>
<?php
$this->widget('CListPager', array(
	'currentPage'=>$pages->getCurrentPage(),
	'itemCount'=>$item_count,
	'pageSize'=>$page_size,
	'header'=>'กดปุ่ม: ',
));
?>