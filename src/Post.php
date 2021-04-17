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
}
