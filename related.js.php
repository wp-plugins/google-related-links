<?php
if (!function_exists('add_action'))
{
	require_once("../../../wp-config.php");
}
?>
google.load('search', '1');

function gSearch(){
this.gSearchForm= new google.search.SearchForm(false, document.getElementById("search-form"));
this.gSearchForm.setOnSubmitCallback(this, this.captureForm);
this.gWebSearch=new google.search.WebSearch();
this.gWebSearch.setSiteRestriction("<? bloginfo(wpurl); ?>");
 this.gWebSearch.setSearchCompleteCallback(this, this.onWebSearch);
this.gWebSearch.setResultSetSize(google.search.Search.SMALL_RESULTSET);
}

gSearch.prototype.captureForm=function(searchForm){
this.gWebSearch.execute(searchForm.input.value);
return false;
}

gSearch.prototype.onWebSearch=function(){
var related=document.getElementById('search-related');
 if (this.gWebSearch.results.length==0) {
related.innerHTML="No google related links";
return;
}

for(var i=0;i<this.gWebSearch.results.length;++i){
var a=document.createElement('a');
a.appendChild(document.createTextNode(html_entity_decode(this.gWebSearch.results[i].titleNoFormatting)));
a.href=this.gWebSearch.results[i].url;
related.appendChild(a);
}
}

function html_entity_decode(str)
{
 var  tarea=document.createElement('textarea');
 tarea.innerHTML = str; 
 return tarea.value;
 }


function watchMore(){
var t=document.getElementById('search-related');
if(!t.hasChildNodes()){
	setTimeout(watchMore,500);
	return;
}
if(t.innerHTML=="No google related links")
return;
if(t.childNodes.length<4)
return;
addMore();
}
