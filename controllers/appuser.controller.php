<?php class AppuserController extends DatabaseController {

    public function affectDataToRow(&$row, $sub_rows)
    { // Cette méthode permet d’ajouter les propriétés account et role dans l’objet appuser.
        $accounts = array_filter($sub_rows['account'], function($item) use ($row) {
            return $item->Id_appUser == $row->Id_appUser;
        });
        $row->account = count($accounts) == 1 ? array_shift($accounts) : null;
        $roles = array_filter($sub_rows['role'], function($item) use ($row) {
            return $item->Id_role == $row->Id_role;
        });
        $row->role = count($roles) == 1 ? array_shift($roles) : null;
    }

}?>