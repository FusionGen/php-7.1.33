--TEST--
Ensure the ReflectionProperty constructor triggers autoload.
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--FILE--
<?php
  function __autoload($name)
  {
      echo "In autoload: ";
      var_dump($name);
  }

  try {
      new ReflectionProperty('UndefC', 'p');
  }
  catch (ReflectionException $e) {
      echo $e->getMessage();
  }
?>
--EXPECTF--
In autoload: string(6) "UndefC"
Class UndefC does not exist