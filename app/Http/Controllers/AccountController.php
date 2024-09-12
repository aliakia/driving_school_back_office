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
        $ds_codes = DB::table('tb_ds')->pluck('ds_code');
        $ds_name = DB::table('tb_ds')->pluck('ds_name');

        $ds_mapping = DB::table('tb_ds')->pluck('ds_name', 'ds_code')->toArray();

        // dd($ds_codes);
        // $accounts = DB::table('tb_users')
        $accounts = DB::table('tb_users')
                    ->select(
                    'user_id',
                    'employee_id',
                    'first_name',
                    'last_name',
                    'ds_code',
                    'is_active', 
                    'user_type',
                    )->get();



        return view('accounts.accountList', [
            'accounts' => $accounts,
            'ds_codes' => $ds_codes,
            'ds_name' => $ds_name,
            'ds_mapping' => $ds_mapping
          
        ]);
    }

   
    public function createAccount(Request $request) {
        $validatedData = $request->validate([
            // 'recno' => 'required',
            // 'pic_id1' => 'required',
            'user_id' => 'required',
            'employee_id' => 'required',
            'password' => 'required|min:5',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
            'ds_code' => 'nullable',
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
        $validatedData['password'] = strtoupper($_enc_password);

        // dd($validatedData);
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
        $ds_mapping = DB::table('tb_ds')->pluck('ds_name', 'ds_code')->toArray();
        $ds_codes = DB::table('tb_ds')->pluck('ds_code');
        $ds_name = DB::table('tb_ds')->pluck('ds_name');
        $selectedAcc = DB::table('tb_users')
            ->select(  
                'user_id',
                'employee_id',
                'first_name',
                'middle_name',
                'last_name',
                'gender',
                'user_type',
                'ds_code',
                'certificate_tesda',
                'certificate_tesda_expiration',
                'is_active',
                'description',
                'user_expiration',
                'password',
                DB::raw("encode(pic_id1, 'escape') as pic_id1"),
            )
            ->where('user_id', $user_id)->first();
        return view('accounts.editAccountForm', [
            'selectedAcc' => $selectedAcc,
            'ds_codes' => $ds_codes,
            'ds_name' => $ds_name,
            'ds_mapping' => $ds_mapping
        ]);
    }

    public function editAccount(Request $request, $user_id) {

        $validatedData = $request->validate([
            // 'recno' => 'required',
            // 'pic_id1' => 'required',
            'user_id' => 'required',
            'employee_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
            'ds_code' => 'nullable',
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
       
    
        DB::transaction(function () use ($user_id, $validatedData, $request) {
            try {
                $user = DB::table('tb_users')
                ->where('user_id', $user_id)->first();
        
                if ($request->filled('old_password')) {
                    $old_password = $request->old_password;
                    $old_enc_password = hash("sha512", $old_password);
        
                    if (strtoupper($old_enc_password) !== $user->password) {
                        return back()->with('error', 'Old password is incorrect.');
                    }
        
                    if ($request->filled('password')) {
                        $_password = $request->password;
                        $_enc_password = hash("sha512", $_password);
                        $validatedData['password'] = strtoupper($_enc_password);
                    } else {
                        unset($validatedData['password']);
                    }
                } else {
                    unset($validatedData['password']);
                }

                $biometricFields = ['fp_idl1', 'fp_idl2', 'fp_idl3', 'fp_idl4', 'fp_idl5', 'fp_idr1', 'fp_idr2', 'fp_idr3', 'fp_idr4', 'fp_idr5'];
        
                foreach ($biometricFields as $field) {
                    if (!$request->filled($field)) {
                        unset($validatedData[$field]);
                    }
                }
                if (!$request->filled('pic_id1')) {
                    unset($validatedData['pic_id1']);
                }
        
                DB::table('tb_users')->where('user_id', $user_id)->update($validatedData);
            } catch (\Throwable $th) {
                return back()->with('error', 'Account info not updated');
            }
        });
        
        
    
        return redirect()->route('accounts')->with('success', 'Account updated successfully.');
    }
    

    public function deleteAccount($user_id){
            DB::table('tb_users')->where('user_id', $user_id)->delete();
            return redirect()->route('accounts')->with('success', 'Account deleted successfully.');
    }
}
