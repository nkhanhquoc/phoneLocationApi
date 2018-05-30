<?php
namespace App\Http\Controllers;
# @Author: Nguyen Quoc Khanh <nkhanhquoc>
# @Date:   23-May-2018
# @Email:  nkhanhquoc@gmail.com
# @Project: {ProjectName}
# @Filename: AgentController.php
# @Last modified by:   nkhanhquoc
# @Last modified time: 30-May-2018
# @Copyright: by nkhanhquoc@gmail.com



use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Location;
use App\Models\Device;
use App\Libs\ApiResponse;
use Validator;

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
        $arrAgent = $agent->toArray();
        $dv = Device::whereDeviceId($params['device_id'])->first();
        if(!empty($dv)) {
          $arrAgent['device_name'] = $dv->device_name;
        } else {
          $arrAgent['device_name'] = '';
        }
        return ApiResponse::send($arrAgent);
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
        $params = self::getParams($request);
        if(empty($params['latitude']) || empty($params['longitude']) || empty($params['agent_token'])){
          return ApiResponse::sendErr("location incorrect or device does not register!");
        }

        $location = new Location();
        $location->agent_token = $params['agent_token'];
        $location->latitude = $params['latitude'];
        $location->longitude = $params['longitude'];
        $location->device = isset($params['device']) ? $params['device']:'';
        $location->device_id = isset($params['device_id']) ? $params['device_id']:'';
        $location->time = time();
        try{
          $location->save();
        }
        catch(Exception $e){
          return ApiResponse::sendErr($e->getMessage());
        }
        return ApiResponse::send($location);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addDevice(Request $request)
    {
        $params = self::getParams($request);
        $validate = Validator::make($params,
          [
            'agent_id' => 'required|numeric',
            'device_id' => 'required'
          ]
      );
      if($validate->fails()){
        return ApiResponse::sendErr('Bad Request!', 1, $validate->errors()->all());
      }

      $dv = Device::whereDeviceId($params['device_id'])->whereAgentId($params['agent_id'])->first();
      if(!empty($dv)){
        $dv->device_name = empty($params['device_name']) ? 'default':$params['device_name'];
      } else {
        $dv = new Device();
        $dv->agent_id = $params['agent_id'];
        $dv->device_id = $params['device_id'];
        $dv->device_name = empty($params['device_name']) ? 'default':$params['device_name'];
      }
      try{
        $dv->save();
      }catch(Exception $e){
          return ApiResponse::sendErr($e->getMessage());
      }
      return ApiResponse::send($dv);
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
