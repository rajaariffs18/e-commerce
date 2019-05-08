<?php

namespace frontend\controllers;
use Yii;

class AjaxLoadController extends \yii\web\Controller
{

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    public function actionGetKabupaten(){
            $key = Yii::$app->request->post('keys');
            $key = explode("|",$key);

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$key[0]",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "key: e39d289d68e7967b72fabaaf586bab8b"
            ),
        ));
            
        $response = curl_exec($curl);
        $err = curl_error($curl);
            
        curl_close($curl);
            
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;
        }
            
        $data = json_decode($response, true);

        echo "<option value='0'>Pilih Kabupaten</option>";
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
            echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
        }
    
    }

    public function actionGetHarga(){
            $key = Yii::$app->request->post('keys');
            $key = explode("|",$key);
            $berat = 200;
            $asal = 278;

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$key[0]."&weight=".$berat."&courier=".$key[1]."",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: e39d289d68e7967b72fabaaf586bab8b"
            ),
            ));
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
            $data = json_decode($response, true);
        
            curl_close($curl);
        
            if ($err) {	  
                echo "cURL Error #:" . $err;
            } else {
                // print_r($data);
                echo "<option value='0'>Pilih Layanan</option>";
                for ($i=0; $i < count($data['rajaongkir']['results'][0]['costs']); $i++) { 
                    echo "<option value='".$data['rajaongkir']['results'][0]['costs'][$i]['description'].'|'.$data['rajaongkir']['results'][0]['costs'][$i]['service'].'|'.$data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'].'|'.$data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['etd'].'|'.$data['rajaongkir']['destination_details']['city_name'].'|'.$data['rajaongkir']['destination_details']['province']."'>".$data['rajaongkir']['results'][0]['costs'][$i]['description']."</option>";
                }
                // echo $data['rajaongkir']['results'][0]['costs'][0]['description'].'.'.$data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'].'.'.$data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['etd'];
            }

    }

    public function actionGetHargaFix(){
        $key = Yii::$app->request->post('keys');
        // $key = explode("|",$key);
        // $berat = 200;
        // $asal = 278;
    
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // $data = json_decode($response, true);
    
        // curl_close($curl);
    
       return $key;

    }

    public function actionGetKurir(){
        // $key = Yii::$app->request->post('keys');
        echo "<option value='0'>Pilih Kurir</option>";
        echo "<option value='jne'>JNE</option>";
        echo "<option value='tiki'>TIKI</option>";
        echo "<option value='pos'>Pos Indonesia</option>";
        
        
        

    }

}
