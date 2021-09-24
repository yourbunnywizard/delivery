<?php 

	$track = $_POST['trackArray'];	

	

	$matrix_distance = unserialize(file_get_contents('../locale/matrixDistance.txt'));
	$matrix_Adjacency = unserialize(file_get_contents('../locale/matrixAdjacency.txt'));

	$trackInfo = array();
	
	for ($i = 0; $i < count($track); $i++) { 
		for ($j = 0; $j < count($track[$i]) - 1; $j++) { 			
			$trackInfo[$i][$j] = $matrix_distance[ $track[$i][$j] ][  $track[$i][$j + 1] ];
		}
		
	}

	echo json_encode($trackInfo);
 ?>

