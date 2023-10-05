<?php

namespace Modules\question\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\question\Entities\question;

class questionService
{
    public function __construct()
    {
        //
    }

    public function get()
    {
        return question::latest('id')->simplePaginate(getPaginate());
    }
    public function getRowsTable($data)
    {
        $output = "";
        if ($data->count() > 0) {
            foreach ($data as $key => $item) {
                $dataJson = json_encode($item->toArray());
                $output .= '<tr>' .
                    '<td>' . $item->id . '</td>' .
                    '<td>' . $item->question . '</td>' .
                    '<td>' . $item->answer . '</td>' .
                    '<td> ' .
                    view('components.buttons.show', [
                        'data' => json_encode($item->toArray()),
                         'id_btn' => 'show_item_' . $item->id,
                         'id_modal' => 'new_modal',
                         'label' => 'Show',
                         'onClick'=>"btnShowModal('show_item_$item->id')"

                     ]).
                    view('components.buttons.edit', [
                        'action' => route('admin.question.update', $item->id),
                        'data' => json_encode($item->toArray()),
                        'id_btn' => 'edit_item_' . $item->id,
                        'id_modal' => 'edit_modal',
                        'label' => 'Edit',
                        'onClick'=>"btnEditModal('edit_item_$item->id')"
                    ]).
                    view('components.buttons.delete', [
                        'action' => route('admin.question.destroy', $item->id),
                        'label' => 'Remove',
                        'id_btn' => 'del_item_' . $item->id,
                        'id_item' => 'item_' . $item->id,
                        'id_modal' => 'delete_modal',
                        'onClick'=>"btnDeleteModal('del_item_$item->id')"
                    ]).

                    '</td>' .
                    '</tr>';
            }


        } else {
            $output = "not found !";
        }

        return $output;
    }

    public function store($request)
    {

        $data = question::create($request->all());
        if ($data) {
            Cache::forget('question');
            return ['success', 'You have successfully created a question!', $this->getRowsTable($this->get())];
        } else {
            return ['error', 'Failed Store', null];
        }
    }

    public function update($request, $id)
    {
        $data = question::find($id);
        if ($data) {
            $data->update($request->only('question','answer'));
            return ['success', 'You have successfully updated a question!',  $this->getRowsTable($this->get()),$data];
        } else {
            return ['error', 'Not Found'];
        }
    }
    public function destroy($id)
    {
        $data = question::find($id);
        if (!$data) {
            return ['error', __('Not Found')];
        }
        if ($data->delete()) {
            return ['success', __('You have successfully deleted a question!'), $this->getRowsTable($this->get())];
        }
        else{
            return ['error', __('Failed Delete')];
        }

    }
}
