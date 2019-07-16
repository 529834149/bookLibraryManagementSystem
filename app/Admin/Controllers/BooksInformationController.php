<?php

namespace App\Admin\Controllers;

use App\Models\BooksInformation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\BooksCategories;
class BooksInformationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '书籍信息';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BooksInformation);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('book_number', '书籍编号');
            $filter->like('book_title', '书籍名称');
            $filter->like('book_author', '书籍作者');
            $filter->like('press', '书籍出版社');
            $filter->like('categories_id', '分类名称');

        });
        $grid->column('id', __('Id'));
      
          $grid->column('picture', __('书籍首图'))->display(function($picture){
            $path = '/uploads/'.$picture;
            return '<img width="25" src="'.$path.'">';
        });
        $grid->column('book_number', __('书籍编号'));
        $grid->column('book_title', __('书籍名称'));
       // $grid->column('book_author', __('书籍作者'));
        $grid->column('book_author', '书籍作者')->modal('作者简介', function ($model) {
            return $model->book_author_introduction;
            // $comments = $model->comments()->take(10)->get()->map(function ($comment) {
            //     return $comment->only(['id', 'content', 'created_at']);
            // });

            // return new Table(['ID', '内容', '发布时间'], $comments->toArray());
        });
        $grid->column('categories_id', __('所属分类'))->display(function($categories_id){
            $cate = BooksCategories::find(intval($categories_id));
            return '<span style="color:#318DFD">'.$cate['title'].'</span>';
        });
        $grid->column('price', __('书籍原价'))->display(function($price){
            return $price.'元';
        });
        $grid->column('press', __('书籍出版社'));
        //$grid->column('abstract', __('书籍摘要-署名'));
        $grid->column('abstractInfo', '书籍摘要-署名')->modal('书籍摘要-署名', function ($model) {
            return $model->abstract;
        });
        $grid->column('number_of_collections', __('馆藏册数'));
        $grid->column('number_of_Books_in_library', __('在馆册数'));
        $grid->column('storage_location', __('存放位置'));
        $grid->column('borrowed_number', __('被借次数'));

        return $grid;
    }
    public function categories(Request $request)
    {
        $categories = $request->get('q');
        return BooksCategories::where('title', $categories)->get(['id', DB::raw('name as text')]);
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(BooksInformation::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('book_number', __('书籍编号'));
        $show->field('book_title', __('书籍名称'));
        $show->field('book_author', __('书籍作者'));
        $show->field('categories_id', __('所属分类'));
        $show->field('price', __('书籍原价'));
        $show->field('press', __('书籍出版社'));
        $show->field('abstract', __('书籍摘要-署名'));
        $show->field('number_of_collections', __('馆藏册数'));
        $show->field('number_of_Books_in_library', __('在馆册数'));
        $show->field('storage_location', __('存放位置'));
        $show->field('borrowed_number', __('被借次数'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BooksInformation);
        $form->image('picture', __('上传书籍首图'));
        $form->text('book_number', __('书籍编号'));
        $form->text('book_title', __('书籍名称'));
        $form->text('book_author', __('书籍作者'));
        
        $form->textarea('book_author_introduction', __('作者简介'))->rows(10);
        $form->select('categories_id','父级分类')->options(BooksCategories::selectOptions());
        $form->decimal('price', __('书籍原价'));
        $form->text('press', __('书籍出版社'));
        $form->textarea('abstract', __('书籍摘要-署名'));
        $form->number('number_of_collections', __('馆藏册数'));
        $form->text('number_of_Books_in_library', __('在馆册数'));
        $form->text('storage_location', __('存放位置'));
        $form->number('borrowed_number', __('被借次数'));
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
