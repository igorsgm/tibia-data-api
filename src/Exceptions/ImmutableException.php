<?php

namespace Igorsgm\TibiaDataApi\Exceptions;

use Throwable;

class ImmutableException extends \Exception
{

    /**
     * ImmutableException constructor.
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
    {
        if ($message === '') {
            $message = sprintf('Class %s is immutable.', debug_backtrace()[1]['class']);
        }

        parent::__construct($message, $code, $previous);
    }

}
