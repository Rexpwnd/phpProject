<?php
namespace classes;
class Menu
{
    private $menu = [
        0 => [
            'class' => null,
            'class-a' => "smoothScroll",
            'href' => "#home",
            'content' => "Home"
        ],
        1 => [
            'class' => null,
            'class-a' => "smoothScroll",
            'href' => "#about",
            'content' => "About"
        ],
        2 => [
            'class' => null,
            'class-a' => "smoothScroll",
            'href' => "#screenshot",
            'content' => "Screenshots"
        ],
        3 => [
            'class' => null,
            'class-a' => "smoothScroll",
            'href' => "#pricing",
            'content' => "Pricing"
        ],
        4 => [
            'class' => null,
            'class-a' => "smoothScroll",
            'href' => "#newsletter",
            'content' => "Newsletter"
        ],
        5 => [
            'class' => null,
            'class-a' => "smoothScroll",
            'href' => "#",
            'data-toggle' => "modal",
            "data-target" => "#modal1",
            'content' => "Contact"
        ] 
    ];

    public function getMenu($type = "header"): string
    {
        $html = "";
        if ($type === "header") {
            foreach ($this->menu as $menu) {
                $html .= $this->generateListItem($menu);
        
                // If there are (currently are not) submenu items, add them
                if (isset($menu['items'])) {
                    $html .= '<ul>';
                    foreach ($menu['items'] as $item) {
                        $html .= $this->generateSubListItem($item);
                    }
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }
        }
        return $html;

    }

    
    private function generateListItem($menu): string {
        $liClass = !empty($menu['class']) ? ' class="' . htmlspecialchars(string: $menu['class']) . '"' : '';
        $aClass = !empty($menu['class-a']) ? ' class="' . htmlspecialchars(string: $menu['class-a']) . '"' : '';
        $dataToggle = isset($menu['data-toggle']) ? ' data-toggle="' . htmlspecialchars(string: $menu['data-toggle']) . '"' : '';
        $dataTarget = isset($menu['data-target']) ? ' data-target="' . htmlspecialchars(string: $menu['data-target']) . '"' : '';
        
        return <<<HTML
            <li{$liClass}>
                <a{$aClass} href="{$menu['href']}"{$dataToggle}{$dataTarget}>{$menu['content']}</a>
        HTML;
    }
    
    private function generateSubListItem($item): string {
        $aClass = !empty($item['class']) ? ' class="' . htmlspecialchars(string: $item['class']) . '"' : '';
        return <<<HTML
            <li><a{$aClass} href="{$item['href']}">{$item['content']}</a></li>
        HTML;
    }
    


}