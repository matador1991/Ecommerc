<?php

function uploadImage($folder,$image){
     $filename=$image->hashName();
     $name='image/'.$folder.'/'.$filename;
     $path='admin/image/'.$folder;
     $image->move($path,$filename);
     return $name;
 }
