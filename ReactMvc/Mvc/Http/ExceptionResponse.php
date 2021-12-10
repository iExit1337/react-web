<?php

namespace ReactMvc\Mvc\Http;

use Exception;
use JetBrains\PhpStorm\Pure;

/**
 * ExceptionResponse
 *
 * @package ReactMvc\Mvc\Http
 * @author Philipp Lohmann <philipp.lohmann@check24.de>
 * @copyright CHECK24 GmbH
 */
class ExceptionResponse extends AbstractResponse
{

    /**
     * @param Exception $e
     */
    #[Pure] public function __construct(Exception $e)
    {
        $content = <<<STR
        Exception {$e->getCode()}
        Message: 
        \t{$e->getMessage()}
        Trace:
        \t{$e->getTraceAsString()}
STR;

        parent::__construct($content, 500);
    }

    /**
     * @return string
     */
    protected function getContentType(): string
    {
        return 'text/plain';
    }
}