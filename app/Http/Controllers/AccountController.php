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
        // Validate the incoming request
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
            'description' => 'nullable',
            'user_expiration' => 'required',
    
            // Additional nullable fields
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
    
        // Hash the password before storing it in the database
        $_password = $request->password;
        $_enc_password = hash("sha512", $_password);
        $validatedData['password'] =$_enc_password;
    
        try {
            // Begin transaction
            DB::beginTransaction();
    
            // Insert the validated data into the database
            DB::table('tb_users')->insert($validatedData);
    
            // Commit the transaction
            DB::commit();
        } catch (\Throwable $th) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();
            // Optionally, you might want to log the error or handle it in some way
            return back()->withErrors(['error' => 'There was an error creating the account.']);
        }
    
        // Redirect after successful creation
        return redirect()->route('accounts')->with('success', 'Account created successfully.');
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
    
        // Retrieve the user
        $user = DB::table('tb_users')->where('user_id', $user_id)->first();
    
        // Validate old password if provided
        if ($request->filled('old_password')) {
            $_password = $request->old_password;
            $_enc_password = hash("sha512", $_password);
    
            if (strtoupper($_enc_password) !== strtoupper($user->password)) {
                return back()->withErrors([
                    'old_password' => 'The provided password does not match your current password.',
                ]);
            }
    
            // Hash and update the new password if provided
            if ($request->filled('password')) {
                $_password = $request->password;
                $_enc_password = hash("sha512", $_password);
                $validatedData['password'] = $_enc_password;
            }
        }
    
        // Begin transaction
        DB::transaction(function () use ($user_id, $validatedData) {
            try {
                DB::table('tb_users')->where('user_id', $user_id)->update($validatedData);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th; // Rethrow the exception after rolling back
            }
        });
    
        // Redirect after successful update
        return redirect()->route('accounts')->with('success', 'Account updated successfully.');
    }
    

    public function deleteAccount($user_id){
            DB::table('tb_users')->where('user_id', $user_id)->delete();
            return redirect()->route('accounts')->with('success', 'Account deleted successfully.');
    }
}
