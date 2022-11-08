<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getTransactions(Request $request){
        $transaction = Transaction::withWhereHas('location',function ($q) use($request){
                $q->when(!empty($request->location),function ($query) use($request){
                    $query->where('id',$request->location);;
                });
            })
            ->when(!empty($request->transaction_date),function ($query) use($request){
                $query->whereDate('created_at',Carbon::createFromDate($request->transaction_date)->format('Y-m-d'));
            })
            ->where(['user_id' => auth()->user()->id])
            ->paginate($request->per_page);
        return TransactionResource::collection($transaction);
    }
}
