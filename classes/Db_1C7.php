<?php
$filepath = realpath(dirname(__FILE__));  // this takes you to the root folder
include_once ($filepath."/../helper/format.php");
include_once ($filepath."/../lib/database_1c7.php");

//include_once "../helper/format.php";
//include_once "../lib/database.php";

?>
<?php
class  Db_1C7
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database_1c7();
        $this->fm = new Format();
    }
    public function getAllContragents()
    {
        $query = "SELECT * FROM contragents";
        return $result = $this->db->select($query);
    }
    public function searchContragent($serach){
        $query = "SELECT * FROM contragents WHERE name LIKE '%$serach%' ";
        return $result = $this->db->select($query);
    }
    public function deleteContragetById($contragent_id){
        $query = "DELETE FROM contragents WHERE id = '$contragent_id'";
        return $result = $this->db->delete($query);
    }
    public function getContragentById($contragent_id)
    {
        $query = "SELECT * FROM contragents WHERE id = '$contragent_id'";
        return $result = $this->db->select($query);
    }
    public function updateContragentById($contragent_id, $data){
        $name = $data['name'];
        $naimnovanie_polnoe = $data['naimnovanie_polnoe'];
        $inn = $data['inn'];
        $commentary = $data['commentary'];
        $kpp = $data['kpp'];
        $poctavoi_address = $data['poctavoi_address'];
        $telephone = $data['telephone'];
        $osnovnoi_bank_shot = $data['osnovnoi_bank_shot'];
        $osnovnoi_dogovor_contragent = $data['osnovnoi_dogovor_contragent'];
        $ur_fiz_litso = $data['ur_fiz_litso'];


        if($name == "" || $naimnovanie_polnoe == ""){
            return $message = "<span>The name field must be fill</span>";
        }else{

            $query = "UPDATE contragents SET 
                            name = '$name',
                         
                            inn = '$inn',
                          
                            commentary  = '$commentary',
                            kpp = '$kpp',
                            naimnovanie_polnoe = '$naimnovanie_polnoe',
                           
                            osnovnoi_bank_shot = '$osnovnoi_bank_shot',
                           
                            osnovnoi_dogovor_contragent = '$osnovnoi_dogovor_contragent',
                           
                            
                            ur_fiz_litso = '$ur_fiz_litso',
                            
                            telephone = '$telephone',
                            pochtavoi_address = '$poctavoi_address'
                                                
                                                
                                            WHERE id = '$contragent_id'
                                                ";
            $result = $this->db->update($query);
            if($result){
                echo "<script>alert('Successfully updated')</script>";
                echo "<script>window.open('1c7.php','_self')</script>";
            }else{
                echo "<script>alert('Error!!!. Problem Updating this Contragent')</script>";

            }
        }
    }
}
