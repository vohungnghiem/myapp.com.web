<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
class VHNPostController extends Controller
{
    public function index() {
        $posts = DB::table('vhn_posts')->get();
        return view('admincp.vhn_posts.index',compact('posts'));
    }
    public function create() {
        $categories = DB::table('vhn_categories')->where('status',1)->get();
        return view('admincp.vhn_posts.create',compact('categories'));
    }
    public function store(Request $request)
    {
        try {
            $id = DB::table('vhn_posts')->insertGetId(
                [
                    'name' => $request->name,
                    'slug' => Str::of($request->name)->slug('-'),
                    'id_category' => $request->id_category,
                    'caption' => $request->caption,
                    'image' => $request->image,
                    'link' => $request->link,
                    'content' => $request->content,
                    'sort' => $request->sort,
                    'status'=> $request->status == 'on' ? 1 : 0,
                    'description' => $request->description,
                    'key' => $request->key,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            return redirect('admincp/posts/edit/'.$id)->with('success','Success !');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','error!');
        }
    }
    public function edit($id)
    {
        try {
            $post = DB::table('vhn_posts')->where('id',$id)->first();
            $categories = DB::table('vhn_categories')->where('status',1)->get();
            return view('admincp.vhn_posts.edit',compact('post','categories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            DB::table('vhn_posts')->where('id',$id)->update(
                [
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'name' => $request->name,
                    'id_category' => $request->id_category,
                    'caption' => $request->caption,
                    'image' => $request->image,
                    'link' => $request->link,
                    'content' => $request->content,
                    'sort' => $request->sort,
                    'status'=> $request->status == 'on' ? 1 : 0,
                    'description' => $request->description,
                    'key' => $request->key,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            return redirect('admincp/posts/edit/'.$id)->with('success','Success !');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','error!');
        }
    }
    public function status(Request $request){
        try {
            $item = DB::table('vhn_posts')->where('id',$request->id)->first();
            $status = ($item->status == 1) ? 0 : 1;
            DB::table('vhn_posts')->where('id',$request->id)->update(['status'=>$status]);
            return response()->json('success');

        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
    public function destroy(Request $request)
    {
        try {
            DB::table('vhn_posts')->where('id', $request->id)->delete();
            return response()->json('success');
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }
}
