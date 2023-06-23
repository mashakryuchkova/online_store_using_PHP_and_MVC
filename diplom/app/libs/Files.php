<?php

namespace Libs;

class Files {

    const default_path = __DIR__ . '/../../upload/';
    const extension = array("jpg", "bmp", "jpeg", "png");
    
    static function uploadFile($file, $path) {
        $file_info = pathinfo($file['name']);
   
        if ( $file["size"] >= MAX_UPLOAD_SIZE) {
            showError('Error!');
        }
        
        if (in_array($file_info["extension"], self::extension)) {
            if ($file["size"] <= MAX_UPLOAD_SIZE) {
                $dir = self::default_path.$path;
                if (!file_exists($dir)) {
                    mkdir($dir);
                }
                $new_name = md5($file_info['filename'] . rand(999, 9999999999)) . "." . $file_info["extension"];
                while (file_exists($dir . '/' . $new_name)) {
                    $new_name = md5($file_info['filename'] . rand(999, 9999999999)) . "." . $file_info["extension"];
                }
                if (move_uploaded_file($file['tmp_name'], $dir . '/' . $new_name)) {
                    return $path . '/' . $new_name;
                } else {
                    echo 'Error! The file has not been moved!';
                }
            } else {
                echo 'Error! Too big file size!';
            }
        } else {
            echo 'Error! Inappropriate extension!';
        }
    }

    static function deleteFile($fileName) {
        if (file_exist(self::default_path . $fileName)) {
            unlink(self::default_path . $fileName);
            return true;
        } else {
            return false;
        }
    }
}