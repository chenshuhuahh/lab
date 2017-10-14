<?php
class MyDB {
  private $db = null;//数据库连接
  private function getConn() {
    if ($this->db === null) {
    $this->db = new mysqli('127.0.0.1', 'root',
         'hua') or die('不能打开连接:');
     $this->db->query('SET NAMES "UTF-8"');
     $this->db->select_db('exp4') 
                or die("数据库不能打开");
    } 
  }
  public function execSQL($sql) { //获取查询记录集
    $this->getConn();
    return $this->db->query($sql);//执行sql语句
  }	
  public function __destruct() { //析构函数
    if ($this->db !== null)  
      $this->db->close();//关闭连接
  }
}
?>
