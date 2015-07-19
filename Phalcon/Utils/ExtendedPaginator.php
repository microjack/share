<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-31 22:00:38
 */
namespace Phalcon\Utils;

class ExtendedPaginator {
    
    private $rollPage = 10;

    private $totalCount;

    private $pageSize;

    private $currentPage;

    private $pageCount;

    private $pageVar = 'page';

    public function __construct($config = '') {

    }

    /**
     * setData
     *
     * @param array $config
     */
    public function setData($total,$pageSize,$currentPage,$rollPage = 10) {
        $this->totalCount  = $total;
        $this->pageSize    = $pageSize;
        $this->currentPage = $currentPage;
        $this->rollPage    = $rollPage;

        $this->pageCount = ceil($this->totalCount / $this->pageSize);
        return $this;
    }

    public function setCurrentPage($page) {
        # code...
    }

    /**
     * Returns a slice of the resultset to show in the pagination
     *
     * @return stdClass
     */
    public function getPaginate() {
        $data = $this->getDatas();
        if (empty($data)) {
            return $data;
        }
        $url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?");
        $parse = parse_url($url);
        $path = $parse['path'];
        $params = array();
        if(isset($parse['query'])) {
            parse_str($parse['query'],$params);
            unset($params[$this->pageVar]);
        }

        $buildQuery = function($key,$val) use ($params) {
            $params[$key] = $val;
            return http_build_query($params);
        };

        $data['urls'] = array(
            'firstPage' => $path.'?'.$buildQuery($this->pageVar,$data['firstPage']),
            'lastPage' => $path.'?'.$buildQuery($this->pageVar,$data['lastPage']),
            'prevPage' => $path.'?'.$buildQuery($this->pageVar,$data['prevPage']),
            'nextPage' => $path.'?'.$buildQuery($this->pageVar,$data['nextPage']),
        );

        $_pages = array();
        foreach ($data['pageNums'] as $value) {
            $page_num = $value;
            $_pages[$page_num] = $path.'?'.$buildQuery($this->pageVar,$value);
        }
        $data['urls']['pageNums'] = $_pages;
        return $data;
    }

    private function getDatas() {
        if (0 == $this->totalCount) {
            return array();
        }

        $nowCoolPage = ceil($this->currentPage / $this->rollPage);
        $before = $this->currentPage > 1 ? $this->currentPage - 1 : 1;
        $next = $this->currentPage > $this->pageCount ? $this->pageCount : $this->currentPage + 1;

        if ($next > $this->pageCount) {
            $next = $this->pageCount;
        }

        $data = array(
            'pageSize'    => $this->pageSize,
            'totalCount'  => $this->totalCount,
            'firstPage'   => 1,
            'lastPage'    => $this->pageCount,
            'prevPage'    => $before,
            'nextPage'    => $next,
            'currentPage' => $this->currentPage,
            'rollPage'    => $this->rollPage,
        );

        $pages = array();

        $mid = intval( ($this->rollPage) / 2 );
        $data['mid'] = $mid;

        $begin = $this->currentPage + 1 - $mid;
        if ($begin < 1) {
            $begin = 1;
        }

        $end = $begin + $this->rollPage - 1;
        if ($end >= $this->pageCount) {
            $end = $this->pageCount;
            $begin = $end - $this->rollPage + 1;
            if ($begin < 1) {
                $begin = 1;
            }
        }

        for ($i = $begin; $i <= $end; $i++) {
            $pages[] = $i;
        }
        $data['pageNums'] = $pages;
        return $data;
    }
}