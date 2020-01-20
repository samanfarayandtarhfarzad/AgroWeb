<?php

namespace App\Http\Controllers\App;

use App\Category;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(Request $request)
    {
        $result_username = ['result' => 'category_error'];

            $categorys = Category::all();

            foreach ($categorys as $category) {
                if ($request->code == "25f9e794323b453885f5181f1b624d0b") {
                    return response()->json([
                        'data' => [
                            'result' => 'ok',
                            'category_list' => $categorys
                        ]
                    ]);
                } else {
                    return response()->json(['data' => $result_username]);
                }
            }



//            return response()->json(['data' => [$result_username,['category_list' => $category]]]);
//            return (['category_list' => $categorys]);

    }
}
