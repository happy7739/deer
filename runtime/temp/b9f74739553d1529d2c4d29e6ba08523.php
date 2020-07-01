<?php /*a:4:{s:57:"F:\Project\deer\application\index\view\aboutus\index.html";i:1590719612;s:55:"F:\Project\deer\application\index\view\public\base.html";i:1590561763;s:54:"F:\Project\deer\application\index\view\public\nav.html";i:1590567715;s:57:"F:\Project\deer\application\index\view\public\footer.html";i:1590568555;}*/ ?>
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
    
<style>
    #content{
        margin-left: 21px;
    }
</style>
<link rel="stylesheet" href="/static/index/css/normalize.css">
<link rel="stylesheet" href="/static/index/css/set2.css">
<script src="/static/index/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/static/index/js/jquery.form.js"></script>
<script src="/static/index/js/layer/layer.js"></script>


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
            
<div>
    <p>如果您对鹿角巷奶茶加盟事业感兴趣，请在下方留言，总部会在收到留言24小时给予回电，让我们为您更好的介绍鹿角巷加盟的相关信息，请保持手机畅通，谢谢！</p>
    <p>鹿角巷联系400电话：<?php echo htmlentities($configuration['tel']); ?></p>
    <p>鹿角巷手机联系方式：<?php echo htmlentities($configuration['mobile']); ?></p>
    <form method="post" class="form-horizontal" action="<?php echo url('index/Aboutus/insert_message'); ?>" id="addForm">
    <div class="htmleaf-container">
        <section class="jq22-content bgcolor-3" >
                <?php echo token(); ?>
                <span class="input input--manami">
					<input class="input__field input__field--manami" type="text" id="name" name="name" />
					<label class="input__label input__label--manami" for="name">
						<span class="input__label-content input__label-content--manami">您的姓名</span>
					</label>
				</span>
                <span class="input input--manami">
					<input class="input__field input__field--manami" type="tel" id="mobile" name="mobile" />
					<label class="input__label input__label--manami" for="mobile">
						<span class="input__label-content input__label-content--manami">联系电话</span>
					</label>
				</span>
                <span class="input input--manami">
					<input class="input__field input__field--manami" type="email" id="email" name="email"/>
					<label class="input__label input__label--manami" for="email">
						<span class="input__label-content input__label-content--manami">邮箱地址</span>
					</label>
				</span>
                <textarea class="textarea" name="content" id="content" placeholder="我对【鹿角巷奶茶】挺感兴趣，请发下资料给我！"></textarea>

        </section>
    </div>
    <p><button class="button" type="submit">提交</button></p>
    </form>
</div>

        </div>
    </div>
    <!--底部-->
<div class="footer">
    成都餐协餐饮管理有限公司@版权所有信息  总部地址：<?php echo htmlentities($configuration['address']); ?>
    <a href="http://www.beian.miit.gov.cn/">蜀ICP备12020698号-13</a>
</div>
</div>


<script src="/static/index/js/classie.js"></script>
<script>
    /*<====================================input样式==========================================>*/
    (function () {
        if (!String.prototype.trim) {
            (function () {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function () {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [ ].slice.call(document.querySelectorAll('input.input__field')).forEach(function (inputEl) {
            // in case the input is already filled..
            if (inputEl.value.trim() !== '') {
                classie.add(inputEl.parentNode, 'input--filled');
            }

            // events:
            inputEl.addEventListener('focus', onInputFocus);
            inputEl.addEventListener('blur', onInputBlur);
        });

        function onInputFocus(ev) {
            classie.add(ev.target.parentNode, 'input--filled');
        }

        function onInputBlur(ev) {
            if (ev.target.value.trim() === '') {
                classie.remove(ev.target.parentNode, 'input--filled');
            }
        }
    })();
    /*<====================================表单提交==========================================>*/
    $('#addForm').ajaxForm({
        //前端验证
        beforeSubmit:function () {
            if($.trim($('#name').val()) == ''){
                layer.msg('姓名不能为空',{icon: 5,time:1500,shade:0.5});
                return false;
            }
            if($.trim($('#mobile').val()) == ''){
                layer.msg('电话不能为空',{icon: 5,time:1500,shade:0.5});
                return false;
            }
        },
        //提交到后台后，和后台进行交互 ，处理结果
        success:function (res){
            //console.log(res);
            if(res.code == 1){
                layer.alert('我们会尽快联系你的，请保持手机畅通！', {
                    icon: 1,    //图标
                    title:res.msg,  //标题
                    closeBtn: 1,    // 是否显示关闭按钮
                    anim: 4, //动画类型
                    move: false,//是否可以拖动，默认可以拖动
                    btn: ['确定'], //按钮，默认有一个确定按钮
                    yes:function(){     //确定按钮
                        history.go(0);
                    },
                    cancel: function(){     // 右上角关闭按钮的点击事件
                        history.go(0);
                    }
                });
            }else{
                layer.alert('请稍后再试！', {
                    icon: 5,    //图标
                    title:res.msg,  //标题
                    closeBtn: 1,    // 是否显示关闭按钮
                    anim: 4, //动画类型
                    move: false,//是否可以拖动，默认可以拖动
                    btn: ['确定'], //按钮
                    btnAlign: 'r',  //按钮右对齐。默认值，不用设置
                    shade: [0.8,'#393D49',true],    //遮罩层
                    shadeClose: true,   //是否点击遮罩关闭,默认:false
                    yes:function(){     //确定按钮
                        console.log('√');
                        history.go(0);
                        //return false;   //开启该代码可禁止点击该按钮关闭
                    },
                    cancel: function(){     // 右上角关闭按钮的点击事件
                        console.log('X');
                        history.go(0);
                        //return false;   //开启该代码可禁止点击该按钮关闭
                    },
                    end: function () {   //层销毁后触发的回调
                        console.log('over');
                        history.go(0);
                    }
                });
            }
        },
        //其他错误信息
        error:function () {
            layer.msg("非法操作",{icon: 5,time:1500,shade:0.5});
            return false;
        },
    })
</script>

</body>
</html>