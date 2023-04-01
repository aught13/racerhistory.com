<?php
class Controller_Admin_Users_Group extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Group::query();

		$pagination = Pagination::forge('users_groups_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_groups'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_groups";
		$this->template->content = View::forge('admin/users/group/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_group'] = Model_Users_Group::find($id);

		$this->template->title = "Users_group";
		$this->template->content = View::forge('admin/users/group/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Group::validate('create');

			if ($val->run())
			{
				$users_group = Model_Users_Group::forge(array(
					'id' => Input::post('id'),
					'name' => Input::post('name'),
					'user_id' => Input::post('user_id'),
				));

				if ($users_group and $users_group->save())
				{
					Session::set_flash('success', e('Added users_group #'.$users_group->id.'.'));

					Response::redirect('admin/users/group');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_group.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Groups";
		$this->template->content = View::forge('admin/users/group/create');

	}

	public function action_edit($id = null)
	{
		$users_group = Model_Users_Group::find($id);
		$val = Model_Users_Group::validate('edit');

		if ($val->run())
		{
			$users_group->id = Input::post('id');
			$users_group->name = Input::post('name');
			$users_group->user_id = Input::post('user_id');

			if ($users_group->save())
			{
				Session::set_flash('success', e('Updated users_group #' . $id));

				Response::redirect('admin/users/group');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_group #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_group->id = $val->validated('id');
				$users_group->name = $val->validated('name');
				$users_group->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_group', $users_group, false);
		}

		$this->template->title = "Users_groups";
		$this->template->content = View::forge('admin/users/group/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_group = Model_Users_Group::find($id))
		{
			$users_group->delete();

			Session::set_flash('success', e('Deleted users_group #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_group #'.$id));
		}

		Response::redirect('admin/users/group');

	}

}
