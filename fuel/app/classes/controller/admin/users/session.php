<?php
class Controller_Admin_Users_Session extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Session::query();

		$pagination = Pagination::forge('users_sessions_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_sessions'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_sessions";
		$this->template->content = View::forge('admin/users/session/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_session'] = Model_Users_Session::find($id);

		$this->template->title = "Users_session";
		$this->template->content = View::forge('admin/users/session/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Session::validate('create');

			if ($val->run())
			{
				$users_session = Model_Users_Session::forge(array(
					'id' => Input::post('id'),
					'client_id' => Input::post('client_id'),
					'redirect_uri' => Input::post('redirect_uri'),
					'type_id' => Input::post('type_id'),
					'type' => Input::post('type'),
					'code' => Input::post('code'),
					'access_token' => Input::post('access_token'),
					'stage' => Input::post('stage'),
					'first_requested' => Input::post('first_requested'),
					'last_updated' => Input::post('last_updated'),
					'limited_access' => Input::post('limited_access'),
				));

				if ($users_session and $users_session->save())
				{
					Session::set_flash('success', e('Added users_session #'.$users_session->id.'.'));

					Response::redirect('admin/users/session');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_session.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Sessions";
		$this->template->content = View::forge('admin/users/session/create');

	}

	public function action_edit($id = null)
	{
		$users_session = Model_Users_Session::find($id);
		$val = Model_Users_Session::validate('edit');

		if ($val->run())
		{
			$users_session->id = Input::post('id');
			$users_session->client_id = Input::post('client_id');
			$users_session->redirect_uri = Input::post('redirect_uri');
			$users_session->type_id = Input::post('type_id');
			$users_session->type = Input::post('type');
			$users_session->code = Input::post('code');
			$users_session->access_token = Input::post('access_token');
			$users_session->stage = Input::post('stage');
			$users_session->first_requested = Input::post('first_requested');
			$users_session->last_updated = Input::post('last_updated');
			$users_session->limited_access = Input::post('limited_access');

			if ($users_session->save())
			{
				Session::set_flash('success', e('Updated users_session #' . $id));

				Response::redirect('admin/users/session');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_session #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_session->id = $val->validated('id');
				$users_session->client_id = $val->validated('client_id');
				$users_session->redirect_uri = $val->validated('redirect_uri');
				$users_session->type_id = $val->validated('type_id');
				$users_session->type = $val->validated('type');
				$users_session->code = $val->validated('code');
				$users_session->access_token = $val->validated('access_token');
				$users_session->stage = $val->validated('stage');
				$users_session->first_requested = $val->validated('first_requested');
				$users_session->last_updated = $val->validated('last_updated');
				$users_session->limited_access = $val->validated('limited_access');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_session', $users_session, false);
		}

		$this->template->title = "Users_sessions";
		$this->template->content = View::forge('admin/users/session/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_session = Model_Users_Session::find($id))
		{
			$users_session->delete();

			Session::set_flash('success', e('Deleted users_session #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_session #'.$id));
		}

		Response::redirect('admin/users/session');

	}

}
