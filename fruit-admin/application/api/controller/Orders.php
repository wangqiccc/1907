<?php
/**
 * Created by PhpStorm.
 * User: ccc
 * Date: 2019/11/29
 * Time: 17:06
 */

namespace app\api\controller;


use think\controller\Rest;
use think\Db;

class Orders extends Rest
{
    public function orders(){
        $method = $this->method;
        switch ($method) {
            case "get":
                return $this->get();
            case "post":
                return $this->post();
            case "put":
                return $this->put();
            case "delete":
                return $this->delete();
        }
    }
    public function get(){
      $query=input("get.");
      if(isset($query["state"])&&$query["state"]==="1"){
        $data=Db::view("orders","id,total,backup,create_time,order_id")
            ->view("users","nickName","users.id=orders.uid")
            ->view("address","province,city,area,detail,phone,name","address.id=orders.aid")
            ->where("orders.state",1)
            ->order("create_time","desc")
            ->select();
        $total= Db::view("orders","id,total,backup,create_time,order_id")
            ->view("users","nickName","users.id=orders.uid")
            ->view("address","province,city,area,detail,phone,name","address.id=orders.aid")
            ->where("orders.state",1)
            ->count();
        return json(["msg"=>"插叙成功","code"=>200,"data"=>$data,"total"=>$total]);
      }
    }
}