
if (donut[0].value || donut[1].value || donut[2].value) {
	$('#pending').text(donut[2].value);
	$('#resc').text(donut[1].value);
	$('#done').text(donut[0].value);
	Morris.Donut({
		element: 'morris-donut-chart',
		data: donut,
		resize: true,
		colors: ['#99d683', '#FB9678', '#6164c1']
	});
} else {
	$('#morris-donut-chart').html('<h1 style="margin-top:40%;">Not enough data to Render The Chart</h1>').addClass('text-center');
}
for (var i = 0; i < areadata.length; ++i) {
  areadata[i].week = moment().day("Monday").week(areadata[i].period).format('YYYY-MM-DD');
}
// Dashboard 1 Morris-chart

Morris.Area({
  element: 'morris-area-chart2',
  data: areadata,
  xkey: 'week',
  ykeys: ['total'],
  labels: ['Sales Total'],
  pointSize: 0,
  fillOpacity: 0.4,
  pointStrokeColors: ['#01c0c8'],
  behaveLikeLine: true,
  gridLineColor: 'rgba(255, 255, 255, 0.1)',
  lineWidth: 0,
  gridTextColor: '#96a2b4',
  smooth: false,
  hideHover: 'auto',
  lineColors: ['#01c0c8'],
  resize: true
});
