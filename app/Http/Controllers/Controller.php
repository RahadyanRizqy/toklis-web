<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\ElectricToken;
use App\Models\Balance;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    // BALANCE CONTROLLER
    public function balanceStore(Request $request)
    {
        return response($request->all());
    }

    public function balanceUpdate(Request $request)
    {
        return response($request->all());
    }

    public function balanceDestroy(Balance $balance)
    {

    }

    // ELECTRIC TOKEN CONTROLLER
    public function tokenIndex()
    {
        return view('master', ['subview' => 'home'])->with(
            [
                'electric_tokens' => ElectricToken::paginate(5),
                'amount' => Balance::first()->amount,
                
            ]
        );
    }

    public function tokenEdit($id)
    {
        return response(ElectricToken::find($id));
    }

    public function tokenStore(Request $request)
    {
        $request->validate([
            'token_number' => 'required',
            'purchased_date' => 'required',
            'cost' => 'required',
        ]);

        $input = $request->all();

        $input['token_status'] = (isset($input['token_status'])) ? 1 : 0;
        $input['purchased_date'] = Carbon::parse($input['purchased_date'])->format('d-m-Y') . " " . Carbon::now('Asia/Jakarta')->format('H:i');
        // dd($input);
        $json = false;
        if ($json) {
            return response($input);
        }
        else {
            ElectricToken::create($input);
            return redirect()->back();
        }
    }

    public function tokenUpdate(Request $request, $id)
    {
        $request->validate([
            'token_number' => 'required',
            'purchased_date' => 'required',
            'cost' => 'required',
        ]);

        $input = $request->all();

        $input['token_status'] = (isset($input['token_status'])) ? 1 : 0;
        $input['purchased_date'] = Carbon::parse($input['purchased_date'])->format('d-m-Y') . " " . Carbon::now('Asia/Jakarta')->format('H:i');
        // return response($input);
        ElectricToken::find($id)->update($input);
        return redirect()->back();
    }

    public function tokenDestroy($id)
    {
        ElectricToken::destroy($id);
        // return redirect()->back();
        // return response(ElectricToken::find($id));
    }
}
