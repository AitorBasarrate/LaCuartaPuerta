/*https://www.kaggle.com/rounakbanik/the-movies-dataset?select=movies_metadata.csv*/

/**
 * Datu Basera konexioa egiteko objetua eta dena prestatzen dugu.
 */
include(/PHP/dbKonexioa.php);

$konexioa = new konexioa("localhost", "lacuartapuerta", "root", "");

$hostPDO = "mysql:host=$KONEXIOA->hostDB;dbname=$nombreDB;";
$miPDO = new PDO($konexioa->hostPDO, $konexioa->usuarioDB, $konexioa->contrasenyaDB);
/**
 * ajax eta jquery erablita, .csv-ko eduki guztiak irakurtzen ditugu.
 */
$.ajax({
    url: 'movies_metadata.csv',
    dataType: 'text',
  }).done(successFunction);


  	
function successFunction(data) {
  /**
   * Lerroak banatu
   */
    var allRows = data.split(/\r?\n|\r/);
    var table = '<table>';
    /**
     * taulako izenburuak hartu
     */
    for (var singleRow = 0; singleRow < allRows.length; singleRow++) {
      if (singleRow === 0) {
        table += '<thead>';
        table += '<tr>';
      } else {
        table += '<tr>';
      }
      /**
       * taulan beste edukiak sartzen dira
       */
      var rowCells = allRows[singleRow].split(',');
      for (var rowCell = 0; rowCell < rowCells.length; rowCell++) { 
          table += rowCells[rowCell];
          table += rowCells[rowCell];
        }
      }
      if (singleRow === 0) {
        table += '</tr>';
        table += '</thead>';
        table += '<tbody>';
      } else {
        table += '</tr>';
      }
    } 
    table += '</tbody>';
    table += '</table>';
    $('body').append(table);
  }