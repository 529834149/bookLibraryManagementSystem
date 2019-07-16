<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\BooksCategories;
class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->column('article_id', __('文章ID'));
        $grid->column('category_id', __('所在分类'));
        $grid->column('article_title', __('文章标题'));
        $grid->column('article_title_color', __('文章标题颜色'));
        $grid->column('article_summary', __('文章摘要'));
        $grid->column('article_body', __('文章内容'));
        $grid->column('created_at', __('发布时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->column('publish_time', __('推荐时间'));
        $grid->column('is_publish', __('是否推荐'));
        $grid->column('is_del', __('是否删除'));
        $grid->column('ontop', __('是否置顶'));
        $grid->column('click', __('点击数'));
        $grid->column('post_num', __('帖子数量'));
        $grid->column('http_url', __('转载原链接'));
        $grid->column('is_reproduce', __('是否转载'));
        $grid->column('keyword', __('关键字'));
        $grid->column('tags', __('标签'));
        $grid->column('author', __('作者'));
        $grid->column('operation_id', __('操作者'));
        $grid->column('last_post_time', __('最后评论时间'));
        $grid->column('is_first_img', __('是否有首图'));
        $grid->column('image', __('首图地址'));

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
        $show = new Show(Article::findOrFail($id));

        $show->field('article_id', __('文章ID'));
        $show->field('category_id', __('所在分类'));
        $show->field('article_title', __('文章标题'));
        $show->field('article_title_color', __('文章标题颜色'));
        $show->field('article_summary', __('文章摘要'));
        $show->field('article_body', __('文章内容'));
        $show->field('created_at', __('发布时间'));
        $show->field('updated_at', __('修改时间'));
        $show->field('publish_time', __('推荐时间'));
        $show->field('is_publish', __('是否推荐'));
        $show->field('is_del', __('是否删除'));
        $show->field('ontop', __('是否置顶'));
        $show->field('click', __('点击数'));
        $show->field('post_num', __('帖子数量'));
        $show->field('http_url', __('转载原链接'));
        $show->field('is_reproduce', __('是否转载'));
        $show->field('keyword', __('关键字'));
        $show->field('tags', __('标签'));
        $show->field('author', __('作者'));
        $show->field('operation_id', __('操作者'));
        $show->field('last_post_time', __('最后评论时间'));
        $show->field('is_first_img', __('是否有首图'));
        $show->field('image', __('首图地址'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);
        $form->select('category_id','文章分类')->options(BooksCategories::selectOptions());
       // $form->number('category_id', __('Category id'));
        $form->text('article_title', __('文章标题'));
        $form->color('article_title_color', __('文章标题颜色'))->default('#ccc');
        $form->textarea('article_summary', __('文章摘要'));
        $form->editor('article_body', __('文章内容'));
        // $form->datetime('publish_time', __('Publish time'))->default(date('Y-m-d H:i:s'));
        // $form->text('is_publish', __('Is publish'))->default('n');
        // $form->text('is_del', __('Is del'));
        // $form->text('ontop', __('Ontop'))->default('n');
        // $form->number('click', __('Click'));
        // $form->number('post_num', __('Post num'));
        // $form->text('http_url', __('Http url'));
        // $form->text('is_reproduce', __('Is reproduce'));
        // $form->text('keyword', __('Keyword'));
        // $form->text('tags', __('Tags'));
        // $form->text('author', __('Author'));
        // $form->number('operation_id', __('Operation id'));
        // $form->datetime('last_post_time', __('Last post time'))->default(date('Y-m-d H:i:s'));
        // $form->text('is_first_img', __('Is first img'))->default('n');
        // $form->image('image', __('Image'));

        return $form;
    }
}
