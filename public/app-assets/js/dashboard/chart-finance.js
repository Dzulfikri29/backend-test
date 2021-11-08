$(window).on("load", function(){
     $('#delivery-progress').perfectScrollbar({
         wheelPropagation: true
     });
     
     var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
     $.ajax({
          url: base_url+'/finance-chart',
          method: "GET",
          processData: false,
          contentType: false,
          success: function (res) {
               setChart(res);
          },
     });
     function setChart(dataResult) {      
          Morris.Line({
              element: 'finance-chart',
              data: dataResult,
              xkey: 'month',
              ykeys: ['expense', 'income'],
              labels: ['Pengeluaran', 'pemasukan'],
              xLabelFormat: function(x) {
                  var month = months[x.getMonth()];
                  return month;
              },
              dateFormat: function(x) {
                  var month = months[new Date(x).getMonth()];
                  return month;
              },
            resize: true,
              lineColors: ['#ff425c', '#151658']
          });
     }
 });