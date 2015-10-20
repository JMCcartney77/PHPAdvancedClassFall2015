<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlashMessage
 *
 * @author 001267169
 */
class FlashMessage extends Message {
    
    public function __construct() {
        
        if ( !isset($_SESSION['flashmessages']) ) {
        $_SESSION['flashmessages'] = array();
        
        }
    
        $this->messages = $_SESSION['flashmessages'];
    }
        public function addMessage($key,$msg) {
            parent::addMessage($key, $msg);
            $_SESSION['flashmessages'][$key] = $msg;
            
        }
}
