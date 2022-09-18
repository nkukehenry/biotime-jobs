<?php 
namespace  App\Repositories;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

Class BiotimeRepository
{


 public  function __construct(){

 }

public function add_ihrisdata($data){

    if(count($data)>1){
        $this->query("TRUNCATE `ihrisdata`");
    }

    $query = $this->insert_batch('ihrisdata',$data);

    if($query){

        $results = $this->query("select ihris_pid from ihrisdata");
        $message="get_ihrisdata() add_ihrisdata()  IHRIS HRH ".count($results);
    }
    else{

        $message="get_ihrisdata() add_ihrisdata()  IHRIS HRH FAILED ";

    }

    return $message;

}

public function add_ucmbdata($data){
 
    $query = $this->insert_batch('ihrisdata',$data);

    if($query){

        $results = $this->query("select ihris_pid from ihrisdata");
        $message=" get_ihrisdata() add_ihrisdata()  IHRIS HRH ".count($results);
    }
    else{
        $message=" get_ihrisdata() add_ihrisdata()  IHRIS HRH FAILED ";
    }

    return $message;

}
 
public function add_enrolled($data){

    if($count=count($data)>1){

    $this->query("CALL `fingerpints_cache`()");
    $this->query("TRUNCATE fingerprints_staging");

    }

    $query = $this->insert_batch('fingerprints_staging',$data);


    if($query){

        $results = $this->query("select entry_id from fingerprints_staging");
      
        $message=" saveEnrolled() add_enrolled() Created Enrolled users from Biotime ".count($results);

    }
    else{
        $message=" saveEnrolled() add_enrolled() Failed ";

    }

    return $message;

}

public function add_time_logs($data){

    if(count($data)>1){
        $this->query("CALL `biotime_cache`()");
        $this->query("TRUNCATE biotime_data");
    }

    $query = $this->insert_batch('biotime_data',$data);
    $this->query(" DELETE from biotime_data where emp_code='0'");
   
    if($query){

        $results = $this->get("biotime_data");
        
        $message=" fetchBiotTimeLogs()  add_time_logs() Created Logs from Biotime ".count($results);
    }
    else{
        $message=" fetchBiotTimeLogs()  add_time_logs() Failed ";

    }

    return $message;

}


public function save_department($data){

    if(count($data)>1){
        $this->query("TRUNCATE biotime_departments");
    }

    $query=$this->insert_batch("biotime_departments",$data);

    if($query){

        $results=$this->db->query("select id biotime_departments");
        
        $message=" save_department() Created Departments from Biotime ".count($results);
    }
    else{
        $message=" Fetch Departments Failed ";

    }

    return $message;

}

public function save_jobs($data){

    if(count($data)>1){
        $this->query("TRUNCATE biotime_jobs");
    }

    $query = $this->insert_batch("biotime_jobs",$data);

    if($query){

        $results = $this->get("biotime_jobs");
        $message=" save_jobs() Created jobs from Biotime ".count($results);
    }
    else{
        $message=" Fetch jobs Failed ";

    }

    return $message;
}

public function save_facilities($data){

    if(count($data)>1){
        $this->query("TRUNCATE biotime_facilities");
    }

    $query=$this->insert_batch("biotime_facilities",$data);

    if($query){

        $results = $this->get("biotime_facilities");
        
        $message=" save_facilities() Created Fcailities from Biotime ".count($results);
    }
    else{
        $message=" Fetch Failities Failed ";

    }

    return $message;
}

public function addMachines($data){

  
    $query=$this->db->replace('biotime_devices',$data);
  
    if ($query){
        $message="Successful SYNC Biotime Devices ".$this->db->affected_rows();
    }
    else{
        $message="Failed to SYNC Biotime Decices";

    }
    
    return $message;
}

public function query($sql){
    return DB::select( DB::raw($sql));
}

public function get($table){
    return DB::table($table)->get();
}

public function insert_batch($table,$data){
    return DB::table($table)->insert($data);
}


}