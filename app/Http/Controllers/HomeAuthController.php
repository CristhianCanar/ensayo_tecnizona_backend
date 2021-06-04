<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class HomeAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$shtml = HomeAuthController::show_menu(Modulo::get_menu(null, 1));

        $numero = 55;
        return view('admin.dashboard.dashboard', compact('numero'));
    }

    public static function show_menu($lista, $nivel1 = true){

            $html = '<ul class="'.  ($nivel1?'nav nav-pills nav-sidebar flex-column nav-child-indent ':'nav nav-treeview') .'"   '.($nivel1?'data-widget="treeview" role="menu" data-accordion="false"':'').'  >'.PHP_EOL;

        foreach($lista as $i){
            $html .= '<li class="nav-item has-treeview">'.PHP_EOL;

                $html .= "<a href='". ($i->url_modulo!='#'?route($i->url_modulo):'#')."' class='nav-link'>".PHP_EOL;
                $html .= "<i class='{$i->icono}'></i>".PHP_EOL;
                $html .= "<p>{$i->modulo}</p>".PHP_EOL;
                if( is_array( $i->hijos) and  count($i->hijos) > 0 ){
                    $html .="<i class='right fas fa-angle-left'></i>".PHP_EOL;
                }
                $html .= '</a>'.PHP_EOL;

                if( is_array( $i->hijos) and  count($i->hijos) > 0 ){
                    $html .=   HomeAuthController::show_menu($i->hijos,false);
                }

            $html .= '</li>'.PHP_EOL;

        }
            $html .= '</ul>'.PHP_EOL;

            return $html;
    }
}
