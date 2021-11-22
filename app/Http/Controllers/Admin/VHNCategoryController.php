<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
class VHNCategoryController extends Controller
{
    public function index() {
        $categories = DB::table('vhn_categories')->get();
        return view('admincp.vhn_categories.index',compact('categories'));
    }
    public function create() {
        $categories = DB::table('vhn_categories')->where('status',1)->get();
        return view('admincp.vhn_categories.create',compact('categories'));
    }
    public function store(Request $request)
    {
        try {
            $id = DB::table('vhn_categories')->insertGetId(
                [
                    'name' => $request->name,
                    'slug' => Str::of($request->name)->slug('-'),
                    'id_parent' => $request->id_parent,
                    'description' => $request->description,
                    'image'=> $request->image,
                    'sort' => $request->sort,
                    'status'=> $request->status == 'on' ? 1 : 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            return redirect('admincp/categories/edit/'.$id)->with('success','Success !');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','error!');
        }
    }
    public function edit($id)
    {
        try {
            $category = DB::table('vhn_categories')->where('id',$id)->first();
            $categories = DB::table('vhn_categories')->where('status',1)->get();
            return view('admincp.vhn_categories.edit',compact('category','categories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            DB::table('vhn_categories')->where('id',$id)->update(
                [
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'id_parent' => $request->id_parent,
                    'description' => $request->description,
                    'image'=> $request->image,
                    'sort' => $request->sort,
                    'status'=> $request->status == 'on' ? 1 : 0,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            return redirect('admincp/categories/edit/'.$id)->with('success','Success !');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','error!');
        }
    }
    public function status(Request $request){
        try {
            $item = DB::table('vhn_categories')->where('id',$request->id)->first();
            $status = ($item->status == 1) ? 0 : 1;
            DB::table('vhn_categories')->where('id',$request->id)->update(['status'=>$status]);
            return response()->json('success');

        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
    public function destroy(Request $request)
    {
        try {
            DB::table('vhn_categories')->where('id', $request->id)->delete();
            return response()->json('success');
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
