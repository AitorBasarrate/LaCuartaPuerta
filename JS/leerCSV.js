/*https://www.kaggle.com/rounakbanik/the-movies-dataset?select=movies_metadata.csv*/

/**
 * ajax eta erablita, .csv-ko eduki guztiak irakurtzen ditugu.
 */
$.ajax({
    url: '/Media/DB/movies_metadata.csv',
    dataType: 'text',
  }).done(csvIrakurri);
{}

  	
function csvIrakurri(data) {
  /**
   * Lerroak banatu
   */
    var allRows = data.split(/\r?\n|\r/);
/**
 * nahi dudan datua irakurtzen dut.
 */
    allRows.forEach(line => {
      var datuak = line.split(',')[0];
      console.log(datuak);
    });
    $.GET("/PHP/datuBaseaBete.php").success(function(response){
            sessionStorage.setItem("izenburuak", datuak);
      })
  }