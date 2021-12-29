<?php

namespace App\Admin\Controllers;

use App\Models\dagur;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class dagurController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'dagur';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new dagur());

        $grid->column('id', __('Id'));
        $grid->column('nama_Guru', __('Nama_Guru'));
        $grid->column('nomor', __('Nomor'));
        $grid->column('NIP', __('NIP'));
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
        $show = new Show(dagur::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama_Guru', __('Nama_Guru'));
        $show->field('nomor', __('Nomor'));
        $show->field('NIP', __('NIP'));
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
        $form = new Form(new dagur());

        $form->textarea('nama_Guru', __('Nama_Guru'));
        $form->textarea('nomor', __('Nomor'));
        $form->textarea('NIP', __('NIP'));

        return $form;
    }
}
