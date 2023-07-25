<?php

function movePlayerAntiClockwise(&$position, $diceValue) {
    $positions = array(1, 2, 3, 6, 9, 8, 7, 4);
    $currentPositionIndex = array_search($position, $positions);
    $newPositionIndex = ($currentPositionIndex - $diceValue + 8) % 8;
    $position = $positions[$newPositionIndex];
}
function movePlayerAntiClockwise2(&$position2, $diceValue) {
    $positions = array(1, 2, 3, 6, 9, 8, 7, 4);
    $currentPositionIndex = array_search($position2, $positions);
    $newPositionIndex = ($currentPositionIndex - $diceValue + 8) % 8;
    $position2 = $positions[$newPositionIndex];
}

function rollDice() {
    return rand(1, 3);
}

function displayPositions($positions) {
    echo "Positions:\n";
    for ($row = 0; $row < 3; $row++) {
        for ($col = 0; $col < 3; $col++) {
          if($row==1 && $col ==0){           
            echo "START";
          }elseif($row==1 && $col ==1){
             echo "  HOME";
          }elseif($row==1 && $col ==2){
            echo "   SAFE";
          }else{
            $index = $row * 3 + $col;
            echo $positions[$index] . "\t\t";
          }        
        }
        echo "\n";
    }
}

function displayPlayerPositions($positions,$playerPosition,$playerPosition2) {
    echo "Positions:\n";
    for ($row = 0; $row < 3; $row++) {
        for ($col = 0; $col < 3; $col++) {
            $index = $row * 3 + $col;
          if($positions[$index]==$playerPosition){
            echo " A \t";
          }else if($positions[$index]==$playerPosition2){
            echo "B \t";
          }else if(($positions[$index]==$playerPosition)&&($positions[$index]==$playerPosition2)){
            echo "AB \t";
          }elseif($row==1 && $col ==0){
            echo "START";
          }elseif($row==1 && $col ==1){
            echo "  HOME";
          }elseif($row==1 && $col ==2){
            echo "   SAFE";
          }else{
            echo $positions[$index] . "\t\t";
          }
        }
        echo "\n";
    }
}

$playerPosition = 4;
$playerPosition2 = 4;
echo "Welcome to the Dice Game!\n";
echo "Player starts at position - START : 4.\n";

while (true) {
    displayPositions(range(1, 9));
    echo "\nCurrent position of A: " . $playerPosition . "\n";
  echo "Current position of B: " . $playerPosition2 . "\n";
    echo "Rolling the dice...\n";
    $diceValue = rollDice();
    $diceValue2 = rollDice();
    echo "Dice value for A: " . $diceValue . "\n";
  echo "Dice value for B: " . $diceValue2 . "\n";

    movePlayerAntiClockwise($playerPosition, $diceValue);
    movePlayerAntiClockwise2($playerPosition2, $diceValue2);

    echo "New position: " . $playerPosition . "\n";
  echo "New position: " . $playerPosition2 . "\n";

    displayPlayerPositions(range(1, 9),$playerPosition,$playerPosition2);

      echo "Press 'Enter' to continue or type 'exit' to quit: ";

    $input = trim(fgets(STDIN));
    if ($input === 'exit') {
        echo "Thanks for playing. Goodbye!\n";
        break;
    }
  echo "-----------------------------------------------------\n";
}
?>
