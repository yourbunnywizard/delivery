<?php 

	fullRoadWay($_POST['nodeArray']);

function fullRoadWay ($nodeArray) {

	$matrix_distance = unserialize(file_get_contents('../locale/matrixDistance.txt'));
	$matrix_Adjacency = unserialize(file_get_contents('../locale/matrixAdjacency.txt'));
		$inf = 10000000;
		$countNodes = count($matrix_Adjacency);

		$visited_Nodes = array_fill(0, $countNodes, false);
		$matrix_road = array_fill(0, $countNodes, array($inf, $inf));

		$rezult = array();	
		

		$j = 0;

		for($i = count($nodeArray) - 1; $i > 0; $i--) {

			$lastNode = $nodeArray[$i] - 1;
			$firstNode = $nodeArray[$i - 1];		

			$matrRoad = dej($firstNode, $matrix_road, $matrix_distance, $visited_Nodes, $inf);
			
			$rezult[$j] = array($lastNode);
			$kol = 0;

			do {
				$kol++;
				$lastNode = $matrRoad[$lastNode][1];
				$rezult[$j][$kol] = $lastNode;

			} while($lastNode != $firstNode - 1);
			$j++;

		}
	
		echo json_encode($rezult);

	}

	
	function dej ($fNode, $matrRoad, $matrix, $vNodes, $infinity) {

		$matrRoad[$fNode - 1][0] = 0;
		$matrRoad[$fNode - 1][1] = $fNode - 1;
		$vNodes[$fNode - 1] = true;
		
		$tempNode = $fNode - 1;		

		for($i = 0; $i < count($matrRoad) - 1; $i ++) {

			for($j = 0; $j < count($matrRoad); $j++) {	

				if($matrix[$tempNode][$j] != 0) {				
					if(!$vNodes[$j]) {					
						if($matrRoad[$tempNode][0] + $matrix[$tempNode][$j] < $matrRoad[$j][0]) {
							$matrRoad[$j][0] = $matrRoad[$tempNode][0] + $matrix[$tempNode][$j];
							$matrRoad[$j][1] = $tempNode;
						}			

					}
				}
			}

			$minPQ = $infinity;
			$minNode = 0;

			for($о = 0; $о < count($matrRoad); $о++) {
				if(!$vNodes[$о]) {
					if($matrRoad[$о][0] < $minPQ) {
						$minPQ = $matrRoad[$о][0];
						$minNode = $о;
					}
				}			
			}

			$vNodes[$minNode] = true;
			$tempNode = $minNode;

		}
		return $matrRoad;
	}




?>