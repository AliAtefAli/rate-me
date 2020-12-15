<?php

namespace App\Traits;

trait ApiTrait
{
    public function returnError($data = '')
    {
        return response()->json([
            'status' => false,
            'data' => $data
        ]);
    }

    public function returnSuccessMessage($data = '')
    {
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function returnData($data)
    {
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }
}
