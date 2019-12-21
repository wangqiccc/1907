<?php
/**
 * Created by PhpStorm.
 * User: ccc
 * Date: 2019/11/25
 * Time: 14:50
 */

namespace app\api\controller;


class Upload
{

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $path=str_replace("\\","/",$info->getSaveName());
                echo "/uploads/".$path;
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
    public function editorUpload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $path=str_replace("\\","/",$info->getSaveName());
                return json(["errno"=>0,"data"=>["/uploads/".$path]]);
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}