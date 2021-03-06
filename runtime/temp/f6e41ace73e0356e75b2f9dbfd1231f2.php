<?php /*a:4:{s:54:"F:\Project\deer\application\index\view\news\index.html";i:1590562296;s:55:"F:\Project\deer\application\index\view\public\base.html";i:1590561763;s:54:"F:\Project\deer\application\index\view\public\nav.html";i:1590484295;s:57:"F:\Project\deer\application\index\view\public\footer.html";i:1590382130;}*/ ?>
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
            <img src="/static/index/image/logo.png" alt="">
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
            

<!--分页数据-->
<?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): ?>
<div class="newslist" style="margin-bottom: 20px;">
    <ul class="clearfix" id="pageContent">
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
        <li>
            <div class="clearfixli_left">
                <img src="<?php echo htmlentities(get_file_path($val['img'])); ?>" alt="">
            </div>
            <div class="clearfixli_right">
                <h4>
                    <a href="<?php echo url('index/news/index'); ?>?id=<?php echo htmlentities($val['id']); ?>">
                        <?php echo htmlentities($val['title']); ?>
                    </a>
                </h4>
                <h5><?php echo htmlentities($val['time']); ?></h5>
                <div class=newslist_right_con><?php echo htmlentities($val['desc']); ?></div>
            </div>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!-- 分页 -->
    <div class="case_page">
        <?php echo $render; ?>
    </div>
</div>
<?php endif; ?>

<!--渲染详情-->
<?php if(!(empty($details) || (($details instanceof \think\Collection || $details instanceof \think\Paginator ) && $details->isEmpty()))): ?>
<div class="about_con">
    <p style="text-align: center"><?php echo htmlentities($details['title']); ?></p>
    <p style="text-align: center">发布日期：<?php echo htmlentities($details['time']); ?></p>
    <?php echo $details['text']; ?>
    <p><a href="<?php echo url('index/page/index'); ?>?cat=4">相关资讯</a></p>
</div>
<?php endif; ?>


        </div>
    </div>
    <!--底部-->
<div class="footer">
    成都餐协餐饮管理有限公司@版权所有信息  总部地址：成都市青羊区顺城大街248号世界贸易中心Ａ座７楼
    <a href="http://www.beian.miit.gov.cn/">蜀ICP备12020698号-13</a>
</div>
</div>


</body>
</html>