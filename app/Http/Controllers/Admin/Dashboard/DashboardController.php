<?php


namespace App\Http\Controllers\Admin\Dashboard;


use App\Blog;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {

        $admin_count = User::where('user_level', 'ADMIN')->where('is_active', true)->count();
        $content_inspector_count = User::where('user_level', 'CONTENT_INSPECTOR')->where('is_active', true)->count();
        $content_editor_count = User::where('user_level', 'CONTENT_EDITOR')->where('is_active', true)->count();

        $free_user_count = User::where('user_plan', 1)->where('is_active', true)->count();
        $premium_user_count = User::where('user_plan', 2)->where('is_active', true)->count();

        $total_courses = Course::count();
        $total_blogs = Blog::count();

        return view('admin/dashboard/index', [
            'admin_count' => $admin_count,
            'content_inspector_count' => $content_inspector_count,
            'content_editor_count' => $content_editor_count,
            'free_user_count' => $free_user_count,
            'premium_user_count' => $premium_user_count,
            'total_courses' => $total_courses,
            'total_blogs' => $total_blogs
        ]);
    }
}