<?php
function filterByStatus(array $tasks,string $status):array{
    $filteredTasks=[];
    foreach($tasks as $task){
        if($task['status']===$status){
            $filteredTasks[]=$task;
        }
    }
    return $filteredTasks;
}





?>