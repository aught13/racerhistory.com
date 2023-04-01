<?php

class Controller_Admin_User extends Controller_Admin {

    public function action_index() {
        $query = \Model\Auth_User::query()->related(['metadata', 'group']);

        $pagination = \Pagination::forge('users_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['users'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "All Users";
        $this->template->content = \View::forge('admin/user/index', $data);
    }

    public function action_view($id = null) {
        $data['user'] = \Auth_User::find($id, ['realated' => ['group', 'metadata']]);

        $this->template->title = "User";
        $this->template->content = View::forge('admin/user/view', $data);
    }

    public function action_register() {
        // is registration enabled?
        if (!Config::get('application.user.registration', false)) {
            // inform the user registration is not possible
            Session::set_flash('error', 'login.registation-not-enabled');

            // and go back to the previous page (or the homepage)
            Response::redirect_back();
        }

        // create the registration fieldset
        $form = Fieldset::forge('registerform');

        // add a csrf token to prevent CSRF attacks
        $form->form()->add_csrf();

        // and populate the form with the model properties
        $form->add_model('Model\\Auth_User');

        // add the fullname field, it's a profile property, not a user property
        $form->add_after('fullname', 'Full Name', array(), array(), 'username')->add_rule('required');

        // add a password confirmation field
        $form->add_after('confirm', 'Confirm Password', array('type' => 'password'), array(), 'password')->add_rule('required');

        // make sure the password is required
        $form->field('password')->add_rule('required');

        // and new users are not allowed to select the group they're in (duh!)
        $form->disable('group_id');

        // since it's not on the form, make sure validation doesn't trip on its absence
        $form->field('group_id')->delete_rule('required')->delete_rule('is_numeric');

        $form->add('submit', '', ['type' => 'submit', 'value' => 'Create', 'class' => 'btn medium primary']);

        // was the registration form posted?
        if (Input::method() == 'POST') {
            // validate the input
            $form->validation()->run();

            // if validated, create the user
            if (!$form->validation()->error()) {
                try {
                    // call Auth to create this user
                    $created = \Auth::create_user(
                                    $form->validated('username'),
                                    $form->validated('password'),
                                    $form->validated('email'),
                                    Config::get('application.user.default_group', 1),
                                    ['fullname' => $form->validated('fullname'),
                                ]
                    );

                    // if a user was created succesfully
                    if ($created) {
                        // inform the user
                        Session::set_flash('success', e('Account Created'));

                        // and go back to the previous page, or show the
                        // application dashboard if we don't have any
                        Response::redirect_back('auth/user');
                    } else {
                        // oops, creating a new user failed?
                        Session::set_flash('error', 'Didn\'t work');
                    }
                }

                // catch exceptions from the create_user() call
                catch (SimpleUserUpdateException $e) {
                    // duplicate email address
                    if ($e->getCode() == 2) {
                        \Session::set_flash('error', e('Email already exists'));
                    }

                    // duplicate username
                    elseif ($e->getCode() == 3) {
                        \Session::set_flash('error', e('Username already exists'));
                    }

                    // this can't happen, but you'll never know...
                    else {
                        \Session::set_flash('error', $e->getMessage());
                    }
                }
            }

            // validation failed, repopulate the form from the posted data
            $form->repopulate();
        }

        // pass the fieldset to the form, and display the new user registration view
        $this->template->title = 'Create User';
        $this->template->set('content', $form->build(), false);
    }

    public function action_edit($id = null) {
        $user = Model\Auth_User::find($id, ['related' => ['metadata']]);

        // create the registration fieldset
        $form = Fieldset::forge('editform');

        // add a csrf token to prevent CSRF attacks
        $form->form()->add_csrf();

        // and populate the form with the model properties
        $form->add_model('Model\\Auth_User');

        // add the fullname field, it's a profile property, not a user property
        $form->add_after('fullname', 'Full Name', [], [], 'username')->add_rule('required');

        // password changes are a seperate function

        $form->disable('password');
        $form->field('password')->delete_rule('min_length')->delete_rule('match_field');

        $form->add('submit', '', ['type' => 'submit', 'value' => 'Update', 'class' => 'btn medium primary']);

        // cannot change username

        $form->field('username')->set_attribute('type', 'hidden');

        $form->field('group_id')->set_options([1 => 'Banned', 2 => 'Guest', 3 => 'User', 4 => 'Moderator', 5 => 'Administrator', 6 => 'Owner']);

        $form->populate($user);

        // was the registration form posted?
        if (Input::method() == 'POST') {
            // validate the input
            $form->validation()->run();

            // if validated, create the user
            if (!$form->validation()->error()) {
                try {
                    // call Auth to update this user
                    $created = Auth::update_user(
                                    [
                                        'email' => $form->validated('email'),
                                        'group_id' => $form->validated('group_id'),
                                        'fullname' => $form->validated('fullname'),
                                    ],
                                    $form->validated('username')
                    );

                    // if a user was updated succesfully
                    if ($created) {
                        // inform the user
                        Session::set_flash('success', e('Account Updated'));

                        // and go back to the previous page, or show the
                        // application dashboard if we don't have any
                            \Response::redirect_back('admin/user');
                    } else {
                        // oops, updating a user failed?
                        Session::set_flash('error', e('Account Update failed'));
                    }
                }

                // catch exceptions from the create_user() call
                catch (SimpleUserUpdateException $e) {
                    // duplicate email address
                    if ($e->getCode() == 2) {
                        Session::set_flash('error', e('login.email-already-exists'));
                    }

                    // duplicate username
                    elseif ($e->getCode() == 3) {
                        Session::set_flash('error', e('login.username-already-exists'));
                    }

                    // this can't happen, but you'll never know...
                    else {
                        Session::set_flash('error', e('Odd'));
                    }
                }
            }

            // validation failed, repopulate the form from the posted data
            $form->repopulate();
            Session::set_flash('error', e($form->validation()->error()));
        }

        // pass the fieldset to the form, and display the new user registration view
        $this->template->title = 'Edit User';
        $this->template->set('content', $form->build(), false);
    }

    public function action_delete($id = null) {
        if ($user = Model_User::find($id)) {
            $user->delete();

            Session::set_flash('success', e('Deleted user #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete user #' . $id));
        }

        \Response::redirect('admin/user');
    }

    public function action_password($id = null) {
        $user = Model\Auth_User::find($id);

        // create the registration fieldset
        $form = Fieldset::forge('passwordform');

        // add a csrf token to prevent CSRF attacks
        $form->form()->add_csrf();

        // not changing username but needed for password change
        $form->add('username', '', ['type' => 'hidden']);

        // add Old Passowrd field - Must enter current password
        $form->add('oldpassword', 'Old Password', ['type' => 'password'], [['required']]);

        // add New password field
        $form->add('newpassword', 'New Password', ['type' => 'password'], [['required'], ['min_length', 8]]);

        // add a password confirmation field for new password
        $form->add('confirm', 'Confirm New Password', ['type' => 'password'], [['required'], ['match_field', 'newpassword']]);

        // add an action button
        $form->add('submit', '', ['type' => 'submit', 'value' => 'Update', 'class' => 'btn medium primary']);

        // populate the username field
        $form->field('username')->set_value($user['username']);

        // was the registration form posted?
        if (Input::method() == 'POST') {
            // validate the input
            $form->validation()->run();

            // if validated, create the user
            if (!$form->validation()->error()) {
                try {
                    // call Auth to update this user
                    $created = \Auth::change_password($form->validated('oldpassword'), $form->validated('newpassword'), $form->validated('username'));

                    // if a user was updated succesfully
                    if ($created) {
                        // inform the user
                        Session::set_flash('success', 'Account Updated');

                        // and go back to the previous page, or show the
                        // application dashboard if we don't have any
                        Response::redirect_back('admin/user');
                    } else {
                        // oops, updating a user failed?
                        Session::set_flash('error', 'Account Update failed');
                    }
                }

                // catch exceptions from the change_password() call
                catch (SimpleUserUpdateException $e) {

                    Session::set_flash('error', ($e));
                }
            }

            // validation failed, repopulate the form from the posted data
            $form->repopulate();
            Session::set_flash('error', $form->show_errors());
        }

        // pass the fieldset to the form, and display the new user registration view
        $this->template->title = 'Change Password';
        $this->template->set('content', $form->build(), false);
    }

}
