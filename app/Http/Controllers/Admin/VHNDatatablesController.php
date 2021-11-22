<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Yajra\Datatables\Datatables;

class VHNDatatablesController extends Controller
{
    public function users() {
        $level = Auth::user()->level;
        $item = User::where(function($query) use ($level){
            $query->where('level','>=',$level);
       })->orderBy('level','asc')->get();
        $datatables = DataTables::of($item);
        $datatables->editColumn('name', function ($item) {
            $result = $item->name;
            if ($item->id == Auth::user()->id) {
                $result = '<i class="fas fa-home"></i> ' .$result ;
            }
            return $result;
        });
        $datatables->editColumn('email', function ($item) {
            $result = '';
            if (Auth::user()->hasAnyRole(['super-admin|admin']) || $item->id == Auth::user()->id){
                $result = $item->email;
            }
            return $result;
        });
        $datatables->editColumn('level', function ($item) {
            $result = '';
            foreach (levels() as $level) {
                if ($level->id == $item->level) {
                    $result = $level->name;
                }
            }
            return $result;
        });
        $datatables->editColumn('avatar', function ($item) {
            $src = 'src="'.storage_link_show('account',$item->created_at).$item->avatar.'?v='.time().'" onerror="this.onerror=null; this.src=\'logo/none.png\'"';
            $result = '<img  data-toggle="tooltip" title="<img src='.storage_link_show('account',$item->created_at).$item->avatar.'/>" data-html="true" class="img" ' .$src. '/>';
            return $result;
        });
        $datatables->editColumn('status', function ($item) {
            $result = '';
            if ($item->level > Auth::user()->level ){
                if ($item->status == 1) {
                    $result .= '<div class="btn btn-xs btn-success btn-status" data-id='.$item->id.' data-toggle="tooltip" title="'.__('admin.update_status').'">
                        <i class="fas fa-check"></i>
                    </div>';
                }else{
                    $result .= '<div class="btn btn-xs btn-warning btn-status" data-id='.$item->id.' data-toggle="tooltip" title="'.__('admin.update_status').'">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>';
                }
            }
            return $result;
        });
        $datatables->addColumn('action', function ($item) {
            $result = '';
            $edit = '';
            $delete = '';
            if (Auth::user()->hasAnyRole(['super-admin']) || $item->id == Auth::user()->id ) {
                $edit = '<a href="admincp/account/edit/'.$item->id.'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="'.__('admin.update_info').'">
                    <i class="fas fa-pen-nib"></i>
                </a> ';
            }
            if (Auth::user()->hasAnyRole(['super-admin']) ){
                $delete = '<div class="btn btn-xs btn-danger btn-destroy" data-id="'.$item->id.'" data-toggle="tooltip" title="'.__('admin.delete_info').'"  >
                <i class="fas fa-trash-alt"></i></div> ';
            }
            $result .= $edit . $delete;
            return $result;
        });
        $datatables->setRowClass(function ($item) {
			if ($item->id == Auth::user()->id) {
                return 'text-warning font-weight-bold';
            }else if ($item->level == 2) {
                return 'text-dark font-weight-bold';
            }else if ($item->level == 3){
                return 'text-dark';
            }
		});
        $datatables->rawColumns(['name','level','avatar','status','action']);
        return $datatables->make();
    }

    public function posts() {
        $item = DB::table('vhn_posts')->leftJoin('vhn_categories','vhn_categories.id','=','vhn_posts.id_category')
                ->select('vhn_posts.*','vhn_categories.slug AS slug_cat','vhn_categories.name AS title_cat','vhn_categories.id_parent AS parent')
                ->orderBy('vhn_posts.id','desc')
                ->get();
        $datatables =  DataTables::of($item);
        $datatables->setRowClass(function ($item) {
            return 'wraptr'.$item->id;
        });
        $datatables->editColumn('name', function ($item) {
	        return '<a href="'.$item->slug.'" class="text-dark">' .mysubstr($item->name,100) .'</a>';
        });
        $datatables->editColumn('category', function ($item) {
	        return '<a href="admincp/categories/edit/'.$item->id_category.'">'.$item->title_cat.'</a>';
        });
        $datatables->editColumn('image', function ($item) {
            $src = 'src="'.$item->image.'?v='.time().'" onerror="this.onerror=null; this.src=\'logo/none.png\'"';
            $result = '<img  data-toggle="tooltip" title="<img src='.$item->image.'/>" data-html="true" class="img" ' .$src. '/>';
            return $result;
        });
        $datatables->editColumn('status', function ($item) {
            $result = '';
                if ($item->status == 1) {
                    $result .= '<div class="btn btn-xs btn-success btn-status" data-id='.$item->id.' data-toggle="tooltip" title="'.__('admin.update_status').'">
                        <i class="fas fa-check"></i>
                    </div>';
                }else{
                    $result .= '<div class="btn btn-xs btn-warning btn-status" data-id='.$item->id.' data-toggle="tooltip" title="'.__('admin.update_status').'">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>';
                }
            return $result;
        });
        $datatables->addColumn('action', function ($item) {
            $result = ''; $edit = ''; $delete = '';
            $edit = '<a href="admincp/posts/edit/'.$item->id.'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="'.__('admin.update_info').'">
                <i class="fas fa-pen-nib"></i>
            </a> ';
            $delete = '<div class="btn btn-xs btn-danger btn-destroy" data-id="'.$item->id.'" data-toggle="tooltip" title="'.__('admin.delete_info').'"  >
            <i class="fas fa-trash-alt"></i></div> ';
            $result .= $edit . $delete;
            return $result;
        });
        $datatables->rawColumns(['id','name','category','image','status','action']);
        return $datatables->make();
    }
}
