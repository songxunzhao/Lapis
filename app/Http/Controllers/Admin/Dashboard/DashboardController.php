<?php


namespace App\Http\Controllers\Admin\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\User;
use App\Models\UserLevel;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index() {

        $admin_count = User::where('user_level', UserLevel::ADMIN)->where('is_active', true)->count();
        $content_inspector_count = User::where('user_level', UserLevel::CONTENT_INSPECTOR)->where('is_active', true)->count();
        $content_editor_count = User::where('user_level', UserLevel::CONTENT_EDITOR)->where('is_active', true)->count();

        $free_user_count = User::where('user_plan', 1)->where('is_active', true)->count();
        $premium_user_count = User::where('user_plan', 2)->where('is_active', true)->count();

        $total_courses = Course::count();
        $total_blogs = Blog::count();
        $total_tags = Tag::count();
        $payment = Transaction::where('status', TransactionStatus::PAID)->sum('value');

        return view('admin.dashboard.index', [
            'admin_count' => $admin_count,
            'content_inspector_count' => $content_inspector_count,
            'content_editor_count' => $content_editor_count,
            'free_user_count' => $free_user_count,
            'premium_user_count' => $premium_user_count,
            'total_courses' => $total_courses,
            'total_blogs' => $total_blogs,
            'total_tags' => $total_tags,
            'total_payment' => $payment
        ]);
    }
}