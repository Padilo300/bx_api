<?php
require_once(__DIR__.'/transferData.php');

class essenceAdd extends transferData {
    /* 
        Этот класс для добавления/редактирования/обновления сущностей.
        По конструкту требует url вебхука
    */

    /* методы */
    const   leadAdd           = 'crm.lead.add.json'       ;
    const   leadUpdata        = 'crm.lead.update.json'    ;
    const   listUserfiledList = 'crm.lead.userfield.list' ;
    const   leadList          = 'crm.lead.list'           ;
    const   leadGet           = 'crm.lead.get'            ;

    const   contactAdd        = 'crm.contact.add'         ;
    const   contactGet        = 'crm.contact.get'         ;
    const   contactList       = 'crm.contact.list'        ;
    const   contactUpdate     = 'crm.contact.update'      ;
    

    const   dealAdd           = 'crm.deal.add'            ;
    const   dealUpdata        = 'crm.deal.update'         ;
    const   dealList          = 'crm.deal.list'           ;
    const   dealGet           = 'crm.deal.get'            ;

    const   diskFileGet       = 'disk.file.get'           ;
    
    
    
    
    /* переменные для обращения CURL_url */
    public  $add              = null; 
    public  $upData           = null; 
    public  $userFieldList    = null; 
    public  $leadGet          = null; 
    public  $contactAdd       = null; 
    public  $contactList      = null; 
    public  $contactUpdate    = null;  
    public  $dealAdd          = null;  
    public  $diskFileGet      = null;  
    public  $leadAdd          = null;  
    public  $dealUpdata       = null;  
    public  $dealList         = null;

    public function __construct($url){
        $this->leadAdd          = $url . self::leadAdd           ;
        $this->upData           = $url . self::leadUpdata        ;
        $this->leadList         = $url . self::leadList          ;

        $this->userFieldList    = $url . self::listUserfiledList ;
        $this->leadGet          = $url . self::leadGet           ;

        $this->contactAdd       = $url . self::contactAdd        ;
        $this->contactGet       = $url . self::contactGet        ;
        $this->contactList      = $url . self::contactList       ;
        $this->contactUpdate    = $url . self::contactUpdate     ;

        $this->dealAdd          = $url . self::dealAdd           ;
        $this->dealGet          = $url . self::dealGet           ;
        $this->dealUpdata       = $url . self::dealUpdata        ;

        $this->diskFileGet      = $url . self::diskFileGet       ;
        
    }

    public function dealUpdata($id, $arr){
        $data = array(
            'id'        =>  $id,
            'fields'    =>  $arr,
            'params'    =>  array("REGISTER_SONET_EVENT" => "Y")
        );
        return parent::curlStart($this->dealUpdata, $data);
    }

    public function dealList($data){
        return parent::curlStart($this->dealList, $data);
    }

    public function leadList($data){
        return parent::curlStart($this->leadList, $data);
    }

    public function leadGet($id){
        $data = array(
            'id'    => $id,
        );
        return parent::curlStart($this->leadGet, $data);
    }
    

    public function diskFileGet($id){
        $data = array(
            'id'    => $id,
        );
        return parent::curlStart($this->diskFileGet, $data);
    }

    public function contactGet($id){
        $data = array(
            'id'    => $id,
        );
        return parent::curlStart($this->contactGet, $data);
    }

    public function contactAdd($data){
        $data = array(
            "fields" => $data,
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        );
        return parent::curlStart($this->contactAdd, $data);
    }

    public function leadAdd($data){
        $data = array(
            "fields" => $data,
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        );
        return parent::curlStart($this->leadAdd, $data);
    }

    public function leadUF(){
        $data = array(
            'order'     => array( "SORT"        => "ASC" ),
            'filter'    => array( "MANDATORY"   => "N"   )
        );
        return  parent::curlStart($this->userFieldList, $data)  ;
    }

    public function contactUpdate($id, $arr){
        $data = array(
            'id'        =>  $id,
            'fields'    =>  $arr,
            'params'    =>  array("REGISTER_SONET_EVENT" => "Y")
        );
        return parent::curlStart($this->contactUpdate, $data);
    }
    public function leadUpdata($id, $arr){
        $data = array(
            'id'        =>  $id,
            'fields'    =>  $arr,
            'params'    =>  array("REGISTER_SONET_EVENT" => "Y")
        );
        return parent::curlStart($this->upData, $data);
    }

    public function dealAdd($data, $phone){
        $data = array(
            'fields' => $data,
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        );

        $result =  parent::curlStart($this->dealAdd, $data);

        if(!$result['result'] > 1){
            $result = FALSE;
        }
        return $result;
    }

    public function dealGet($id){
        $data = array(
            'id'    => $id,
        );
        return parent::curlStart($this->dealGet, $data);
    }
    
    public function contactList($data){
        return parent::curlStart($this->contactList, $data);
    }
}
?>