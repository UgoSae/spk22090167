<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Validator;

class SettingController extends Controller
{
    public function showBobotForm()
    {
        $c1 = json_decode(Setting::getValue('c1'), true);
        $c2 = json_decode(Setting::getValue('c2'), true);
        $c3 = json_decode(Setting::getValue('c3'), true);
        $c4 = json_decode(Setting::getValue('c4'), true);
        $c5 = json_decode(Setting::getValue('c5'), true);
        
        return view('settings.bobot', compact('c1', 'c2', 'c3', 'c4', 'c5'));
    }

    public function bobot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'w_c1' => 'required|numeric',
            'cost_c1' => 'required',
            'w_c2' => 'required|numeric',
            'cost_c2' => 'required',
            'w_c3' => 'required|numeric',
            'cost_c3' => 'required',
            'w_c4' => 'required|numeric',
            'cost_c4' => 'required',
            'w_c5' => 'required|numeric',
            'cost_c5' => 'required'
        ]);

        $data = ['stored' => true];
        
        if ($validator->fails()) {
            $data['stored'] = false;
            $data['msg'] = $validator->errors();
        } else {
            $c1 = ['weight' => $request->input('w_c1'), 'is_cost' => $request->input('cost_c1')];
            $c2 = ['weight' => $request->input('w_c2'), 'is_cost' => $request->input('cost_c2')];
            $c3 = ['weight' => $request->input('w_c3'), 'is_cost' => $request->input('cost_c3')];
            $c4 = ['weight' => $request->input('w_c4'), 'is_cost' => $request->input('cost_c4')];
            $c5 = ['weight' => $request->input('w_c5'), 'is_cost' => $request->input('cost_c5')];
            
            Setting::setValue('c1', json_encode($c1), true);
            Setting::setValue('c2', json_encode($c2), true);
            Setting::setValue('c3', json_encode($c3), true);
            Setting::setValue('c4', json_encode($c4), true);
            Setting::setValue('c5', json_encode($c5), true);

            $data['msg'] = "Berhasil menyimpan Pengaturan Pembobotan";
        }
        
        return redirect()->back()->with('success', 'Berhasil menyimpan Pengaturan Pembobotan');
    }
}
