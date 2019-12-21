<?php
/**
 * Created by PhpStorm.
 * User: ccc
 * Date: 2019/11/20
 * Time: 11:51
 */

namespace app\api\controller;


use think\captcha\Captcha;

class Admin
{
    /*
     * 得到一个哈希值
     * */
    private function createHash()
    {
        return md5(time());
    }
    //17f10a5b34d5ae481b0aedff5f900895
    /*
     * 加密函数
     * */
    private function createPassword($password, $hash)
    {
        return md5(sha1($password) . $hash);
    }
    //0d0a8c7c4979ff31d132bc9615cd2f83
    /*
     * 验证登录
     * */
    public function login()
    {
        $data = input("post.");
        $captcha = new Captcha();
        if (!$captcha->check($data["code"])) {
            return json(["msg" => "验证码错误", "code" => 400]);
        }
        $username = $data["username"];
        $model = model("admin");
        $r = $model->where("username", $username)->find();
        if (isset($r)) {
            if ($r->state === 0) {
                return json(["msg" => "暂时无法登陆", "code" => 400]);
            }
            $password = $data["password"];
            $hash = $r->hash;
            if ($r->password === $this->createPassword($password, $hash)) {
                $date = $r->login_date;
                $r->save(["login_date" => time()]);
                return json(["msg" => "登录成功", "code" => 200, "data" => [
                    "role" => $r->role,
                    "date" => $date
                ]]);
            } else {
                return json(["msg" => "登录失败", "code" => 400]);
            }
        } else {
            return json(["msg" => "登录失败", "code" => 400]);
        }
    }

    /*
     * 验证码图片
     * */
    public function captcha()
    {
        $config = [
            // 验证码字体大小
            'fontSize' => 20,
            // 验证码位数
            'length' => 4,
            // 关闭验证码杂点
            'useNoise' => false,
            "imageW" => 143,
            "imageH" => 40
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }

    /*
     * 密码修改
     * */
    public function changePassword()
    {
        $data = input("put.");
        $username = $data["username"];
        $model = model("admin");
        $r = $model->where("username", $username)->find();
        $password = $this->createPassword($data["password"], $r->hash);
        if ($password !== $r->password) {
            return json(["msg" => "原始密码错误", "code" => 400]);
        }
        $newpassword = $this->createPassword($data["newpassword1"], $r->hash);
        $res = $r->save(['password' => $newpassword]);
        if ($res === 1) {
            return json(["msg" => "修改成功", "code" => 200]);
        } else {
            return json(["msg" => "修改失败", "code" => 400]);
        }
    }

    /*
     * 新增管理员
     * */
    public function addManager()
    {
        $username = input("post.username");
        $hash = $this->createHash();
        $password = $this->createPassword("123456", $hash);
        $model = model("admin");
        $r = $model->where("username", $username)->find();
        if (isset($r)) {
            return json(["msg" => "已存在该管理员", "code" => 400]);
        }
        $r = $model->save(['username' => $username, 'password' => $password, "hash" => $hash]);
        if ($r === 1) {
            return json(["msg" => "新增成功", "code" => 200]);
        } else {
            return json(["msg" => "新增失败", "code" => 400]);
        }
    }

    /*
     *  获取管理员
     * */
    public function getManager()
    {
        $data = input("get.");
        $page = $data["page"];
        $pageSize = $data["pageSize"];
        $start = ($page - 1) * $pageSize;
        $model = model("admin");
        $res = $model->where("role", 2)->limit($start, $pageSize)->select();
        $total = $model->where("role", 2)->count();
        return json(["msg" => "查询成功", "code" => 200, "data" => $res, "total" => $total]);
    }

    /*
     * 重置密码
     * */
    public function resetPassword()
    {
        $id = input("put.id");
        $model = model("admin");
        $r = $model->where("id", $id)->find();
        $password = $this->createPassword("123456", $r->hash);
        $res = $r->save(["password" => $password]);
        if ($res === 1) {
            return json(["msg" => "修改成功", "code" => 200]);
        } else {
            return json(["msg" => "修改失败", "code" => 400]);
        }
    }

    /*
     * 修改状态
     * */
    public function changeState()
    {
        $id = input("put.id");
        $state = input("put.state");
        $model = model("admin");
        $r = $model->where("id", $id)->find();
        $res = $r->save(["state" => $state]);
        if ($res === 1) {
            return json(["msg" => "修改成功", "code" => 200]);
        } else {
            return json(["msg" => "修改失败", "code" => 400]);
        }
    }
}










