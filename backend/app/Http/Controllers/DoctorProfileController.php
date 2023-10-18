<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Http\Requests\StoreDoctorProfileRequest;
use App\Http\Requests\UpdateDoctorProfileRequest;

class DoctorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorProfileRequest  $request
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorProfileRequest $request, DoctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorProfile $doctorProfile)
    {
        //
    }
}
