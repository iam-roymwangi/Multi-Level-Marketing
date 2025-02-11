<?php
include('php-includes/connect.php');


$select_query =  "select `id_no` as id, `name`, `name` as text, `sponsor_id` as parent_id from `distributors`";
$result_query = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result_query)) {

    $data[] = $row;
}

$itemsByReference = array();

foreach ($data as $key => &$item) {
    $itemsByReference[$item['id']] = &$item;
    // Children array:
    $itemsByReference[$item['id']]['children'] = array();
    // Empty data class (so that json_encode adds "data: {}" ) 
    $itemsByReference[$item['id']]['data'] = new StdClass();

    $itemsByReference[$item['id']]['a_attr'] = new StdClass();
    $itemsByReference[$item['id']]['a_attr']->href = 'google . com';
}


foreach ($data as $key => &$item)
    if ($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
        $itemsByReference[$item['parent_id']]['children'][] = &$item;



foreach ($data as $key => &$item) {
    if ($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
        unset($data[$key]);
}

echo json_encode(array_values($data));
