<?php

namespace App\Http\Controllers\general;

use App\Models\Role;
use App\Models\Section;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('show_roles');

        $roles = Role::with('users')
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $data = [
            'roles' => $roles,
        ];

        return response()->apiSuccess($data, 'Roles fetched successfully', 200, true);
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('create_roles');
        $data = $request->all();

        $role = Role::create([
            'name' => $data['name'],
            'caption' => $data['caption'],
            'is_admin' => (!empty($data['is_admin']) and $data['is_admin'] == 'on'),
            'created_at' => time(),
        ]);

        if ($request->has('permissions')) {
            $this->storePermission($role, $data['permissions']);
        }

        Cache::forget('sections');

        return response()->apiSuccess([
            'role' => $role
        ], 'Role created successfully', 200, true);
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        $this->authorize('update_roles');

        $role = Role::findOrFail($id);


        $data = $request->all();

        $role->update([
            'caption' => $data['caption'],
            'is_admin' => ((!empty($data['is_admin']) and $data['is_admin'] == 'on') or $role->name == Role::$admin),
        ]);

        Permission::where('role_id', '=', $role->id)->delete();

        if (!empty($data['permissions'])) {          
            $this->storePermission($role, $data['permissions']);
        }

        Cache::forget('sections');

        return response()->apiSuccess([
            'role' => $role
        ], 'Role updated successfully', 200, true);
    }
    public function role($id){
        $this->authorize('show_roles');

        $role = Role::findOrFail($id);
        $permissions = Permission::where('role_id', '=', $role->id)->get();
        $sections = Section::whereNull('section_group_id')
            ->with('children')
            ->get();

        $data = [
            'role' => $role,
            'permissions' => $sections, 
        ];

        return response()->apiSuccess($data, 'Role fetched successfully', 200, true);
    }
    public function destroy(Request $request , $id)
    {
        $this->authorize('delete_roles'); 
        $role = Role::findOrFail($id);
        if ($role->id !== 2) {
            $role->delete();
        }else {
            return response()->apiFail('Cannot delete this role', 403);
        }

        return response()->apiSuccess([], 'Role deleted successfully', 200, true);
    }

    public function storePermission($role, $sections)
    {
        $sectionsId = Section::whereIn('id', $sections)->pluck('id');
        $permissions = [];
        foreach ($sectionsId as $section_id) {
            $permissions[] = [
                'role_id' => $role->id,
                'section_id' => $section_id,
                'allow' => true,
            ];
        } 
        Permission::insert($permissions);
    }

    public function section()
    {
        $this->authorize('show_roles');

        $sections = Section::whereNull('section_group_id')
            ->with('children')
            ->get();

        return response()->apiSuccess([
            'sections' => $sections
        ], 'Sections fetched successfully', 200, true);
    }
    // public function create()
    // {
    //     $this->authorize('create_roles');

    //     $sections = Section::whereNull('section_group_id')
    //         ->with('children')
    //         ->get();

    //     $data = [
    //         'pageTitle' => trans('admin/main.role_new_page_title'),
    //         'sections' => $sections
    //     ];

    //     return view('tenant.roles.create', $data);
    // }



    // public function edit($id)
    // {
    //     $this->authorize('edit_roles');

    //     $role = Role::find($id);
    //     $permissions = Permission::where('role_id', '=', $role->id)->get();
    //     $sections = Section::whereNull('section_group_id')
    //         ->with('children')
    //         ->get();

    //     $data = [
    //         'role' => $role,
    //         'sections' => $sections,
    //         'permissions' => $permissions->keyBy('section_id')
    //     ];

    //     return view('tenant.roles.edit', $data);
    // }


}
