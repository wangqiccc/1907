<?php
/**
 * Created by PhpStorm.
 * User: ccc
 * Date: 2019/11/29
 * Time: 13:50
 */

namespace app\api\controller;


use think\controller\Rest;

class Banners extends Rest
{
    public function banners()
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
        //查询分页数据 查询单个数据
        $model = model("banners");
        $data = $model->where("is_delete", 0)->order("sort")->select();
        return json(["msg" => "查询成功", "code" => 200, "data" => $data]);

    }

    private function post()
    {
        $model = model("banners");
        $body = input("post.");
        $body["create_time"] = time();
        $body["update_time"] = 0;
        $res = $model->allowField(true)->save($body);
        if ($res === 1) {
            return json(["msg" => "操作成功", "code" => 200]);
        } else {
            return json(["msg" => "操作失败", "code" => 400]);
        }
    }

    private function put()
    {
        $model = model("banners");
        $body = input("put.");
        $body['update_time'] = time();
        $res = $model->allowField(true)->isUpdate(true)->save($body);
        if ($res === 1) {
            return json(["msg" => "更新成功", "code" => 200]);
        } else {
            return json(["msg" => "更新失败", "code" => 400]);
        }
    }

    private function delete()
    {
        $model = model("banners");
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