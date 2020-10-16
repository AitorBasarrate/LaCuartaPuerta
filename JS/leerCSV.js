/*https://www.kaggle.com/rounakbanik/the-movies-dataset?select=movies_metadata.csv*/

/**
 * ajax eta jquery erablita, .csv-ko eduki guztiak irakurtzen ditugu.
 */
$.ajax({
    url: '/Media/DB/movies_metadata.csv',
    dataType: 'text',
  }).done(successFunction);


  	
function successFunction(data) {
  /**
   * Lerroak banatu
   */
    var allRows = data.split(/\r?\n|\r/);

    allRows.forEach(line => {
      datuak = line.split(',')[1];
      console.log(datuak);
    });

    }