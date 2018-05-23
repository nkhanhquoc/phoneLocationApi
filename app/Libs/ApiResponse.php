<?php
namespace App\Libs;

class ApiResponse{

  public static function send($data = [], $message = 'Success', $exit = false){
      $ret = [
          'code' => 0,
          'message' => $message,
          'data' => $data
      ];

      $return = response()->json($ret);
      if($exit){
          die($return);
      }
      return $return;
  }

  public static function sendErr($message = 'Bad request!!!', $code = 1, $data = [], $exit = false){
      $ret = [
          'code' => $code,
          'message' => $message,
          'data' => $data
      ];
      $return = response()->json($ret, 400);

      return $return;
  }
}
