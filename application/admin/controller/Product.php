<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2019 广东卓锐软件有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\common\builder\ZBuilder;
use app\admin\model\Product as ProductModel;
use app\admin\model\Attachment as AttachmentModel;

/**
 * 奶茶产品控制器
 * @package app\admin\controller
 */
class Product extends Admin
{
    /**
     * 单页列表
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function index()
    {
        // 查询
        $map = $this->getMap();
        // 排序
        $order = $this->getOrder();
        // 数据列表
        $data_list = ProductModel::where($map)->order($order)->paginate();
        foreach ($data_list as $key => &$val) {
            $img = AttachmentModel::where(['id' => $val['img']])->field('path')->find();
            $val['type'] = '<div class="js-gallery"><img class="image" title="点击查看大图" data-original="' . PUBLIC_PATH . $img['path'] . '" src="' . PUBLIC_PATH . $img['path'] . '"></div>';
        }

        // 使用ZBuilder快速创建数据表格
        return ZBuilder::make('table')
            ->setTableName('home_product')
            ->addColumns([ // 批量添加数据列
                ['id', 'ID'],
                ['type', '图片'],
                ['title', '描述', 'text.edit'],
                ['sort', '排序', 'text.edit'],
                ['create_time', '创建时间', 'datetime'],
                ['status', '状态', 'switch'],
                ['is_tui', '首页展示', 'switch'],
                ['right_button', '操作', 'btn']
            ])
            ->addTopButtons('add,enable,disable,delete')// 批量添加顶部按钮
            ->addRightButtons(['edit', 'delete' => ['data-tips' => '删除后无法恢复。']])// 批量添加右侧按钮
            ->addOrder('id,sort,status,is_tui')
            ->setRowList($data_list)// 设置表格数据
            ->addValidate('Table', 'sort')
            ->fetch(); // 渲染模板


    }

    /**
     * 新增
     * @return mixed
     * @throws \think\Exception
     */
    public function add()
    {
        // 保存数据
        if ($this->request->isPost()) {
            // 表单数据
            $data = $this->request->post();

            // 验证
            $result = $this->validate($data, 'Product');
            if(true !== $result) $this->error($result);

            if ($page = ProductModel::create($data)) {
                // 记录行为
                action_log('product_add', 'admin_product', $page['id'], UID, "添加");
                $this->success('新增成功', 'index');
            } else {
                $this->error('新增失败');
            }
        }

        // 显示添加页面
        return ZBuilder::make('form')
            ->addFormItems([
                ['image', 'img', '图片'],
                ['text', 'title', '描述'],
                ['text', 'alt', '替代文本'],
                ['number', 'sort', '排序','',0],
                ['radio', 'status', '立即启用', '', ['否', '是'], 1],
                ['radio', 'is_tui', '首页展示', '', ['否', '是'], 0],
            ])
            ->fetch();
    }

    /**
     * 编辑
     * @param null $id 单页id
     * @return mixed
     * @throws \think\Exception
     */
    public function edit($id = null)
    {
        if ($id === null) $this->error('缺少参数');

        // 保存数据
        if ($this->request->isPost()) {
            // 表单数据
            $data = $this->request->post();

            // 验证
            $result = $this->validate($data, 'Product');
            if(true !== $result) $this->error($result);

            if (ProductModel::update($data)) {
                // 记录行为
                action_log('product_edit', 'admin_product', $id, UID, "编辑");
                $this->success('编辑成功', 'index');
            } else {
                $this->error('编辑失败');
            }
        }

        $info = ProductModel::get($id);

        // 显示编辑页面
        return ZBuilder::make('form')
            ->addFormItems([
                ['hidden', 'id'],
                ['image', 'img', '图片'],
                ['text', 'title', '描述'],
                ['text', 'alt', '替代文本'],
                ['number', 'sort', '排序'],
                ['radio', 'is_tui', '首页展示', '', ['否', '是']],
                ['radio', 'status', '立即启用', '', ['否', '是']]
            ])
            ->setFormdata($info)
            ->fetch();
    }

    /**
     * 删除单页
     * @param array $record 行为日志
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function delete($record = [])
    {
        return $this->setStatus('delete');
    }

    /**
     * 启用单页
     * @param array $record 行为日志
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function enable($record = [])
    {
        return $this->setStatus('enable');
    }

    /**
     * 禁用单页
     * @param array $record 行为日志
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function disable($record = [])
    {
        return $this->setStatus('disable');
    }

    /**
     * 设置单页状态：删除、禁用、启用
     * @param string $type 类型：delete/enable/disable
     * @param array $record
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function setStatus($type = '', $record = [])
    {
        $ids        = $this->request->isPost() ? input('post.ids/a') : input('param.ids');
        $page_title = ProductModel::where('id', 'in', $ids)->column('title');
        return parent::setStatus($type, ['page_'.$type, 'admin_product', 0, UID, implode('、', $page_title)]);
    }

    /**
     * 快速编辑
     * @param array $record 行为日志
     * @return mixed
     */
    public function quickEdit($record = [])
    {
        $id      = input('post.pk', '');
        $field   = input('post.name', '');
        $value   = input('post.value', '');
        $page    = ProductModel::where('id', $id)->value($field);
        $details = '字段(' . $field . ')，原值(' . $page . ')，新值：(' . $value . ')';
        return parent::quickEdit(['product_edit', 'admin_product', $id, UID, $details]);
    }
}
