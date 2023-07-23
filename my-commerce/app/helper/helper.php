<?php

function fileUpload($fileObject, $nameString = null, $existFilePath = null)
{
    if (isset($fileObject))
    {
        if (file_exists($existFilePath))
        {
            unlink($existFilePath);
        }
        $imageName = rand(10, 10000).time().'.'.$fileObject->getClientOriginalExtension();
        $imageDirectory = 'admin/uploaded-files/'.$nameString.'/';
        $fileObject->move($imageDirectory, $imageName);
        $fileUrl = $imageDirectory.$imageName;
    } else {
        if ($existFilePath == null)
        {
            $fileUrl = null;
        } else {
            $fileUrl = $existFilePath;
        }
    }

    return $fileUrl;
}
