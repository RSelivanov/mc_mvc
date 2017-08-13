<?php

/**
 * Класс Files - модель для работы с файлами
 */
class Files
{

    /**
     * Загрузка скина
     * @param string $file <p>Массив $_FILES</p>
     * @param string $username <p>Имя пользователя</p>
     * @return array <p>Ошибки</p>
     */
    public static function uploadSkin($file, $username)
    {
        $size = getimagesize($_FILES['skin_file']['tmp_name']);
        if ($file['skin_file']['type'] == "image/png") {
            if ($file['skin_file']['error'] === UPLOAD_ERR_OK) {
                if ($size['mime'] == 'image/png') {
                    if ( ($size[0] == 64 && $size[1] == 32) ||($size[0] == 128 && $size[1] == 64) || ($size[0] == 192 && $size[1] == 96) || ($size[0] == 256 && $size[1] == 128) || ($size[0] == 320 && $size[1] == 160) || ($size[0] == 384 && $size[1] == 192) || ($size[0] == 448 && $size[1] == 224) || ($size[0] == 512 && $size[1] == 256) || ($size[0] == 576 && $size[1] == 288) || ($size[0] == 640 && $size[1] == 320) || ($size[0] == 704 && $size[1] == 352) || ($size[0] == 768 && $size[1] == 384) ||($size[0] == 832 && $size[1] == 416) || ($size[0] == 896 && $size[1] == 448) || ($size[0] == 960 && $size[1] == 480) ||($size[0] == 1024 && $size[1] == 512) ) {
                        if (is_uploaded_file($file['skin_file']['tmp_name'])) {
                            move_uploaded_file($file['skin_file']['tmp_name'], ROOT. Config::getInstance()->get('path_skin') .$username . '.png');
                        }
                    } else $errors[] = "Допустимые размеры скинов: 64х32, 128x64, 192x96, 256x128, 320x160, 384x192, 448x224, 512x256, 576x288, 640x320, 704x352, 768x384, 832x416, 896x448, 960x480, 1024х512!";
                } else $errors[] =  "Допустимые формат только .png";
            } else $errors[] =  "При загрузке скина произошел сбой!";
        } else $errors[] =  "Допустимые формат только .png";
        
    return (isset($errors)) ? $errors : '';
    }

    
    /**
     * Загрузка плаща
     * @param string $file <p>Массив $_FILES</p>
     * @param string $username <p>Имя пользователя</p>
     * @return array <p>Ошибки</p>
     */
    public static function uploadCloak($file, $username)
    {
        $size = getimagesize ($_FILES['cloak_file']['tmp_name']);
        if ( $_FILES['cloak_file']['type'] == "image/png" ) {
            if ( $_FILES['cloak_file']['error'] === UPLOAD_ERR_OK ) {
                if ( $size['mime'] == 'image/png' ) {
                    if ( ($size[0] == 176 && $size[1] == 136) || ($size[0] == 512 && $size[1] == 256) || ($size[0] == 22 && $size[1] == 17) ) {
                        if ( is_uploaded_file( $_FILES['cloak_file']['tmp_name'] ) ) {
                            move_uploaded_file ( $_FILES['cloak_file']['tmp_name'],  ROOT. Config::getInstance()->get('path_cloak') . $username . '.png' );
                        }
                    } else $errors[] = "Допустимые размеры плащей: 22х17 176x136 512х256!";
                } else $errors[] = "Допустимые формат только .png";
            } else $errors[] = "При загрузке скина произошел сбой!";
        } else $errors[] = "Допустимые формат только .png";
        
    return (isset($errors)) ? $errors : '';
    }
   

}