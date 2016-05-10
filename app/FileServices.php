<?php

namespace App;


class FileServices 
{
    public function getpath($userid) {
    	return 'pictures/user'.$userid.'/';;
    }

    public function generatefilename($key, $originalname) {
    	return $key."_".time()."_".$originalname;
    }
}
