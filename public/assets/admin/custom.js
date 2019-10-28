$(document).ready(function() {


  //####################################  PAGES SIDEBAR WIDGETS  ##################################

  $('#widgets-wrapper, #nav-order').sortable({
     scroll: false,
     appendTo: 'body', helper: 'clone', zIndex: 300,
     cancel: ".disable-sort-item"
   });
   // Enable input elements editing
   $('#nav-order').disableSelection();
   $('#nav-order').on('click dblclick', 'input, textarea', function(e){ $(this).focus(); });

   //----------- Display /Hide sidebar configs ------------
  $('[name="aside_active"]').change(function(e) {
    // If checked display the sidebar config
    if( $(this).is(':checked') ) {
      $('#sidebar-config').show();
    }
    // If unchecked : hide the sidebar config
    else {
      $('#sidebar-config').hide();
    }
  });

  //------------ Append new widgets to sidebar -----------
  $('#widget-selector').change(function(e) {
    var selectedId = $(this).val();
    var selectedTitle = $('#widget-selector option:selected').text();

    // Check if the widget already in the list
    if ( $('#widgets-wrapper').find('.sortable-div input[value="'+ selectedId +'"]').length == 0 ) {

      $('#widgets-wrapper').append('<li class="sortable-div">'
      + '<input type="hidden" name="widgets[]" value="'+selectedId+'">'
      + '<i class="icon icon-remove"></i>'
      + '<h1>'+ selectedTitle +'</h1>'
      + '</li>');

    }
  });

  //--------------- Remove widgets -----------------
  $('#widgets-wrapper').on('click', '.sortable-div:not(.disable-sort-item) .icon-remove', function(e) {
    $(this).closest('.sortable-div').fadeOut(300, function(){
      $(this).remove();
    });
  });

  //###########################################################################################

  //==================================== NEW CAR JS ==========================================
  // Disable / Enable car supplement fee
  $('.disable-suppl-fee').click(function(e){
      if($(this).is(':checked')) {
        $(this).closest('tr').find('input[type="number"]').prop('disabled',false);
      }
       else {
        $(this).closest('tr').find('input[type="number"]').prop('disabled',true);
      }
  });


  //################################  CAR RESERVATION CALCUL  #################################
  if( $('#car-reservation-calcul').length > 0 )
  {
    //--------  Get car supplements  ------------
    $('select[name="car_id"]').change(function(e){
      var car_id = $(this).val();
      $('#car-suppls-table').load("index.php?page=reservations&action=get-car-suppls",{car_id: car_id });
    });

    //----------  Calcul Reservation Price  -----------------
    var i = 0;

    function calcul_reservation_price()
    {
        var form = $('#car-reservation-calcul');

        $.ajax({
          url: 'index.php?page=reservations&action=get-reserv-total',
          type: 'POST',
          data: {
            pickup_date: form.find('input[name="pickup_date"]').val(),
            arrival_date: form.find('input[name="arrival_date"]').val(),
            pickup_place: form.find('select[name="pickup_place"]').val(),
            arrival_place: form.find('select[name="arrival_place"]').val(),
            car_id: form.find('select[name="car_id"]').val(),
            car_suppls: form.find('input[name="car_suppls[]"]').serialize()
          },
          success: function(total){
            $('input[name="price_total"]').val(total);
            // console.log(total);
          }
        });
    }

    $('#car-reservation-calcul').on('change', 'select[name="pickup_place"], select[name="arrival_place"], select[name="car_id"], input[type="checkbox"]', function(e){
      calcul_reservation_price();
    });

    $('input[name="pickup_date"], input[name="arrival_date"]').datepicker().on('changeDate', function(ev){
      calcul_reservation_price();
    });
  }
  //###########################################################################################



  //################################# SETTINGS / PAYMENT #####################################
  $('select#payment_methods').change(function(){

    if( $(this).find('option[value="transfer"]').is(':selected') ) {
      $('div.transfer_settings').show();
    } else {
      $('div.transfer_settings').hide();
    }

    if( $(this).find('option[value="paypal"]').is(':selected') ) {
      $('div.paypal_settings').show();
    } else {
      $('div.paypal_settings').hide();
    }

  });

  //#################### Visites Chart ######################
  if( $('.chart').length > 0 )
  {
		var $chart = $('.chart'),
        visits = $chart.data('visits'),
        reservs = $chart.data('reservs'),
        dayAxies = $chart.data('axies'),
        visitsChart = [],
        reservsChart = [],
        axiesChart = [];

    for(var i=0; i<7; i++) {
      visitsChart.push([ i, visits[i] ]);
      reservsChart.push([ i, reservs[i] ]);
      axiesChart.push([ i, dayAxies[i] ]);
    }


    $.plot( '.chart', [
      {
        label: "Visites",
        data: visitsChart
      },
      {
        label: "Réservations",
        data: reservsChart
      }
    ], {
        xaxis: {
          ticks: axiesChart
        },
        grid: {
  				hoverable: true,
  				clickable: true
  			}
    });

    $("<div id='tooltip'></div>").css({
  			position: "absolute",
  			display: "none",
  			border: "1px solid #fdd",
  			padding: "2px",
  			"background-color": "#f00",
  			opacity: 0.80
		}).appendTo("body");

    $(".chart").bind("plothover", function (event, pos, item) {
				if (item) {
					var x = item.datapoint[0].toFixed(0),
						y = item.datapoint[1].toFixed(0);

					$("#tooltip").html(item.series.label + " : " + y)
						.css({top: item.pageY+5, left: item.pageX+5})
						.fadeIn(200);
				} else {
					$("#tooltip").hide();
				}
		});

  }

  //#################### Country source traffic ######################
  if( $('#country-traffic-pie').length > 0)
  {
    var $pie = $('#country-traffic-pie');
    var countries = $pie.data('traffic');
    var data = [];

    $.each(countries, function(i, country){
      data.push({label: country['country'], data: country['times']});
    });


    var pie = $.plot('#country-traffic-pie', data, {
        series: {
            pie: {
                show: true,
                radius: 3/4,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: function(label, series){
                        console.log(series.percent);
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+(Math.round(series.percent * 10) /10)+'%</div>';
                    },
                    background: {
                        opacity: 0.5,
                        color: '#000'
                    }
                },
                innerRadius: 0.2
            },
  			legend: {
  				show: false
  			}
  		}
  	});
  }

  //#################### Featured Cars ######################
  if( $('#featured-cars').length > 0)
  {
    var $bar = $('#featured-cars');
    var cars = $bar.data('stats');
    var counts = [];
    var axiesChart = [];

    var car_name = '';
    $.each(cars, function(i, car) {
      counts.push([i, car.times ]);
      axiesChart.push([ i, car.name ]);
    });


    var data = [{
	    data: counts,
      bars: {
        show: true,
        barWidth: 0.4,
        order: 1,
      }
    }];


    var bar = $.plot("#featured-cars", data, {
  		legend: true,
      xaxis: {
        ticks: axiesChart
      },
      yaxis: {
				// ticks: 1,
				min: 0,
				tickDecimals: 0
			},
  	});
  }



});
