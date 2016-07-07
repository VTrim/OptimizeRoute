<?php
	
    const SERVER = 'localhost';
	const USER = 'root';
	const PASSWORD = '';
	const DATABASE = 'distance';
		
	$db = new mysqli(SERVER, USER, PASSWORD, DATABASE);
	
	if ($db->connect_errno)
      die('Не вдалося підключитися до MySQL: ' . $db->connect_error);
  
    if(isset($_POST['param'], $_POST['source'], $_POST['target'])) {
		
  
     $param = $_POST['param'];
	 $source = $_POST['source'];
	 $target = $_POST['target'];
	 
	 if($source == $target)
		 die('Ви обрали однакові початкове та кінцеве міста.');
  
     $routes = $db->query("SELECT * FROM routes");
	 
	 while ($data = $routes->fetch_object()){
		 
		if($param == 'time') {
			
		    $list[$data->route] = $data->time;
			
		}
		elseif($param == 'distance') {
			
			$list[$data->route] = $data->distance;
			
		}	
		 
	 }

     extract($list);	 				

     $graph = [
       'A' => ['B' => $AB, 'C' => $AC, 'E' => $AE],
       'B' => ['A' => $AB, 'F' => $BF],
       'C' => ['A' => $AC, 'D' => $CD, 'E'=> $CE],
       'D' => ['C' => $CD, 'F' => $DF],
       'E' => ['A' => $AE, 'C' => $CE, 'F' => $EF],
       'F' => ['B' => $BF, 'D' => $DF, 'E' => $EF],
        ];
 
  $source = $_POST['source'];
  $target = $_POST['target'];

    $d = [];
    $pi = [];

    $Q = new SplPriorityQueue();
 
    foreach ($graph as $v => $adj) {
		
      $d[$v] = INF;
      $pi[$v] = null;
	  
      foreach ($adj as $w => $cost) {

        $Q->insert($w, $cost);
		
      }
    }
 
    $d[$source] = 0;
 
    while (!$Q->isEmpty()) {

      $u = $Q->extract();
	  
      if (!empty($graph[$u])) {

        foreach ($graph[$u] as $v => $cost) {

          $alt = $d[$u] + $cost;

          if ($alt < $d[$v]) {
			  
            $d[$v] = $alt;
            $pi[$v] = $u;
			
          }
        }
      }
    }
 
    $S = new SplStack();
	
    $u = $target;
    $dist = 0;

    while (isset($pi[$u]) && $pi[$u]) {
		
      $S->push($u);
      $dist += $graph[$u][$pi[$u]];
      $u = $pi[$u];
	  
    }
 
    if ($S->isEmpty()) {
      echo 'Такого маршруту не існує!';
    }
    else {

      $S->push($source);
	  
	  if($param == 'time')
         echo 'Оптимальний шлях за часом '.$dist.'хв.';
	 elseif($param == 'distance')
	     echo 'Оптимальний шлях за відстанню '.$dist.'км.';
	 
	  $sep = ' по маршруту: ';
	  
      foreach ($S as $v) {
		  
        echo $sep . $v;
        $sep = ' -> ';
		
      }
    }
	 }