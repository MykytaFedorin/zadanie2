<?php    
    $stmt = $pdo->prepare("DELETE FROM subjects");
    try{
        $stmt->execute(); 
        echo "succesfully deleted";
    }
    catch(Except $e){
        echo $e->getMessage();
        echo "error delete";
    }
?>
