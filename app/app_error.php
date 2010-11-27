<?php 
	class AppError extends ErrorHandler {
		
		function error403 ($params) {
			$this->_outputMessage('error_403');			
		}
	} 