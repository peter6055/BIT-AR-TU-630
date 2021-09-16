<?php

// Count how many page need to be present
// @parse int $rowPerPage: set how many row per page
function countPageNumber($rowPerPage){
    include_once ("getUser.php");

    $getUserCount = getUserCount();

//    echo ceil($getUserCount/$rowPerPage);
    return ceil($getUserCount/$rowPerPage);
}