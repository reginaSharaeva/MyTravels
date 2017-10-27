<?php 

namespace MyTravels\Common;

class DataBase {

  public static function select_all($table, $schema) {
    $rows = [];
    $handle = fopen(__DIR__.'/../Model/data/' . $table . '.csv', "r");
    if ($handle) {
      $id = 1;
      while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        if(strlen($line)){
          $row = str_getcsv($line);
          $row = array_combine($schema, $row);
          $row['id'] = $id;
          $rows[$id] = $row;
        }
        $id++;
      }
    } else {
      exit('No such DB:"' . $table . '".'); 
    }
    fclose($handle);
    return $rows;
  }
  
  public static function find($table, $schema, $needleId) {
    $row = NULL;
    $handle = fopen(__DIR__.'/../Model/data/' . $table . '.csv', "r");
    if ($handle) {
      $id = 1;
      while (($line = fgets($handle)) !== false) {
        if($id === $needleId){
          $line = trim($line);
          if(strlen($line)){
            $row = str_getcsv($line);
            $row = array_combine($schema, $row);
            $row['id'] = $id;
          }
          break;
        }
        $id++;
      }
    } else {
      exit('No such DB:"' . $table . '".'); 
    }
    fclose($handle);
    return $row;
  }
  
  public static function find_by($table, $schema, $criteria) {
    $row = NULL;
    $handle = fopen(__DIR__.'/../Model/data/' . $table . '.csv', "r");
    if ($handle) {
      while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        if(strlen($line)){
          $row = str_getcsv($line);
          $row = array_combine($schema, $row);        
          $found = true;
          foreach($criteria as $cName => $cValue){
            if($row[$cName] !== $cValue){
              $found = false;
            }
          }
          if($found){
            break;
          }
          else{
            $row = NULL;
          }
        }
      }
    } else {
      exit('No such DB:"' . $table . '".'); 
    }
    fclose($handle);
    return $row;
  }

  public static function add($table, $schema, $data) {
    $handle = fopen(__DIR__.'/../Model/data/' . $table . '.csv', "a+");
    if ($handle) {
      $dataToWrite = [];
      foreach ($schema as $field){
        if(isset($data[$field])){
          $dataToWrite[$field] = $data[$field];
        }
        else{
          $dataToWrite[$field] = '';
        }
      }
      fputcsv($handle, $dataToWrite);
    }
    fclose($handle);
  }

  public function get_next_id($table) {

    $nextId = 0;
   
    $handle = fopen(__DIR__.'/../Model/data/' . $table . '.csv', "r");
    if ($handle) {
      while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        if(strlen($line)) {
          $nextId++;
        }
      }
    } else {
      exit('No such DB: "'.$table.'"'); 
    }
    fclose($handle);
    return $nextId + 1;
  }   

  public function delete($table, $schema, $name) {

    $rowNum = -1;
    $row = NULL;
   
    $handle = fopen(__DIR__.'/../Model/data/' . '/data/'.$table.'.csv', "r");
    if ($handle) {
      $id = 0;
      while (($line = fgets($handle)) !== false) {
          $line = trim($line);
          if(strlen($line)){
            $row = str_getcsv($line);
            $row = array_combine($schema, $row);
            if ($row['name'] === $name) {
              $rowNum = $id;
              break;
            }
        }
        $id++;
      }
    } else {
      exit('No such DB: "'.$table.'"'); 
    }
    fclose($handle);

    if ($rowNum != -1) {
      $handle = fopen(__DIR__.'/../Model/data/'.$table.'.csv', "r");
    
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  
        $dataMain[] = $data;
      }
      fclose($handle);
 
      unset($dataMain[$id]);
 
      $fp = fopen(__DIR__.'/../Model/data/'.$table.'.csv', 'w');
      foreach ($dataMain as $iter) {
        fputcsv($fp, $iter);
      }
      fclose($fp);
    }    
  }
  
}