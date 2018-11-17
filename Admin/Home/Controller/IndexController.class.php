<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('login');
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function check(){
        $table = M('admin');
        $condition['user'] = I('post.user');
        $condition['password'] = I('post.password');
        $flag = $table->where($condition)->find();
        if($flag){
            $this->display('operate');
        }else{
            $this->error('用户名或者密码错误');
        }
    }

    public function read(){
        $table = I('post.table');
        $table = M($table);
        $data = $table->select();
        $this->assign('data',$data);
        $this->display(I('post.table'));
    }

    public function update(){
        $table = I('post.table');
        if($table == 'room_set'){
            $number = I('post.number');
            $data['class'] = I('post.class');
            $data['state'] = I('post.state');
            $data['price'] = I('post.price');
            $table = M($table);
            $table->where('number='.$number)->save($data);
            $data = $table->select();
            $this->assign('data',$data);
            $this->display(I('post.table'));
        }
    }

    public function delete(){
        $table = I('post.table');
        $condition['id'] = I('post.id');
        $table = M($table);
        $table->where($condition)->delete();
        $data = $table->select();
        $this->assign('data',$data);
        $this->display(I('post.table'));
    }
    public function create(){
        echo 'create';
        $table = I('post.table');
        $table = M($table);
        $data['class'] = I('post.class');
        $data['number'] = I('post.number');
        $data['price'] = I('post.price');
        $data['state'] = I('post.state');
        $table->add($data);
        $list = $table->select();
        $this->assign('data',$list);
        $this->display(I('post.table'));
    }

    public function cost(){
        $table = M('user_info');
        $condition['name'] = I('post.name');
        $data = $table->where($condition)->find();

        $table2 = M('room_set');
        $condition2['number'] = $data['book_room'];
        $data = $table->where($condition)->select();
        $data2 = $table2->where($condition2)->select();
        $this->assign('data',$data);
        $this->assign('data2',$data2);
        $this->display('cost');
    }

}