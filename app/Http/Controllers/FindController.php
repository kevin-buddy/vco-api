<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function search(Request $request, $search)
    {
        $ret = [];
        // $ret = Category::findOrFail($id);

        // $retmenu = DB::table('menus')->where('user_id',$id)->get();
        return view('find', [
            // 'role'  => $user->role,
            // 'name' => $user->name,
            // 'ret' => $ret,
            'items' => $ret
        ]);
    }

}
