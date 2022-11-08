<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::with('location')->where('user_id',auth()->user()->id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($model){
                    if($model->status == 'Success'){
                        $label = '<span class="badge badge-success">'. $model->status.'</span>';
                    }
                    elseif($model->status == 'Pending'){
                        $label = '<span class="badge badge-warning">'. $model->status.'</span>';
                    }
                    else{
                        $label = '<span class="badge badge-danger">'. $model->status.'</span>';
                    }
                    return $label;
                })
                ->editColumn('created_at', function ($model){
                    return Carbon::createFromDate($model->created_at)->format('d M Y h:i:s A');
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('home')->with([
            'total_transaction' => Transaction::where('user_id',auth()->user()->id)->count(),
            'failed_transaction' => Transaction::where('user_id',auth()->user()->id)->failed()->count(),
            'pending_transaction' => Transaction::where('user_id',auth()->user()->id)->pending()->count(),
            'success_transaction' => Transaction::where('user_id',auth()->user()->id)->success()->count(),
        ]);
    }
}
