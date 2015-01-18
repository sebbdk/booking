/* 
* @Author: sebb
* @Date:   2015-01-08 19:35:28
* @Last Modified by:   sebb
* @Last Modified time: 2015-01-18 20:42:40
*/

(function($) {

	$(document).on('ready', init);

	function init() {

		getData(function(data) {
			var ctx = document.getElementById("myChart").getContext("2d");
			var myNewChart = new Chart(ctx).Line(data, {
				responsive:true,
				maintainAspectRatio: false,
				showLabels:false
			});
		});

	}

/**
 * Creates a graph grouped on minutes
 * @param  {Function} callback [description]
 * @return {[type]}            [description]
 */
	function getData(callback) {
		$.get('/points.json', function(rawData) {
			var wipData = {
				labels:[],
				datasets:[
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.2)",
						strokeColor: "rgba(220,220,220,1)",
						pointColor: "rgba(220,220,220,1)",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [
							10, 10, 10, 10
						]	
					}
				]
			};

			var labs = [];

			for(var t = 0; t < 24;t++) {
				wipData.labels.push('Hour ' + t);
				labs.push(t);
				wipData.datasets[0].data[t] = 0;
			}

			$.each(rawData.data, function(index, value) {
			//	var group = new Date(value.Point.created).getMinutes();
				var group = roundMinutes(new Date(value.Point.created)).getHours();


				
				if(labs.indexOf(group) === -1) {
					wipData.labels.push(group);
					labs.push(group);
				}

				var index = labs.indexOf(group);

				console.log(index);

				var current = wipData.datasets[0].data[index];

				wipData.datasets[0].data[index] = current ? current+1:1;
			});

			callback(wipData);
		});
	}

	function roundMinutes(date) {

		date.setHours(date.getHours() + Math.round(date.getMinutes()/60));
		date.setMinutes(0);

		return date;
	}

})(jQuery);