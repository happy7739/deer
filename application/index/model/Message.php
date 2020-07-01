<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2019 广东卓锐软件有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------

namespace app\index\model;

use think\Model;

/**
 * 关于我们/在线留言模型
 * @package app\index\model
 */
class Message extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $name = 'home_aboutus_message';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    /**
     * 获取当前用户未读消息数量
     * @return int|string
     */
    public static function getMessageCount()
    {
        return self::where(['status' => 0])->count();
    }
}
