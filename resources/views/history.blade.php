@extends('../components/master')

@section('title','XIAO DING DONG | HOME')

@section('content')
<style>
    tbody{
        background-color: lightslategrey;
        color:azure;
        text-align: center;
    }

    thead{
        background-color: black;
        color: gold;
        text-align: center;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="py-4">
                <h2 style="color:gold; font-weight:bold;">交易记录 | Transaction History</h2>
            </div>

            @if($transactions_headers->isNotEmpty())
                <div class="container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Purchase Date</th>
                                <th>Food Name</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions_headers as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>{{ $transaction->purchase_date }}</td>
                                    <td>{{ $transaction->food_name }}</td>
                                    <td>{{ $transaction->total_price }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center" style="background-color: black;">
                    <h3 style="color:gold; font-weight:bold">There are no transactions yet...</h3>
                    <h5 style="color: azure;">Poof! Transaction history gone. Time to make delicious memories all over again. Let's fill this blank page with savory stories and culinary adventures. Bon appétit!</h5>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

{{-- 
    public function index()
    {
        $transactions = TransactionHeader::all();
        return view('history', compact('transactions'));
    }
    --}}