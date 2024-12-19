<?php


class Storage
{

    public function add(string $key, ?string $value): bool
    {
        // if (!is_bool($value) && !is_string($value)) {
        //     error_log('Некорректный тип переменной value' . gettype($value));


        //     return false;

        // }


        if ($value) {
            return true;
        }


        return false;


    }


}