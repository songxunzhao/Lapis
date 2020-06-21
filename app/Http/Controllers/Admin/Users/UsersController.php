<?php


namespace App\Http\Controllers\Admin\Users;


use App\Http\Controllers\Controller;
use App\Models\PayPlan;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:' . UserLevel::ADMIN);
    }

    public function index()
    {
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.users.index', [
            'users' => $users, 'pay_plans' => $this->getPayPlans(), 'user_levels' => $this->getUserLevels()]);
    }

    public function update(Request $request, $id) {
        $input = $request->only(['user_plan', 'user_level']);

        $user = User::find($id);
        $user->fill($input);
        $user->is_active = $request->input('is_active', false);
        $user->save();

        return view('admin.users.user', [
            'user' => $user,
            'pay_plans' => $this->getPayPlans(),
            'user_levels' => $this->getUserLevels()
        ]);
    }

    private function getPayPlans()
    {
        return PayPlan::all();
    }

    private function getUserLevels()
    {
        return [UserLevel::ADMIN, UserLevel::CONTENT_INSPECTOR, UserLevel::CONTENT_EDITOR, UserLevel::NORMAL];
    }
}