$(document).ready(function() 
{


$.get( "index.php?r=ec-informe-semanal-total-ejecutivo/reporte-total-ejecutivo",
			function( data )
			{
				$("#example").html( data );
				
				setTimeout(function(){ crearDataTable(); }, 1000);
				
			},
		"json");


    
	
} );


function crearDataTable()
{
	$('#example').DataTable( {
		
		'aoColumnDefs': [
			
            {
                "render": function ( data, type, row ) 
				{
                    return data + '%';
                },
                "targets": 4,
            },
		    {
				"render": function ( data, type, row ) 
				{
					return data + '%';
				},
				"targets": 5,
            },

			{
				"render": function ( data, type, row ) 
				{
					return data + '%';
				},
				"targets": 6,
            },
			{
				"render": function ( data, type, row ) 
				{
					return data + '%';
				},
				"targets": 7,
            },
			
			{
				"render": function ( data, type, row ) 
				{
					return data + '%';
				},
				"targets": 8,
            },
		
        ],
		"scrollX": true,
		"scrollY": "350px",		
		
        "footerCallback": function ( row, data, start, end, display ) 
		{
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            },
			
		
				
            // Total over all pages
            total = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
					
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) 
				{
					
                    return intVal(a) + intVal(b);
                }, 0 );
 
 
			// Update footer
            $( api.column( 2 ).footer() ).html(
                pageTotal
				);
			
			
			
			  // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
 
			// Update footer
            $( api.column( 3 ).footer() ).html(
                pageTotal
				);
				
				
				
			  // Total over all pages
            total = api
			.column( 4 )
			.data()
			.reduce( function (a, b) 
			{
				
				return intVal(a) + intVal(b);
			}, 0 );

			// Total over this page
			pageTotal = api
			.column( 4, { page: 'current'} )
			.data()
			.reduce( function (a, b) 
			{
				
				return intVal(a) + intVal(b);
			},  0);
				
			// Update footer
            $( api.column( 4 ).footer() ).html(
                pageTotal 
            );
			
			    // Total over all pages
            total = api
                .column( 5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
           
			// Update footer
            $( api.column( 5 ).footer() ).html(
                pageTotal +'% (total '+ total +'%)'
            );	
				
			
			   // Total over all pages
            total = api
                .column( 6)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
           
			// Update footer
            $( api.column( 6 ).footer() ).html(
                pageTotal +'% (total '+ total +'%)'
            );
			

			// Total over all pages
            total = api
                .column( 7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
           
			// Update footer
            $( api.column( 7 ).footer() ).html(
                pageTotal +'% (total '+ total +'%)'
            );
			
		// Total over all pages
            total = api
                .column( 8)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
           
			// Update footer
            $( api.column( 8 ).footer() ).html(
                pageTotal +'% (total '+ total +'%)'
            );

			// Total over all pages
            total = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
 
			// Update footer
            $( api.column( 9 ).footer() ).html(
                pageTotal
            );			
			
			
			  // Total over all pages
            total = api
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
 
			// Update footer
            $( api.column( 10 ).footer() ).html(
                pageTotal
            );
			
			
          
        }
    } );
	
}
