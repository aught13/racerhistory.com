<?php
class Controller_Admin_Users_Group_Role extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Group_Role::query();

		$pagination = Pagination::forge('users_group_roles_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_group_roles'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_group_roles";
		$this->template->content = View::forge('admin/users/group/role/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_group_role'] = Model_Users_Group_Role::find($id);

		$this->template->title = "Users_group_role";
		$this->template->content = View::forge('admin/users/group/role/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Group_Role::validate('create');

			if ($val->run())
			{
				$users_group_role = Model_Users_Group_Role::forge(array(
					'group_id' => Input::post('group_id'),
					'role_id' => Input::post('role_id'),
				));

				if ($users_group_role and $users_group_role->save())
				{
					Session::set_flash('success', e('Added users_group_role #'.$users_group_role->id.'.'));

					Response::redirect('admin/users/group/role');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_group_role.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Group_Roles";
		$this->template->content = View::forge('admin/users/group/role/create');

	}

	public function action_edit($id = null)
	{
		$users_group_role = Model_Users_Group_Role::find($id);
		$val = Model_Users_Group_Role::validate('edit');

		if ($val->run())
		{
			$users_group_role->group_id = Input::post('group_id');
			$users_group_role->role_id = Input::post('role_id');

			if ($users_group_role->save())
			{
				Session::set_flash('success', e('Updated users_group_role #' . $id));

				Response::redirect('admin/users/group/role');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_group_role #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_group_role->group_id = $val->validated('group_id');
				$users_group_role->role_id = $val->validated('role_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_group_role', $users_group_role, false);
		}

		$this->template->title = "Users_group_roles";
		$this->template->content = View::forge('admin/users/group/role/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_group_role = Model_Users_Group_Role::find($id))
		{
			$users_group_role->delete();

			Session::set_flash('success', e('Deleted users_group_role #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_group_role #'.$id));
		}

		Response::redirect('admin/users/group/role');

	}

}
