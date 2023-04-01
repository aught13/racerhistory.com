<?php
class Controller_Admin_Person_Eav extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Person_Eav::query();

		$pagination = Pagination::forge('person_eavs_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['person_eavs'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Person_eavs";
		$this->template->content = View::forge('admin/person/eav/index', $data);
	}

	public function action_view($id = null)
	{
		$data['person_eav'] = Model_Person_Eav::find($id);

		$this->template->title = "Person_eav";
		$this->template->content = View::forge('admin/person/eav/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Person_Eav::validate('create');

			if ($val->run())
			{
				$person_eav = Model_Person_Eav::forge(array(
					'id' => Input::post('id'),
					'parent_id' => Input::post('parent_id'),
					'key' => Input::post('key'),
					'value' => Input::post('value'),
				));

				if ($person_eav and $person_eav->save())
				{
					Session::set_flash('success', e('Added person_eav #'.$person_eav->id.'.'));

					Response::redirect('admin/person/eav');
				}

				else
				{
					Session::set_flash('error', e('Could not save person_eav.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Person_Eavs";
		$this->template->content = View::forge('admin/person/eav/create');

	}

	public function action_edit($id = null)
	{
		$person_eav = Model_Person_Eav::find($id);
		$val = Model_Person_Eav::validate('edit');

		if ($val->run())
		{
			$person_eav->id = Input::post('id');
			$person_eav->parent_id = Input::post('parent_id');
			$person_eav->key = Input::post('key');
			$person_eav->value = Input::post('value');

			if ($person_eav->save())
			{
				Session::set_flash('success', e('Updated person_eav #' . $id));

				Response::redirect('admin/person/eav');
			}

			else
			{
				Session::set_flash('error', e('Could not update person_eav #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$person_eav->id = $val->validated('id');
				$person_eav->parent_id = $val->validated('parent_id');
				$person_eav->key = $val->validated('key');
				$person_eav->value = $val->validated('value');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('person_eav', $person_eav, false);
		}

		$this->template->title = "Person_eavs";
		$this->template->content = View::forge('admin/person/eav/edit');

	}

	public function action_delete($id = null)
	{
		if ($person_eav = Model_Person_Eav::find($id))
		{
			$person_eav->delete();

			Session::set_flash('success', e('Deleted person_eav #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete person_eav #'.$id));
		}

		Response::redirect('admin/person/eav');

	}

}
