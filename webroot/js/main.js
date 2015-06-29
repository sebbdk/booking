/* 
* @Author: sebb
* @Date:   2015-01-08 19:35:28
* @Last Modified by:   sebb
* @Last Modified time: 2015-06-29 16:42:01
*/

(function($) {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	var choosenDate = null;
	
	$(document).on("ready", init);
	$(document).on("click", ".choose-time-btn", next);

	function init() {
		$calender = $("#calendar");

		$calender.fullCalendar({
			dayClick:function(arg) {
				$calender.fullCalendar("select", arg);
				choosenDate = arg;
				$(".choose-time-btn").removeAttr("disabled");
			},
			header: {
				left: "title prev,next today",
				center: "",
				right: ""
			},
			editable: true
		});

        var custom_buttons = '<button class="choose-time-btn btn btn-default btn-primary" disabled>Book på valgte dag</button>';
        $(".fc-header-right").append(custom_buttons);
	};

	function next(evt) {
		if(!$(this).attr("disabled")) {
			document.location.href = window.appInfo.basepath + "bookings/add/" + (choosenDate.getTime()/1000) + "/" + $("#booking-type-id").val();
		}
	}

	/**
	 * You first need to create a formatting function to pad numbers to two digits…
	 **/
	function twoDigits(d) {
	    if(0 <= d && d < 10) return "0" + d.toString();
	    if(-10 < d && d < 0) return "-0" + (-1*d).toString();
	    return d.toString();
	}

	/**
	 * …and then create the method to output the date string as desired.
	 * Some people hate using prototypes this way, but if you are going
	 * to apply this to more than one Date object, having it as a prototype
	 * makes sense.
	 **/
	Date.prototype.toMysqlFormat = function() {
	    return this.getUTCFullYear() + "-" + twoDigits(1 + this.getMonth()) + "-" + twoDigits(this.getDate()) + " " + twoDigits(this.getHours()) + ":" + twoDigits(this.getMinutes()) + ":" + twoDigits(this.getSeconds());
	};

})(jQuery);