<?php
class Controller_Admin_Users_Group_Permission extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Group_Permission::query();

		$pagination = Pagination::forge('users_group_permissions_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_group_permissions'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_group_permissions";
		$this->template->content = View::forge('admin/users/group/permission/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_group_permission'] = Model_Users_Group_Permission::find($id);

		$this->template->title = "Users_group_permission";
		$this->template->content = View::forge('admin/users/group/permission/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Group_Permission::validate('create');

			if ($val->run())
			{
				$users_group_permission = Model_Users_Group_Permission::forge(array(
					'id' => Input::post('id'),
					'group_id' => Input::post('group_id'),
					'perms_id' => Input::post('perms_id'),
					'actions' => Input::post('actions'),
				));

				if ($users_group_permission and $users_group_permission->save())
				{
					Session::set_flash('success', e('Added users_group_permission #'.$users_group_permission->id.'.'));

					Response::redirect('admin/users/group/permission');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_group_permission.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Group_Permissions";
		$this->template->content = View::forge('admin/users/group/permission/create');

	}

	public function action_edit($id = null)
	{
		$users_group_permission = Model_Users_Group_Permission::find($id);
		$val = Model_Users_Group_Permission::validate('edit');

		if ($val->run())
		{
			$users_group_permission->id = Input::post('id');
			$users_group_permission->group_id = Input::post('group_id');
			$users_group_permission->perms_id = Input::post('perms_id');
			$users_group_permission->actions = Input::post('actions');

			if ($users_group_permission->save())
			{
				Session::set_flash('success', e('Updated users_group_permission #' . $id));

				Response::redirect('admin/users/group/permission');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_group_permission #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_group_permission->id = $val->validated('id');
				$users_group_permission->group_id = $val->validated('group_id');
				$users_group_permission->perms_id = $val->validated('perms_id');
				$users_group_permission->actions = $val->validated('actions');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_group_permission', $users_group_permission, false);
		}

		$this->template->title = "Users_group_permissions";
		$this->template->content = View::forge('admin/users/group/permission/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_group_permission = Model_Users_Group_Permission::find($id))
		{
			$users_group_permission->delete();

			Session::set_flash('success', e('Deleted users_group_permission #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_group_permission #'.$id));
		}

		Response::redirect('admin/users/group/permission');

	}

}
