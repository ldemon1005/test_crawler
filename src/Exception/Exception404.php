<?php
/**
 * Created by PhpStorm.
 * User: An Viet Computer
 * Date: 11/2/2018
 * Time: 1:37 PM
 */

namespace Vnp\CrawlerData\Exception;


use Throwable;

class Exception404 extends \Exception
{
    function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        if($code == 0) $code = 404;
        $message == "" && $message = "404 not found!";
        parent::__construct($message, $code, $previous);
    }
}