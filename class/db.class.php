<?php
class db 
{
    private $server="localhost";
    private $user="root";
    private $pass="";
    private $db="time_table";
    public $conn;
        function __construct(){
            try {
                $this->conn=new PDO("mysql:host=$this->server;dbname=$this->db",$this->user,$this->pass);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    public function p($query)
	{
		return $this->conn->prepare($query);
	}
	public function exe($attr)
	{
		return $this->$conn->prepare();
	}
	public function now()
	{
		return date("Y-m-d");
	}
	function image($loc,$file,$file_tmp){
		$target_dir=$loc;
		$mod_file=rand(1200,150000).basename($file);
		$target_file=$target_dir.$mod_file;
		$file=$mod_file;
		if(move_uploaded_file($file_tmp, $target_file)){
				return $file;
		}
		else{
			return false;
		}
	}
	function pdf_upload($loc,$file,$file_tmp){
		$target_dir=$loc;
		$mod_file=rand(1200,150000).basename($file);
		$target_file=$target_dir.$mod_file;
		$file=$mod_file;
		// if (pathinfo($file, PATHINFO_EXTENSION)!='pdf' || pathinfo($file, PATHINFO_EXTENSION)!='PDF') {
		// 	return false;
		// }
		// else{
			if(move_uploaded_file($file_tmp, $target_file)){
					return $file;
			}
			else{
				return false;
			}
		// }
	}
}


?>