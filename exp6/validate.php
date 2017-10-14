<!-- 表单校验 -->
<?php 
  function ValidatePost($checks) {
     if (isset($_POST) == false)  return false;
     foreach ($checks as $name)  {
        if (isset($_POST[$name]) == false)
           return false;
     }
     return true;
  }
  function ValidatePostRedirect($checks, $url)   {
     if (ValidatePost($checks) == false) {
         header("Location:{$url}");
         die;
     }
     return true;
  }
?>