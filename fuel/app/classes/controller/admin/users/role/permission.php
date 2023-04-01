<?php
class Controller_Admin_Users_Role_Permission extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Role_Permission::query();

		$pagination = Pagination::forge('users_role_permissions_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_role_permissions'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_role_permissions";
		$this->template->content = View::forge('admin/users/role/permission/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_role_permission'] = Model_Users_Role_Permission::find($id);

		$this->template->title = "Users_role_permission";
		$this->template->content = View::forge('admin/users/role/permission/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Role_Permission::validate('create');

			if ($val->run())
			{
				$users_role_permission = Model_Users_Role_Permission::forge(array(
					'id' => Input::post('id'),
					'role_id' => Input::post('role_id'),
					'perms_id' => Input::post('perms_id'),
					'actions' => Input::post('actions'),
				));

				if ($users_role_permission and $users_role_permission->save())
				{
					Session::set_flash('success', e('Added users_role_permission #'.$users_role_permission->id.'.'));

					Response::redirect('admin/users/role/permission');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_role_permission.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Role_Permissions";
		$this->template->content = View::forge('admin/users/role/permission/create');

	}

	public function action_edit($id = null)
	{
		$users_role_permission = Model_Users_Role_Permission::find($id);
		$val = Model_Users_Role_Permission::validate('edit');

		if ($val->run())
		{
			$users_role_permission->id = Input::post('id');
			$users_role_permission->role_id = Input::post('role_id');
			$users_role_permission->perms_id = Input::post('perms_id');
			$users_role_permission->actions = Input::post('actions');

			if ($users_role_permission->save())
			{
				Session::set_flash('success', e('Updated users_role_permission #' . $id));

				Response::redirect('admin/users/role/permission');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_role_permission #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_role_permission->id = $val->validated('id');
				$users_role_permission->role_id = $val->validated('role_id');
				$users_role_permission->perms_id = $val->validated('perms_id');
				$users_role_permission->actions = $val->validated('actions');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_role_permission', $users_role_permission, false);
		}

		$this->template->title = "Users_role_permissions";
		$this->template->content = View::forge('admin/users/role/permission/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_role_permission = Model_Users_Role_Permission::find($id))
		{
			$users_role_permission->delete();

			Session::set_flash('success', e('Deleted users_role_permission #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_role_permission #'.$id));
		}

		Response::redirect('admin/users/role/permission');

	}

}
