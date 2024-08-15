<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DSController extends Controller
{
    public function index() {
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;
        
        // Access specific columns from the session data

        $all_ds = DB::table('tb_ds')->get();

        return view('ds.viewList', [
            'all_ds' => $all_ds,
            'first_name' => $first_name,
        ]);
    }

    public function viewCreateForm() {
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;
        return view('ds.createForm', [
            'first_name' => $first_name,
        ]);
    }

    public function createNewDs(Request $request) {

        $request->validate([
            'ds_code' => 'required|string|max:255',
            'ds_name' => 'required|string|max:255',
            'ds_address' => 'required|string|max:255',
            'ds_contact_no' => 'required|string|max:20',
            'business_type' => 'required|string|max:255',
            'dti_accreditation_no' => 'required|string|max:255',
            'lto_accreditation_no' => 'required|string|max:255',
            'date_it_started' => 'required|date',
            'date_it_accredited' => 'required|date',
            'date_it_renewal' => 'required|date',
            'is_active' => 'required|boolean',
            'description' => 'required|string|max:500',
            'province' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'town_city' => 'required|string|max:255',        
            'ds_fee_theoretical' => 'required|numeric',
            'ds_fee_practical' => 'required|numeric',
            'ds_fee_dep_cde' => 'required|numeric',
            'ds_fee_dep_drc' => 'required|numeric',
            'server_location' => 'required|string|max:255',
            'is_live' => 'required|boolean',
            'is_with_pos' => 'required|boolean',
            'date_it_accreditation_renewal' => 'required|date',
            'date_it_authorization_renewal' => 'required|date',
            
            // Image Uploads
            'logo_big' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'logo_small' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic1' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic2' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic3' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic4' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic5' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            
        ]);

          // Handle file uploads
        $filePaths = [];
        $fileFields = ['logo_big', 'logo_small', 'ds_pic1', 'ds_pic2', 'ds_pic3', 'ds_pic4', 'ds_pic5'];
        
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $filePaths[$field] = $request->file($field)->store('public/images');
            }
        }

        DB::table('tb_ds')->insert([
            'ds_code' => $request['ds_code'],
            'ds_name' => $request['ds_name'],
            'ds_address' => $request['ds_address'],
            'ds_contact_no' => $request['ds_contact_no'],
            'business_type' => $request['business_type'],
            'dti_accreditation_no' => $request['dti_accreditation_no'],
            'lto_accreditation_no' => $request['lto_accreditation_no'],
            'date_it_started' => $request['date_it_started'],
            'date_it_accredited' => $request['date_it_accredited'],
            'date_it_renewal' => $request['date_it_renewal'],
            'is_active' => $request['is_active'],
            'description' => $request['description'],
            'province' => $request['province'],
            'region' => $request['region'],
            'town_city' => $request['town_city'],
            'ds_fee_theoretical' => $request['ds_fee_theoretical'],
            'ds_fee_practical' => $request['ds_fee_practical'],
            'ds_fee_dep_cde' => $request['ds_fee_dep_cde'],
            'ds_fee_dep_drc' => $request['ds_fee_dep_drc'],
            'server_location' => $request['server_location'],
            'is_live' => $request['is_live'],
            'date_it_accreditation_renewal' => $request['date_it_accreditation_renewal'],
            'date_it_authorization_renewal' => $request['date_it_authorization_renewal'],

            'logo_big' => isset($filePaths['logo_big']) ? basename($filePaths['logo_big']) : null,
            'logo_small' => isset($filePaths['logo_small']) ? basename($filePaths['logo_small']) : null,
            'ds_pic1' => isset($filePaths['ds_pic1']) ? basename($filePaths['ds_pic1']) : null,
            'ds_pic2' => isset($filePaths['ds_pic2']) ? basename($filePaths['ds_pic2']) : null,
            'ds_pic3' => isset($filePaths['ds_pic3']) ? basename($filePaths['ds_pic3']) : null,
            'ds_pic4' => isset($filePaths['ds_pic4']) ? basename($filePaths['ds_pic4']) : null,
            'ds_pic5' => isset($filePaths['ds_pic5']) ? basename($filePaths['ds_pic5']) : null,
        ]);



        return redirect()->route('drivingSchool')->with('success', 'Driving school added successfully.');
    }


    public function viewEditForm($ds_code) {
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;

        // $ds_code = 'DS_001';
        $selectedDs = DB::table('tb_ds')->where('ds_code', $ds_code)->first();


    
        // Return the view with the fetched data
        return view('ds.updateForm', [
            'selectedDs' => $selectedDs,
            'first_name' => $first_name,
        ]);

        // return dd($selectedDs);
    }

    public function updateDs(Request $request, $ds_code) 
    {

        $request->validate([
            'ds_code' => 'required|string|max:255',
            'ds_name' => 'required|string|max:255',
            'ds_address' => 'required|string|max:255',
            'ds_contact_no' => 'required|string|max:20',
            'business_type' => 'required|string|max:255',
            'dti_accreditation_no' => 'required|string|max:255',
            'lto_accreditation_no' => 'required|string|max:255',
            'date_it_started' => 'required|date',
            'date_it_accredited' => 'required|date',
            'date_it_renewal' => 'required|date',
            'is_active' => 'required|boolean',
            'description' => 'required|string|max:500',
            'province' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'town_city' => 'required|string|max:255',
            'ds_fee_theoretical' => 'required|numeric',
            'ds_fee_practical' => 'required|numeric',
            'ds_fee_dep_cde' => 'required|numeric',
            'ds_fee_dep_drc' => 'required|numeric',
            'server_location' => 'required|string|max:255',
            'is_live' => 'required|boolean',
            'is_with_pos' => 'required|boolean',
            'date_it_accreditation_renewal' => 'required|date',
            'date_it_authorization_renewal' => 'required|date',

             // Image Uploads
            // 'logo_big' => 'required',
            // 'logo_small' => 'required',
            // 'ds_pic1' => 'required',
            // 'ds_pic2' => 'required',
            // 'ds_pic3' => 'required',
            // 'ds_pic4' => 'required',
            // 'ds_pic5' => 'required',
        ]);

        // Update the record in the database
        DB::table('tb_ds')
            ->where('ds_code', $ds_code)
            ->update([
                'ds_code' => $request->input('ds_code'),
                'ds_name' => $request->input('ds_name'),
                'ds_address' => $request->input('ds_address'),
                'ds_contact_no' => $request->input('ds_contact_no'),
                'business_type' => $request->input('business_type'),
                'dti_accreditation_no' => $request->input('dti_accreditation_no'),
                'lto_accreditation_no' => $request->input('lto_accreditation_no'),
                'date_it_started' => $request->input('date_it_started'),
                'date_it_accredited' => $request->input('date_it_accredited'),
                'date_it_renewal' => $request->input('date_it_renewal'),
                'is_active' => $request->input('is_active'),
                'description' => $request->input('description'),
                'province' => $request->input('province'),
                'region' => $request->input('region'),
                'town_city' => $request->input('town_city'),
                'ds_fee_theoretical' => $request->input('ds_fee_theoretical'),
                'ds_fee_practical' => $request->input('ds_fee_practical'),
                'ds_fee_dep_cde' => $request->input('ds_fee_dep_cde'),
                'ds_fee_dep_drc' => $request->input('ds_fee_dep_drc'),
                'server_location' => $request->input('server_location'),
                'is_live' => $request->input('is_live'),
                'is_with_pos' => $request->input('is_with_pos'),
                'date_it_accreditation_renewal' => $request->input('date_it_accreditation_renewal'),
                'date_it_authorization_renewal' => $request->input('date_it_authorization_renewal'),

                 // Image Uploads
            // 'logo_big' => 'required',
            // 'logo_small' => 'required',
            // 'ds_pic1' => 'required',
            // 'ds_pic2' => 'required',
            // 'ds_pic3' => 'required',
            // 'ds_pic4' => 'required',
            // 'ds_pic5' => 'required',
            ]);

        // Redirect with a success message
        return redirect()->route('drivingSchool')->with('success', 'Driving school updated successfully.');
}


    public function deleteDs($ds_code) {
        DB::table('tb_ds')->where('ds_code', $ds_code)->delete();
        return redirect()->route('drivingSchool')->with('success', 'Driving school deleted successfully.');
    }
}
