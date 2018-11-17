<?php
namespace Home\Controller;
use Illuminate\Database\Eloquent\Model;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $table2 = M('room_set');
        $data2 = $table2->where('state=1')->select();
        $this->assign('data2',$data2);
        $this->display('operate');
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function show(){

    }

    public function read(){
        $table = I('post.table');
        $table = M($table);
        $data = $table->select();
        $this->assign('data',$data);
        $this->display('show');
    }
    public function insert(){
        $table = I('post.table');
        $table = M($table);
        $data['name'] = I('post.name');
        $data['phone'] = I('post.phone');
        $data['user_number'] = I('post.user_number');
        $data['book_room'] = I('post.book_room');
        $data['in_date'] = I('post.in_date');
        $data['out_date'] = I('post.out_date');
        $table->add($data);
        $data = $table->select();
        $this->assign('data',$data);

        $table2 = M('room_set');
        $condition['number'] = I('post.book_room');
        $data2 = $table2->where($condition)->select();
        $this->assign('cost',$data2);

        $room_set = M('room_set');
        $condition_room_set['number'] = I('post.book_room');
        $save['state'] = 0;
        $room_set->where($condition_room_set)->save($save);

        $this->display('show');
    }

}