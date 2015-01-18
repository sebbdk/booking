/* 
* @Author: sebb
* @Date:   2015-01-18 20:51:02
* @Last Modified by:   sebb
* @Last Modified time: 2015-01-18 20:53:54
*/

(function() {

	window._track = function(propertyID) {
		var c = readCookie('_track01');
		var _trackId = typeof(c) !== "string" ? guid():c;
		createCookie('_track01', _trackId, 360);

		var url = 'http://track.sebb.dk/points/add.json';
		var data = {Point:{slug:"web_pageview", value:document.location.href, client_identifier:_trackId, property_slug:"blog_sebb_dk"}};
		$.post(url, data, function(res) {
			console.log(res);	
		});
	}

	function createCookie(name,value,days) {
	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime()+(days*24*60*60*1000));
	        var expires = "; expires="+date.toGMTString();
	    }
	    else var expires = "";
	    document.cookie = name+"="+value+expires+"; path=/";
	}

	function readCookie(name) {
	    var nameEQ = name + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0;i < ca.length;i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1,c.length);
	        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	    }
	    return null;
	}

	function eraseCookie(name) {
	    createCookie(name,"",-1);
	}

	var guid = (function() {
	  function s4() {
	    return Math.floor((1 + Math.random()) * 0x10000)
	               .toString(16)
	               .substring(1);
	  }
	  return function() {
	    return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
	           s4() + '-' + s4() + s4() + s4();
	  };
	})();

})();