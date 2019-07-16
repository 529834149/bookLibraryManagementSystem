<?php

namespace App\Admin\Controllers;

use App\Models\Member;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
class MemberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户信息';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Member);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('member_id', '唯一标识');
            $filter->like('realname', '姓名');
            $filter->like('identification_card', '身份证号');
        });
       
        $grid->column('member_id', __('ID'));
        //$grid->column('realname', __('真实姓名'));
        //$grid->column('mobile', __('手机号'));
        //$grid->column('email', __('邮箱'));
        ///$grid->column('identification_card', __('身份证'));
        $grid->column('gender',__('性别'))->using(['f' => '女', 'm' => '男']);
       //$grid->column('is_borrowing', __('是否借阅'));
        //$grid->column('return_date', __('归还日期'));
        //$grid->column('is_pay_deposit', __('是否缴纳押金'));
        //$grid->column('deposit', __('押金300'));
        //$grid->column('deduction', __('图书外借每天扣除(1元)'));
        $grid->column('updated_at', __('修改时间'));
        $grid->column('created_at', __('注册时间'));
        $grid->column('realname', '详细信息')->modal('个人信息资料', function ($model) {
            $comments = $model->where('member_id',$model->member_id)->get()->map(function ($comment) {
                return $comment->only(['realname','member_id', 'mobile','email','identification_card', 'created_at']);
            });

            return new Table(['realname','ID', '手机号', '邮箱','身份证','注册时间'], $comments->toArray());
        });
        $grid->actions(function ($actions) {
            //$actions->disableDelete();
            //$actions->disableEdit();
            //$actions->disableView();
            // prepend一个操作
           
            //$actions->prepend('<a href=""><i class="fa fa-paper-plane"></i>借书</a>');
        });
       
        //$grid->column('link')->qrcode();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Member::findOrFail($id));

        $show->field('member_id', __('ID'));
        $show->field('realname', __('真实姓名'));
        $show->field('mobile', __('手机号'));
        $show->field('email', __('邮箱'));
        $show->field('identification_card', __('身份证'));
        $show->field('gender', __('性别'));
       // $show->field('is_borrowing', __('是否借阅'));
        //$show->field('return_date', __('归还日期'));
        //$show->field('is_pay_deposit', __('是否缴纳押金'));
        //$show->field('deposit', __('押金300'));
        //$show->field('deduction', __('图书外借每天扣除(1元)'));
        $show->field('created_at', __('注册时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Member);
        $form->display('member_id', __('唯一标识'));
        $form->text('realname', __('姓名'));
        $form->email('email', __('用户邮箱'))->required();
        $form->radio('gender', '性别')->options(['f' => '女', 'm'=> '男'])->default('n')->required();
        //$form->select('gender', '性别')->options($directors)->required();
        $form->mobile('mobile', __('手机号'))->options(['mask' => '999 9999 9999'])->required();
        $form->text('identification_card', __('身份证号'))->required();
        //$form->radio('is_borrowing', '是否借阅')->options(['y' => '已经借阅', 'n'=> '未借阅'])->default('n')->required();
       // $form->datetime('return_date','归还时间')->format('YYYY-MM-DD HH:mm:ss')->required();
       // $form->number('member_id', __('Member id'))->required();
       // $form->radio('is_pay_deposit', '是否缴纳押金')->options(['y' => '已缴纳', 'n'=> '未缴纳'])->default('n')->required();
       // $form->number('deposit', __('缴纳金额'))->required();
       // $form->number('deduction', __('逾期金额(超过归还日期每天扣除押金2元)'));
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');
       
        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            // $footer->disableReset();
            // // 去掉`提交`按钮
            // $footer->disableSubmit();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();

        });
        return $form;
    }
}
