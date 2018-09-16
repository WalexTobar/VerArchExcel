<html>
  <head>
	   <!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="css/stile.css">
	
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	
  </head>
  <body>
	  <header></header>
	  <main>
		  <div class="container">
			  <div class="row">
				  <div class="col s12">
				  <div id="personas" style="width: 100%;"></div>
				  </div>
			  </div>
		  </div>
	  </main>
	  <footer></footer>
	
	<script type="text/javascript">

		$(document).ready(function () {
			
		    //Prepare jTable
			$('#personas').jtable({
				//title: 'Empresas',
				paging: true,
				pageSize: 5,
				sorting: false,
				defaultSorting: 'Name ASC',
				actions: {
					listAction: 'controllerPersona.php?action=list',
					//createAction: 'controllerProductos.php?action=create',
					//updateAction: 'controllerProductos.php?action=update',
					//deleteAction: 'controllerProductos.php?action=delete'
				},
				fields: {
					//PersonId: {
						//key: true,
						//create: false,
						//edit: false,
						//list: false
					//},
					Name: {
						key:true,
						title: 'Proyecto',
						width: '40%'
					},
					Age: {
						title: 'Edad',
						width: '20%'
					},
					RecordDate: {
						title: 'calificación',
						width: '30%',
						//type: 'date',
						create: false,
						edit: false
					}
				}
			});
			$('table').addClass('striped responsive-table');
			//aplicar paginacion
			//$('.jtable-page-list span:only-child').addClass('btn');

			//Load person list from server
			$('#personas').jtable('load');

		});

	</script>
 
  </body>
</html>
