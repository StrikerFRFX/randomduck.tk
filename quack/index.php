<?php
header('Content-Type: application/json');
$files = glob('../images/*');
if ($files) {
    $FOX_NUM = count($files);
    $random_duck_index = rand(1, $FOX_NUM);
    $image_path = 'http://www.randomduck.tk/images/'.$random_duck_index.'.jpg';
    $link = 'http://www.randomduck.tk/?i='.$random_duck_index;
} else {
    $image_path = null;
    $link = null;
}
$data = ['image' => $image_path, 'link' => $link];
echo json_encode($data);
