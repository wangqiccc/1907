<?php
/**
 * Created by PhpStorm.
 * User: ccc
 * Date: 2019/11/26
 * Time: 09:49
 */

namespace app\api\controller;


use think\controller\Rest;
use think\Db;

class Goods extends Rest
{
   public function goods(){
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
   /*
    * page pageSize id
    * name 上架时间段 库存状态
    * */
   private function get(){
      $model=model("goods");
      $query=input("get.");
      if(!isset($query["id"])){
         $page=$query["page"];
         $pageSize=$query["pageSize"];
         $start=($page-1)*$pageSize;

         $where=["goods.is_delete"=>0];
         if(isset($query["name"])){
             $name=$query["name"];
             $where["goods.name"]=["like","%$name%"];
         }
         if(isset($query["tid"])){
             $tid=$query["tid"];
             $where["goods.tid"]=$tid;
         }
         if(isset($query["store"])){
             $store=$query["store"];
             if($store==0){
               $where["goods.store"]=0;
             }else{
               $where["goods.store"]=[">",0];
             }
         }
         if(isset($query["start_time"])&&isset($query["end_time"])){
             $start_time=$query["start_time"];
             $end_time=$query["end_time"];
             $where["goods.update_time"]=["between",[$start_time,$end_time]];
         }
         $data=Db::view("goods","id,name,description,price,thumb,store,create_time,update_time,sort,state")
             ->view("type",['name'=>'catname'],"goods.tid=type.id")
             ->limit($start,$pageSize)
             ->where($where)
             ->order("sort")
             ->select();
         $total=$model
             ->where($where)
             ->count();
         return json(["msg"=>"查询成功","code"=>200,"data"=>$data,"total"=>$total]);
      }else{
        $data=$model->where("id",$query['id'])->find();
        return json(["msg"=>"查询成功","code"=>200,"data"=>$data]);

      }
   }
   private function post(){
       $model=model("goods");
       $body=input("post.");
       $body["create_time"]=time();
       $body["update_time"]=time();
       $res=$model->allowField(true)->save($body);
       if($res===1){
           return json(["msg"=>"新增成功","code"=>200]);
       }else{
           return json(["msg"=>"新增失败","code"=>400]);
       }
   }
   private function put(){
       $model = model("goods");
       $body = input("put.");
       $body['update_time'] = time();
       $res = $model->allowField(true)->isUpdate(true)->save($body);
       if ($res === 1) {
           return json(["msg" => "更新成功", "code" => 200]);
       } else {
           return json(["msg" => "更新失败", "code" => 400]);
       }
   }
   private function delete(){
       $model = model("goods");
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