<?php

use application\controllers\MainController;

class SitemapController extends MainController
{
    public function index()
    {
        // $sub_id = !empty($_GET['sub_id']) ? $_GET['sub_id'] : '';
        $view = $this->view('sitemap/index');
        // $view->bind('sub_id', $sub_id);
    }

    function post()
    {
        $limit = 500;
        $path = DOCUMENT_ROOT . '/cache/single/';
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $daftar[] = $entry;
                }
            }
        }
        if (is_array($daftar)) :
            $i = 0;
            foreach ($daftar as $key => $val) {
                if (file_exists($path . $val)) {
                    $data = @file_get_contents($path . $val);
                    $unserialize = unserialize($data);
                    $uhoh['id']      = $unserialize['id'];
                    $uhoh['slug']    = $unserialize['slug'];
                    $uhoh['title']   = $unserialize['title'];
                    $uhoh['pubdate'] = $unserialize['pubdate'];
                    $damn[] = $uhoh;
                }
                $i++;
                if ($i == $limit) break;
            }
        endif;
        closedir($handle);
        $recent_post = $damn;
        $view = $this->view('sitemap/sitemap-post');
        $view->bind('recent_post', $recent_post);
    }

    function search()
    {
        $limit = 500;
        // $pos = '1';
        // $sep = PHP_EOL;
        $pos = '0';
        $sep = ",";
        $word_path = DOCUMENT_ROOT . '/keyword/';
        if (!file_exists($word_path)) :
            mkdir($word_path, 0755, true);
        endif;

        if (file_exists($word_path . 'items' . $pos . '.txt')) :
            $handle = file_get_contents($word_path . 'items' . $pos . '.txt');
        else :
            $handle = '';
        endif;

        if ($handle) :
            $result = explode($sep, $handle);
            $res = array_slice($result, -$limit, $limit, true);
            if ($res != '') :
                shuffle($res);
                foreach ($res as $hasil) :
                    if ($hasil != '') :
                        $a['title'] = $hasil;
                        $output = $a;
                    endif;
                endforeach;
            endif;
        endif;

        if ($output != '') :
            $title = $output;
        else :
            $a['title'] = 'hello world';
            $output[] = $a;
            $title = $output;
        endif;

        $view = $this->view('sitemap/sitemap-0');
        $view->bind('recent_post', $title);
    }
}
