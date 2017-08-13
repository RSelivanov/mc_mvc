<?php

/**
 * Контроллер SiteController
 */
class SkinController
{

    /**
     * Actoin для скина
     * @param $name <p>Имя</p>
     * @param $part <p>Путь</p>
     * @return Img
     */
    public function actionIndex($name, $part)
    {   
        header("Content-type: image/png");
        
        $skin = ROOT . Config::getInstance()->get('path_skin') . $name . '.png';

        if (!file_exists($skin)) {
            $skin = ROOT . Config::getInstance()->get('path_skin') . 'default.png';
        }
        
        $cloak = ROOT . Config::getInstance()->get('path_cloak') . $name . '.png';
        if (!file_exists($cloak)) {
            $cloak = ROOT . Config::getInstance()->get('path_cloak') . 'default.png';
        }
        
        switch ($part) {
        case 'head32':
            $img = SkinViewer2D::createHead($skin, 32); 
            break;
        case 'head64':
            $img = SkinViewer2D::createHead($skin, 64); 
            break;
        case 'head128':
            $img = SkinViewer2D::createHead($skin, 128); 
            break;
        case 'front':
            $img = SkinViewer2D::createPreview($skin, $cloak, 'front');
            break;
        case 'back':
            $img = SkinViewer2D::createPreview($skin, $cloak, 'back');
            break;
        default :
            $img = SkinViewer2D::createPreview($skin, $cloak, 'back');
            break;
        }
        
        imagepng($img);
        return true;
    }
}
