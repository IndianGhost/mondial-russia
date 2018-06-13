<?php
if( isset($_GET['view']) ){
    //Available views
    $views = [
        'home',
        'qcm',
        'thanks'
    ];

    $view = is_in_array($views, $_GET['view'])? $_GET['view'] : 'home';
}
else{
    $view = 'home';
}