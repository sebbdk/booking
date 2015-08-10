/* 
* @Author: sebb
* @Date:   2015-01-08 19:35:28
* @Last Modified by:   sebb
* @Last Modified time: 2015-08-10 17:46:46
*
*
*
*  IMPORTANT THE FRONTEND USES A DIFFERENT VERSIONS OF FullCalender then the backend for time saving purposes
*
* 
*/

(function($) {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	var choosenDate = null;
	
	$(document).on("ready", init);
	$(document).on("click", ".choose-time-btn", next);
	$(document).on("click", ".delete-link", deleteBooking);

	function deleteBooking(evt) {
		evt.preventDefault();

		if(confirm("Are you sure you would like to delete this booking?")) {
			$.ajax({
				url: $(this).attr("href") + ".json",
				method:"delete"
			}).done(function(response) {
				alert("Din booking er nu slettet");
				window.location.href = window.appInfo.basepath;
			});
		}
	}

	function init() {
		$calender = $("#calendar");

		$.get(window.appInfo.basepath + "/open_times.json", function(openDaysData) {
			var events = [];

			console.log(openDaysData)

			$.each(openDaysData.data, function(index, item) {
				events.push({
					title: "Åben",
					start: item["OpenTime"].start,
					color: "#66dd66",
					id: item["OpenTime"].id
				})
			});

			$calender.fullCalendar({
				dayClick:function(arg) {
					var allowChoose = false;

					$.each($calender.fullCalendar('clientEvents'), function(index, item) {
						if(item.start.getTime() == arg.getTime()) {
							allowChoose = true;
						}
					});

					if(!allowChoose) {
						return;
					}

					$calender.fullCalendar("select", arg);
					choosenDate = arg;
					$(".choose-time-btn").removeAttr("disabled");
				},
				header: {
					left: "title prev,next today",
					center: "",
					right: ""
				},
				editable: true,
				events:events
			});

	        var custom_buttons = '<button class="choose-time-btn btn btn-default btn-primary" disabled>Book på valgte dag</button>';
	        $(".fc-header-right").append(custom_buttons);
	    });
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