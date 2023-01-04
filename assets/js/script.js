$(function() {
    $('#side-menu').metisMenu();
});
/* Date Picker */
$(function() {
    $('#date').datepicker({format: 'dd-mm-yyyy'});    
    $('#startDate').datepicker({format: 'dd-mm-yyyy'});    
    $('#endDate').datepicker({format: 'dd-mm-yyyy'});	
});

/* Time Picker */
$(function() {
    $('.incomeExpenseReport #startTime').timepicker();
    $('.incomeExpenseReport #endTime').timepicker();
});

/* ToolTip */
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

/* Modal Animation */
$(function () {
    /*('.modal').on('show.bs.modal', function (e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  flipInX  animated');
        $('#selectCustomerModal .modal .modal-dialog').attr('class', 'modal-dialog  flipInX  animated');
    })
    $('.modal').on('hide.bs.modal', function (e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  flipOutX  animated');
        $('#selectCustomerModal .modal .modal-dialog').attr('class', 'modal-dialog  flipOutX  animated');
    })*/
    $('.modal').on('show.bs.modal', function (e) {
        $('.modal .modal-dialog').addClass('flipInX  animated');
    })
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});

$(function(){
    $('#removeDisabledButton').click(function(){
        $('#removeDisabledButton').addClass('hidden');
        $('.addDisabled').removeClass('hidden');
        $('.removeDisabled').removeAttr('disabled', 'disabled');
    });
    $('#addDisabledButton').click(function(){
        $('#removeDisabledButton').removeClass('hidden');
        $('.addDisabled').addClass('hidden');
        $('.removeDisabled').attr('disabled', 'disabled');
    });
});

$(function(){
    $('#paymentTypeID').change(function(){
        if($(this).attr("value")=="2"){
            $('#supplierInfoID').removeClass('hidden');
            $('#clientInfoID').addClass('hidden');
        }else{
            $('#supplierInfoID').addClass('hidden');
            $('#clientInfoID').removeClass('hidden');
        }
    });
});

$(function(){
    $('.receivedPaidPaymentForm input[type="radio"]').click(function(){
        if($(this).attr("value")=="2"){
            $('.paymentDetails').removeClass('hidden');
        }else{
            $('.paymentDetails').addClass('hidden');
        }
    });
});

/*var ctx = document.getElementById("myChart1").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: 'Bar Chart',
            data: [6, 5, 4, 3, 2, 1],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var ctx = document.getElementById("myChart2").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
	labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		datasets: [
			{
				label: "Line Chart",
				fill: false,
				lineTension: 0.1,
				backgroundColor: "rgba(75,192,192,0.4)",
				borderColor: "rgb(54, 79, 107)",
				borderCapStyle: 'butt',
				borderDash: [],
				borderDashOffset: 0.0,
				borderJoinStyle: 'miter',
				pointBorderColor: "rgb(57, 91, 130)",
				pointBackgroundColor: '#fff',
				pointBorderWidth: 5,
				pointHoverRadius: 5,
				pointHoverBackgroundColor: "rgb(54, 79, 107)",
				pointHoverBorderColor: "rgba(75,192,192,1)",
				pointHoverBorderWidth: 1,
				pointRadius: 1,
				pointHitRadius: 10,
				data: [0, 2, 1, 4, 5, 3, 7],
			}
		]
	},
    options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
});
var ctx = document.getElementById("myChart3").getContext('2d');
var scatterChart = new Chart(ctx, {
    type: 'scatter',
    data: {
        datasets: [{
            label: 'Scatter Chart',
			backgroundColor: "rgba(75,192,192,0.4)",
			borderColor: "rgb(54, 79, 107)",
			borderCapStyle: 'butt',
            data: [{
                x: -10,
                y: 0
            }, {
                x: 0,
                y: 10
            }, {
                x: 10,
                y: 5
            }]
        }]
    },
    options: {
        scales: {
            xAxes: [{
                type: 'linear',
                position: 'bottom'
            }]
        }
    }
});
var ctx = document.getElementById("myChart4").getContext('2d');
let chart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
			backgroundColor: "rgba(75,192,192,0.4)",
			borderColor: "rgb(54, 79, 107)",
			borderCapStyle: 'butt',
            data: [1, 9, 2, 7, 0, 9]
        }],
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    min: 'January'
                }
            }]
        }
    }
});*/
