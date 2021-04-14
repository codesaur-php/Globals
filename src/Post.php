<?php

namespace codesaur\Globals;

class Post extends superGlobal
{
    public function has(string $var_name): bool
    {
        return parent::has_var(INPUT_POST, $var_name);
    }
    
    public function hasVars(array $var_names): bool
    {
        foreach ($var_names as $name) {
            if (!$this->has($name)) {
                return false;
            }
        }
        
        return true;
    }
    
    public function value(string $var_name, int $filter = FILTER_DEFAULT, $options = null)
    {
        return parent::filter(INPUT_POST, $var_name, $filter, $options);
    }

    public function global(): array
    {
        return $_POST;
    }

    public function raw($var_name)
    {
        return $_POST[$var_name];
    }
    
    public function asString($var): string
    {
        return parent::filter_var($var, FILTER_SANITIZE_STRING);
    }

    public function asInt($var): int
    {
        return parent::filter_var($var, FILTER_VALIDATE_INT);
    }

    public function asFiles($var)
    {
        return parent::filter_var($var);
    }

    public function asEmail($var)
    {
        return parent::filter_var($var, FILTER_VALIDATE_EMAIL);
    }
    
    final public function asPassword($var, $verify = false)
    {
        $value = $this->asString($var);
        
        if (!defined('CRYPT_BLOWFISH')
                || !CRYPT_BLOWFISH
        ) {
            $md5_password = md5($value);
            return $verify ? $md5_password === $verify : $md5_password;
        }
        
        if ($verify) {
            return password_verify($value, $verify);
        }
        
        return password_hash($value, PASSWORD_BCRYPT);
    }
}
