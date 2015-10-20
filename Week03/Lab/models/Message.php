<?php

class Message implements IMessage {

    private $messages = array();

    public function addMessage($key, $msg) {
        $this->messages[key] = $msg;
    }

    public function removeMessage($key) {
        unset($this->messages);
    }

    public function getAllMessages() {
        return $this->messages;
    }

}
