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

        $images = array_values(array_filter($sub_rows['image'], function($item) use ($row) {
            return $item->Id_article == $row->Id_article;
        }));
        $row->image = count($images) == 1 ? array_shift($images) : null;

        // Comment
        if(isset($sub_rows['comment'])){
            $comments = array_values(array_filter($sub_rows['comment'], function($item) use ($row) {
                return $item->Id_article == $row->Id_article;
            }));
            if(isset($comments)){
                $row->comments_list = $comments;
            }
        }

        // Tag
        if(isset($sub_rows['tag'])){
            $tags = array_values(array_filter($sub_rows['tag'], function($item) use ($row) {
                return $item->Id_article == $row->Id_article;
            }));
            if(isset($tags)){
                $row->tags_list = array_column($tags, 'tag');
            }
        }
    }

}
