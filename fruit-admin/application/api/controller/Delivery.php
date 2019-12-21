<?php
/**
 * Created by PhpStorm.
 * User: ccc
 * Date: 2019/11/27
 * Time: 15:56
 */

namespace app\api\controller;


use think\controller\Rest;

class Delivery extends Rest
{
    public function delivery()
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

    private function get()
    {
        $model = model("delivery");
        $query = input("get.");
        if (isset($query["page"]) && isset($query["pageSize"])) {
            $page = $query["page"];
            $pageSize = $query["pageSize"];
            $start = ($page - 1) * $pageSize;
            $data = $model
                ->where("is_delete", 0)
                ->limit($start, $pageSize)
                ->select();
            $total = $model
                ->where("is_delete", 0)
                ->count();
            return json(["msg" => "查询成功", "code" => 200, "data" => $data, "total" => $total]);

        } else {
            $data = $model->where("is_delete", 0)->select();
            return json(["msg" => "获取成功", "code" => 200, "data" => $data]);
        }
    }

    private function put()
    {
        $model = model("delivery");
        $body = input("put.");
        $body['update_time'] = time();
        $res = $model->allowField(true)->isUpdate(true)->save($body);
        if ($res === 1) {
            return json(["msg" => "更新成功", "code" => 200]);
        } else {
            return json(["msg" => "更新失败", "code" => 400]);
        }
    }

    private function post()
    {
        $model = model("delivery");
        $body = input("post.");
        $body["create_time"] = time();
        $body["update_time"] = time();
        $res = $model->allowField(true)->save($body);
        if ($res === 1) {
            return json(["msg" => "新增成功", "code" => 200]);
        } else {
            return json(["msg" => "新增失败", "code" => 400]);
        }
    }

    private function delete()
    {
        $model = model("delivery");
        $id = input("get.id");
        $obj = $model->where("id", $id)->find();
        $obj->is_delete = 1;
        $res = $obj->save();
        if ($res === 1) {
            return json(["msg" => "删除成功", "code" => 200]);
        } else {
            return json(["msg" => "删除失败", "code" => 400]);
        }
    }
}