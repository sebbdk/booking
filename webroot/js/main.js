/* 
* @Author: sebb
* @Date:   2015-01-08 19:35:28
* @Last Modified by:   sebb
* @Last Modified time: 2015-01-08 20:34:02
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

	function getData(callback) {
		$.get('/indi/points.json', function(rawData) {
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
			            data: []	
					}
				]
			};

			var labs = [];
			$.each(rawData.data, function(index, value) {
				console.log(value);
				var minute = new Date(value.Point.created).getMinutes();


				if(labs.indexOf(minute) === -1) {
					wipData.labels.push("");
					labs.push(minute);
				}

				var index = labs.indexOf(minute)

				wipData.datasets[0].data[index] = wipData.datasets[0].data[index] ? wipData.datasets[0].data[index]+1:1;
			});

			callback(wipData);
		});
	}

})(jQuery);