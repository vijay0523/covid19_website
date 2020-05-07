$( function() {
        $( '#cbp-qtrotator' ).cbpQTRotator();

      } );
window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer",
  {
    theme: "light2",
    title:{
      text: "Status now"
    },    
    data: [
    {       
      type: "pie",
      showInLegend: true,
      toolTipContent: "{y} - #percent %",
      legendText: "{indexLabel}",
      dataPoints: [
      <?php
      while(($row = $result4->fetch_row())!== null)
      {
        echo "{ y: {$row['0']}, label: '{$row['1']}' },";
      }
    ?>
      ]
    }
    ]
  });
  chart.render();
}

$( function() {
        $( '#cbp-qtrotator' ).cbpQTRotator();

      } );
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);