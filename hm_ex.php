<?php include "hm_head.php"; ?>
<style type="text/css">

.container {
  margin: 0 auto;
  height: auto;
  width: 90%;
  box-shadow: 0 10px 20px 5px rgba(255, 255, 255, .2);
  font-family: 'Raleway', sans-serif;
  text-transform: uppercase;
}

.curr-month {
  width: 100%;
  height: auto;
  border: 1px solid #f1c40f;
  border-top: 15px solid #f1c40f;
  background-color: #f39c12;
  color: #fff;
  font-size: 40px;
  text-align: center;
  line-height: 80px;
  font-size: 25px;
}

.curr-month sup {
  font-size: 15px;
}

.all-days {
  width: 100%;
  height: 40px;
  background-color: #fff;
  float: left;
  display: none;
}

ul {
  list-style: none;
  display: block;
  height: 30px;
  width: 100%;
  margin: 0 auto;
  float: left;
}

ul li {
  float: left;
  width: 100%;
  text-align: left;
  line-height: 41px;
}

.all-date {
  width: 100%;
  height: auto;
  float: left;
}

.all-date li {
  height: 60px;
  width: 100%;
  line-height: 60px;
  border-top: 1px solid #fff;
  border-left: 1px solid #fff;
  border-right: 1px solid #fff;
  background-color: #ccc;
  opacity: 1;
  text-indent: 20px;
}

.all-date li.inactive {
  opacity: .8;
  display: none;
}

.all-date li.monthdate:hover {
  background-color: #f39c12;
  color: #fff;
}

.all-date li sup {
  display: inline;
}

a {
  text-decoration: none;
  color: #fff
}

@media only screen and (min-width:421px) {
  .container {
    height: 487px;
    width: 421px;
  }
  .curr-month {
    border-left: 0px;
    border-right: 0px;
    font-size: 40px;
  }
  .curr-month sup {
    font-size: 20px;
  }
  .all-days {
    display: block;
  }
  ul li {
    width: 60px;
    text-align: center;
  }
  .all-date {
    height: 305px;
  }
  .all-date li {
    width: 59px;
    border-right: none;
    text-indent: 0px;
  }
  .all-date li.b-bottom {
    border-bottom: 1px solid #fff;
  }
  .all-date li.b-right {
    border-right: 1px solid #fff;
  }
  .all-date li.bnone {
    border-right: none;
  }
  .all-date li.inactive {
    display: block;
  }
  .all-date li sup {
    display: none;
  }
}

.all-days ul li:last-child{display:none;}
</style>
<script type="text/javascript">
	$(function(){
			var curDate = (new Date()).getDate();
		var curMonth = (new Date()).getMonth();
		var curYear = (new Date()).getFullYear();
		var weeks = ["sun","mon","tue","wed","thu","fri","sat"];
		var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		var noofdays = ["31", "29", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31"];
		var prevMonth, totalDays, precounter, counter, rightbox, flag, startDay;

		var curContainer = jQuery('#container');
		startDay = (new Date(curYear, curMonth, 1)).getDay();
		jQuery('.curr-month').prepend('<a href="#" class="prev"> < </a>');
		jQuery('.curr-month').append('<a href="#" class="next"> > </a>');

		jQuery( ".prev",curContainer).click(function() {
		  curMonth = curMonth-1;
		  if(curMonth<0){
			curMonth=11;
			curYear = curYear-1;
		  }else{
			curMonth=curMonth;
		  };
		  calendar();
		});

		jQuery( ".next", curContainer ).click(function() {
		  curMonth = curMonth+1;
		  if(curMonth>11){
			curMonth=0;
			curYear = curYear+1;
		  }else{
			curMonth=curMonth;
		  };
		  calendar();
		});

		function calendar(){
		  startDay = (new Date(curYear, curMonth, 1)).getDay();
		  jQuery('.curr-month b').html('<span>'+months[curMonth]+'</span><sup> '+curYear+'</sup>');
		  
			prevMonth = noofdays[curMonth-1];
			if(curMonth==11){prevMonth = noofdays[0]}else if(curMonth==0){prevMonth = noofdays[11]};
			totalDays = noofdays[curMonth];
			counter=0;
			precounter = prevMonth - (startDay-1);
			rightbox = 6;
			flag=true;

			//create days;
		  jQuery( ".all-days ul li" ).remove();
			for (var i=0; i<8; i++){
			  jQuery('.all-days ul').append('<li>'+weeks[i]+'</li>');
			}
		  
		  jQuery( ".all-date ul li" ).remove();
			for (var i=0; i<42; i++){
			  var day;
			  day = (i > 6)?(weeks[i % 7]):(weeks[i]);
			  
			  if(i>=startDay){
				counter++;
				if(counter>totalDays){
				  counter=1;
				  flag=false;
				}
				
				if(flag==true){
				  jQuery('.all-date ul').append('<li class="monthdate"><span>'+counter+'</span><sup> '+day+'</sup></li>');
				}else{
				  jQuery('.all-date ul').append('<li class="inactive"><span>'+counter+'</span><sup> '+day+'</sup></li>');
				}
			  }else{
				jQuery('.all-date ul').append('<li class="inactive"><span>'+precounter+'</span><sup> '+day+'</sup></li>');
				precounter++;
			  }
			  
			  jQuery(jQuery('.all-date ul li')[i]).addClass("bnone");
			  if(i==rightbox){
				jQuery(jQuery('.all-date ul li')[i]).removeClass("bnone");
				jQuery(jQuery('.all-date ul li')[rightbox]).addClass("b-right");
				rightbox = rightbox+7;
			  }
			  
			  if(i>34){
				jQuery(jQuery('.all-date ul li')[i]).addClass("b-bottom");
			  }
			
			  if((jQuery(jQuery('.all-date ul li')[i]).children('span').text()==curDate) && (months[(new Date()).getMonth()]==jQuery('.curr-month span').text())&&(jQuery('.curr-month sup').text()==curYear) && (jQuery(jQuery('.all-date ul li')[i]).css('opacity') == 1)){
				  jQuery(jQuery('.all-date ul li')[i]).css({"background-color":"#f39c12","color":"#fff"});
			  }
			}
		}

		calendar();
	})
</script>
<div class="container" id="container">
  <div class="curr-month"><b></b></div>
  <div class="all-days">
    <ul></ul>
  </div>
  <div class="all-date">
    <ul></ul>
  </div>
</div>


<?php include "hm_foot.php"; ?>