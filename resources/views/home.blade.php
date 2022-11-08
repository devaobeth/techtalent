@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="info-box7-block">
                        <h6 class="m-b-20 text-right">Total Transaction</h6>
                        <h4 class="text-right"><i class="fas fa-dollar-sign pull-left bg-indigo c-icon"></i><span>{{$total_transaction}}</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="info-box7-block">
                        <h6 class="m-b-20 text-right">Success Transaction</h6>
                        <h4 class="text-right"><i class="fas fa-dollar-sign pull-left bg-green c-icon"></i><span>{{$success_transaction}}</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="info-box7-block">
                        <h6 class="m-b-20 text-right">Pending Transaction</h6>
                        <h4 class="text-right"><i class="fas fa-dollar-sign pull-left bg-deep-orange c-icon"></i><span>{{$pending_transaction}}</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="info-box7-block">
                        <h6 class="m-b-20 text-right">Failed Transaction</h6>
                        <h4 class="text-right"><i class="fas fa-dollar-sign pull-left bg-cyan c-icon"></i><span>{{$failed_transaction}}</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Transactions') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="transaction-table" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Transaction Type </th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Transaction Date</th>
                                </tr>
                                </thead>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    @push('scripts')
        <link rel="stylesheet" href="{{ URL::asset('assets/datatables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
        <script src="{{ URL::asset('assets/datatables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('assets/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ URL::asset('assets/datatables/export-tables/buttons.flash.min.js') }}"></script>
        <script>
            $('#transaction-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{url('/home')}}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'transaction_id', name: 'transaction_id' },
                    { data: 'amount', name: 'amount' },
                    { data: 'transaction_type', name: 'transaction_type' },
                    { data: 'location.name', name: 'location.name' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                ],
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    $("td:first", nRow).html(iDisplayIndex +1);
                    return nRow;
                },
            });
        </script>
@endpush
