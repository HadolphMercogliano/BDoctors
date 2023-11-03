<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


use function PHPUnit\Framework\isEmpty;

class DoctorController extends Controller
{
    public function index()
    {
        // $doctors = Doctor::all('visible', true)
        //     ->orderBy('created_at')
        //     ->with('specializations')
        //     ->with('user')
        //     ->get();
        $doctors = Doctor::all();
        $specializationsId = [];
        foreach ($doctors as $doctor) {
            $doctor->photo = $doctor->getPictureUri();

            foreach ($doctor->specializations as $specialization) {
                array_push($specializationsId, $specialization->id);
            }
        };
        $specializations = Specialization::whereIn('id', $specializationsId)->get();
        if (count($doctors) > 0) {
            return response()->json([
                'success' => true,
                'results' => [
                    'doctors' => $doctors,
                    'specializations' => $specializations
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }

    public function show(string $slug)
    {

        $doctors = Doctor::where('slug', $slug)->with('specializations')->get();

        if (count($doctors) > 0) {
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
}
