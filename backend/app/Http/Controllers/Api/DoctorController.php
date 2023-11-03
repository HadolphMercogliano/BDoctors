<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
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
        $doctors = Doctor::where('visible', true)
                  ->orderBy('created_at')
                  ->with('specializations')
                  ->with('user')
                  ->get();
        foreach($doctors as $doctor) {
            $doctor->photo = $doctor->getPictureUri();
          }
          return response()->json(compact('doctors'));

          $specializationsId = [];
          foreach($doctors as $doctor){
              foreach($doctor->specializations as $specialization){
                  array_push($specializationsId, $specialization->id);
              }
          };
          $specializations = Specialization::whereIn('id', $specializationsId)->get();
          if(count($doctors)>0){
              return response()->json([
                  'success' => true,
                  'results' => ['doctors' => $doctors,
                  'specializations' => $specializations]
              ]);
          } else {
              return response()->json([
                  'success' => false,
                  'results' => null
              ], 404);
          }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
    //   $doctor = Doctor::where('id', $id)->where('visible', true)->with('specializations')->get();

        // return response()->json($doctor);

        $doctors = Doctor::where('slug', $slug)->with('specializations')->get();

        if(count($doctors)>0){
            return response()->json([
                'success' => true,
                'results' => $doctors
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}