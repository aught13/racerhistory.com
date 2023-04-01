<?php

class Controller_Admin_Season extends Controller_Admin {

    public function action_index() {
        $query = Model_Season::query();

        $pagination = Pagination::forge('seasons_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['seasons'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Seasons";
        $this->template->content = View::forge('admin/season/index', $data);
    }

    public function action_view($id = null) {
        $data['season'] = Model_Season::find($id);

        $this->template->title = "Season";
        $this->template->content = View::forge('admin/season/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Season::validate('create');

            if ($val->run()) {
                $season = Model_Season::forge([
                            'start' => Input::post('start'),
                            'end' => Input::post('end'),
                ]);

                if ($season and $season->save()) {
                    Session::set_flash('success', e('Added season #' . $season->id . '.'));

                    Response::redirect('admin/season');
                } else {
                    Session::set_flash('error', e('Could not save season.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Seasons";
        $this->template->content = View::forge('admin/season/create');
    }

    public function action_edit($id = null) {
        $season = Model_Season::find($id);
        $val = Model_Season::validate('edit');

        if ($val->run()) {
            $season->start = Input::post('start');
            $season->end = Input::post('end');

            if ($season->save()) {
                Session::set_flash('success', e('Updated season #' . $id));

                Response::redirect('admin/season');
            } else {
                Session::set_flash('error', e('Could not update season #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $season->start = $val->validated('start');
                $season->end = $val->validated('end');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('season', $season, false);
        }

        $this->template->title = "Seasons";
        $this->template->content = View::forge('admin/season/edit');
    }

    public function action_delete($id = null) {
        if ($season = Model_Season::find($id)) {
            $season->delete();

            Session::set_flash('success', e('Deleted season #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete season #' . $id));
        }

        Response::redirect('admin/season');
    }

}
