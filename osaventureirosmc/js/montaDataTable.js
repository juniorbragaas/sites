$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tabela_dados thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+' Filtrar..." />' );
    } );
	 
	

 
    // DataTable
    var table = $('#tabela_dados').DataTable({  

	"scrollX": true,
	"language": {
                "url": "../../js/Portuguese-Brasil.json"
            }	
	});


	    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	$('#tabela_dados tbody').on( 'click', 'tr', function () {
		var d = table.row( this ).data().toString();
		var rowDados = d.split(',');
		document.getElementById("hdnId").value = rowDados[0];
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
		
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }


    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

} );
