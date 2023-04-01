<?php
class Controller_Admin_Users_Role extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Role::query();

		$pagination = Pagination::forge('users_roles_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_roles'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_roles";
		$this->template->content = View::forge('admin/users/role/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_role'] = Model_Users_Role::find($id);

		$this->template->title = "Users_role";
		$this->template->content = View::forge('admin/users/role/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Role::validate('create');

			if ($val->run())
			{
				$users_role = Model_Users_Role::forge(array(
					'id' => Input::post('id'),
					'name' => Input::post('name'),
					'filter' => Input::post('filter'),
					'user_id' => Input::post('user_id'),
				));

				if ($users_role and $users_role->save())
				{
					Session::set_flash('success', e('Added users_role #'.$users_role->id.'.'));

					Response::redirect('admin/users/role');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_role.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Roles";
		$this->template->content = View::forge('admin/users/role/create');

	}

	public function action_edit($id = null)
	{
		$users_role = Model_Users_Role::find($id);
		$val = Model_Users_Role::validate('edit');

		if ($val->run())
		{
			$users_role->id = Input::post('id');
			$users_role->name = Input::post('name');
			$users_role->filter = Input::post('filter');
			$users_role->user_id = Input::post('user_id');

			if ($users_role->save())
			{
				Session::set_flash('success', e('Updated users_role #' . $id));

				Response::redirect('admin/users/role');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_role #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_role->id = $val->validated('id');
				$users_role->name = $val->validated('name');
				$users_role->filter = $val->validated('filter');
				$users_role->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_role', $users_role, false);
		}

		$this->template->title = "Users_roles";
		$this->template->content = View::forge('admin/users/role/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_role = Model_Users_Role::find($id))
		{
			$users_role->delete();

			Session::set_flash('success', e('Deleted users_role #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_role #'.$id));
		}

		Response::redirect('admin/users/role');

	}

}
