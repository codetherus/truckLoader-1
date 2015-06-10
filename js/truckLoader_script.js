$(document).ready(function(){

var currentPageUrlIs = "";
if (typeof this.href != "undefined") {
       currentPageUrlIs = this.href.toString().toLowerCase(); 
}else{ 
       currentPageUrlIs = document.location.toString().toLowerCase();
}

if((currentPageUrlIs.indexOf("addload.php"))>0||(currentPageUrlIs.indexOf("addtruck.php"))>0||(currentPageUrlIs.indexOf("addtrailer.php"))>0){
	
	$("#demo").show()
	}else{
		return null;
}

});