<?php
/**
 * the variable required in header_tpl.php are:
 * $_page_title
 * $_meta_description
 * $config @array
 * $google_analytics @option
 * 
 */
?>
<!DOCTYPE html>
<html lang="zh-Hans">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $this->get('meta_description');?>">
        <meta name="author" content="dcai">

        <title><?php echo $this->get('page_title');?></title>

        <!-- Le styles -->
        <link href="<?php echo ASSETS_URL?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo ASSETS_URL?>/css/docs.css" rel="stylesheet">
        <link href="<?php echo ASSETS_URL?>/css/carousel.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


        <!-- Le fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo ASSETS_URL?>/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo ASSETS_URL?>/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo ASSETS_URL?>/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo ASSETS_URL?>/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo ASSETS_URL?>/ico/favicon.png">

    </head>
