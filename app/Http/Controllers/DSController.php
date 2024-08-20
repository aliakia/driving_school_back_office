<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class DSController extends Controller
{
    // public function upload(Request $request)
    // {
    //     try {
    //         // Validate the request
    //         $request->validate([
    //             'logo_big' => 'image|mimes:jpg,jpeg,png,gif|max:2048|nullable',
    //         ]);

    //         // Handle file upload
    //         if ($request->hasFile('logo_big')) {
    //             $file = $request->file('logo_big');
    //             $filename = time() . '.' . $file->getClientOriginalExtension();
    //             $file->storeAs('public/images', $filename);

    //             // Redirect to homepage with a success message
    //             return redirect('/')->with('success', 'File uploaded successfully');
    //         } else {
    //             return redirect('/')->with('error', 'No file uploaded');
    //         }
    //     } catch (\Exception $e) {
    //         Log::error($e->getMessage());

    //         return redirect('/')->with('error', 'An error occurred while uploading the file');
    //     }
    // }


    public function index() {
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;
        
        // Access specific columns from the session data

        $all_ds = DB::table('tb_ds')->get();
        // if ($all_ds) {
        //     $all_ds->logo_big = Storage::url($drivingSchool->logo_big ?? '');
        // }

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

    public function createNewDs(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'ds_code' => 'required|string|max:255',
            'ds_name' => 'required|string|max:255',
            'ds_contact_no' => 'required|string|max:20',
            'business_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ds_address' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'town_city' => 'required|string|max:255',
            'dti_accreditation_no' => 'required|integer',
            'lto_accreditation_no' => 'required|integer',
            'date_it_started' => 'required|date',
            'date_it_accredited' => 'required|date',
            'date_it_renewal' => 'required|date',
            'is_active' => 'required|boolean',
            'ds_fee_theoretical' => 'required|numeric',
            'ds_fee_practical' => 'required|numeric',
            'ds_fee_dep_cde' => 'required|numeric',
            'ds_fee_dep_drc' => 'required|numeric',
            'server_location' => 'required|string|max:255',
            'is_live' => 'required|boolean',
            'is_with_pos' => 'required|boolean',
            'date_it_accreditation_renewal' => 'nullable|date',
            'date_it_authorization_renewal' => 'nullable|date',
            'logo_big' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'logo_small' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'ds_pic1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'ds_pic2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'ds_pic3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'ds_pic4' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'ds_pic5' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        // Handle file uploads and store file paths
        $filePaths = [];
        foreach (['logo_big', 'logo_small', 'ds_pic1', 'ds_pic2', 'ds_pic3', 'ds_pic4', 'ds_pic5'] as $file) {
            if ($request->hasFile($file)) {
                $filePaths[$file] = $request->file($file)->store('uploads', 'public');
            }
        }
    
        // Prepare data for insertion
        $data = array_merge(
            $validatedData,
            $filePaths
        );
    
        // Insert data into the database using DB facade
        DB::table('tb_ds')->insert($data);
    
        // Return a JSON response
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Form submitted successfully',
        //     'data' => $data,
        // ]);

        return redirect()->route('drivingSchool')->with('success', 'Driving School updated successfully.');
    }


    public function viewEditForm($ds_code) {
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;
        // $ds_code = 'DS_001';
        $selectedDs = DB::table('tb_ds')->where('ds_code', $ds_code)->first();
        $dsSetting = DB::table('tb_settings')->where('ds_code', $ds_code)->first();
  
        // Return the view with the fetched data
        return view('ds.updateForm', [
            'selectedDs' => $selectedDs,
            'dsSetting' => $dsSetting,
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
            'logo_big' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'logo_small' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic1' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic2' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic3' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic4' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'ds_pic5' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            //SETTINGS INPUT
            "validity_theoretical" => 'required',
            "validity_practical" => 'required',
            "validity_dep_cde" => 'required',
            "validity_dep_drc" => 'required',
            "lto_fee_theoretical" => 'required',
            "lto_fee_practical" => 'required',
            "lto_fee_dep_cde" => 'required',
            "lto_fee_dep_drc" => 'required',
            "cdbs_fee_theoretical" => 'required',
            "cdbs_fee_practical" => 'required',
            "cdbs_fee_dep_cde" => 'required',
            "cdbs_fee_dep_drc" => 'required',
            "it_fee_theoretical" => 'required',
            "it_fee_practical" => 'required',
            "it_fee_dep_cde" => 'required',
            "it_fee_dep_drc" => 'required',
            "others_fee_theoretical" => 'required',
            "others_fee_practical" => 'required',
            "others_fee_dep_cde" => 'required',
            "others_fee_dep_drc" => 'required',
            "mc_daily_upload_limit" => 'required',
            "lv_daily_upload_limit" => 'required',
            "weekly_upload_limit" => 'required',
            "seating_capacity" => 'required',
            "accredited_classroom_count" => 'required',
            "percentage_allowable_seating_capacity" => 'required',
            "number_unique_classes_per_days_per_tdc" => 'required',
            "number_unique_classes_per_days_per_dep" => 'required',
            "number_prescribed_days_per_instruction" => 'required',
        ]);
        $filePaths = [];
        $fileFields = ['logo_big', 'logo_small', 'ds_pic1', 'ds_pic2', 'ds_pic3', 'ds_pic4', 'ds_pic5'];
        
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $filePaths[$field] = $request->file($field)->store('public/images');
            }
        }

        DB::transaction(function () use ($request, $ds_code, $filePaths) {
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

                    'logo_big' => isset($filePaths['logo_big']) ? basename($filePaths['logo_big']) : null,
                    'logo_small' => isset($filePaths['logo_small']) ? basename($filePaths['logo_small']) : null,
                    'ds_pic1' => isset($filePaths['ds_pic1']) ? basename($filePaths['ds_pic1']) : null,
                    'ds_pic2' => isset($filePaths['ds_pic2']) ? basename($filePaths['ds_pic2']) : null,
                    'ds_pic3' => isset($filePaths['ds_pic3']) ? basename($filePaths['ds_pic3']) : null,
                    'ds_pic4' => isset($filePaths['ds_pic4']) ? basename($filePaths['ds_pic4']) : null,
                    'ds_pic5' => isset($filePaths['ds_pic5']) ? basename($filePaths['ds_pic5']) : null,
    
                     
                ]);
        
            DB::table('tb_settings')
                ->where('ds_code', $ds_code)
                    ->update([
                        "ds_code" => $ds_code,
                        "validity_theoretical" => $request->input('validity_theoretical'),
                        "validity_practical" => $request->input('validity_practical'),
                        "validity_dep_cde" => $request->input('validity_dep_cde'),
                        "validity_dep_drc" => $request->input('validity_dep_drc'),
                        "lto_fee_theoretical" => $request->input('lto_fee_theoretical'),
                        "lto_fee_practical" => $request->input('lto_fee_practical'),
                        "lto_fee_dep_cde" => $request->input('lto_fee_dep_cde'),
                        "lto_fee_dep_drc" => $request->input('lto_fee_dep_drc'),
                        "cdbs_fee_theoretical" => $request->input('cdbs_fee_theoretical'),
                        "cdbs_fee_practical" => $request->input('cdbs_fee_practical'),
                        "cdbs_fee_dep_cde" => $request->input('cdbs_fee_dep_cde'),
                        "cdbs_fee_dep_drc" => $request->input('cdbs_fee_dep_drc'),
                        "it_fee_theoretical" => $request->input('it_fee_theoretical'),
                        "it_fee_practical" => $request->input('it_fee_practical'),
                        "it_fee_dep_cde" => $request->input('it_fee_dep_cde'),
                        "it_fee_dep_drc" => $request->input('it_fee_dep_drc'),
                        "others_fee_theoretical" => $request->input('others_fee_theoretical'),
                        "others_fee_practical" => $request->input('others_fee_practical'),
                        "others_fee_dep_cde" => $request->input('others_fee_dep_cde'),
                        "others_fee_dep_drc" => $request->input('others_fee_dep_drc'),
                        "mc_daily_upload_limit" => $request->input('mc_daily_upload_limit'),
                        "lv_daily_upload_limit" => $request->input('lv_daily_upload_limit'),
                        "weekly_upload_limit" => $request->input('weekly_upload_limit'),
                        "seating_capacity" => $request->input('seating_capacity'),
                        "accredited_classroom_count" => $request->input('accredited_classroom_count'),
                        "percentage_allowable_seating_capacity" => $request->input('percentage_allowable_seating_capacity'),
                        "number_unique_classes_per_days_per_tdc" => $request->input('number_unique_classes_per_days_per_tdc'),
                        "number_unique_classes_per_days_per_dep" => $request->input('number_unique_classes_per_days_per_dep'),
                        "number_prescribed_days_per_instruction" => $request->input('number_prescribed_days_per_instruction'),
                    ]);
        
        });

        return redirect()->route('drivingSchool')->with('success', 'Driving School updated successfully.');
        // return dd($request);
}


    public function deleteDs($ds_code) {
        DB::table('tb_ds')->where('ds_code', $ds_code)->delete();
        DB::table('tb_settings')->where('ds_code', $ds_code)->delete();
        return redirect()->route('drivingSchool')->with('success', 'Driving school deleted successfully.');
    }
}
