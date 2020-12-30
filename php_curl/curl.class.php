<?php

class telegramRobotSeriesCurl 
{

    public function doCurl($url,$method='GET', $post_var_array='')
    {

        //postvar1=value1&postvar2=value2&postvar3=value3
        if ($this->isUrlValid($url) !== 'valid') 
        {
            exit('eRrOr: url is not valid');
        }
        if (!is_array($post_var_array) && strtolower($method) == "post") 
        {
            exit('AtTenTiOn: $post_var_array must be an array');
        }
        if (strtolower($method) == 'get') 
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 0);
            // curl_setopt($ch, CURLOPT_POSTFIELDS,
            //             $post_var_array);
            // In real life you should use something like:
            // curl_setopt($ch, CURLOPT_POSTFIELDS, 
            //          http_build_query(array('postvar1' => 'value1')));
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close ($ch);

            
        }
        elseif(strtolower($method) == 'post') 
        {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 0);

            curl_setopt($ch, CURLOPT_POSTFIELDS, 
                     http_build_query($post_var_array);
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close ($ch);

        }
        
        return $server_output;
    }
    // ====== END  doCurl ====== \\

    public function isUrlValid($url) 
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) 
        {
            return 'valid';
        }
    }
    // ====== END  isUrlValid ====== \\
}

