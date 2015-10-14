<!DOCTYPE html>
<html>
<head>
    <title>Dictionary</title>
    <meta charset="utf-8" />
    <link href="dictionary.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="header">
	
    <h1>My Dictionary</h1>
<!-- Ex. 1: File of Dictionary -->
	<?php  
	$filename = "dictionary.tsv";
	$lines =array("Apple-An 	apple is a round fruit with smooth green, yellow, or red skin and firm white flesh.",
		"Banana-Bananas are long curved fruit with yellow skins.",
		"Cherry-Cherries are small, round fruit with red skins.",
		"Computer-A computer is an electronic machine that can store and deal with large amounts of information.",
		"Development-Development is the gradual growth or formation of something.",
		"Graduate-A graduate is a person who has successfully completed a degree at a university or college and has received a certificate that shows this.",
		"Alphabet-An alphabet is a set of letters usually presented in a fixed order ,which is used for writing the words of a particular language or group of languages."
		
		);
	$size=688;
	?>
    <p>
        My dictionary has <?php 
        	$result = count($lines);
			echo $result;
        ?> total words
        and
        size of <?=$size?> bytes.
    </p>
</div>
<div class="article">
    <div class="section">
        <h2>Today's words</h2>
<!-- Ex. 2: Today’s Words & Ex 6: Query Parameters -->
		<?php
			$numberOfWords=3;
			$todaysWords=array();
			
            function getWordsByNumber($listOfWords, $numberOfWords){
                $resultArray = array();

				for ($i =0;$i < $numberOfWords;$i++) {
					array_push($resultArray, $listOfWords[$i]);
				}
                return $resultArray;
            }
            $todaysWords=getWordsByNumber($lines, $numberOfWords);
        ?>
       		 <ol>
        	<?php
        		for ($i=0; $i < $numberOfWords; $i++) { 
					echo "<li>" . $todaysWords[$i]."</li>";
				}
        	?>
           </ol>
    </div>
    <div class="section">
        <h2>Searching Words</h2>
<!-- Ex. 3: Searching Words & Ex 6: Query Parameters -->
        <?php
        	$startCharacter="Ch";
			$bool=FALSE;
			$searchedWords=array();
            function getWordsByCharacter($listOfWords, $startCharacter){
                $resultArray = array();
                $len=strlen($startCharacter);
				
				foreach ($listOfWords as $key => $value) {
					for ($i=0; $i < $len; $i++) {
						if($value[$i]==$startCharacter[$i]){
							$bool=TRUE;
						}  
						else {
							$bool=FALSE;
							break;
						}
					}
					if($bool){
						array_push($resultArray,$value);
					}
					
				}
                
                return $resultArray;
            }
			$searchedWords=getWordsByCharacter($lines, $startCharacter);
			
        ?>
        <p>
            Words that started by <strong>'C'</strong> are followings :
        </p>
        <ol>
            <?php
        		for ($i=0; $i < sizeof($searchedWords); $i++) { 
					echo "<li>" . $searchedWords[$i]."</li>";
				}
        	?>
        </ol>
    </div>
    <div class="section">
        <h2>List of Words</h2>
<!-- Ex. 4: List of Words & Ex 6: Query Parameters -->
        <?php
        	$orderby=0;
            function getWordsByOrder($listOfWords, $orderby){
                $resultArray = $listOfWords;
				if($orderby==0){
					
					sort($resultArray,SORT_STRING);
									
				}elseif($orderby==1){
					rsort($listOfWords);
				}
						
                return $resultArray;
            }
			
			$orderlist=getWordsByOrder($lines, $orderby);
        ?>
        <p>
            All of words ordered by <strong>alphabetical order</strong> are followings :
        </p>
        <ol>
        	<?php
        		for ($i=0; $i < sizeof($orderlist); $i++) { 
					
					$words=explode("-",$orderlist[$i]);
					if(strlen($words[0])>=7){
						
						echo "<li class="."\"long\"".">" . $orderlist[$i]."</li>";
					
					}else{
						
						echo "<li>" . $orderlist[$i]."</li>";
					}
				}
				
				
        	?>
            
        </ol>
    </div>
    <div class="section">
        <h2>Adding Words</h2>
<!-- Ex. 5: Adding Words & Ex 6: Query Parameters -->
        <p>Input word or meaning of the word doesn't exist.</p>
        <?php
        $newWord="str";
		$meaning="str";
         ?>
    </div>
</div>
<div id="footer">
    <a href="http://validator.w3.org/check/referer">
        <img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-html.png" alt="Valid HTML5" />
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-css.png" alt="Valid CSS" />
    </a>
</div>
</body>
</html>