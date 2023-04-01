<?php
class Controller_Admin_Users_User_Role extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_User_Role::query();

		$pagination = Pagination::forge('users_user_roles_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_user_roles'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_user_roles";
		$this->template->content = View::forge('admin/users/user/role/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_user_role'] = Model_Users_User_Role::find($id);

		$this->template->title = "Users_user_role";
		$this->template->content = View::forge('admin/users/user/role/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_User_Role::validate('create');

			if ($val->run())
			{
				$users_user_role = Model_Users_User_Role::forge(array(
					'user_id' => Input::post('user_id'),
					'role_id' => Input::post('role_id'),
				));

				if ($users_user_role and $users_user_role->save())
				{
					Session::set_flash('success', e('Added users_user_role #'.$users_user_role->id.'.'));

					Response::redirect('admin/users/user/role');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_user_role.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_User_Roles";
		$this->template->content = View::forge('admin/users/user/role/create');

	}

	public function action_edit($id = null)
	{
		$users_user_role = Model_Users_User_Role::find($id);
		$val = Model_Users_User_Role::validate('edit');

		if ($val->run())
		{
			$users_user_role->user_id = Input::post('user_id');
			$users_user_role->role_id = Input::post('role_id');

			if ($users_user_role->save())
			{
				Session::set_flash('success', e('Updated users_user_role #' . $id));

				Response::redirect('admin/users/user/role');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_user_role #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_user_role->user_id = $val->validated('user_id');
				$users_user_role->role_id = $val->validated('role_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_user_role', $users_user_role, false);
		}

		$this->template->title = "Users_user_roles";
		$this->template->content = View::forge('admin/users/user/role/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_user_role = Model_Users_User_Role::find($id))
		{
			$users_user_role->delete();

			Session::set_flash('success', e('Deleted users_user_role #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_user_role #'.$id));
		}

		Response::redirect('admin/users/user/role');

	}

}
