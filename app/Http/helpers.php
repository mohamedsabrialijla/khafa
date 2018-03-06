<?php

function mainResponse($status, $message, $data, $code, $key)
{
    try {
        $result['status'] = $status;
        $result['code'] = $code;
        $result['message'] = $message;
        if (!is_null($data)) {
            if ($status) {
                if ($data != null && array_key_exists('data', $data)) {
                    $result[$key] = $data['data'];
                } else {
                    $result[$key] = $data;
                }
            } else {
                $result[$key] = $data;
            }
        }
        return response()->json($result, $code);
    } catch (Exception $ex) {
        return response()->json([
            'line' => $ex->getLine(),
            'message' => $ex->getMessage(),
            'getFile' => $ex->getFile(),
            'getTrace' => $ex->getTrace(),
            'getTraceAsString' => $ex->getTraceAsString(),
        ], $code);
    }
}

function payment($name, $email, $total, $order_no, $callback_url, $total_items)
{
    $data = "uid=NoufHamdaN&pwd=NoufhAmDan&secret=SeCretnoufH&cust_name=$name&cust_email=$email&order_amt=$total&delivery_charges=2.5&order_no=$order_no&total_items=$total_items&callback_url=$callback_url&knet_allowed=1&cc_allowed=1";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://lounge.tahseeel.com/api/?p=order");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}

function chkPayment($id, $hash)
{
    $data = "uid=NoufHamdaN&pwd=NoufhAmDan&secret=SeCretnoufH&id=$id&hash=$hash";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://lounge.tahseeel.com/api/?p=order_info");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}

function random_number($digits)
{
    return str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
}