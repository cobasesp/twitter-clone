<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $error;
    private $msg;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->error = false;
        $this->msg = "";
    }

    /**
     * Configure and return and error message
     * @param $msgs
     */
    public function responseError($msg) {
        $this->error = true;
        $this->msg = $msg;

        return json_encode([
            "error" => $this->error,
            "msg" => $this->msg,
            "data" => null
        ]);
    }

    public function responseOk($data) {
        $this->error = false;
        $this->msg = "";

        return json_encode([
            "error" => $this->error,
            "msg" => $this->msg,
            "data" => $data
        ]);
    }
}
