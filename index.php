<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/framework.php';

$sql = "SELECT DATE_FORMAT(MIN(createdate),'%Y-%m-%d') AS min_date,";
$sql .= " DATE_FORMAT(MAX(createdate),'%Y-%m-%d') AS max_date";
$sql .= " FROM orders";

$query = $db->query($sql);

$data = [];
$data['min_date'] = $query->row['min_date'];
$data['max_date'] = $query->row['max_date'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template.php';