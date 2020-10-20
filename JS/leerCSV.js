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
      console.log(line.split(',')[5]);
      sessionStorage.setItem('izenburuak', line.split(',')[0]);
      sessionStorage.setItem('generoa', line.split(',')[1]);
      sessionStorage.setItem('urtea', line.split(',')[7]);
    });
    
    
  }