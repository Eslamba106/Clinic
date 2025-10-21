<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
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

        $doctor = Doctor::create([
            'name'            => $request->name,
            'specialization'  => $request->specialization,
            'license_number'  => $request->license_number,
            'clinic_id'       => $request->clinic_id,
            'email'           => $request->email,
            'phone'           => $request->phone,
        ]);

        return response()->apiSuccess(
            $doctor,
            'Doctor created successfully',
            200,
            true
        );
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

    /**
     * ✏️ تعديل بيانات الطبيب
     */
    public function update(DoctorRequest $request, $id)
    {
        $this->authorize('edit_doctor');

        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->apiFail('Doctor not found', 404);
        }

        $doctor->update($request->only([
            'name',
            'specialization',
            'license_number',
            'clinic_id',
            'email',
            'phone'
        ]));

        return response()->apiSuccess($doctor, 'Doctor updated successfully', 200, true);
    }

    /**
     * 🗑️ حذف الطبيب
     */
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
