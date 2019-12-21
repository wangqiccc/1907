<?php
/**
 * Created by PhpStorm.
 * User: ccc
 * Date: 2019/11/29
 * Time: 10:25
 */

namespace app\api\controller;


use think\controller\Rest;

class Users extends Rest
{
    public function users()
    {
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
    private function get(){
        $model = model("users");
        $query = input("get.");
        $where=[];
        if(isset($query["nickName"])){
            $name=$query["nickName"];
            $where["nickName"]=["like","%$name%"];
        }
        $page = $query["page"];
        $pageSize = $query["pageSize"];
        $start = ($page - 1) * $pageSize;
        $data = $model->where($where)->limit($start, $pageSize)->select();
        $total = $model->where($where)->count();
        return json(["msg" => "查询成功", "code" => 200, "data" => $data, "total" => $total]);
    }
}