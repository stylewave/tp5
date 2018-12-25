<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\facade\Cache;
class Configs extends Model
{
    protected $table = 'config';

    public static function getInfo() {
        $info = Cache::get('config');
        if(!$info){
            //缓存文件不存在就读取数据库
            $result = Db::table('config')->select();
            if($result){
                foreach($result as $k=>$val){
                    $info[$val['names']] = $val['value'];
                }
            }
            Cache::set('config',$info);
        }
        return $info;
    }
    public function setInfo($data=[]) {
        //更新缓存
        $result =  Db::table('config')->select();
        if($result){
            foreach($result as $val){
                $temp[$val['names']] = $val['value'];
            }
            foreach ($data as $k=>$v){
                $newArr = array('names'=>$k,'value'=>trim($v));
                if(!isset($temp[$k])){
                    Db::table('config')->insert($newArr);//新key数据插入数据库
                }else{
                    if($v!=$temp[$k])
                        Db::table('config')->where("names", $k)->update($newArr);//缓存key存在且值有变更新此项
                }
            }
            //更新后的数据库记录
            $newRes = Db::table('config')->select();
            foreach ($newRes as $rs){
                $newData[$rs['names']] = $rs['value'];
            }
        }else{
            foreach($data as $k=>$v){
                $newArr[] = array('names'=>$k,'value'=>trim($v));
            }
            Db::table('config')->insertAll($newArr);
            $newData = $data;
        }
        Cache::set('config',$newData);
        return $result;
    }

}