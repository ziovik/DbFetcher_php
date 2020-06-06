<?php
$filepath = realpath(dirname(__FILE__));  // this takes you to the root folder
include_once ($filepath."/../helper/format.php");
include_once ($filepath."/../lib/database_1c8.php");

//include_once "../helper/format.php";
//include_once "../lib/database.php";

?>
<?php
    class  Db_1C8
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database_1c8();
            $this->fm = new Format();
        }


        public function getAllContragents()
        {
            $query = "SELECT * FROM _reference85";
            return $result = $this->db->select($query);
        }
        public function getContragentById($contragent_id)
        {
            $query = "SELECT 
                             contr.* ,
                             ba._Description as bank_account_name,
                             ba._Fld1151 as bank_account_number,
                             ba._Fld1154 as bank_corres,
                             bn._Code as bik,
                             bn._Description as bank_name,
                             bn._Fld1146 as corres_bank,
                             bn._Fld1147 as bank_city,
                             bn._Fld1148 as bank_address,
                             bn._Fld1149 as bank_telephone
                            
                             
                      FROM
                             _reference85  as  contr
                             LEFT JOIN _reference14 ba on ba._IDRRef = contr._Fld1531RRef
                             JOIN _reference13 bn on bn._IDRRef = ba._Fld1152RRef
                             
                      WHERE contr.id = '$contragent_id'";
            return $result = $this->db->select($query);
        }

        public function updateContragentById($contragent_id, $data){

            $name = $data['name'];
            $naimnovanie_polnoe = $data['naimnovanie_polnoe'];
            $inn = $data['inn'];
            $commentary = $data['commentary'];
            $kpp = $data['kpp'];
            $pokupatel = $data['pokupatel'];
            $postavshik = $data['postavshik'];
            $ne_yavlyaetsya_rezidentom = $data['ne_yavlyaetsya_rezidentom'];
            $okpo = $data['okpo'];
            if($name == "" || $naimnovanie_polnoe == ""){
                return $message = "<span>The name field must be fill</span>";
            }else{
                $query = "UPDATE _reference85 SET 
                                                _Description = '$name',
                                                _Fld1529 = '$naimnovanie_polnoe',                                       
                                                _Fld1524 = '$inn',                                             
                                                _Fld1526 = '$okpo',
                                                _Fld1527  = '$commentary',
                                                _Fld1528 = '$kpp',
                                                _Fld1535 = '$pokupatel',
                                                _Fld1536 = '$postavshik',
                                               
                                                _Fld1540 = '$ne_yavlyaetsya_rezidentom'
                                              
                                                
                                                
                                            WHERE id = '$contragent_id'
                                                ";
                $result = $this->db->update($query);


                if ($result) {
                    return $message = "<span style='color: #1e7e34'>Контрагент успешно обновлен</span>";

                } else {
                    return $message = "<span style='color: red'>Ошибка при обновлении Контрагент</span>";

                }
            }
        }

        public function updateBankAccountContragentById($contragent_id, $data){
//            echo "<script>alert('$contragent_id')</script>";
            $bank_account_name = $data['bank_account_name'];
            $bank_account_number = $data['bank_account_number'];
            $bank_corres   = $data['bank_corres'];
            $bank_name   = $data['bank_name'];

            if($bank_account_name == "" ){
                return $message = "<span>The name field must be fill</span>";
            }else{

                $query = "SELECT 
                             ba.id
                          FROM  _reference85  as  contr                    
                          LEFT JOIN _reference14 ba on ba._IDRRef = contr._Fld1531RRef             
                          WHERE contr.id = '$contragent_id'
                          ";
                $run = $this->db->select($query);
                $row = $run->fetch_assoc();
                $bankAccount_Id = $row['id'];
                //echo "<script>alert('$bank_id')</script>";
                $sql = "UPDATE _reference14 SET 
                              _Description = '$bank_account_name',
                              _Fld1151     = '$bank_account_number',
                              _Fld1154     =  '$bank_corres',
                              _Fld1152RRef =   '$bank_name'
                           WHERE _IDRRef = '$bankAccount_Id' ";
                $result =  $this->db->update($sql);

                if ($result) {
                    return $message = "<span style='color: #1e7e34'>Банковский счет успешно обновлен</span>";

                } else {
                    return $message = "<span style='color: red'>Ошибка обновления банковского счета</span>";

                }
            }
        }

        public function deleteContragetById($contragent_id){
            $query = "DELETE FROM _reference85 WHERE id = '$contragent_id'";
            return $result = $this->db->delete($query);
        }
        public function searchContragent($serach){
            $query = "SELECT * FROM _reference85 WHERE _Description LIKE '%$serach%' ";
            return $result = $this->db->select($query);
        }

        public  function addContragent($data){
            $code = $data['code'];
            $idrref = $data['idrref'];
            $name = $data['name'];
            $naimnovanie_polnoe = $data['naimnovanie_polnoe'];
            $inn = $data['inn'];
            $commentary = $data['commentary'];
            $kpp = $data['kpp'];
            $pokupatel = $data['pokupatel'];
            $postavshik = $data['postavshik'];
            $ne_yavlyaetsya_rezidentom = $data['ne_yavlyaetsya_rezidentom'];
            $okpo = $data['okpo'];



            if($name == "" || $naimnovanie_polnoe == ""){
                return $message = "<span style='color: #ff0000'>Наименование или Наименование Полное пустое</span>";
            }else{
                $sql = "SELECT * FROM _reference85 WHERE  _Fld1524 ='$inn' OR _Fld1528 = '$kpp' OR _Description = '$name' ";
                $run = $this->db->select($sql);
                if($run){
                    return $message = "<span style='color: #ff0000'> Это Наименование или Наименование уже есть</span>";
                }else{
                    $query = "INSERT INTO _reference85 ( _IDRRef, _Code,  _Description ,  _Fld1529,  _Fld1524 , _Fld1528 ,_Fld1527,_Fld1526,_Fld1535  , _Fld1536 , _Fld1540) VALUES
                                                   ('$idrref','$code',  '$name',   '$naimnovanie_polnoe','$inn',   '$kpp','$commentary','$okpo','$pokupatel','$postavshik','$ne_yavlyaetsya_rezidentom')
                        ";
                     $result = $this->db->insert($query);
                    if($result){
                        $sql = "SELECT * FROM _reference85 WHERE _Fld1524 ='$inn' AND _Fld1528 = '$kpp' ";
                        $run = $this->db->select($sql);
                        while($row = $run->fetch_assoc()){
                            $IDRRef = $row['_IDRRef'];
                            echo "<script>alert('Successfully Added')</script>";
                            echo "<script>window.open('add_contragent_1c8.php?idrref=$IDRRef','_self')</script>";
                        }

                    }else{
                        echo "<script>alert('Error Adding Contrangent')</script>";
                        echo "<script>window.open('add_contragent_1c8.php','_self')</script>";
                    }
                }

            }

        }

        public function addBankAccount($data, $IDRRef){
            $idrref_account = $data['idrref'];
            $code = $data['code'];
            $bank_account_name = $data['bank_account_name'];
            $bank_account_number = $data['bank_account_number'];
            $bank_corres   = $data['bank_account_corres'];
            $bank_id   = $data['bank_id'];
            //echo "<script>alert('$bank_account_name, $bank_account_number, $bank_id')</script>";

            if($bank_account_name == "" || $bank_account_number == ""){
                return $message = "<span style='color: #ff0000'>Поле пустое</span>";
            }else {
                $sql = "SELECT * FROM _reference14 WHERE  _Fld1151 ='$bank_account_number' OR _Description = '$bank_account_name'";
                $run = $this->db->select($sql);
                if ($run) {
                    return $message = "<span style='color: #ff0000'>Счёт уже есть</span>";
                } else {
                    $query = "INSERT INTO _reference14 (_IDRRef,_Code,_Description , _Fld1151 , _Fld1152RRef , _Fld1154  ) VALUES
                                        ('$idrref_account','$code', '$bank_account_name','$bank_account_number','$bank_id','$bank_corres')
                                        ";
                    $result = $this->db->insert($query);

                    if($result){
                        $update = "UPDATE _reference85 SET 
                                            _Fld1531RRef = '$idrref_account'
                                            WHERE _IDRRef = '$IDRRef'
                                         ";
                        $this->db->update($update);
                        echo "<script>alert('Successfully Added')</script>";
                        echo "<script>window.open('add_contragent_1c8.php?idrref=$IDRRef&id_Account=$idrref_account','_self')</script>";

                    }else{
                        echo "<script>alert('Error Adding Account')</script>";
                        echo "<script>window.open('add_contragent_1c8.php?idrref=$IDRRef','_self')</script>";
                    }
                }
            }
        }
        public function addBank($data,$IDRRef){
            $idrref_bank = $data['idrref'];
            $bank_name = $data['bank_name'];
            $bik = $data['bik'];  //code
            $bank_telephone   = $data['telephone'];
            $bank_address = $data['bank_address'];
            $correspondent_bank = $data['correspondent'];
            $bank_city   = $data['city'];
            //echo "<Script>alert('$idrref_bank, $bank_name, $bik,  $bank_telephone , $bank_address, $correspondent_bank,  $bank_city')</Script>";
            if($bank_name == "" || $bik == ""){
                return $message = "<span>Поле пустое</span>";
            }else {
                $sql = "SELECT * FROM _reference13 WHERE  _Code ='$bik' OR _Description = '$bank_name'";
                $run = $this->db->select($sql);
                if ($run) {
                    return $message = "<span>Счёт уже есть</span>";
                } else {

                    $query = "INSERT INTO _reference13 (_IDRRef, _Code, _Description ,  _Fld1146, _Fld1147, _Fld1148,_Fld1149 ) VALUES

                                        ('$idrref_bank','$bik', '$bank_name','$correspondent_bank','$bank_city','$bank_address','$bank_telephone')
                                        ";
                    $result = $this->db->insert($query);

                    if($result){

                        echo "<script>alert('Successfully Added')</script>";
                        echo "<script>window.open('add_contragent_1c8.php?idrref=$IDRRef','_self')</script>";

                    }else{
                        echo "<script>alert('Error Adding Account')</script>";
                        echo "<script>window.open('add_contragent_1c8.php?idrref=$IDRRef','_self')</script>";
                    }
                }
            }

        }

        public function addContact($data, $IDRRef){
            $city = $data['city'];
            $address = $data['address'];
            $telephone = $data['telephone'];
            if($city == "" || $address == ""){
                return $message = "<span>Поле пустое</span>";
            }else {

            }

        }

        public function getAllBankAccounts(){
            $query = "SELECT * FROM _reference13  ORDER BY _IDRRef DESC ";
            return $result = $this->db->select($query);
        }
        public function getContragentByIDRRef($IDRRef){
            $sql = "SELECT * FROM _reference85 WHERE _IDRRef ='$IDRRef'  ";
            return $run = $this->db->select($sql);
        }
        public function getAccountByIDRRef($account_id){
            $sql = "SELECT * FROM _reference14 WHERE _IDRRef ='$account_id'  ";
            return $run = $this->db->select($sql);
        }
        public function getAllAddressTypes(){
            $sql = "SELECT * FROM address_types ";
            return $run = $this->db->select($sql);
        }

        public function getAllCountries(){
            $sql = "SELECT * FROM countries ORDER BY country_name ASC";
            return $run = $this->db->select($sql);
        }

        public function getAllRegions($country_id){
            $sql = "SELECT * FROM regions WHERE status = '1' AND country_id = '$country_id'  ORDER BY region_name ASC";
            return $run = $this->db->select($sql);
        }
        public function getAllStates($region_id){
            $sql = "SELECT * FROM states WHERE status = '1' AND region_id = '$region_id'  ORDER BY state_name ASC";
            return $run = $this->db->select($sql);
        }


    }
