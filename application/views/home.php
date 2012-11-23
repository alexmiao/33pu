<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="UTF-8" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/bootstrap.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/index.css" />

</head>
<body>


    <div id="index_search">

        <a href="<?php echo site_url('admin')?>" class="logo"></a>
        <form action="<?php echo site_url('home/search')?>" method="get">
        <input type="text" name="keyword" class="input-xlarge" style="margin-bottom:0;">
        <input type="submit" value="搜索" class="btn btn-success" />

</div><!-- .search_input -->



</body>
</html>