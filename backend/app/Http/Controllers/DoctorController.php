<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DoctorController extends Controller
{
    use AuthorizesRequests;


    public function index()
    {
        $this->authorize('all_doctors');

        $doctors = Doctor::select('id', 'name', 'specialization', 'license_number', 'clinic_id')
            ->with('clinic:id,name,location,phone')
            ->get();

        return response()->apiSuccess($doctors, 'Doctors fetched successfully', 200);
    }


    public function store(DoctorRequest $request)
    {
        $this->authorize('create_doctor');
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username ?? '',
                'password' => Hash::make('12345'),
                'role_id' => $request->role_id ?? 1,
                'role_name' => $request->role_name ?? 'user',
                'phone'     => $request->phone ?? null,
            ]); 
            $doctor = Doctor::create([
                'name'            => $request->name,
                'user_id'            => $user->id,
                'specialization'  => $request->specialization,
                'license_number'  => $request->license_number,
                'clinic_id'       => $request->clinic_id,
            ]);

            DB::commit();
             return response()->apiSuccess(
            $doctor,
            'Doctor created successfully',
            200,
            true
        );
        } catch (Exception $e) {
            DB::rollBack();
            return response()->apiFail($e->getMessage(), 500);
        }
       
    }


    public function show($id)
    {
        $this->authorize('show_doctor');

        $doctor = Doctor::with('clinic:id,name,location,phone')->find($id);

        if (!$doctor) {
            return response()->apiFail('Doctor not found', 404);
        }

        return response()->apiSuccess($doctor, 'Doctor fetched successfully', 200, true);
    }

    public function update(DoctorRequest $request, $id)
{
    $this->authorize('edit_doctor');

    DB::beginTransaction();
    try {
        // Find the doctor
        $doctor = Doctor::findOrFail($id);

        // Find the related user
        $user = User::findOrFail($doctor->user_id);

        // Update user information
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'username'  => $request->username ?? $user->username,
            'role_id'   => $request->role_id ?? $user->role_id,
            'role_name' => $request->role_name ?? $user->role_name,
            'phone'     => $request->phone ?? $user->phone,
        ]);

        // Update doctor information
        $doctor->update([
            'name'            => $request->name,
            'specialization'  => $request->specialization,
            'license_number'  => $request->license_number,
            'clinic_id'       => $request->clinic_id,
        ]);

        DB::commit();

        return response()->apiSuccess(
            $doctor->load('user', 'clinic'),
            'Doctor updated successfully',
            200,
            true
        );

    } catch (Exception $e) {
        DB::rollBack();
        return response()->apiFail($e->getMessage(), 500);
    }
}

 
    public function destroy($id)
    {
        $this->authorize('delete_doctor');

        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->apiFail('Doctor not found', 404);
        }

        $doctor->delete();

        return response()->apiSuccess([], 'Doctor deleted successfully', 200);
    }
}
