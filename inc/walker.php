<?php
class WP_Nav_Walker_Popup extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $output .= '<li class="nav-item">';
        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $output .= '<a class="nav-link"' . $attributes . '>' . esc_html($item->title) . '</a>';
        $output .= '</li>';
    }
}
?>