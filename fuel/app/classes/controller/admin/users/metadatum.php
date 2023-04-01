<?php
class Controller_Admin_Users_Metadatum extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Users_Metadatum::query();

		$pagination = Pagination::forge('users_metadata_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['users_metadata'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Users_metadata";
		$this->template->content = View::forge('admin/users/metadatum/index', $data);
	}

	public function action_view($id = null)
	{
		$data['users_metadatum'] = Model_Users_Metadatum::find($id);

		$this->template->title = "Users_metadatum";
		$this->template->content = View::forge('admin/users/metadatum/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Users_Metadatum::validate('create');

			if ($val->run())
			{
				$users_metadatum = Model_Users_Metadatum::forge(array(
					'id' => Input::post('id'),
					'parent_id' => Input::post('parent_id'),
					'key' => Input::post('key'),
					'value' => Input::post('value'),
					'user_id' => Input::post('user_id'),
				));

				if ($users_metadatum and $users_metadatum->save())
				{
					Session::set_flash('success', e('Added users_metadatum #'.$users_metadatum->id.'.'));

					Response::redirect('admin/users/metadatum');
				}

				else
				{
					Session::set_flash('error', e('Could not save users_metadatum.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users_Metadata";
		$this->template->content = View::forge('admin/users/metadatum/create');

	}

	public function action_edit($id = null)
	{
		$users_metadatum = Model_Users_Metadatum::find($id);
		$val = Model_Users_Metadatum::validate('edit');

		if ($val->run())
		{
			$users_metadatum->id = Input::post('id');
			$users_metadatum->parent_id = Input::post('parent_id');
			$users_metadatum->key = Input::post('key');
			$users_metadatum->value = Input::post('value');
			$users_metadatum->user_id = Input::post('user_id');

			if ($users_metadatum->save())
			{
				Session::set_flash('success', e('Updated users_metadatum #' . $id));

				Response::redirect('admin/users/metadatum');
			}

			else
			{
				Session::set_flash('error', e('Could not update users_metadatum #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$users_metadatum->id = $val->validated('id');
				$users_metadatum->parent_id = $val->validated('parent_id');
				$users_metadatum->key = $val->validated('key');
				$users_metadatum->value = $val->validated('value');
				$users_metadatum->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('users_metadatum', $users_metadatum, false);
		}

		$this->template->title = "Users_metadata";
		$this->template->content = View::forge('admin/users/metadatum/edit');

	}

	public function action_delete($id = null)
	{
		if ($users_metadatum = Model_Users_Metadatum::find($id))
		{
			$users_metadatum->delete();

			Session::set_flash('success', e('Deleted users_metadatum #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete users_metadatum #'.$id));
		}

		Response::redirect('admin/users/metadatum');

	}

}
