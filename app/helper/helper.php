<?php
function errorsShow($errors, $name){
    if ($errors->has($name)){
       echo '<div class="alert alert-danger" role="alert">';
       echo '<strong>'.$errors->first($name).'</strong>';
       echo '</div>';
    }
}
// đệ quy
function Showcate($arr,$parent,$tab){
foreach($arr as $row){
    if($row['parent']==$parent){
        echo '<option>'.$tab.$row['name'].'</option>';
        Showcate($arr,$row['id'],$tab.'--|');

    }
}
}
