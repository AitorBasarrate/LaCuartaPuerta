/*https://www.kaggle.com/rounakbanik/the-movies-dataset?select=movies_metadata.csv*/

/**
 * ajax eta erablita, .csv-ko eduki guztiak irakurtzen ditugu.
 */
$.ajax({
    url: 'Media/DB/movies_metadata.csv',
    dataType: 'text',
  }).done(csvIrakurri);

      // sessionStorage.setItem('izenburuak', line.split(',')[0]);
      // sessionStorage.setItem('generoa', line.split(',')[1]);
      // sessionStorage.setItem('urtea', line.split(',')[7]);
  	
function csvIrakurri(data) {
  /**
   * Lerroak banatu
   */
  
    var allRows = data.split(/\r?\n|\r/);
/**
 * nahi dudan datua irakurtzen dut.
 */
    allRows.forEach(line => {
      var izenburuak = (line.split(',')[0]);
      var generoa = (line.split(',')[1]);
      var rottenTomatoes = (line.split(',')[5]);
      var urtea = (line.split(',')[7]);
      
      // console.log(izenburuak);

      fetch('PHP/datuBaseaBete.php', {
      method: 'POST',
      body: izenburuak
      })
      .then(res => res.text())
      .then(data => console.log(data))
    });


    
    
  }