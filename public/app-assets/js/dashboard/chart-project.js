$(window).on("load", function () {
     var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
     $.ajax({
          url: base_url + '/project-chart',
          method: "GET",
          processData: false,
          contentType: false,
          success: function (res) {
               setChart(res);
          },
     });

     function setChart(dataResult) {
          Morris.Area({
               element: 'chart-project',
               data: dataResult,
               xkey: 'month',
               ykeys: ['order'],
               labels: ['Order'],
               // lineColors: ['#151658'],
               resize: true,
               xLabelFormat: function(x) {
                    var month = months[x.getMonth()];
                    return month;
                },
               dateFormat: function(x) {
                    var month = months[new Date(x).getMonth()];
                    return month;
                },
               behaveLikeLine: true,
               pointSize: 0,
               pointStrokeColors:['#ff425c'],
               smooth: true,
               gridLineColor: '#E4E7ED',
               numLines: 6,
               gridtextSize: 14,
               lineWidth: 0,
               fillOpacity: 0.9,
               hideHover: 'auto',
          });

          // Morris.Line({
          //      element: 'chart-project',
          //      data: dataResult,
          //      xkey: 'month',
          //      ykeys: ['order'],
          //      labels: ['Order'],
          //      xLabelFormat: function (x) {
          //           var month = months[x.x];
          //           return month;
          //      },
          //      dateFormat: function (x) {
          //           var month = months[new Date(x.x)];
          //           return month;
          //      },
          //      barGap: 4,
          //      barSizeRatio: 0.3,
          //      gridTextColor: '#bfbfbf',
          //      gridLineColor: '#E4E7ED',
          //      numLines: 5,
          //      gridtextSize: 14,
          //      resize: true,
          //      barColors: ['#151658'],
          //      hideHover: 'auto',
          // });

     }
});