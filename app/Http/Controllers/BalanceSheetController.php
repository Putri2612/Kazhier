<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Asset;
use App\Models\BankAccount;
use App\Models\Equity;
use App\Models\Liability;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceSheetController extends Controller
{
    
    public function index(Request $request){
        if(Auth::user()->can('view balance sheet')){
            $creatorId = Auth::user()->creatorId();

            $assets['Current Assets']     = Asset::where('created_by', '=', $creatorId)->where('type', '=', 'current asset')->get();
            $assets['Fixed Assets']       = Asset::where('created_by', '=', $creatorId)->where('type', '=', 'fixed asset')->get();
            $assets['Inventories']        = Asset::where('created_by', '=', $creatorId)->where('type', '=', 'inventory')->get();
            $assets['Non-current Assets'] = Asset::where('created_by', '=', $creatorId)->where('type', '=', 'non-current asset')->get();
            $assets['Prepayments']        = Asset::where('created_by', '=', $creatorId)->where('type', '=', 'prepayment')->get();
            $assets['Bank & Cash']        = Asset::where('created_by', '=', $creatorId)->where('type', '=', 'bank & cash')->get();
            $assets['Depreciations']      = Asset::where('created_by', '=', $creatorId)->where('type', '=', 'depreciation')->get();

            $bankAccounts = BankAccount::where('created_by', '=', $creatorId)->get();
            foreach($bankAccounts as $account){
                $assets['Current Assets']->prepend($account);
            }

            $liabilities['Current Liabilities']     = Liability::where('created_by', '=', $creatorId)->where('type', '=', 'current liability')->get();
            $liabilities['Liabilities']             = Liability::where('created_by', '=', $creatorId)->where('type', '=', 'liability')->get();
            $liabilities['Non-current Liabilities'] = Liability::where('created_by', '=', $creatorId)->where('type', '=', 'non-current liability')->get();
            
            $equities = Equity::where('created_by', '=', $creatorId)->get();
            return view('balanceSheet.index', compact('assets', 'liabilities', 'equities'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
