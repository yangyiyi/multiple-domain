<?php

namespace YangYiYi\MultipleDomain\Exceptions;

use Exception;

class InvalidOption extends Exception
{
    public static function missingDataFromConfigDomainFolder()
    {
        return new static('Please use command to create at least one domain file under config > domain folder.');
    }
}
