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
$tasks = [
    ["id" => 1, "title" => "Buy groceries", "status" => "pending", "due" => "2024-04-15"],
    ["id" => 2, "title" => "Submit report", "status" => "done", "due" => "2024-04-10"],
    ["id" => 3, "title" => "Go jogging", "status" => "pending", "due" => "2024-04-12"],
    ["id" => 4, "title" => "Book flight", "status" => "done", "due" => "2024-04-08"]
];
echo"Testing filterByStatus:\n";
$doneTasks=filterByStatus($tasks,"done");
print_r($doneTasks);




?>