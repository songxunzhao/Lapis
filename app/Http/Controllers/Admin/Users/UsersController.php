<?php


namespace App\Http\Controllers\Admin\Users;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:' . UserLevel::ADMIN);
    }

    public function index() {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function activate(Request $request, $id) {
        $from = $request->query('from');
        $active = $request->query('active');

        $user = User::find($id);
        $user->is_active = $active;
        $user->save();

        redirect($from);
    }
}