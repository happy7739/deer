<?php

namespace app\index\validate;

use think\Validate;
/*
 * 联系我们/在线留言验证
 * */
class Aboutus extends Validate{
    /**
     * 当前验证规则
     * @var array
     */
    protected $rule = [
       // '字段名(表单提交的name值一致)'=>'验证规则'
        'name'      =>  'require|chsDash|length:0,50|token',
        'mobile'     =>  'require|mobile',
        'email'     =>  'email',
        'content'   =>  'chsDash|length:0,5000',
    ];
    /**
     * 验证提示信息
     * @var array
     */
    protected $message = [
        'name.require'           => '姓名不能为空',
        'name.chsDash'           => '姓名只能输入汉字、字母、数字和下划线_及破折号-',
        'name.length'            => '姓名的最大长度50',
        'mobile.require'         => '电话不能为空',
        'mobile.mobile'          => '电话无效',
        'email.email'            => '邮箱格式不正确',
        'content.length'         => '留言最大长度5000',
    ];
}