<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
       protected $fillable = ['name', 'specialization', 'license_number', 'clinic_id', 'email', 'phone'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function profile()
    {
        return $this->hasOne(DoctorProfile::class);
    }
}
