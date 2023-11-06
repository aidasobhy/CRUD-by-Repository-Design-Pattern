<?php

namespace App\Helpers;

trait Response
{
    public function returnSuccessMessage($msg = "", $code = 200)
    {
        return response()->json(
            [
                'status' => true,
                'code'   => $code,
                'msg'    => $msg
            ]
        );
    }

    public function returnError($msg = "", $code = 404)
    {
        return response()->json(
            [
                'status' => false,
                'code'   => $code,
                'msg'    => $msg
            ]);
    }

    public function returnData($data, $msg = "", $code)
    {
        return response()->json([
            'status' => true,
            'code'   => $code,
            'msg'    => $msg,
            'data'   => $data
        ]);
    }

}
