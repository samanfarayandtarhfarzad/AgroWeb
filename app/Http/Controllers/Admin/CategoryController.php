<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\File;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function Index()
    {
        $category = Category::all();
        $files = File::Where('file_type', '4')->get();
        return view(
            'admin.category',
            [
                'category' => $category,
                'files' => $files
            ]
        );
    }

    public function Create(Request $request)
    {
        $category = new Category();
        $category->category_title = $request->title;
        $category->category_text = $request->text;
        $category->file_id = $request->file_id;
        $files = File::find($request->file_id);
        $file_address = str_replace('public','storage',$files->file_address);
        $category->file_address = "agropersian.ir/".$file_address;
        $category->category_Privilege = $request->privilege;
        $category->save();

        return redirect('/category')->with('success', 'Category created successfully');
    }
}
