<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();

        // prendiamo il file index dentro la cartella view->profile->admin->doctors usando la dot notation
        // return view('profile.admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $user_id = auth()->user()->id;
        $data = $request->validated();
        $doctor = new Doctor();
        $doctor->user_id = $user_id;
        // $doctor->slug =  Str::slug($data['title']); DA FIXARE
        $doctor->fill($data);

        // immagine
        // $doctor->slug =  Str::slug($data['title']);

        if (array_key_exists('photo', $data)) {
            $img_url = Storage::put('uploads', $data['photo']);
            $data['photo'] = $img_url;
        }


        // if (isset($data['photo'])) {
        //     $doctor->photo = Storage::put('uploads', $data['photo']);
        // }
        // immagine
        $doctor->save();

        return redirect()->route('profile.admin.doctor.show')->with('message', 'Nuovo Profilo Dottore Creato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $user_data = Auth::user();
        $doctor = Auth::user()->doctor;
        return view('profile.admin.doctor.show', compact('doctor', 'user_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $specializations = Specialization::all();
        $user_data = Auth::user();
        $doctor = Auth::user()->doctor;
        return view('profile.admin.doctor.edit', compact('doctor', 'specializations', 'user_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        // dd($request);
        $user_data = Auth::user();
        $doctor = Auth::user()->doctor;
        $data = $request->validated();
        // $doctor->slug =  Str::slug($data['user_id']); DA FIXARE

        // immagine
        if (array_key_exists('photo', $data)) {
            $img_url = Storage::put('uploads', $data['photo']);
            $data['photo'] = $img_url;
        }

        // if (isset($data['photo'])) {
        //     if ($doctor->photo) {
        //         Storage::delete($doctor->photo);
        //     }
        //     $data['photo'] = Storage::put('uploads', $data['photo']);
        //     $doctor->photo = $data['photo'];
        // }
        // immagine
        $doctor->update($data);

        return redirect()->route('profile.admin.doctor.show', compact('doctor', 'user_data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $old_id = $doctor->id;

        if ($doctor->image) {
            Storage::delete($doctor->image);
        }
        $doctor->delete();

        return redirect()->route('profile.admin.doctor.show')->with('message', "Il $old_id Dottore è stato Cancellato");
    }
}
