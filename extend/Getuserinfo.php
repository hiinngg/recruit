<?php

class Getuserinfo
{

    public $appId;

    private $code;

    private $appSecret;

    public  function __construct($appid,$appsecrect){
        
        $this->appId=$appid;
        $this->appSecret=$appsecrect;
        
    }
    
/*     
    public function getid($code){
     
         $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appId}&secret={$this->appSecret}&code={$code}&grant_type=authorization_code";
         $res = json_decode($this->httpGet($url));
         if($res){
             return $res->openid;
         }else{
             return "0";
         }
    } */

    public  function gettokenandid($code = "")
    {
        //$data = json_decode($this->get_php_file("./admin/getuserinfo/access_token.php"));
        
        if ($code != "") {
            $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appId}&secret={$this->appSecret}&code={$code}&grant_type=authorization_code";
            $res = $this->httpGet($url);
            
            // $access_token = $res->access_token;
         /*    if ($res) {
                $data->expire_time = time() + 7000;
                $data->access_token = $res->access_token;
                $data->refresh_token = $res->refresh_token;
                $data->refresh_time = time() + (30 * 24 * 3600);
                $this->set_php_file("./admin/getuserinfo/access_token.php", json_encode($data));
            } */
        }
        
      /*   if ($data->refresh_time < time()) {
            return false; // =>需要重新授权
        } else 
            if (($data->expire_time < time()) && ($data->refresh_time > time())) {
                // =>需要重新刷新access_token
                $access_token = $this->refresh($data->refresh_token);
                 
            } else {
                
                $access_token = $data->access_token;
            } */
          return $res;
    }

    public function refresh($refresh_token)
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid={$this->appId}&grant_type=refresh_token&refresh_token={$refresh_token}";
        $res = json_decode($this->httpGet($url));
        if ($res) {
            $data = [];
            $data->expire_time = time() + 7000;
            $data->access_token = $res->access_token;
            $data->refresh_token = $res->refresh_token;
            $data->refresh_time = time() + (30 * 24 * 3600);
            $this->set_php_file("./admin/getuserinfo/access_token.php", json_encode($data));
            return $res->access_token;
        }
    }

    public function getuser($access_token, $openid)
    {
        $url   = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";
        $result=$this->httpGet($url);
        return $result;
    }

    private function get_php_file($filename)
    {
        return trim(substr(file_get_contents($filename), 15));
    }

    private function set_php_file($filename, $content)
    {
        $fp = fopen($filename, "w");
        fwrite($fp, "<?php exit();?>" . $content);
        fclose($fp);
    }

    public function httpGet($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($curl, CURLOPT_TIMEOUT, 500);         
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);        
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    
    
    
   public function getImg($url = "", $filename = "") {
      
        $url = preg_replace( '/(?:^[\'"]+|[\'"\/]+$)/', '', $url );
        $hander = curl_init();
        $fp = fopen($filename,'wb');
        curl_setopt($hander,CURLOPT_URL,$url);
        curl_setopt($hander,CURLOPT_FILE,$fp);
        curl_setopt($hander,CURLOPT_HEADER,0);
       
        //curl_setopt($hander,CURLOPT_RETURNTRANSFER,false);//以数据流的方式返回数据,当为false是直接显示出来
        curl_setopt($hander,CURLOPT_TIMEOUT,60);
        curl_exec($hander);
        curl_close($hander);
        fclose($fp);
        return true;
    }
    
    
    
    
}
