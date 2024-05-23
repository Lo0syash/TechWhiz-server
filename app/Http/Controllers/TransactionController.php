<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactionSend(Request $request)
    {
        $sum = $request->minus ? -$request->sum : $request->sum;

        Transactions::create([
            'user_id' => $request->user_id,
            'groups_id' => $request->group_id,
            'sum' => $sum,
            'description' => $request->description
        ]);

        return redirect()->route('group', $request->group_id);
    }
}
