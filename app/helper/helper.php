<?php
function errorsShow($errors, $name){
    if ($errors->has($name)){
       echo '<div class="alert alert-danger" role="alert">';
       echo '<strong>'.$errors->first($name).'</strong>';
       echo '</div>';
    }
}
// đệ quy
function Showcate($arr,$parent,$tab,$selected){
foreach($arr as $row){
    if($row['parent']==$parent){
        if ($row['id']==$selected) {
            # code...
            echo '<option selected value="'.$row['id'].'">'.$tab.$row['name'].'</option>';
        }
        echo '<option  value="'.$row['id'].'">'.$tab.$row['name'].'</option>';
        Showcate($arr,$row['id'],$tab.'--|',$selected);

    }
}
}

function getcate($arr,$parent,$tab){
    foreach($arr as $row){
        if($row['parent']==$parent){
            echo '<div class="item-menu"><span>'.$tab.$row['name'].'</span>
                    <div class="category-fix">
                    <a class="btn-category btn-primary" href="/admin/category/edit/'.$row['id'].'"><i class="fa fa-edit"></i></a>
                    <a class="btn-category btn-danger" href="/admin/category/del/'.$row['id'].'"><i class="fas fa-times"></i></i></a>

                    </div>
                </div>';
            getcate($arr,$row['id'],$tab.'--|');

        }
    }
    }
