//"use strict"
window.onload = function () {
    var stack = [];
    var displayVal = "0";

    
    for (var i in $$('button')) {
        $$('button')[i].onclick = function () {
            var value = this.innerHTML;
            var decbool=false;
            var caculatebool=false;
            if(displayVal == "0"){
            	displayVal="";
            }
			 if(value=="AC"){
			 	displayVal = "0";	 
			 	document.getElementById("expression").innerHTML="0";
			 	decbool=false;
			 	caculatebool=false;
			 }else if(!isNaN(value)){		
			 	if(caculatebool==false){
			 		displayVal = displayVal+=value;
			 		
			 	}else{
			 		document.getElementById("expression").innerHTML="0";
			 		displayVal=value;
			 	}
			 	decbool=true;
			  caculatebool=false;
			 }else if(value=="="){
			 	
			 	displayVal=calculator(document.getElementById("expression").innerHTML+displayVal);
			 	decbool=false;
			 	caculatebool=true;
			 	
			 }else if(value=="."){
			 	var bool=true;
			 	
			 	for (var i=0; i< s.length; i++) {
      			  	if(s[i]=="."){
      			  		bool=false;
            			break;
      				}
    			}
    			if(bool&&decbool){
    				displayVal+=value;
    			}
    			decbool=false;
			 	 caculatebool=false;
			 }
			 else {	
	    		displayVal = displayVal+=value;
	    		document.getElementById("expression").innerHTML=displayVal;	
	    		displayVal="0";
	    		decbool=true;		
			 	caculatebool=false;
	    	}
	    	document.getElementById('result').innerHTML = displayVal;
	    	
        };
    }
    
};
function factorial (x) {

}
function highPriorityCalculator(s, val) {

}
function calculator(s) {
    var result = 0;
    var operator = "+";
    for (var i=0; i< s.length; i++) {
        if(s[0]=="0"){
            result=0;
            break;
      	}
    }
    result=eval(s);
    
    return result;
}
