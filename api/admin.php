<?php
class Admin
{
    function uploadFiles($filename)
    {
        $pic_name = $_FILES[$filename]['name'];
        $pic_temp_name = $_FILES[$filename]['tmp_name'];
        $pic_folder = "../../uploads/" . $pic_name;

        $fileExtension = pathinfo($pic_folder, PATHINFO_EXTENSION); //get the file extention

        $pic_name = uniqid() . '.' . $fileExtension;
        while (file_exists("../../uploads/" . $pic_name)) {
            //this loop will continue until it generates a unique file name
            $pic_name = uniqid() . '.' . $fileExtension;
        }
        // Move the file to the new file name
        move_uploaded_file($pic_temp_name, "../../uploads/" . $pic_name);
        return $pic_name;
    }
}
