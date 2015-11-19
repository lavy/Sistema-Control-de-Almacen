<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Menu extends Model {

	protected $table='menu';


    static function  menu($id, $user)
    {
    return DB::select("select m.id, m.nombre,m.url ,Deriv1.Count from menu m
                       inner join opciones_perfiles op on m.id = op.id_opcion
    LEFT OUTER JOIN (
    SELECT padre, COUNT( * ) AS Count
    FROM menu
    GROUP BY padre
    )Deriv1
    ON m.id = Deriv1.padre
    WHERE m.padre =" . $id . " AND m.status = 1 AND op.UserLevelID=" .Auth::User()->UserLevel);
    }


    static function menu_complete($user)
    {
        $nemo = \App\Menu::menu(0, $user);
        echo "<ul class='nav navbar-nav'>";
        foreach ($nemo as $men) { //@foreach()
            if ($men->Count > 0) {  //@if()
                echo '<li class="dropdown">';
                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>" . $men->nombre . "<span class='caret'></span></a>";
                if ($men->Count > 0) { //@if()
                    $hijo = \App\Menu::menu($men->id, $user);
                    echo '<ul class="dropdown-menu" role="menu">';
                    foreach ($hijo as $hi) {
                        if ($hi->Count > 0) {
                            echo '<li class="dropdown-submenu">';
                            echo '<a href="#">' . $hi->nombre . '</a>';
                            $nieto = \App\Menu::menu($hi->id, $user);
                            echo '<ul class="dropdown-menu">';
                            foreach ($nieto as $ni) {
                                echo '<li><a href="' . $ni->url . '">' . $ni->nombre . '</a></li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<li>';
                            echo '<a href="' . $hi->url . '">' . $hi->nombre . '</a>';
                        }
                        echo '</li>';
                    } //endforeach
                    echo '</ul>';
                }//endif
                echo '</li>';
            } //@else
            else {
                echo "<li>";
                echo "<a href='$men->url'>" . $men->nombre . "</a>";
                echo "</li>";
            }//@endif
        }//endforeach
        echo "</ul>";
    }


    static function display_children($parent, $level)
    {
        $clases = [1 => 'dropdown-toggle', 2 => 'dropdown-menu', 3 => 'dropdown-toggle'];
        $data= Menu::menu($parent);
       echo "<ul class='nav navbar-nav'>";
        foreach ($data as $que) {
            if ($que->Count >0) {
                echo "<li class='dropdown'>
                <a class='".$clases[$level]."'href='" . $que->url . "'>" .$level." ". $que->nombre. "</a> <span class='caret'></span></a>";
                Menu::display_children($que->id, $level + 1);
                echo "</li>";
            } elseif ($que->Count==0) {
                echo "<li><a href='" . $que->url . "'>" . $que->nombre . "</a></li>";
            } else;
        }
        echo "</ul>";
    }

}
