//<![CDATA[
jQuery.cookie = function (key, value, options) {
// key and at least value given, set cookie...
if (arguments.length > 1 && String(value) !== "[object Object]") {
options = jQuery.extend({}, options);
if (value === null || value === undefined) {
options.expires = -1;
}
if (typeof options.expires === 'number') {
var days = options.expires, t = options.expires = new Date();
t.setDate(t.getDate() + days);
}
value = String(value);
return (document.cookie = [
encodeURIComponent(key), '=',
options.raw ? value : encodeURIComponent(value),
options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
options.path ? '; path=' + options.path : '',
options.domain ? '; domain=' + options.domain : '',
options.secure ? '; secure' : ''
].join(''));
}
// key and possibly options given, get cookie...
options = value || {};
var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};
//]]>
jQuery(document).ready(function($){
if($.cookie('popup_user_login') != 'yes'){
$('#fanback').delay(1000).fadeIn('medium');
$('#Burp, #fan-exit').click(function(){
$('#fanback').stop().fadeOut('medium');
});
}
$.cookie('popup_user_login', 'yes', { path: 'default.htm', expires: 1 });
});



$(document).ready(function(){

	tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	tmonth=new Array("Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec");
	function padlength(what) {
        var output = (what.toString().length == 1) ? "0" + what : what;
        return output;
    }
	
	function GetClock()
	{
		var d=new Date();
		var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
		if(nyear<1000) nyear+=1900;
		var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

		if(nhour==0){ap=" AM";nhour=12;}
		else if(nhour<12){ap=" AM";}
		else if(nhour==12){ap=" PM";}
		else if(nhour>12){ap=" PM";nhour-=12;}

		if(nmin<=9) nmin="0"+nmin;
		if(nsec<=9) nsec="0"+nsec;

		document.getElementById('YourTime').innerHTML= padlength(d.getHours())+":"+padlength(nmin)+":"+padlength(nsec)+ " - "+padlength(ndate)+" "+tmonth[nmonth]+" "+nyear+" ";
	}
	GetClock();
	setInterval(GetClock,1000);
	
	
});


$(document).ready(function(){

	var currenttime = document.getElementById("website_local_time").value;
    var montharray = new Array("Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec");
    var serverdate = new Date(currenttime);

    function padlength(what) {
        var output = (what.toString().length == 1) ? "0" + what : what;
        return output;
    }

    function displaytime() {
        serverdate.setSeconds(serverdate.getSeconds() + 1);
        var datestring = padlength(serverdate.getDate()) + " " + montharray[serverdate.getMonth()] + " " + serverdate.getFullYear();
        var timestring = padlength(serverdate.getHours()) + ":" + padlength(serverdate.getMinutes()) + ":" + padlength(serverdate.getSeconds());
        document.getElementById("Thetime").innerHTML =  timestring + " - " + datestring ;
    }

		setInterval(function () {h
			displaytime();
		}, 1000);
});


function showDiv(select){
	var uid = select.options[select.selectedIndex].getAttribute('data');
	if(uid == "DL" ){
		document.getElementById('commandDiv').style.display = "block";
	}
	else{
		document.getElementById('commandDiv').style.display = "none";
	}
}

