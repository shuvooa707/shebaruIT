<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<style>
.wrapper {
    position:relative;
    margin:0 auto;
    overflow:hidden;
	padding:5px;
  	height:50px;
}

.list {
    position:absolute;
    left:0px;
    top:0px;
  	min-width:3000px;
  	margin-left:12px;
    margin-top:0px;
}

.list li{
	display:table-cell;
    position:relative;
    text-align:center;
    cursor:grab;
    cursor:-webkit-grab;
    color:#efefef;
    vertical-align:middle;
}

.scroller {
  text-align:center;
  cursor:pointer;
  display:none;
  padding:7px;
  padding-top:11px;
  white-space:no-wrap;
  vertical-align:middle;
  background-color:#fff;
}

.scroller-right{
  float:right;
}

.scroller-left {
  float:left;
}
</style>	

<div class="container">
  <div class="scroller scroller-left"><i class="glyphicon glyphicon-chevron-left"></i></div>
  <div class="scroller scroller-right"><i class="glyphicon glyphicon-chevron-right"></i></div>
  <div class="wrapper">
    <ul class="nav nav-tabs list" id="myTab">
      <li class="active"><a href="#home">Home</a></li>
      <li><a href="#profile">Profile</a></li>
      <li><a href="#messages">Messages</a></li>
      <li><a href="#settings">Settings</a></li>
      <li><a href="#">Tab4</a></li>
      <li><a href="#">Tab5</a></li>
      <li><a href="#">Tab6</a></li>
      <li><a href="#">Tab7</a></li>
      <li><a href="#">Tab8</a></li>
      <li><a href="#">Tab9</a></li>
      <li><a href="#">Tab10</a></li>
      <li><a href="#">Tab11</a></li>
	  <li><a href="#">Tab12</a></li>
      <li><a href="#">Tab13</a></li>
      <li><a href="#">Tab14</a></li>
	  <li><a href="#">Tab15</a></li>
      <li><a href="#">Tab16</a></li>
      <li><a href="#">Tab17</a></li>
  </ul>
  </div>
</div>
	    <!-- jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	
<script>
var hidWidth;
var scrollBarWidths = 40;

var widthOfList = function(){
  var itemsWidth = 0;
  $('.list li').each(function(){
    var itemWidth = $(this).outerWidth();
    itemsWidth+=itemWidth;
  });
  return itemsWidth;
};

var widthOfHidden = function(){
  return (($('.wrapper').outerWidth())-widthOfList()-getLeftPosi())-scrollBarWidths;
};

var getLeftPosi = function(){
  return $('.list').position().left;
};

var reAdjust = function(){
  if (($('.wrapper').outerWidth()) < widthOfList()) {
    $('.scroller-right').show();
  }
  else {
    $('.scroller-right').hide();
  }
  
  if (getLeftPosi()<0) {
    $('.scroller-left').show();
  }
  else {
    $('.item').animate({left:"-="+getLeftPosi()+"px"},'slow');
  	$('.scroller-left').hide();
  }
}

reAdjust();

$(window).on('resize',function(e){  
  	reAdjust();
});

$('.scroller-right').click(function() {
  
  $('.scroller-left').fadeIn('slow');
  $('.scroller-right').fadeOut('slow');
  
  $('.list').animate({left:"+="+widthOfHidden()+"px"},'slow',function(){

  });
});

$('.scroller-left').click(function() {
  
	$('.scroller-right').fadeIn('slow');
	$('.scroller-left').fadeOut('slow');
  
  	$('.list').animate({left:"-="+getLeftPosi()+"px"},'slow',function(){
  	
  	});
});    
</script>

