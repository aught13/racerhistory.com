<?php
class Controller_Admin_Game_Eav extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Game_Eav::query();

		$pagination = Pagination::forge('game_eavs_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['game_eavs'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Game_eavs";
		$this->template->content = View::forge('admin/game/eav/index', $data);
	}

	public function action_view($id = null)
	{
		$data['game_eav'] = Model_Game_Eav::find($id);

		$this->template->title = "Game_eav";
		$this->template->content = View::forge('admin/game/eav/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Game_Eav::validate('create');

			if ($val->run())
			{
				$game_eav = Model_Game_Eav::forge(array(
					'id' => Input::post('id'),
					'game_id' => Input::post('game_id'),
					'key' => Input::post('key'),
					'value' => Input::post('value'),
				));

				if ($game_eav and $game_eav->save())
				{
					Session::set_flash('success', e('Added game_eav #'.$game_eav->id.'.'));

					Response::redirect('admin/game/eav');
				}

				else
				{
					Session::set_flash('error', e('Could not save game_eav.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Game_Eavs";
		$this->template->content = View::forge('admin/game/eav/create');

	}

	public function action_edit($id = null)
	{
		$game_eav = Model_Game_Eav::find($id);
		$val = Model_Game_Eav::validate('edit');

		if ($val->run())
		{
			$game_eav->id = Input::post('id');
			$game_eav->game_id = Input::post('game_id');
			$game_eav->key = Input::post('key');
			$game_eav->value = Input::post('value');

			if ($game_eav->save())
			{
				Session::set_flash('success', e('Updated game_eav #' . $id));

				Response::redirect('admin/game/eav');
			}

			else
			{
				Session::set_flash('error', e('Could not update game_eav #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$game_eav->id = $val->validated('id');
				$game_eav->game_id = $val->validated('game_id');
				$game_eav->key = $val->validated('key');
				$game_eav->value = $val->validated('value');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('game_eav', $game_eav, false);
		}

		$this->template->title = "Game_eavs";
		$this->template->content = View::forge('admin/game/eav/edit');

	}

	public function action_delete($id = null)
	{
		if ($game_eav = Model_Game_Eav::find($id))
		{
			$game_eav->delete();

			Session::set_flash('success', e('Deleted game_eav #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete game_eav #'.$id));
		}

		Response::redirect('admin/game/eav');

	}

}
