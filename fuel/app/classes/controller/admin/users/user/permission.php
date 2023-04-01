<?php
class Controller_Admin_Users_User_Permission extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_User_Permission::query();

		$pagination = Pagination::forge('users_user_permissions_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_user_permissions'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_user_permissions";
		$this->template->content = View::forge('admin/users/user/permission/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_user_permission'] = Model_Users_User_Permission::find($id);

		$this->template->title = "Users_user_permission";
		$this->template->content = View::forge('admin/users/user/permission/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_User_Permission::validate('create');

			if ($val->run())
			{
				$users_user_permission = Model_Users_User_Permission::forge(array(
					'id' => Input::post('id'),
					'user_id' => Input::post('user_id'),
					'perms_id' => Input::post('perms_id'),
					'actions' => Input::post('actions'),
				));

				if ($users_user_permission and $users_user_permission->save())
				{
					Session::set_flash('success', e('Added users_user_permission #'.$users_user_permission->id.'.'));

					Response::redirect('admin/users/user/permission');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_user_permission.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_User_Permissions";
		$this->template->content = View::forge('admin/users/user/permission/create');

	}

	public function action_edit($id = null)
	{
		$users_user_permission = Model_Users_User_Permission::find($id);
		$val = Model_Users_User_Permission::validate('edit');

		if ($val->run())
		{
			$users_user_permission->id = Input::post('id');
			$users_user_permission->user_id = Input::post('user_id');
			$users_user_permission->perms_id = Input::post('perms_id');
			$users_user_permission->actions = Input::post('actions');

			if ($users_user_permission->save())
			{
				Session::set_flash('success', e('Updated users_user_permission #' . $id));

				Response::redirect('admin/users/user/permission');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_user_permission #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_user_permission->id = $val->validated('id');
				$users_user_permission->user_id = $val->validated('user_id');
				$users_user_permission->perms_id = $val->validated('perms_id');
				$users_user_permission->actions = $val->validated('actions');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_user_permission', $users_user_permission, false);
		}

		$this->template->title = "Users_user_permissions";
		$this->template->content = View::forge('admin/users/user/permission/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_user_permission = Model_Users_User_Permission::find($id))
		{
			$users_user_permission->delete();

			Session::set_flash('success', e('Deleted users_user_permission #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_user_permission #'.$id));
		}

		Response::redirect('admin/users/user/permission');

	}

}
