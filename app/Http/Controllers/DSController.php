<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DSController extends Controller
{
    public function index() {
        $loggedUser = session('logged_in');

        // Access specific columns from the session data
        $first_name = $loggedUser->first_name;
          return view('ds.ds-list', [
            'first_name' => $first_name,
        ]);
    }

    public function createNewDs(Request $request) {

        $request->validate([
            'ds_code' => 'required',
            'ds_name' => 'required',
            // 'ds_address' => 'required',
            // 'ds_contact_no' => 'required',
            // 'business_type' => 'required',
            // 'dti_accreditation_no' => 'required',
            // 'lto_accreditation_no' => 'required',
            // 'date_it_started' => 'required',
            // 'date_it_accredited' => 'required',
            // 'date_it_renewal' => 'required',
            // 'is_active' => 'required',
            // 'description' => 'required',
            // 'province' => 'required',
            // 'region' => 'required',
            // 'town_city' => 'required',
            // 'logo_big' => 'required',
            // 'logo_small' => 'required',
            // 'ds_pic1' => 'required',
            // 'ds_pic2' => 'required',
            // 'ds_pic3' => 'required',
            // 'ds_pic4' => 'required',
            // 'ds_pic5' => 'required',
            // 'ds_fee_theoretical' => 'required',
            // 'ds_fee_practical' => 'required',
            // 'ds_fee_dep_cde' => 'required',
            // 'ds_fee_dep_drc' => 'required',
            // 'server_location' => 'required',
            // 'is_live' => 'required',
            // 'is_with_pos' => 'required',
            // 'url_lto_itp1_live' => 'required',
            // 'url_lto_itp1_test' => 'required',
            // 'url_lto_itp2_live' => 'required',
            // 'url_lto_itp2_test' => 'required',
            // 'url_cdbs_live' => 'required',
            // 'url_cdbs_test' => 'required',
            // 'url_itp_live' => 'required',
            // 'url_itp_test' => 'required',
            // 'date_it_accreditation_renewal' => 'required',
            // 'date_it_authorization_renewal' => 'required',
            
        ]);

        $create = DB::table('tb_ds')->insert([
            'ds_code' => $request['ds_code'],
            'ds_name' => $request['ds_name'],
            // 'ds_address' => $request['ds_address'],
            // 'ds_contact_no' => $request['ds_contact_no'],
            // 'business_type' => $request['business_type'],
            // 'dti_accreditation_no' => $request['dti_accreditation_no'],
            // 'lto_accreditation_no' => $request['lto_accreditation_no'],
            // 'date_it_started' => $request['date_it_started'],
            // 'date_it_accredited' => $request['date_it_accredited'],
            // 'date_it_renewal' => $request['date_it_renewal'],
            // 'is_active' => $request['is_active'],
            // 'description' => $request['description'],
            // 'province' => $request['province'],
            // 'region' => $request['region'],
            // 'town_city' => $request['town_city'],
            // 'logo_big' => $request['logo_big'],
            // 'logo_small' => $request['logo_small'],
            // 'ds_pic1' => $request['ds_pic1'],
            // 'ds_pic2' => $request['ds_pic2'],
            // 'ds_pic3' => $request['ds_pic3'],
            // 'ds_pic4' => $request['ds_pic4'],
            // 'ds_pic5' => $request['ds_pic5'],
            // 'ds_fee_theoretical' => $request['ds_fee_theoretical'],
            // 'ds_fee_practical' => $request['ds_fee_practical'],
            // 'ds_fee_dep_cde' => $request['ds_fee_dep_cde'],
            // 'ds_fee_dep_drc' => $request['ds_fee_dep_drc'],
            // 'server_location' => $request['server_location'],
            // 'is_live' => $request['is_live'],
            // 'url_lto_itp1_live' => $request['url_lto_itp1_live'],
            // 'url_lto_itp1_test' => $request['url_lto_itp1_test'],
            // 'url_lto_itp2_live' => $request['url_lto_itp2_live'],
            // 'url_lto_itp2_test' => $request['url_lto_itp2_test'],
            // 'url_cdbs_live' => $request['url_cdbs_live'],
            // 'url_cdbs_test' => $request['url_cdbs_test'],
            // 'url_itp_live' => $request['url_itp_live'],
            // 'url_itp_test' => $request['url_itp_test'],
            // 'date_it_accreditation_renewal' => $request['date_it_accreditation_renewal'],
            // 'date_it_authorization_renewal' => $request['date_it_authorization_renewal'],
            // 'created_at' => now(),
            // 'updated_at' => now()
        ]);


        // return dd($request);
        return $create;

    }
}
