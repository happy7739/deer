<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2019 广东卓锐软件有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Validate;

/**
 * 奶茶产品验证器
 * @package app\admin\validate
 */
class Product extends Validate
{
    //定义验证规则
    protected $rule = [
        'img|图片'        => 'require',
        'alt|替代文本'    => 'require',
        'title|描述'      => 'require',
    ];

    //定义验证提示
    protected $message = [
        'img.require'   => '请上传图片',
        'alt.require'   => '请填写替代文本',
        'title.require' => '请填写描述',
    ];
}
