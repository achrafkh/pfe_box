for (var i = 0; i < areadata.length; ++i) {
  areadata[i].week = moment().day("Monday").week(areadata[i].period).format('YYYY-MM-DD');
}
$(document).ready(function () {
  var sparklineLogin = function () {
    $('#sales1').sparkline(miniDonut, {
      type: 'pie',
      height: '100',
      resize: true,
      sliceColors: ['#00bfc7', '#fb9678']
    });
    $('#sales2').sparkline([6, 10, 9, 11, 9, 10, 12], {
      type: 'bar',
      height: '154',
      barWidth: '4',
      resize: true,
      barSpacing: '10',
      barColor: '#25a6f7'
    });
  }
  var sparkResize;
  $(window).resize(function (e) {
    clearTimeout(sparkResize);
    sparkResize = setTimeout(sparklineLogin, 500);
  });
  sparklineLogin();
});
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
$(function () {
  var spinTarget = document.getElementById('stats-container');

  function requestData(chart) {
    var spinner = new Spinner().spin(spinTarget);
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/mark/api"
    }).done(function (data) {
      for (i = 0; i < data.length; ++i) {
        data[i].week = moment().day("Monday").week(data[i].date).format('MMM Do');
      }
      chart.setData(data);
    }).fail(function () {
      alert("error occured");
    }).always(function () {
      spinner.stop();
    });
  }
  var chart = Morris.Bar({
    element: 'stats-container',
    data: [0, 0],
    xkey: 'week',
    ykeys: ['done', 'pending', 'rescheduled'],
    labels: ['Done', 'Still Pending', 'Rescheduled'],
    fillOpacity: 0.6,
    hideHover: 'auto',
    behaveLikeLine: true,
    resize: true,
    pointFillColors: ['#ffffff'],
    pointStrokeColors: ['black'],
    barColors: ['#fecd36', '#AB8CE4', '#01c0c8'],
    xLabelMargin: 2
  });
  requestData(chart);
});