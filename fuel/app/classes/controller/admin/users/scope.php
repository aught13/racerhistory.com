<?php
class Controller_Admin_Users_Scope extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Scope::query();

		$pagination = Pagination::forge('users_scopes_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_scopes'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_scopes";
		$this->template->content = View::forge('admin/users/scope/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_scope'] = Model_Users_Scope::find($id);

		$this->template->title = "Users_scope";
		$this->template->content = View::forge('admin/users/scope/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Scope::validate('create');

			if ($val->run())
			{
				$users_scope = Model_Users_Scope::forge(array(
					'id' => Input::post('id'),
					'scope' => Input::post('scope'),
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($users_scope and $users_scope->save())
				{
					Session::set_flash('success', e('Added users_scope #'.$users_scope->id.'.'));

					Response::redirect('admin/users/scope');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_scope.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Scopes";
		$this->template->content = View::forge('admin/users/scope/create');

	}

	public function action_edit($id = null)
	{
		$users_scope = Model_Users_Scope::find($id);
		$val = Model_Users_Scope::validate('edit');

		if ($val->run())
		{
			$users_scope->id = Input::post('id');
			$users_scope->scope = Input::post('scope');
			$users_scope->name = Input::post('name');
			$users_scope->description = Input::post('description');

			if ($users_scope->save())
			{
				Session::set_flash('success', e('Updated users_scope #' . $id));

				Response::redirect('admin/users/scope');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_scope #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_scope->id = $val->validated('id');
				$users_scope->scope = $val->validated('scope');
				$users_scope->name = $val->validated('name');
				$users_scope->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_scope', $users_scope, false);
		}

		$this->template->title = "Users_scopes";
		$this->template->content = View::forge('admin/users/scope/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_scope = Model_Users_Scope::find($id))
		{
			$users_scope->delete();

			Session::set_flash('success', e('Deleted users_scope #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_scope #'.$id));
		}

		Response::redirect('admin/users/scope');

	}

}
