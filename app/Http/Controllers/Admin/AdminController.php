<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\EmailTemplate;
use App\Models\EmailTemplateCategory;
use App\Models\NotificationGroup;
use App\Models\Variable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view ('admin.dashboard');
    }


    public function allTemplates()
    {
        $templates = EmailTemplate::all();
        $categories = EmailTemplateCategory::all();
        return view('admin.alltemplates' , compact('templates' , 'categories'));
    }

    public function getVariables(Request $request)
    {
        $category_id = $request->input('category');
        $variables = Variable::where('email_template_category_id', $category_id)->get();
        return response()->json($variables);
    }
}
