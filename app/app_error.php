<?php 
    class AppError extends ErrorHandler {
        
        function beforeFilter () {
            $this->controller->set('title', 'An error has occurred');
        }
        
        function error403 ($params) {
            $this->_outputMessage('error_403');            
        }
    } 