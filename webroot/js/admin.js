/* 
* @Author: sebb
* @Date:   2015-01-08 19:35:28
* @Last Modified by:   sebb
* @Last Modified time: 2015-06-24 17:30:44
*/

(function($) {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	var choosenDate = null;
	
	$(document).on("ready", init);
	$(document).on("click", ".choose-time-btn", next);
	$(document).on("click", ".toggle-day", toggleOpen);
	$(document).on("click", ".times .item.availeble", chooseTime);

	function chooseTime(evt) {
		evt.preventDefault();
		$(".item.selected").removeClass("selected");
		$(this).addClass("selected");

		var date = new Date(parseInt($(this).attr("date-time")) * 1000);

		$("#date-time").val( new Date( date ).toMysqlFormat() );

		$(".form").show();
	}

	function init() {
		$calender = $("#calendar");

		$.get(window.appInfo.basepath + "/index.json", function(data) {
			var events = [];

			$.each(data.data, function(index, item) {
				var color = item["BookingType"].color ? item["BookingType"].color:'#378006';

				events.push({
					title: item["BookingType"].confirmed ? item["BookingType"].name:"Ny",
					start: item["Booking"].date_time,
					color: color,
					id: item["Booking"].id
				})
			});

			$calender.fullCalendar({
				dayRender: function (date, element, view) {
					console.log(date.unix() * 1000 - (1000 * 60 * 60* 2));

					//var check = $.fullCalendar.formatDate(date,'yyyy-MM-dd');
					//var today = $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd');
					//if (check < today) {
					//	element.css("background-color", "red");
					//}
				},
				dayClick:function(arg) {
					$calender.fullCalendar("select", arg);

					choosenDate = new Date(arg.unix() * 1000 - (1000 * 60 * 60* 2));

					$(".choose-time-btn, .toggle-day").removeAttr("disabled");
				},
				eventClick:function(calEvent, jsEvent, view) {
					document.location.href = window.appInfo.basepath + "/edit/" + calEvent.id;
				},
				header: {
					left: "title prev,next today",
					center: "",
					right: ""
				},
				editable: true,
				events:events
			});

	        var custom_buttons = '<button class="toggle-day btn btn-default" disabled>Toggle open day</button>';
	        custom_buttons += ' <button class="choose-time-btn btn btn-default btn-primary" disabled>Book on choosen day</button>';
	        $(".fc-right").append(custom_buttons);
		});
	};

	function toggleOpen(evt) {
		if(!$(this).attr("disabled")) {

			//TO BE CONTINUED!

			var data = {
				data:{
					OpenTime:{
						start:choosenDate.toMysqlFormat(),
						end:choosenDate.toMysqlFormat()
					}
				}
			}

			$.post('', function() {

			})
		}
	}

	function next(evt) {
		if(!$(this).attr("disabled")) {
			document.location.href = window.appInfo.basepath + "/add/" + (choosenDate.getTime()/1000);
		}
	}

	/**
	 * Formatting function to pad numbers to two digits…
	 **/
	function twoDigits(d) {
	    if(0 <= d && d < 10) return "0" + d.toString();
	    if(-10 < d && d < 0) return "-0" + (-1*d).toString();
	    return d.toString();
	}

	/**
	 * Method to output the date string as mysql DateTime formate
	 **/
	Date.prototype.toMysqlFormat = function() {
	    return this.getUTCFullYear() + "-" + twoDigits(1 + this.getMonth()) + "-" + twoDigits(this.getDate()) + " " + twoDigits(this.getHours()) + ":" + twoDigits(this.getMinutes()) + ":" + twoDigits(this.getSeconds());
	};

})(jQuery);