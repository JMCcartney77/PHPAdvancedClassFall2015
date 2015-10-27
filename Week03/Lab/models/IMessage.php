<?php

interface IMessage {

    public function addMessage($key, $msg);
    public function removeAllMessages($key);
    public function setFlashMessages();
    public function getAllMessages();
    
}
