<?php
 
if (!class_exists("Memcache"))  exit("Memcached �� ����������");
$memcache = new Memcache;
$memcache->connect('localhost', 11211) or exit("���������� ������������ � ������� Memcached");
 
$version = $memcache->getVersion();
echo "Server's version: ".$version."<br/>\n";
 
$tmp_object = new stdClass;
$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 123;
 
$memcache->set('key', $tmp_object, false, 10) or die ("�� ���������� �������� ������ � Memcached");
echo "���������� ������ � ��� Memcached (������ ����� ��������� 10 ������)<br/>\n";
 
$get_result = $memcache->get('key');
echo "������, ���������� � Memcached:<br/>\n";
 
var_dump($get_result);
 
?>