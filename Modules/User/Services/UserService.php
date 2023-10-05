<?php

namespace Modules\User\Services;

use App\Constants\Style;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

use DB;
use Hash;
use Illuminate\Support\Arr;

class UserService
{
    public function __construct()
    {
        //
    }

    public function get()
    {
        return User::getMyData()->latest('id')->simplePaginate(getPaginate());
    }
    public function getRowsTable($data)
    {
        $output = "";

        if ($data->count() > 0) {
            foreach ($data as $item) {
                $roles = '';
                if (!empty($item->getRoleNames())){
                    foreach ($item->getRoleNames() as $v) {
                        $roles .= "<label class='".Style::BADGE_SUCCESS."'> $v </label>";
                    }
                }

                $dataJson = json_encode($item->toArray());
                $output .= '<tr>' .
                    '<td>' . $item->id . '</td>' .
                    '<td>' . $item->name . '</td>' .
                    '<td>' . $item->email . '</td>' .
                    '<td>' . $roles . '</td>' .
                    '<td> ' .
                    view('components.buttons.show', [
                        'data' => $dataJson,
                        'id_btn' => 'show_item_' . $item->id,
                        'id_modal' => 'new_modal',
                        'label' => 'Show',
                        'onClick' => "btnShowModal('show_item_$item->id')"

                    ]) .
                    view('components.buttons.edit', [
                        'action' => route('admin.users.update', $item->id),
                        'data' => $dataJson,
                        'id_btn' => 'edit_item_' . $item->id,
                        'id_modal' => 'edit_modal',
                        'label' => 'Edit',
                        'onClick' => "btnEditModal('edit_item_$item->id')"
                    ]) .
                    view('components.buttons.delete', [
                        'action' => route('admin.users.destroy', $item->id),
                        'label' => 'Remove',
                        'id_btn' => 'del_item_' . $item->id,
                        'id_item' => 'item_' . $item->id,
                        'id_modal' => 'delete_modal',
                        'onClick' => "btnDeleteModal('del_item_$item->id')"
                    ]) .

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

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $data = User::create($input);
        $data->assignRole($request->input('roles'));
        if ($data) {
            Cache::forget('User');
            return ['success', 'You have successfully created a User!', $this->getRowsTable($this->get())];
        } else {
            return ['error', 'Failed Store', null];
        }
    }

    public function update($request, $id)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $data = User::find($id);
        $data->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $data->assignRole($request->input('roles'));
        if ($data) {
            $data->update($request->only('question', 'answer'));
            return ['success', 'You have successfully updated a question!', $this->getRowsTable($this->get()), $data];
        } else {
            return ['error', 'Not Found'];
        }
        return $notify;
    }
    public function destroy($id)
    {
        $data = User::find($id);
        if (!$data) {
            return ['error', __('Not Found')];
        }
        if ($data->delete()) {
            return ['success', __('You have successfully deleted a question!'), $this->getRowsTable($this->get())];
        } else {
            return ['error', __('Failed Delete')];
        }

    }
}
