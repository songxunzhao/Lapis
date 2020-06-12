<?php


namespace App\Http\Controllers\Admin\Transactions;


use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\UserLevel;

class TransactionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:' . UserLevel::ADMIN);
    }

    public function index() {
        $transactions = Transaction::paginate(10);
        return view('admin.transactions.index', ['transactions' => $transactions]);
    }
}