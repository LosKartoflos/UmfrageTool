<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    // title der der Tablle (also die Fragestellung)
    var title = "bitte Titel der Tabelle einfügen";
    //array mit den antworten
    var answers = [['Antwort 1', 3],['Antwort 2', 1]];
    //anfangsstyle setzen bar/pie
    var chartStyle = "bar"
      //start setup

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Answer');
        data.addColumn('number', 'Anzahl');
        data.addRows(answers);

        // Set chart options
        var options = {'title':title,
                       'width':500,
                       'height':300,
                       'chartArea': {width:'60%'}
                     };

        // Instantiate and draw our chart, passing in some options. bar/pie in chartStyle ändern aussehen
        if (chartStyle == "pie")
        {
          var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        } 
        else if (chartStyle == "bar")
        {
          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        }
        
      }

      //wenn geklickt wechselt der Button switch diagramm die diagramm art
      function changeDiagramm(){
        if (chartStyle == "bar") {
          chartStyle = "pie"
          drawChart();
          document.getElementById("switch_diagramm_btn").innerHTML = "Wechsle zu Balkendiagramm";
        }
        else if (chartStyle == "pie") {
          chartStyle = "bar"
          drawChart();
          document.getElementById("switch_diagramm_btn").innerHTML = "Wechsle zu Tortendiagramm";
        }
      }



    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    <div>
      <button id="switch_diagramm_btn" class="btn btn-default" onClick="changeDiagramm()">Wechsle zu Tortendiagramm</button>
    </div>
  </body>
</html>