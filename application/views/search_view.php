<!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
<meta charset="UTF-8" />
	<title><?php echo $site_name;?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/bootstrap.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/index.css?d=20120705" />
	<!--[if lt IE 9]>
	<script src="<?php echo base_url()?>assets/js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>



<div id="search_input">
    <a href="<?php echo site_url('')?>" class="logo"></a>
    <form id="myForm" action="<?php echo site_url('home/search')?>" method="get">
    <input type="text" value="<?php echo $keyword?>" name="keyword" class="input-xlarge" style="margin-bottom:0;">
	 
    <input type="submit" value="搜索" class="btn btn-success" />
</div><!-- .search_input -->

<?php

//打印XML中的条目信息
puPrintItem($resp);

function puPrintItem($resp){
	echo "<ul id='search-list'>";
		if($resp->total_results == 0){
			echo '没有找到条目，请修改关键词或者类别。';
		} else{
			foreach($resp->taobaoke_items->taobaoke_item as $taobaoke_item){
			?>
				<li>
					<a href='<?php echo $taobaoke_item->click_url ?>' data-taobaoke_id='<?php echo $taobaoke_item->num_iid ?>' title='<?php echo strip_tags($taobaoke_item->title)?>' data-price='<?php echo $taobaoke_item->price?>' data-commission='<?php echo $taobaoke_item->commission ?>' data-sellernick='<?php echo $taobaoke_item->nick; ?>'>
					<img src="<?php echo $taobaoke_item->pic_url?>" alt="<?php echo $taobaoke_item->title?>"/>
					</a>
					<p><span class="right"><?php echo $taobaoke_item->volume ?>件/30天</span><span><?php echo $taobaoke_item->commission ?></span> / <span><?php echo $taobaoke_item->price?></span></p>
				</li>
			<?php
			}
		}
	echo "</ul>";
}
?>

<div id="pop-pictures" class="modal hide">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h3></h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
             <a href="" class="btn btn-primary"
		              id="btn-publish">发布条目</a>
            </div>
          </div>


</body>
<html>
