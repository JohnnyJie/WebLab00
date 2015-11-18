var interval = 3000;
var numberOfBlocks = 9;
var numberOfTarget = 3;
var targetBlocks = [];
var selectedBlocks = [];
var timer;
var state;

document.observe('dom:loaded', function(){
	
	$("start").onclick=stopGame;
	$("stop").onclick=stopToStart;
	
});
function stopToStart(){
    stopGame();
   
    startToSetTarget();
}

function stopGame(){

	$("state").innerHTML="stop";
	$("answer").innerHTML="0/0";
	var blocks=$$("div.block")
	for (var j = 0; j < blocks.length; j++) {
		blocks[j].className="block normal";
	}
	for (var i=0;i<numberOfTarget;i++){
		targetBlocks[i]=0;	
	}
	for(var j=0;j<numberOfTarget;j++){
		selectedBlocks[j]=-1;
	}
	timer=0;

	
}

function startToSetTarget(){
	$("state").innerHTML="Ready!";
	var blocks=$$("div.block");
	setTimeout(setTargetToShow, interval);
	
}

function setTargetToShow(){
 	$("state").innerHTML="Memorize!";
  	targetBlocks[0]=Math.ceil(Math.random()*10)-1;
 	targetBlocks[1]=Math.ceil(Math.random()*10)-1;
 	while(targetBlocks[0]==targetBlocks[1]){
 		targetBlocks[1]=Math.ceil(Math.random()*10)-1;
 	}
 	targetBlocks[2]=Math.ceil(Math.random()*10)-1;
 	while(targetBlocks[0]==targetBlocks[2]||targetBlocks[1]==targetBlocks[2]){
 		targetBlocks[2]=Math.ceil(Math.random()*10)-1;
 	}
 	var blocks=$$("div.block")
 	for (var i=0;i<numberOfTarget;i++){
		for (var j = 0; j < blocks.length; j++) {
			if(j==targetBlocks[i]){		
			blocks[j].className="block target";
			}
		}
 	}
 	setTimeout(showToSelect, interval);	
}

function showToSelect(){
	$("state").innerHTML="Select!";
	var blocks=$$("div.block")
	for (var i=0;i<blocks.length;i++){
		if (blocks[i].hasClassName("target")) {
     			blocks[i].removeClassName("target");
     			blocks[i].addClassName("normal");
    		}
 	}
 	for (var i=0;i<blocks.length;i++){
		blocks[i].onclick=function(){
			
			if(selectedBlocks[2]!=-1) return;
			
			var temp=this.getAttribute("data-index");
			
			for(var j=0;j<numberOfTarget;j++){
				if(selectedBlocks[j]==temp){
					return;
				}
			}
			for(var j=0;j<numberOfTarget;j++){
				if(selectedBlocks[j]==-1){
					selectedBlocks[j]=temp;
					return;
				}
			}
 		}
 	}
	setTimeout(selectToResult, interval);	
}

function selectToResult(){
	$("state").innerHTML="Your choose!";
	
	var blocks=$$("div.block");
	for (var i=0;i<blocks.length;i++){
		for(var j=0;j<numberOfTarget;j++){
			if(i==selectedBlocks[j]){
				
				if (blocks[i].hasClassName("normal")) {
     				blocks[i].removeClassName("normal");
     				blocks[i].addClassName("selected");
    			}
			}
		}
 	}
 	setTimeout(checkResult, interval);	
}

function checkResult(){
	$("state").innerHTML="Checking!";
	var blocks=$$("div.block");
	for (var i=0;i<blocks.length;i++){
		
				if (blocks[i].hasClassName("selected")) {
     				blocks[i].removeClassName("selected");
     				blocks[i].addClassName("normal");
    			}
			}
	
 	
 	var num=0;
 	for(var j=0;j<numberOfTarget;j++){
 		for(var i=0;i<numberOfTarget;i++){
 			if(selectedBlocks[i]==targetBlocks[j]){
 				num++;
 				break;
 			}
 		}
 	}
 	$("answer").innerHTML=""+num+"/"+numberOfTarget+"";
 	//setTimeout(startToSetTarget, interval);	
}
