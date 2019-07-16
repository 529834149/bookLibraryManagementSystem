<?php

namespace App\Admin\Controllers;

use App\Models\BooksBorrowing;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BooksBorrowingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\BooksBorrowing';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BooksBorrowing);
        
        $grid->column('id', __('Id'));
        $grid->column('books_information_number', __('Books information number'));
        $grid->column('books_member_card_number', __('Books member card number'));
        $grid->column('created_at', __('Created at'));
        
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
        $show = new Show(BooksBorrowing::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('books_information_number', __('Books information number'));
        $show->field('books_member_card_number', __('Books member card number'));
        $show->field('created_at', __('Created at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BooksBorrowing);

        $form->number('books_information_number', __('Books information number'));
        $form->number('books_member_card_number', __('Books member card number'));

        return $form;
    }
}
