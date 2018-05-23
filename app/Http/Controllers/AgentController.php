<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Libs\ApiResponse;

class AgentController extends Controller
{
  public static function getParams(Request $request){
    $params = $request->all();
    if(empty($params)){
      $params = $request->json()->all();
    }
    return $params;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $params = self::getParams($request);
      if(empty($params['email'])){
        return ApiResponse::sendErr("Empty email!");
      }
      $agent = Agent::whereEmail($params['email'])->first();
      if(empty($agent)){
        return $this->create($request);
      } else {
        return ApiResponse::send($agent->toArray());
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $params = self::getParams($request);
        $agent = new Agent();
        $agent->email = $params['email'];
        $agent->create_time = time();
        $agent->token = sha1(uniqid());
        try{
          $agent->save();
        }catch(Exception $e){
          return ApiResponse::sendErr($e->getMessage());
        }
        return ApiResponse::send($agent->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
