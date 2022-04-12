<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * @method save()
 */
class certificate extends Controller
{
    public function myCertificate(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->validate($request, [
                'NRIC_NO' => 'required|max:8|unique:certificates,NRIC_NO',
                'School' => 'required',
                'Type_Of_School' => 'required',
                'Year_Attended' => 'required',
                'Year_Month_Form' => 'required',
                'Year_Month_To' => 'required',
            ]);
        } catch (ValidationException $e) {
        }

        $School = \App\Models\certificate::create([
            'NRIC_NO' => $request->NRIC_NO,
            'School' => $request->School,
            'Type_Of_School' => $request->Type_Of_School,
            'Year_Attended' => $request->Year_Attended,
            'Year_Month_Form' => $request->Year_Month_Form,
            'Year_Month_To' => $request->Year_Month_To,
        ]);

        if ($School) {
            return response()->json([
                'Message' => 'Insert In DataBase SuccessFully' ,
            ]);
        } else {
            return response()->json([
                'Message' => 'Can\'t Insert In DataBase' ,
            ]);
        }
    }
}
