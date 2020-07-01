<?php /*a:4:{s:57:"F:\Project\deer\application\index\view\product\index.html";i:1590478369;s:55:"F:\Project\deer\application\index\view\public\base.html";i:1590561763;s:54:"F:\Project\deer\application\index\view\public\nav.html";i:1590567715;s:57:"F:\Project\deer\application\index\view\public\footer.html";i:1590568555;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlentities($now_nav['title']); ?></title>
    <!-- 公共样式和JS -->
    <link rel="stylesheet" href="/static/index/css/other.css">
    <link rel="stylesheet" href="/static/index/css/public.css">
    <!-- 当前页面的样式及JS -->
    
<style type="text/css">
    li{ list-style-type:none; color:#333333; line-height:30px;}
    .showPic{
        margin: 30px 0;
        display: block;
    }
    .showPic1 ul li{
        float: left;
        width: 32.4%;
        margin-right: 3px;
        margin-left: 6px;
        margin-bottom: 12px;
    }
    .showPic1 ul li img{
        width: 100%;
    }
    .showPic1 ul li span{
        display: block;
        color: #333;
        text-align: center;
        background: #f1f1f1;
        padding: 10px 0;
    }
    #pageContent li{
        float: left;
        width: 32.4%;
        margin-left: 6px;
        margin-right: 3px;
        margin-bottom: 12px;
        text-align:left;
    }
    #pageContent li img{
        width: 100%;
    }
    #pageContent li span{
        display: block;
        color: #333333;
        text-align: center;
        background: #f1f1f1;
        padding: 10px 0;
    }
    .case_page{width: 750px!important;}
    .case_page ul li{font-size: 20px!important;}
    .case_page ul li:first-child{width: 65px!important;}
    .case_page ul li:last-child{width: 65px!important;}
    .case_page{
        width: 1200px;
        height: 25px;
        margin:30px auto;
    }
    .case_page ul{
        display:table;
        text-align:center;
        margin:0 auto;
    }
    .case_page ul li{
        width: 23px;
        height: 23px;
        float: left;
        margin-left: 14px;
        font-size: 14px;
        text-align: center;
    }
    .case_page ul li a{color: #999999;}
    .case_page ul li:first-child{
        width: 45px;
        height: 25px;
    }
    .case_page ul li:last-child{
        width: 45px;
        height: 25px;
    }
</style>

</head>
<body>
<!--导航栏-->
<div class="HomeNavigation">
    <div class="HomeNavigation_logo">
        <a href="/">
            <img src="<?php echo htmlentities(get_file_path($configuration['logo'])); ?>" alt="">
        </a>
    </div>
    <div class="HomeNavigation_nav">
        <ul>
            <?php if(!(empty($nav) || (($nav instanceof \think\Collection || $nav instanceof \think\Paginator ) && $nav->isEmpty()))): if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo url($val['url_value']); if($val['params'] != ''): ?>?<?php echo htmlentities($val['params']); ?><?php endif; ?>">
                    <?php echo htmlentities($val['title']); ?>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="show_right">
    <div class="banner_n">
        <div class="head_img">
            <img src="/static/index/image/Other/banner_n.png" alt="">
            <span><?php echo htmlentities($now_nav['title']); ?></span>
        </div>
        <div class="main">
            <div class="locat">
                当前位置：<a href="<?php echo url('index/index/index'); ?>">鹿角巷官网</a> >
                <a href="<?php echo url($now_nav['url_value']); if($now_nav['params'] != ''): ?>?<?php echo htmlentities($now_nav['params']); ?><?php endif; ?>"><?php echo htmlentities($now_nav['title']); ?></a>
                <?php if(!(empty($details) || (($details instanceof \think\Collection || $details instanceof \think\Paginator ) && $details->isEmpty()))): ?> > 详细 <?php endif; ?>
            </div>
            

<div class="showPic">
    <ul id="pageContent">
        <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
        <li>
            <img src="<?php echo htmlentities(get_file_path($val['img'])); ?>" alt="<?php echo htmlentities($val['alt']); ?>">
            <span><?php echo htmlentities($val['title']); ?></span>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php endif; ?>
    </ul>
    <style type="text/css">
        <!--
        #pages{
            color:#666;
            text-align: center;
            margin-top: 20px;
        }
        #pages span{
            border:1px solid #ddd;
            line-height:1.2;
            margin:0 3px;
            padding:10px 14px;
            color:#ccc;
        }
        #pages span a{
            text-decoration:none;
            color:#333333;
        }
        #pages span:hover{

        }
        #pages strong{
            color:#FF0000;
            padding:0 3px;
            font-weight:bold
        }
        -->
    </style>
    <!-- 分页 -->
    <div class="case_page">
        <?php echo $render; ?>
    </div>
</div>


        </div>
    </div>
    <!--底部-->
<div class="footer">
    成都餐协餐饮管理有限公司@版权所有信息  总部地址：<?php echo htmlentities($configuration['address']); ?>
    <a href="http://www.beian.miit.gov.cn/">蜀ICP备12020698号-13</a>
</div>
</div>


</body>
</html>