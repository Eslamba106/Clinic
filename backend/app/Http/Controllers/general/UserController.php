<?php

namespace App\Http\Controllers\general;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Throwable;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User; 
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class UserController extends Controller
{
     use AuthorizesRequests;
    public function index(Request $request){

        $this->authorize('user_management'); 

        $ids = $request->bulk_ids;
        $now = Carbon::now()->toDateTimeString();
        if ($request->bulk_action_btn === 'update_status' && $request->status && is_array($ids) && count($ids)) {
            $data = ['status' => $request->status];
            $this->authorize('change_users_status');
          
            User::whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
         if ($request->bulk_action_btn === 'update_status' && $request->role && is_array($ids) && count($ids)) {
            $data = ['role_id' => $request->role];
            $this->authorize('change_users_role');

            ($request->role == 1) ? $data['role_name'] = "user" : $data['role_name'] = 'admin' ;
            $is_update = User::whereIn('id', $ids)->update($data);
            
            return back()->with('success', __('general.updated_successfully'));
        }
        if ($request->bulk_action_btn === 'update_role' && $request->role_id && is_array($ids) && count($ids)) {
            $data = ['role_id' => $request->role_id];
            User::whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
        if ($request->bulk_action_btn === 'delete' &&  is_array($ids) && count($ids)) {


            User::whereIn('id', $ids)->delete();
            return back()->with('success', __('general.deleted_successfully'));
        }
        $roles = Role::select('id' , 'name'  )->get();

        $users = User::orderBy("created_at","desc")->paginate(10);
        return view("tenant.users.all_users", compact("users" , 'roles'));
    }

    public function edit($id){
        $this->authorize('edit_user');
        $user = User::findOrFail($id);
        $roles = Role::select('id' , 'name'  )->get();
        return view("tenant.users.edit", compact("user" , 'roles'));
    }

    public function create(){
        $this->authorize('create_user');
        $roles = Role::select('id' , 'name'  )->get();
        return view("tenant.users.create" , compact("roles"));
    }
    public function store(RegisterRequest $request){
        $this->authorize('create_user');
      
        try{

         
        $role = Role::where("id", $request->role)->select('id' , 'name'  )->first();
        $user = User::create([
            'name' => $request->name,
            'user_name' =>  $request->user_name,
            'phone' =>  $request->phone,
            'role_name' => $role->role_name ?? 'user',
            'role_id' => $role->id ?? 1,
            'email' => $request->email ?? null,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user_managment')->with("success", __('general.added_successfully'));
    } catch (Throwable $e) {
        return redirect()->back()->with("error", $e->getMessage());

    }
    }
    public function update(Request $request , $id){
        $this->authorize('edit_user');
        $user = User::findOrFail($id);
        try{
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role'              => "required",
            'user_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
           
        ] );
       
        $role = Role::where("id", $request->role)->select('id' , 'name'  )->first();

        $user->update([
            "name"      => $request->name,
            "user_name" => $request->user_name,
            "email"     => $request->email,
            'phone'     =>  $request->phone,
            "role_id"   => $request->role,
            "role_name" => $role->name,
        ]);
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('user_managment')->with("success", __( 'general.updated_successfully'));
    } catch (Throwable $e) {
        return redirect()->back()->with("error", $e->getMessage());

    }
    }

    public function destroy($id){
        $this->authorize('delete_user');
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("user_managment")->with("success", __(   'general.deleted_successfully'));
    }
 
}
