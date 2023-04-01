<?php
class Controller_Admin_Users_Sessionscope extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Sessionscope::query();

		$pagination = Pagination::forge('users_sessionscopes_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_sessionscopes'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_sessionscopes";
		$this->template->content = View::forge('admin/users/sessionscope/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_sessionscope'] = Model_Users_Sessionscope::find($id);

		$this->template->title = "Users_sessionscope";
		$this->template->content = View::forge('admin/users/sessionscope/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Sessionscope::validate('create');

			if ($val->run())
			{
				$users_sessionscope = Model_Users_Sessionscope::forge(array(
					'id' => Input::post('id'),
					'session_id' => Input::post('session_id'),
					'access_token' => Input::post('access_token'),
					'scope' => Input::post('scope'),
				));

				if ($users_sessionscope and $users_sessionscope->save())
				{
					Session::set_flash('success', e('Added users_sessionscope #'.$users_sessionscope->id.'.'));

					Response::redirect('admin/users/sessionscope');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_sessionscope.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Sessionscopes";
		$this->template->content = View::forge('admin/users/sessionscope/create');

	}

	public function action_edit($id = null)
	{
		$users_sessionscope = Model_Users_Sessionscope::find($id);
		$val = Model_Users_Sessionscope::validate('edit');

		if ($val->run())
		{
			$users_sessionscope->id = Input::post('id');
			$users_sessionscope->session_id = Input::post('session_id');
			$users_sessionscope->access_token = Input::post('access_token');
			$users_sessionscope->scope = Input::post('scope');

			if ($users_sessionscope->save())
			{
				Session::set_flash('success', e('Updated users_sessionscope #' . $id));

				Response::redirect('admin/users/sessionscope');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_sessionscope #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_sessionscope->id = $val->validated('id');
				$users_sessionscope->session_id = $val->validated('session_id');
				$users_sessionscope->access_token = $val->validated('access_token');
				$users_sessionscope->scope = $val->validated('scope');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_sessionscope', $users_sessionscope, false);
		}

		$this->template->title = "Users_sessionscopes";
		$this->template->content = View::forge('admin/users/sessionscope/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_sessionscope = Model_Users_Sessionscope::find($id))
		{
			$users_sessionscope->delete();

			Session::set_flash('success', e('Deleted users_sessionscope #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_sessionscope #'.$id));
		}

		Response::redirect('admin/users/sessionscope');

	}

}
