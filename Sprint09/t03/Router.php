<?php
    class Router {
        public function __construct() {
            $this->params = [];
        }
        public function manageRequest($url) {
            $url = parse_url($url);   
            $url = $url['query'];
            foreach(explode('&', $url) as $val) {
                $pair = explode('=', $val);
                $this->params[$pair[0]] = $pair[1];
            }
        }
        public function printResult() {
            $res = '';
            foreach($this->params as $key => $val) { 
                $res .= "'$key': '$val', ";
            }
            $res = substr($res, 0, -2);
            $res = '{'.$res.'}';
            echo $res;
        }
    }
?>