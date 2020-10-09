<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/framework.php';

$sql = "SELECT * ";
$sql .= " FROM cities c";
$sql .= " LEFT JOIN orders o ON c.id = o.id_city";
$sql .= " WHERE DATE(createdate) BETWEEN '" . $_REQUEST["start"] . "' AND '" . $_REQUEST["end"] . "'";

$query = $db->query($sql);

$stat = [];
$count = 0;

foreach ($query->rows as $item) {
	$stat[$item['id_city']]['id_city'] = $item['id_city'];
	$stat[$item['id_city']]['name'] = $item['name'];
	$stat[$item['id_city']]['orders'][] = [
		'id' => $item['id'],
		'createdate' => $item['createdate'],
		'phone' => $item['phone'],
	];
	$count++;
}

echo json_encode(
	[
		'success' => true,
		'count' => $count,
		'data' => $stat,
	]
);
