<?php


use Illuminate\Support\Facades\Config;


// function upload file
function uploadFile($folder, $file)
{
  $extension = strtolower($file->extension());
  $filename = time() . rand(100, 999) . '.' . $extension;
  $file->getClientOriginalName = $filename;
  $file->move($folder, $filename);
  return $filename;
}




