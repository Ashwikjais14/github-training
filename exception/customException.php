<?php

class ValidationException extends Exception
{
    public function errorMessage()
    {
        return "Validation Error: " . $this->getMessage();
    }
}