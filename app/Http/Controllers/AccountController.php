<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
            'password' => 'required|min:5', // Ensure minimum length for the password
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
            'ds_code' => 'required',
            'certificate_tesda' => 'required',
            'certificate_tesda_expiration' => 'required',
            'is_active' => 'required',
            'description' => 'nullable',
            'user_expiration' => 'required',
            
            // Nullable fields
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
            'fp_id_img_r1' => 'nullable',
        ]);

        $validator = FacadesValidator::make($request->all(), [
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->route('accounts')->with('error', 'There was an error creating account.');
        }

        // Encrypt password
        $_password = $request->password;
        $_enc_password = hash("sha512", $_password);
        $validatedData['password'] = $_enc_password;

        // Process image fields
        // $imageFields = ['pic_id1', 'pic_id2', 'pic_id3', 'pic_id4', 'pic_id5'];
        // foreach ($imageFields as $imageField) {
        //     if ($request->filled($imageField)) {
        //         $binaryData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->$imageField));
        //         $validatedData[$imageField] = $binaryData; 
        //     }
        // }

        // $fingerprintFields = ['fp_idl1', 'fp_idr1', 'fp_idl2', 'fp_idr2', 'fp_idl3', 'fp_idr3', 'fp_idl4', 'fp_idr4', 'fp_idl5', 'fp_idr5'];
        // foreach ($fingerprintFields as $fingerprintField) {
        //     if ($request->filled($fingerprintField)) {
        //         $binaryFingerprintData = base64_decode($request->$fingerprintField);
        //         $validatedData[$fingerprintField] = $binaryFingerprintData;
        //     }
        // }

        // dd($request->all());
        try {
            DB::beginTransaction();
            DB::table('tb_users')->insert($validatedData);
            DB::commit();
            return redirect()->route('accounts')->with('success', 'Account created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->route('accounts')->with('error', 'There was an error creating account.');
        }
    }
    
    
    public function viewEditForm($user_id){
        $loggedUser = session('logged_in');
        $first_name = $loggedUser->first_name;
        $selectedAcc = DB::table('tb_users')->where('user_id', $user_id)->first();
        return view('accounts.editAccountForm', [
            'selectedAcc' => $selectedAcc,
            'first_name' => $first_name,
        ]);
    }

        public function editAccount(Request $request, $user_id) {

            $validatedData = $request->validate([
                'recno' => 'required',
                'user_id' => 'required',
                'employee_id' => 'required',
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'user_type' => 'required',
                'ds_code' => 'required',
                'certificate_tesda' => 'required',
                'certificate_tesda_expiration' => 'required',
                'is_active' => 'required',
                'description' => 'nullable',
                'user_expiration' => 'required',
                'password' => 'nullable',
        
                // other fields
                'pic_id1' => 'nullable',
                'pic_id2' => 'nullable',
                'pic_id3' => 'nullable',
                'pic_id4' => 'nullable',
                'pic_id5' => 'nullable',
                'fp_idl1' => 'nullable|string',
                'fp_idl2' => 'nullable|string',
                'fp_idl3' => 'nullable|string',
                'fp_idl4' => 'nullable|string',
                'fp_idl5' => 'nullable|string',
                'fp_idr1' => 'nullable|string',
                'fp_idr2' => 'nullable|string',
                'fp_idr3' => 'nullable|string',
                'fp_idr4' => 'nullable|string',
                'fp_idr5' => 'nullable|string',
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
        
            $user = DB::table('tb_users')->where('user_id', $user_id)->first();
        
            if ($request->filled('old_password')) {
                $_password = $request->old_password;
                $_enc_password = hash("sha512", $_password);
        
                if (strtoupper($_enc_password) !== strtoupper($user->password)) {
                    return back()->withErrors([
                        'old_password' => 'The provided password does not match your current password.',
                    ]);
                }
        
                if ($request->filled('password')) {
                    $_password = $request->password;
                    $_enc_password = hash("sha512", $_password);
                    $validatedData['password'] = $_enc_password;
                }
            }
        
            DB::transaction(function () use ($user_id, $validatedData) {
                try {
                    DB::table('tb_users')->where('user_id', $user_id)->update($validatedData);
                } catch (\Throwable $th) {
                        DB::rollBack();
                    throw $th;
                }
            });
        
            return redirect()->route('accounts')->with('success', 'Account updated successfully.');
        }
    

    public function deleteAccount($user_id){
            DB::table('tb_users')->where('user_id', $user_id)->delete();
            return redirect()->route('accounts')->with('success', 'Account deleted successfully.');
    }
}
