<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ajax
 *
 * @author patrick
 */
class Controller_Ajax extends Controller_Rest
{

    public function before()
    {
        parent::before();

        if (Request::active()->controller !== 'Controller_Axax') {
            if (Auth::check()) {
                $admin_group_id = Config::get(
                    'auth.driver', 
                    'Simpleauth') == 'Ormauth' ? 6 : 100;
                if (!Auth::member($admin_group_id)) {
                    Session::set_flash(
                        'error',
                        e('You don\'t have access to the admin panel'));
                    Response::redirect('/');
                }
            } else {
                Response::redirect('admin/login');
            }
        }
    }
}
