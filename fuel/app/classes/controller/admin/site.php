<?php

class Controller_Admin_Site extends Controller_Admin {

    public function action_index() {
        $query = Model_Site::query();

        $pagination = Pagination::forge('sites_pagination', [
                    'total_items' => $query->count(),
                    'uri_segment' => 'page',
        ]);

        $data['sites'] = $query->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();

        $this->template->set_global('pagination', $pagination, false);

        $this->template->title = "Sites";
        $this->template->content = View::forge('admin/site/index', $data);
    }

    public function action_view($id = null) {
        $data['site'] = Model_Site::find($id);

        $this->template->title = "Site";
        $this->template->content = View::forge('admin/site/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Site::validate('create');

            if ($val->run()) {
                $site = Model_Site::forge([
                            'place_id' => Input::post('place_id'),
                            'site_name' => Input::post('site_name'),
                            'capacity' => Input::post('capacity'),
                            'site_image' => Input::post('site_image'),
                            'site_info' => Input::post('site_info'),
                ]);

                if ($site and $site->save()) {
                    Session::set_flash('success', e('Added site #' . $site->id . '.'));

                    Response::redirect('admin/site');
                } else {
                    Session::set_flash('error', e('Could not save site.'));
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        //get places
        $places = Model_Place::find('all');
        foreach ($places as $value) {
            $place[$value->id] = $value->place_name.', '.$value->place_state;
        }
        $data['place'] = $place;

        $this->template->title = "Sites";
        $this->template->content = View::forge('admin/site/create',$data,false);
    }

    public function action_edit($id = null) {
        $site = Model_Site::find($id);
        $val = Model_Site::validate('edit');

        if ($val->run()) {
            $site->place_id = Input::post('place_id');
            $site->site_name = Input::post('site_name');
            $site->capacity = Input::post('capacity');
            $site->site_image = Input::post('site_image');
            $site->site_info = Input::post('site_info');

            if ($site->save()) {
                Session::set_flash('success', e('Updated site #' . $id));

                Response::redirect('admin/site');
            } else {
                Session::set_flash('error', e('Could not update site #' . $id));
            }
        } else {
            if (Input::method() == 'POST') {
                $site->place_id = $val->validated('place_id');
                $site->site_name = $val->validated('site_name');
                $site->capacity = $val->validated('capacity');
                $site->site_image = $val->validated('site_image');
                $site->site_info = $val->validated('site_info');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('site', $site, false);
        }
        //get places
        $places = Model_Place::find('all');
        foreach ($places as $value) {
            $place[$value->id] = $value->place_name.', '.$value->place_state;
        }
        $data['place'] = $place;

        $this->template->title = "Sites";
        $this->template->content = View::forge('admin/site/edit',$data, false);
    }

    public function action_delete($id = null) {
        if ($site = Model_Site::find($id)) {
            $site->delete();

            Session::set_flash('success', e('Deleted site #' . $id));
        } else {
            Session::set_flash('error', e('Could not delete site #' . $id));
        }

        Response::redirect('admin/site');
    }

}
