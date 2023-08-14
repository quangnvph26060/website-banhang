<?php
function uploadFile($nameFolder , $file){
    $nameFile = time() . ''. $file->getClientOriginalName();
    return $file->storeAS($nameFolder,$nameFile,'public');
}
