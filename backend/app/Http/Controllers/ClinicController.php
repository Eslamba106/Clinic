<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Http\Requests\ClinicRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClinicController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('all_clinics');

        $clinics = Clinic::select('name', 'location', 'phone')->get();

        return response()->apiSuccess($clinics, 'Clinics Fetched Successfully', 200);
    }

    public function store(ClinicRequest $request)
    {
        $this->authorize('create_clinic');

        $clinic = Clinic::create([
            'name'     => $request->name,
            'location' => $request->location,
            'phone'    => $request->phone,
        ]);

        return response()->apiSuccess(
            $clinic,
            'Clinic created successfully',
            200,
            true
        );
    }

    public function show($id)
    {
        $this->authorize('show_clinic');

        $clinic = Clinic::find($id);
        if (!$clinic) {
            return response()->apiFail('Clinic not found', 404);
        }
        return response()->apiSuccess($clinic, 'Clinic Fetched Successfully', 200, true);
    }

    public function update(ClinicRequest $request, $id)
    {
        $this->authorize('edit_clinic');

        $clinic = Clinic::find($id);

        if (!$clinic) {
            return response()->apiFail('Clinic not found', 404);
        }


        $clinic->update($request->only(['name', 'location', 'phone']));

        return response()->apiSuccess($clinic, 'Clinic created successfully', 200, true);
    }


    public function destroy($id)
    {
        $this->authorize('delete_clinic');

        $clinic = Clinic::find($id);

        if (!$clinic) {
            return response()->apiFail('Clinic not found', 404);
        }

        $clinic->delete();

        return response()->apiSuccess([], 'Clinic deleted successfully', 200);
    }
}
