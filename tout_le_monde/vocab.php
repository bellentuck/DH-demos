<?php

$sample = array(
	'blonds / bruns / châtain (invar.)' => 'blond / black / brown',
	'blancs' => 'white',
	'clairs / foncés' => 'light / dark',
	'lisses / bouclés / frisés' => 'smooth / curly / tightly curled',
	'courts / mi-longs / longs' => 'short / medium-length / long'
);

function getSimilarityCoefficient( $item1, $item2, $separator = " " ) {
	
	$item1 = explode( $separator, str_replace( "/ ", "", $item1 ));
	$item2 = explode( $separator, str_replace( "/ ", "", $item2 ));
	// We will ultimately need far more of this "str_replace" pre-processing...
	$arr_intersection = array_intersect( $item1, $item2 );
	$arr_union = array_unique(array_merge( $item1, $item2 ));
	$coefficient = count( $arr_intersection ) / count( $arr_union );
	
	return $coefficient;
}

?>

<!DOCTYPE html>  
<html>  
<head>  
	<title>Vocab Demo</title>  
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
</head>  

<body>

<h2>Vocab Demo</h2>

	<form method="POST" id="lang" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<!--<h4>Francais, Anglais, tous le deux?</h4>-->
		<input type="radio" name="language" value="french"> Francais<br>
		<input type="radio" name="language" value="english"> Anglais<br>
		<input type="radio" name="language" value="both" checked> tous le deux
	</form>

	
	<script>
		$(document).ready(function(){
		    $("#lang").click(function(){
		        "<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				    // collect value of input field
				    $lang = $_POST['language'];
				    if ($lang == 'french') {
				        echo 'F';
				    } elseif ($lang == 'english') {
				    	echo 'E';
				    } else {
				        echo 'B';
				    }
				}
				?>"
		    });
		});
	</script>
	

<br></br>

<table>
    <?php foreach($sample as $fr=>$eng): ?>
    <tr>
        <td>
	        <?php echo $fr; ?>
	        <form method='POST'>   
	        <input type="text" name="answer">  
	        <input type="submit" value="Submit your answer">
	        </form>
	        <?php
	        $ans = $_POST['answer'];
	        //echo $ans;
	        //echo $eng;
	        $percent_correct = getSimilarityCoefficient($ans, $eng);
	        echo round(($percent_correct * 100), 0), "% correct";
	        /*
	        if ($ans == $eng) {
	        	echo "correct";
	        }  
	        elseif ($ans != $eng) {
	        	echo "incorrect";
	        }
	        else {
	        	break;	        	
	        }
	        */
	        ?>

	        <br></br>	
        </td>  
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>


<!-- //keep track of words:answers
	        //then check if answers match real values for words -->