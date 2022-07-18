<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\BankAccount;
use App\Models\Equity;
use App\Models\Liability;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BalanceSheetController extends Controller
{
    use ApiResponse;
    
    public function get(Request $request) {
        if(!Auth::user()->can('view balance sheet')) {
            return $this->UnauthorizedResponse();
        }

        $creatorId = Auth::user()->creatorId();

        $assets = Asset::where('created_by', $creatorId)
                ->select('name', 'type', 'amount', 'description')
                ->get()
                ->groupBy('type');

        $bankAccounts = BankAccount::select(
                            DB::raw('CONCAT(bank_name, " ", holder_name) AS name'), 
                            'id'
                        )->where('created_by', $creatorId)
                        ->get();

        if(isset($assets['current assets']) && !$assets['current assets']->isEmpty()) {
            foreach($bankAccounts as $account) {
                $account->amount = $account->CurrentBalance();
                $assets['current assets']->prepend($account);
            }
        } else {
            foreach($bankAccounts as $account) {
                $account->amount = $account->CurrentBalance();
            }
            $asset['current assets'] = $bankAccounts;
        }

        $liabilities    = Liability::where('created_by', $creatorId)
                        ->select('name', 'type', 'amount', 'description')
                        ->get()->groupBy('type');
        $equities       = Equity::where('created_by', $creatorId)
                        ->select('name', 'amount', 'description')
                        ->get();

        return $this->FetchSuccessResponse(
            ['assets' => $assets, 'liabilities' => $liabilities, 'equities' => $equities]
        );
    }
}
