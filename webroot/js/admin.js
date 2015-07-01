/* 
* @Author: sebb
* @Date:   2015-01-08 19:35:28
* @Last Modified by:   sebb
* @Last Modified time: 2015-07-01 18:50:36
*/

(function($) {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	var choosenDate = null;
	var activeBookingType = null;
	
	$(document).on("ready", init);
	$(document).on("click", ".choose-time-btn", next);
	$(document).on("click", ".toggle-day", toggleOpen);

	function init() {
		$calender = $("#calendar");

		if($calender.length == 0) {
			return;
		}

		$.get(window.appInfo.basepath + "admin/bookings.json", function(data) {
			$.get(window.appInfo.basepath + "admin/open_times.json", function(openDaysData) {
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

				$.each(openDaysData.data, function(index, item) {
					events.push({
						title: "Open",
						start: item["OpenTime"].start,
						color: "#66dd66",
						id: item["OpenTime"].id
					})
				});

				$calender.fullCalendar({
					dayClick:function(arg) {
						$calender.fullCalendar("select", arg);

						choosenDate = new Date(arg.unix() * 1000 - (1000 * 60 * 60* 2));

						$(".choose-time-btn, .toggle-day").removeAttr("disabled");
					},
					eventClick:function(calEvent, jsEvent, view) {
						if(calEvent.title != "Open") {
							document.location.href = window.appInfo.basepath + "admin/bookings/edit/" + calEvent.id;
						}
					},
					header: {
						left: "title prev,next today",
						center: "",
						right: ""
					},
					editable: true,
					events:events,
					timezone:false
				});

				$.get( window.appInfo.basepath + "admin/booking_types.json", function(data) {
					if(data.data.length == 0) {
						return;
					}

					var options = "";
					$.each(data.data, function(index, value) {
						options += '<option value="' + value.BookingType.id + '">' + value.BookingType.name + '</option>';
					});

					activeBookingType = data.data[0].BookingType.id;

			        var custom_buttons = '<button class="toggle-day btn btn-default" disabled>Toggle open day</button>';
			        custom_buttons += '<select id="booking-type-id"><option readonly>Choose booking type</option> ' + options + '</select>';
			        custom_buttons += ' <button class="choose-time-btn btn btn-default btn-primary" disabled>Book on choosen day</button>';
			        $(".fc-right").append(custom_buttons);
				});
			});
		});
	};

	function toggleOpen(evt) {
		if(!$(this).attr("disabled")) {

			var isRemove = false;

			$.each($calender.fullCalendar('clientEvents'), function(index, item) {
				var d = new Date( item.start.unix() * 1000 - (1000 * 60 * 60* 2) );
				if(d.getTime() == choosenDate.getTime()) {
					$calender.fullCalendar( 'removeEvents', item.id );
					isRemove = true;

					$.ajax({
						url: window.appInfo.basepath + "admin/open_times/delete/" + item.id + ".json",
						method:"delete"
					});
				}
			});

			if(isRemove) {
				return;
			}

			var data = {
				data:{
					OpenTime:{
						start:choosenDate.toMysqlFormat(),
						end:choosenDate.toMysqlFormat()
					}
				}
			}

			$.post(window.appInfo.basepath + "admin/open_times/add.json", data, function(result) {

				if(result.success) {
					$calender.fullCalendar( 'renderEvent', {
						id:result.data.id,
						allDay:true,
						title:"Open",
						color:"#66dd66",
						start:choosenDate
					}, true);
				} else {
					alert("An error occured, please try again");
				}

			});
		}
	}

	function next(evt) {
		if(!$(this).attr("disabled")) {
			if($("#booking-type-id").val() == "Choose booking type") {
				alert("Please select a booking type");
				return;
			}

			document.location.href = window.appInfo.basepath + "admin/bookings/add/" + (choosenDate.getTime()/1000) + "/" + $("#booking-type-id").val();
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