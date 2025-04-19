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
function groupByStatus(array $tasks):array{
    $groupedTasks=[];
    foreach($tasks as $task){
        $status=$task['status'];
        if(!isset($groupedTasks[$status])){
            $groupedTasks[$status]=[];
        }
        $groupedTasks[$status][]= $task;
    }
    return $groupedTasks;
}






?>