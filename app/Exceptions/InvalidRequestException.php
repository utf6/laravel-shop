<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Request;
use Throwable;

class InvalidRequestException extends Exception
{
    //
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(Request $request)
    {
        if ($request->expectsJson()){
            // json() 方法第二个参数就是 HTTP 返回码
            return response()->json(['msg' => $this->message], $this->code);
        }

        return view('pages.error', ['msg' => $this->message]);
    }
}
