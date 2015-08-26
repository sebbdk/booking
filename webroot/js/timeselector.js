/* 
* @Author: sebb
* @Date:   2015-06-29 13:31:47
* @Last Modified by:   kasper
* @Last Modified time: 2015-08-25 15:07:48
*/
(function($) {

	var timeLength = 1.25;

	$(document).on("ready", load);
	$(document).on("click", ".times .item.availeble", chooseTime);

	function chooseTime(evt) {
		evt.preventDefault();
		$(".item.selected").removeClass("selected");
		$(this).addClass("selected");

		var date = new Date(parseInt($(this).attr("date-time")));

		$("#date-time").val( new Date( date ).toMysqlFormat() );

		$(".form").show();
	}

	function load() {
		$.get(window.appInfo.basepath + "booking_types/view/" + $("#BookingBookingTypeId").val() + ".json", function(bookingType) {
			timeLength = bookingType.data.BookingType.length;

			$.get(window.appInfo.basepath + "bookings/index/" + $("#BookingBookingTypeId").val() + ".json", function(bookings) {
				render(bookings.data);
			});
		});
	}

	function render(bookings) {
		var dtime = $(".time-chooser").attr("data-selected");
		if(dtime == "") {
			dtime = new Date().getTime();
		}

		var originalDate = new Date( dtime );
		originalDate.setHours(0);
		originalDate.setMinutes(0);
		originalDate.setSeconds(0);

		var dateTime = new Date( dtime );

		
		var rows = Math.floor(8 / timeLength);
		var hour = 60 * 60 * 1000;

		var source   = $("#time-item").html();
		var itemTemplate = Handlebars.compile(source);

		for(var c = 0; c < rows; c++) {
			var date = new Date(
				originalDate.getTime() + //add the date
				(hour * c * timeLength) +  //add the incremental time
				hour * 10 //times start at 10
			);

			var taken = false;

			$.each(bookings, function(index, value) {
				var bd = new Date(value.Booking.date_time);
				if(bd.getTime() ==  date.getTime()) {
					taken = true;
				}
 			});
			
			var selected = (dateTime.getTime() == date.getTime());
			var timeOfDay = ("0" + date.getHours()).slice(-2) + ":" + ("0" + date.getMinutes()).slice(-2)

			$(".time-chooser").append(itemTemplate({
				timeOfDay:timeOfDay,
				timestamp:date.getTime(),
				selected:selected,
				taken:taken && !selected,
				notTaken:!taken || selected,
			}));
		}
	}

})(jQuery);