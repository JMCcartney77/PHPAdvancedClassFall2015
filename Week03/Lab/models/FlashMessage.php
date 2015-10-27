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

        if (!isset($_SESSION['flashmessages'])) {
            $this->setFlashMessage();
        }
    }

    public function addMessage($key, $msg) {
        parent::addMessage($key, $msg);
        $this->setFlashMessage();
    }

    public function removeAllMessages($key) {
        parent::addMessage($key, $msg);
        $this->setFlashMessage();
    }

    public function getAllMessages($key, $msg) {
        $messages = $_SESSION['flashmessages'];
        $this->removeMessage();
        return $messages;
    }

    public function setFlashMessage() {
        $_SESSION['flashmessages'] = $this->getAllMessages();
    }

}
