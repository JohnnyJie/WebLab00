document.observe("dom:loaded", function() {
    $("b_xml").observe("click", function(){
    	new Ajax.Request("songs_xml.php", {
		    method: "get",   // optional
		    parameters: { top: $F("top") },
		    onSuccess: showSongs_XML,
		    onFailure: ajaxFailed ,
		    onException: ajaxFailed
		});
    });
    $("b_json").observe("click", function(){
    	new Ajax.Request("songs_json.php", {
		    method: "get",   // optional
		    parameters: { top: $F("top") },
		    onSuccess: showSongs_JSON,
		    onFailure: ajaxFailed ,
		    onException: ajaxFailed
		});
        //construct a Prototype Ajax.request object
    });	
});

function showSongs_XML(ajax) {
	var txts = document.getElementById('songs').getElementsByTagName("li");
	for(var i=txts.length-1;i>=0;i--)
	{
		txts[i].remove();
	} 
	//$("songs").innerHTML="";
	var songs = ajax.responseXML.getElementsByTagName("song");
	for (var i = 0; i < songs.length; i++) {
	   
	        var title = songs[i].getElementsByTagName("title")[0].firstChild.nodeValue;
	        var artist = songs[i].getElementsByTagName("artist")[0].firstChild.nodeValue;
	        var genre = songs[i].getElementsByTagName("genre")[0].firstChild.nodeValue;
	        var time=songs[i].getElementsByTagName("time")[0].firstChild.nodeValue;
	        var li = document.createElement("li");
       		 li.innerHTML = title + "-" +
                artist + " [" + genre + "]"+
               "("+time+")";
	        $("songs").appendChild(li);
	    }
}

function showSongs_JSON(ajax) {
	var txts = document.getElementById('songs').getElementsByTagName("li");
	for(var i=txts.length-1;i>=0;i--)
	{
		txts[i].remove();
	} 
	var data = JSON.parse(ajax.responseText);
	for (var i = 0; i < data.songs.length; i++) {
        var li = document.createElement("li");
        li.innerHTML = data.songs[i].title + "-" +
                data.songs[i].artist + " [" + data.songs[i].genre + "]"+
               "("+data.songs[i].time+")";
        $("songs").appendChild(li);
    }
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
