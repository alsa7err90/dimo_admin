<?php

namespace Modules\Roles\Services;

use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionService
{
    public function __construct()
    {
        //
    }

    public function get()
    {
        return Permission::orderBy('id', 'DESC')->paginate(getPaginate());
    }
    public function getRowsTable($data)
    {
        $output = "";
        if ($data->count() > 0) {
            foreach ($data as $key => $item) {
                $dataJson = json_encode($item->toArray());
                $output .= '<tr>' .
                    '<td><input type="checkbox" class="sub_chk" data-id="' . $item->id . '"></td></td>' .
                    '<td>' . $item->name_show . '</td>' .
                    '<td>' . $item->name . '</td>' .
                    '<td> ' .
                    view('components.buttons.delete', [
                        'action' => route('admin.permissions.destroy', $item->id),
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
        // 5custom
        if ($request->name != null) {
            $name = $request->name;
            $name_show = $name;
            if ($request->name_show != null)
                $name_show = $request->name_show;

            $permissions = [
                $name . '-list',
                $name . '-create',
                $name . '-edit',
                $name . '-delete'

            ];
            $names = [
                $name_show . ' (list)',
                $name_show . ' (create)',
                $name_show . ' (edit)',
                $name_show . ' (delete)'

            ];

            foreach ($permissions as $key => $permission) {
                Permission::create(['name' => $permission, 'name_show' => $names[$key]]);
            }
        }
        if ($request->custom != null) {
            $name_show = $request->custom;
            if ($request->name_show != null)
                $name_show = $request->name_show;
            Permission::create(['name' => $request->custom, 'name_show' => $request->name_show]);
        }

        Cache::forget('Permission');
        return ['success', 'You have successfully created a Permission!', $this->getRowsTable($this->get())];
    }

    public function update($request, $data)
    {
        $request =  $request->all();

        $data->update($request);
        if ($data) {
            $data->update($request->only('question', 'answer'));
            return ['success', 'You have successfully updated a Role!', $this->getRowsTable($this->get()), $data];
        } else {
            return ['error', 'Not Found'];
        }
    }
    public function destroy($id)
    {
        $data = Permission::find($id);
        if (!$data) {
            return ['error', __('Not Found')];
        }
        if ($data->delete()) {
            return ['success', __('You have successfully deleted a Role!'), $this->getRowsTable($this->get())];
        } else {
            return ['error', __('Failed Delete')];
        }

    }
}
