<?php
function date_img($date)
{
    return date('Y', strtotime($date)).'/'.date('m',strtotime($date));
}
function datevn($date)
{
    return date('d - m - Y',strtotime($date));
}
function datevnfull($date)
{
    return date('d',strtotime($date)). ' tháng '. date('m',strtotime($date)). ' năm ' .	date('Y',strtotime($date));
}
function mysubstr($str,$limit=100){
    if(strlen($str)<=$limit) return $str;
    return mb_substr($str,0,$limit-3,'UTF-8').'...';
}


function storage_link($thumb,$date) {
    return $thumb."/".date_img($date)."/";
}
function storage_link_show($thumb,$date) {
    return "storage/".$thumb."/".date_img($date)."/";
}
function error_img() {
    return 'onerror=this.onerror=null;this.src=`logo/none.png`';
}

// category dequy // $id = parent_id => selected default (0)
function showCategories($categories, $parent_id = 0, $char = 'ROOT',$id)
{
    foreach ($categories as $key => $item)
    {
        if ($item->id_parent == $parent_id)
        {
            if ($item->id == $id)
            {
                echo "<option value='$item->id' selected>".$char . $item->name.'</option>';
            }else{
                echo "<option value='$item->id'>" . $char . $item->name.'</option>';
            }

            showCategories($categories, $item->id, $char.'&#8594;&#8594;',$id);
        }
    }
}
function indexCategories($categories, $parent_id = 0, $char = '|---',$id)
{
    foreach ($categories as $key => $item)
    {
        if ($item->id_parent == $parent_id)
        {
            if ($item->status == 1){
                $status = '<div class="btn btn-xs btn-success btn-status" data-id='.$item->id.' data-toggle="tooltip" title="'.__("admin.update_status").'">';
                $status .= '<i class="fas fa-check"></i> </div>';
            }else{
                $status = '<div class="btn btn-xs btn-warning btn-status" data-id='.$item->id.' data-toggle="tooltip" title="'.__("admin.update_status").'">';
                $status .= '<i class="fas fa-exclamation-circle"></i> </div>';
            }
            $action = '<a href="admincp/categories/edit/'.$item->id.'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="'.__("admin.update_info").'">';
            $action .= '<i class="fas fa-pen-nib"></i> </a>';
            $action .= '<div class="btn btn-xs btn-danger btn-destroy" data-id="'.$item->id.'" data-toggle="tooltip" title="'.__("admin.delete_info").'">';
            $action .= '<i class="fas fa-trash-alt"></i></div>';
            echo '<tr>';
            echo '<td>'.$char.'<span class="text-success">'.$item->name.'</span>'.'</td>';
            echo '<td>'.$item->slug.'</td>';
            echo '<td>'.$item->description.'</td>';
            echo '<td><img data-toggle="tooltip" title="<img src='.$item->image.'/>" src="'.$item->image.'" data-html="true" alt="image" style="height: 20px"></td>';
            echo '<td>'.$status.'</td>';
            echo '<td>'.$action.'</td>';
            echo '</tr>';
            indexCategories($categories, $item->id, $char.$item->name.'&#8594;&#8594;',$id);
        }
    }
}
// category dequy
function editCategoriesSelected($categories, $parent_id = 0, $char = '',$id)
{
    foreach ($categories as $key => $item)
    {
        if ($item->parent == $parent_id)
        {
            if ($item->id == $id)
            {
                echo '<p class="current">'.$char . $item->name.'</p>';
            }else{
                echo '<p>'.$char . $item->name.'</p>';
            }

            editCategoriesSelected($categories, $item->id, $char.'<i class="fas fa-ellipsis-h"></i> &nbsp;',$id);
        }
    }
}
