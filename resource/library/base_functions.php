<?php

function pr_pre($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/**
 * Generate Bootstrap3 style breadcrumb
 * 
 * @param array $arr
 * @return string
 */
function breadcrumb_gen($arr) {
    $out = '<ol class="breadcrumb">';
    foreach ($arr as $k => $v) {
        if ($v) {
            $out .= '<li><a href="' . $v . '">' . $k . '</a></li>';
        } else {
            $out .= '<li class="active">' . $k . '</li>';
        }
    }
    return $out;
}

/**
 * Generate Bootstrap3 Style fixed top navigation
 * 
 * @param array $navis
 * @param string $controller
 * @param string $prefix
 * @return string
 * 
 * $navis is predefined array with all categories, e.g.
 *   $navis = array(
 *   "IDE" => array("controller" => "ide"),
 *   "Bootstrap" => array("controller" => "bootstrap"),
 *   "PHP" => array("controller" => "php")
 *   );
 * 
 * $controller is current controller, so the list is marked as "active"
 * 
 * $prefix is used when the controller is shared by different mode, for example:
 * $prefix = 'admin'; 
 * 
 */
function navi_gen($navis, $controller = '', $prefix = '') {
    $output = '';
    foreach ($navis as $name => $navi) {
        $d_urls = array();
        $active = '';
        if (is_int($name)) {
            $output .= '<li><p class="navbar-text navbar-right">' . $navi .
                    '</p></li>';
        } else {
            if (is_array($navi)) {
                if(isset($navi['dropdown'])){
                    
                    $d_urls['parent'] = navi_url_gen($navi, $controller, $prefix);
                    $d_urls['child'] = array(); 
                    foreach($navi['dropdown'] as $n=>$subnavi){
                        $d_urls['child'][$n] = navi_url_gen($subnavi, $controller, $prefix);
                    }
                }
                else{
                    $url = navi_url_gen($navi);
                }
               
            } else {
                $url = $navi;
            }

            if(count($d_urls)){
                $output .= '<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="' .
                            $d_url['parent'] . '">' . $name . 
                            '<span class="caret"></span></a>';
     
                $output .= '<ul class="dropdown-menu">';
                foreach($d_urls['child'] as $k=>$v){
                    $output .= '<li>' . '<a href="' . $v . '">' . $k . '</a></li>';
                }
                
                $output .= '</ul></li>';
            }
            else{
                $output .= "<li" . $active . ">" . '<a href="' . $url . '">' . $name
                    . '</a></li>';
            }
        }
    }
    return $output;
}

function navi_url_gen($navi, $controller, $prefix) {
    if (is_array($navi)) {
        $navi_controller = $navi['controller'];
        if ($controller == $navi_controller) {
            $active = ' class="active"';
        }
        if ($prefix) {
            $base = SITE_BASE_URL . "/" . $prefix;
        } else {
            $base = SITE_BASE_URL;
        }
        $url = $base . "/" . $navi_controller;
        if (isset($navi['params'])) {
            $navi_params = to_array($navi['params']);
            foreach ($navi_params as $navi_param) {
                $url .= "/" . $navi_param;
            }
        }
    } else {
        $url = $navi;
    }
    return $url;
}

/**
 * convert to array if it's string
 * 
 * @param type $input
 * @return type
 */
function to_array($input) {
    if (is_array($input)) {
        return $input;
    } else {
        return array($input);
    }
}

/**
 * Modfied from someone's version to support Bootstrap 3 style 
 * (Sorry forgot where I got this)
 * 
 * I'm big fan of Friendly url, so no query string supported, 
 * e.g. /page/1 instead of /?page=1
 *  
 * @param int $page
 * @param type $total_pages
 * @param type $limit
 * @param type $targetpage
 * @param type $stages
 * @param type $param
 * @return string
 */
function paginate_gen($page, $total_pages, $limit, $targetpage, $stages, $param = 'page') {

    // Initial page num setup
    if ($page == 0) {
        $page = 1;
    }
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages / $limit);
    $LastPagem1 = $lastpage - 1;


    $paginate = '';
    if ($lastpage > 1) {

        $paginate .= "<div>";
        $paginate .= '<ul class="pagination">';
        // Previous
        if ($page > 1) {
            $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/$prev">&larr; prev</a></li>';
        } else {
            $paginate.= '<li class="disable"><span>&larr; prev</span></li>';
        }

        // Pages	
        if ($lastpage < 7 + ($stages * 2)) { // Not enough pages to breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page) {
                    $paginate.= '<li class="active"><span>' . $counter . '</span></li>';
                } else {
                    $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $counter . '">' . $counter . '</a></li>';
                }
            }
        } elseif ($lastpage > 5 + ($stages * 2)) { // Enough pages to hide a few?
            // Beginning only hide later pages
            if ($page < 1 + ($stages * 2)) {
                for ($counter = 1; $counter < 4 + ($stages * 2); $counter++) {
                    if ($counter == $page) {
                        $paginate.= '<li class="active"><span>' . $counter . '</span></li>';
                    } else {
                        $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $counter . '">' . $counter . '</a></li>';
                    }
                }
                $paginate.= '<li><a href="#">...</a></li>';
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $LastPagem1 . '">' . $LastPagem1 . '</a></li>';
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $lastpage . '">' . $lastpage . '</a></li>';
            }
            // Middle hide some front and some back
            elseif ($lastpage - ($stages * 2) > $page && $page > ($stages * 2)) {
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/1">1</a></li>';
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/2">2</a></li>';
                $paginate.= '<li><a href="#">...</a></li>';
                for ($counter = $page - $stages; $counter <= $page + $stages; $counter++) {
                    if ($counter == $page) {
                        $paginate.= '<li class="active"></span>' . $counter . '</span></li>';
                    } else {
                        $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $counter . '">' . $counter . '</a></li>';
                    }
                }
                $paginate.= '<li><a href="#">...</a></li>';
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $LastPagem1 . '">$LastPagem1</a></li>';
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $lastpage . '">$lastpage</a></li>';
            }
            // End only hide early pages
            else {
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/1">1</a></li>';
                $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/2">2</a></li>';
                $paginate.= '<li><a href="#">...</a>';
                for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page) {
                        $paginate.= '<li class="active"><span>' . $counter . '</span></li>';
                    } else {
                        $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $counter . '">' . $counter . '</a></li>';
                    }
                }
            }
        }

        // Next
        if ($page < $counter - 1) {
            $paginate.= '<li><a href="' . $targetpage . '/' . $param . '/' . $next . '">next &rarr; </a></li>';
        } else {
            $paginate.= '<li class="disabled"><span>next &rarr;</span></li>';
        }

        $paginate.= '</ul>';
        $paginate.= '</div>';
    }
    return $paginate;
}

?>