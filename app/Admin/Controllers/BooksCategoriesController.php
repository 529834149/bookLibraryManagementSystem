<?php

namespace App\Admin\Controllers;

use App\Models\BooksCategories;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;

class BooksCategoriesController extends AdminController
{

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章分类';
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title($this->title)
            ->body($this->tree());
    }
     /**
     * Make a grid builder.
     *
     * @return Tree
     */
    protected function tree()
    {
        return BooksCategories::tree(function (Tree $tree) {
            $tree->branch(function ($branch) {
                $src = config('admin.upload.host') . '/uploads'.'/' . $branch['logo'] ;
                $logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";
                return "{$branch['id']} - {$branch['title']} $logo";
            });
        });
    }


    // public function index()
    // {
    //     return Admin::content(function (Content $content) {
    //         $content->header('树状模型');
    //         $content->body(Category::tree());
    //     });
    // }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BooksCategories);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('title', '分类标题');
          
        });
        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('order', __('Order'));
        $grid->column('title', __('Title'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(BooksCategories::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('order', __('Order'));
        $show->field('title', __('Title'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
       $form = new Form(new BooksCategories());
        $form->display('id', 'ID');
        $form->select('parent_id','父级分类')->options(BooksCategories::selectOptions());
        $form->text('title','分类标题')->rules('required');
        $form->number('order','排序')->rules('required')->min(1);
        $form->textarea('desc','描述');
        $form->image('logo','标志');
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
