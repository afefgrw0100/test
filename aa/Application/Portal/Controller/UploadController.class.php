<?php
namespace Portal\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/14
 * Time: 9:33
 */
class UploadController extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function uploadtest(){
    }
    public function load(){
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $type = I("request.zzp");
        switch($type){
            case "zip":
                $set_achives = C("ACHICES");
                $setting['driverConfig']['domain'] = $set_achives['domain'];
                $setting['driverConfig']['bucket'] = $set_achives['bucket'];
                $setting['maxSize'] = 500 * 1024 * 1024;//文件大小
                break;
            case "imgfile":
                $set_achives = C("IMGPROFILE");
                $setting['driverConfig']['domain'] = $set_achives['domain'];
                $setting['driverConfig']['bucket'] = $set_achives['bucket'];
                break;
            case "pdf":
                $setting['exts'] = array('pdf','PDF');
                $setting['maxSize'] = 500 * 1024 * 1024;//文件大小
                break;

        }
        $Upload = new \Think\Upload($setting);
//        $aa=$_POST['fileInput'];
//        print_r($_GET);exit;
        $aa =$_FILES;
        //print_r($_POST);exit;
        $info = $Upload->upload($aa);
        //print_r($info);
        if(!$info) {// 上传错误提示错误信息
            $this->error($Upload->getError());
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                //$this->success("上传成功",$file['url']);
                if($type=="zip"){
                    $file['url'] = basename($file['url']);
                }
                $url['url']= empty($type)?$file['url']:Qiniu_Sign($file['url'], 86400,$type);
                $url['status']=1;
                echo json_encode($url,JSON_HEX_AMP);
            }
        }
    }

}