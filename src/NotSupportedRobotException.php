<?php

declare(strict_types=1);

/**
 * Исключение при запросе незарегистрированного типа робота.
 */
class NotSupportedRobotException extends \Exception
{
    public function __construct(
        string $message = 'Robot type is not supported',
        int $code = 0,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
