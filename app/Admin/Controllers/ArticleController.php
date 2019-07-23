<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Comments;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Models\BooksCategories;
use Encore\Admin\Widgets\Table;
class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new Article);

        $grid->column('id', __('文章ID'));
        // $grid->column('category_id', __('所在分类'))->display(function($category_id){
        //     $cate_name = BooksCategories::find($category_id);
        //     return $cate_name['title'];
        // });
        $grid->column('category.title', __('所在分类'));
        // $grid->article_title('title', '标题')->display(function($article_title) {
        //     return str_limit($article_title, 10, '...');
        // });
        $grid->column('article_title', '文章标题(评论列表)')->modal('最新评论', function ($model) {
            $comments = $model->comments()->orderBy('created_at','desc')->get()->map(function ($comment) {
                return $comment->only(['id', 'content', 'created_at']);
            });
            return new Table(['ID', '内容', '发布时间'], $comments->toArray());
        });
        // $grid->column('article_title', __('文章标题'))->display(function($article_title){

        //     return '<span title="'.$article_title.'">'.mb_substr($article_title, 0, 5, 'utf8').'...'.'</span>';
        // });
        //$grid->column('article_title_color', __('文章标题颜色'));
        //$grid->column('article_summary', __('文章摘要'));
       // $grid->column('article_body', __('文章内容'));
        $grid->column('created_at', __('发布时间'));
        //$grid->column('updated_at', __('修改时间'));
        $grid->column('publish_time', __('推荐时间'));
        $grid->column('is_publish', __('是否推荐'))->editable('select', ['y' => '推荐','n' => '正常']);
        $grid->column('is_del', __('是否删除'))->editable('select', ['y' => '删除','n' => '正常']);
        $grid->column('ontop', __('是否置顶'))->editable('select', ['y' => '置顶','n' => '正常']);
        $grid->column('is_reproduce', __('是否转载'))->editable('select', ['y' => '转载','n' => '正常']);
        $grid->column('click', __('点击数'));
        //$grid->column('post_num', __('帖子数量'));
       // $grid->column('http_url', __('转载原链接'));
        $grid->comments('评论数')->display(function ($comments) {
            $count = count($comments);
            return "<span class='label label-warning'>{$count}</span>";
        });


       // $grid->column('keyword', __('关键字'));
       // $grid->column('tags', __('标签'));
        $grid->column('author', __('作者'));
        //$grid->column('operation_id', __('操作者'));
       // $grid->column('last_post_time', __('最后评论时间'));
        //$grid->column('is_first_img', __('是否有首图'));
        // 添加不存在的字段
       
        $grid->column('image', __('首图地址'))->display(function($picture){
            $path = '/uploads/'.$picture;
            return '<img width="25" src="'.$path.'">';
        });

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

        $show->field('id', __('文章ID'));
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
        $form->display('id', __('唯一标识'));
        $form->select('category_id','文章分类')->options(BooksCategories::selectOptions())->required();
       // $form->number('category_id', __('Category id'));
        $form->text('article_title', __('文章标题'));
        $form->text('author', __('作者'));
        $form->color('article_title_color', __('文章标题颜色'))->default('#ccc');
        $form->textarea('article_summary', __('文章摘要'));
        $form->editor('article_body', __('文章内容'));
        $form->datetime('publish_time', __('推荐时间'))->format('YYYY-MM-DD HH:mm:ss');

        $form->radio('is_publish', __('是否被推荐'))->options(['y' => '推荐', 'n'=> '正常'])->default('n');
        $form->radio('is_del', __('是否删除'))->options(['y' => '删除', 'n'=> '正常'])->default('n');
        $form->radio('is_reproduce', __('是否被推荐'))->options(['y' => '转载', 'n'=> '正常'])->default('n');
        $form->radio('ontop', __('是否置顶'))->options(['y' => '置顶', 'n'=> '正常'])->default('n');
        $form->radio('is_first_img', __('是否有首图'))->options(['y' => '有图', 'n'=> '没有'])->default('n');
        //$form->text('ontop', __('是否置顶'))->default('n');
        $form->number('click', __('点击数'))->min(10);;
        $form->url('http_url', __('原链接'));
        $form->tags('keyword', __('关键字(关键字体系)'));
        $form->tags('tags', __('标签'));
        $form->datetime('last_post_time', __('最后评论时间'))->format('YYYY-MM-DD HH:mm:ss');
        // $form->text('is_first_img', __('Is first img'))->default('n');
        $form->image('image', __('上传首图'));

        return $form;
    }
}
