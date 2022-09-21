<?php class ArticleController extends DatabaseController {
    public function affectDataToRow(&$row, $sub_rows)
    { // Cette méthode permet d’ajouter les propriétés appuser et theme dans l’objet article.
        $appusers = array_values(array_filter($sub_rows['appuser'], function($item) use ($row) {
            return $item->Id_appUser == $row->Id_appUser;
        }));
        $row->appuser = count($appusers) == 1 ? array_shift($appusers) : null;
        
        $themes = array_values(array_filter($sub_rows['theme'], function($item) use ($row) {
            return $item->Id_theme == $row->Id_theme;
        }));
        $row->theme = count($themes) == 1 ? array_shift($themes) : null;
    }

}
