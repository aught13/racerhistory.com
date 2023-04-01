<?php
class Controller_Admin_Users_Permission extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Permission::query();

		$pagination = Pagination::forge('users_permissions_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_permissions'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_permissions";
		$this->template->content = View::forge('admin/users/permission/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_permission'] = Model_Users_Permission::find($id);

		$this->template->title = "Users_permission";
		$this->template->content = View::forge('admin/users/permission/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Permission::validate('create');

			if ($val->run())
			{
				$users_permission = Model_Users_Permission::forge(array(
					'id' => Input::post('id'),
					'area' => Input::post('area'),
					'permission' => Input::post('permission'),
					'description' => Input::post('description'),
					'actions' => Input::post('actions'),
					'user_id' => Input::post('user_id'),
				));

				if ($users_permission and $users_permission->save())
				{
					Session::set_flash('success', e('Added users_permission #'.$users_permission->id.'.'));

					Response::redirect('admin/users/permission');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_permission.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Permissions";
		$this->template->content = View::forge('admin/users/permission/create');

	}

	public function action_edit($id = null)
	{
		$users_permission = Model_Users_Permission::find($id);
		$val = Model_Users_Permission::validate('edit');

		if ($val->run())
		{
			$users_permission->id = Input::post('id');
			$users_permission->area = Input::post('area');
			$users_permission->permission = Input::post('permission');
			$users_permission->description = Input::post('description');
			$users_permission->actions = Input::post('actions');
			$users_permission->user_id = Input::post('user_id');

			if ($users_permission->save())
			{
				Session::set_flash('success', e('Updated users_permission #' . $id));

				Response::redirect('admin/users/permission');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_permission #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_permission->id = $val->validated('id');
				$users_permission->area = $val->validated('area');
				$users_permission->permission = $val->validated('permission');
				$users_permission->description = $val->validated('description');
				$users_permission->actions = $val->validated('actions');
				$users_permission->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_permission', $users_permission, false);
		}

		$this->template->title = "Users_permissions";
		$this->template->content = View::forge('admin/users/permission/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_permission = Model_Users_Permission::find($id))
		{
			$users_permission->delete();

			Session::set_flash('success', e('Deleted users_permission #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_permission #'.$id));
		}

		Response::redirect('admin/users/permission');

	}

}
