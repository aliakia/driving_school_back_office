<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function fetchData() {
        $accountData = DB::table('tb_users')->select('user_id', 'employee_id', 'first_name', 'last_name', 'ds_code', 'is_active', 'user_type')->get();
        return response()->json([
            'accountData' => $accountData
        ]);
    }

    public function index() {
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;

        // $accounts = DB::table('tb_users')
        $accounts = DB::table('tb_users')
                    ->select(
                    'user_id',
                    'employee_id',
                    'first_name',
                    'last_name',
                    'ds_code',
                    'is_active', 
                    'user_type'
                    )->get();


        return view('accounts.accountList', [
            'first_name' => $first_name,
            'accounts' => $accounts,
        ]);
    }

    public function createAccount(Request $request) {
        $validatedData = $request->validate([
            'recno' => 'required',
            'user_id' => 'required',
            'employee_id' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
            'ds_code' => 'required',
            'certificate_tesda' => 'required',
            'certificate_tesda_expiration' => 'required',
            'is_active' => 'required',
            'description' => 'required',
            'user_expiration' => 'required',

            // tsaka na
            'pic_id1' => 'nullable',
            'pic_id2' => 'nullable',
            'pic_id3' => 'nullable',
            'pic_id4' => 'nullable',
            'pic_id5' => 'nullable',
            'fp_idr1' => 'nullable',
            'fp_idr2' => 'nullable',
            'fp_idr3' => 'nullable',
            'fp_idr4' => 'nullable',
            'fp_idr5' => 'nullable',
            'fp_idl1' => 'nullable',
            'fp_idl2' => 'nullable',
            'fp_idl3' => 'nullable',
            'fp_idl4' => 'nullable',
            'fp_idl5' => 'nullable',
            'rfid' => 'nullable',
            'fp_id_str_r1' => 'nullable',
            'fp_id_str_r2' => 'nullable',
            'fp_id_str_r3' => 'nullable',
            'fp_id_str_r4' => 'nullable',
            'fp_id_str_r5' => 'nullable',
            'fp_id_str_l1' => 'nullable',
            'fp_id_str_l2' => 'nullable',
            'fp_id_str_l3' => 'nullable',
            'fp_id_str_l4' => 'nullable',
            'fp_id_str_l5' => 'nullable',
            'fp_id_img_r1' => 'nullable',
            'fp_id_img_r2' => 'nullable',
            'fp_id_img_r3' => 'nullable',
            'fp_id_img_r4' => 'nullable',
            'fp_id_img_r5' => 'nullable',
            'fp_id_img_l1' => 'nullable',
            'fp_id_img_l2' => 'nullable',
            'fp_id_img_l3' => 'nullable',
            'fp_id_img_l4' => 'nullable',
            'fp_id_img_l5' => 'nullable',
           
        ]);

        try{
            DB::beginTransaction();

            DB::table('tb_users')->insert($validatedData);
            DB::commit();
            return redirect()->route('accounts')->with('success', 'Account created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            // return redirect()->route('accounts')->with('error', 'There was an error creating account.');
        }
    }

    public function viewEditForm($user_id){
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;
        $selectedAcc = DB::table('tb_users')->where('user_id', $user_id)->first();
        return view('accounts.EditAccountForm', [
            'selectedAcc' => $selectedAcc,
            'first_name' => $first_name,
        ]);
    }

    public function editAccount(Request $request, $user_id) {
        $request->validate([
            'recno' => 'required',
            'user_id' => 'required',
            'employee_id' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
            'ds_code' => 'required',
            'certificate_tesda' => 'required',
            'certificate_tesda_expiration' => 'required',
            'is_active' => 'required',
            'description' => 'required',
            'user_expiration' => 'required',

            // tsaka na
            'pic_id1' => 'nullable',
            'pic_id2' => 'nullable',
            'pic_id3' => 'nullable',
            'pic_id4' => 'nullable',
            'pic_id5' => 'nullable',
            'fp_idr1' => 'nullable',
            'fp_idr2' => 'nullable',
            'fp_idr3' => 'nullable',
            'fp_idr4' => 'nullable',
            'fp_idr5' => 'nullable',
            'fp_idl1' => 'nullable',
            'fp_idl2' => 'nullable',
            'fp_idl3' => 'nullable',
            'fp_idl4' => 'nullable',
            'fp_idl5' => 'nullable',
            'rfid' => 'nullable',
            'fp_id_str_r1' => 'nullable',
            'fp_id_str_r2' => 'nullable',
            'fp_id_str_r3' => 'nullable',
            'fp_id_str_r4' => 'nullable',
            'fp_id_str_r5' => 'nullable',
            'fp_id_str_l1' => 'nullable',
            'fp_id_str_l2' => 'nullable',
            'fp_id_str_l3' => 'nullable',
            'fp_id_str_l4' => 'nullable',
            'fp_id_str_l5' => 'nullable',
            'fp_id_img_r1' => 'nullable',
            'fp_id_img_r2' => 'nullable',
            'fp_id_img_r3' => 'nullable',
            'fp_id_img_r4' => 'nullable',
            'fp_id_img_r5' => 'nullable',
            'fp_id_img_l1' => 'nullable',
            'fp_id_img_l2' => 'nullable',
            'fp_id_img_l3' => 'nullable',
            'fp_id_img_l4' => 'nullable',
            'fp_id_img_l5' => 'nullable',
           
        ]);

        DB::transaction(function () use ($request, $user_id) {

            try {
                DB::beginTransaction();
                DB::table('tb_users')
                    ->where('user_id', $user_id)
                    ->update([
                        'recno' => $request->input('recno'),
                        'user_id' => $request->input('user_id'),
                        'employee_id' => $request->input('employee_id'),
                        'password' => $request->input('password'),
                        'first_name' => $request->input('first_name'),
                        'middle_name' => $request->input('middle_name'),
                        'last_name' => $request->input('last_name'),
                        'gender' => $request->input('gender'),
                        'user_type' => $request->input('user_type'),
                        'ds_code' => $request->input('ds_code'),
                        'certificate_tesda' => $request->input('certificate_tesda'),
                        'certificate_tesda_expiration' => $request->input('certificate_tesda_expiration'),
                        'is_active' => $request->input('is_active'),
                        'description' => $request->input('description'),
                        'user_expiration' => $request->input('user_expiration'),
                    ]);
            
              
                        DB::commit();
                        
                        return redirect()->route('accounts')->with('success', 'Driving School updated successfully.');
                        
            } catch (\Throwable $th) {
                        DB::rollBack();

                        dd($th);
                        // return redirect()->route('accounts')->with('error', 'There was an error creating driving school.');
                    }
                    
                });
                    // return dd($request);

    }

    public function deleteAccount($user_id){

  
            DB::table('tb_users')->where('user_id', $user_id)->delete();
            return redirect()->route('accounts')->with('success', 'Account deleted successfully.');

    }
}
