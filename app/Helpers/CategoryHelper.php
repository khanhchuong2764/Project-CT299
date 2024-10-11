<?php

namespace App\Helpers;

use PhpOption\Option;

class CategoryHelper
{
    public static function Menu ($menus,$parentID = "0",$char="-- ") {
        $html='';
        
        foreach ($menus as $key => $menu)  {
            if ($menu->parentID == $parentID) {
                $html .= '
                    <option value='. $menu->id . '>' . $char  .  $menu->title . '</option>
                ';
                unset($menus[$key]);
                $html.= self::Menu($menus,$menu->id,$char .'-- ');
            }   
        }

        return $html;
    }

    public static function MenuEdit($menus, $record, $parentID = "0", $char = "-- ") {
        $html = '';     
        foreach ($menus as $key => $menu) {
            if ($menu->parentID == $parentID) {
                $html .= '
                    <option ' . ($menu->id == $record->parentID ? 'selected' : '') . ' value="' . $menu->id . '">' . $char . $menu->title . '</option>
                ';
                unset($menus[$key]); // Loại bỏ phần tử đã xử lý để tránh lặp lại
                $html .= self::MenuEdit($menus, $record, $menu->id, $char . '-- ');
            }   
        }
        return $html;
    }
}