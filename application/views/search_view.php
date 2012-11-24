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

//打印数据库中的广告条目信息
puPrintAdItem($ad_resp);

echo '自然搜索条目：';
//打印阿里妈妈搜索结果
puPrintItem($resp);

//打印搜索条目列表
function puPrintItem($resp){
	echo "<ul id='search-list' class='item-list'>";
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

//打印广告列表
function puPrintAdItem($ad_resp){
	
		if($ad_resp->num_rows() == 0){
			echo '没有找到广告条目。';
		} else{
			echo '广告条目：';
			echo "<ul id='ad-list' class='item-list'>";
			foreach($ad_resp->result_array() as $row){
			?>
				<li>
					<a href="<?php echo site_url('home/redirect/'.$row['id']); ?>" title="<?php echo $row['title'];?>">
					<img src="<?php echo $row['img_url']?>" alt=""/>
					</a>
					
				</li>
			<?php
			}
			echo "</ul>";
		}
}
?>



</body>
<html>
