<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17.05.2018
 * Time: 12:28
 */


class Instagram
{

    /**
     * @var array
     */
    public $params;




    /**
     * @return array
     */
    public function getUrlsImages(): array
    {
        $params = $this->getParams();

        $url = 'https://api.instagram.com/v1/users/self/media/recent/?';
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $url .= "&$key=$value";
            }
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $data = json_decode(curl_exec($curl));


            if ($data->meta->code == 200) {
                $images_all = [];
                foreach ($data->data as $image) {
                    if ($image->type == 'image') {
                        $images_all[] = $image->images->standard_resolution->url;
                    }
                }
                return $images_all;
            }


        } else
            return [];
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->params['access_token'];
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken(string $access_token)
    {
        $this->params['access_token'] = $access_token;
    }


    /**
     * @return string
     */
    public function getLimit(): string
    {
        return $this->params['limit'];
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit)
    {
        $this->params['limit'] = $limit;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

}