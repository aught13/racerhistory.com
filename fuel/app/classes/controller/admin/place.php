<?php

class Controller_Admin_Place extends Controller_Admin {

    public function action_index() {
        $query = Model_Place::query();

        $pagination = Pagination::forge('places_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['places'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Places";
        $this->template->content = View::forge('admin/place/index', $data);
    }

    public function action_view($id = null) {
        $data['place'] = Model_Place::find($id);

        $this->template->title = "Place";
        $this->template->content = View::forge('admin/place/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Place::validate('create');

            if ($val->run()) {
                $place = Model_Place::forge([
                            'place_name' => Input::post('place_name'),
                            'place_state' => Input::post('place_state'),
                ]);

                if ($place and $place->save()) {
                    Session::set_flash('success', e('Added place #' . $place->id . '.'));

                    Response::redirect('admin/place');
                } else {
                    Session::set_flash('error', e('Could not save place.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Places";
        $this->template->content = View::forge('admin/place/create');
    }

    public function action_edit($id = null) {
        $place = Model_Place::find($id);
        $val = Model_Place::validate('edit');

        if ($val->run()) {
            $place->place_name = Input::post('place_name');
            $place->place_state = Input::post('place_state');

            if ($place->save()) {
                Session::set_flash('success', e('Updated place #' . $id));

                Response::redirect('admin/place');
            } else {
                Session::set_flash('error', e('Could not update place #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $place->place_name = $val->validated('place_name');
                $place->place_state = $val->validated('place_state');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('place', $place, false);
        }

        $this->template->title = "Places";
        $this->template->content = View::forge('admin/place/edit');
    }

    public function action_delete($id = null) {
        if ($place = Model_Place::find($id)) {
            $place->delete();

            Session::set_flash('success', e('Deleted place #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete place #' . $id));
        }

        Response::redirect('admin/place');
    }

}
