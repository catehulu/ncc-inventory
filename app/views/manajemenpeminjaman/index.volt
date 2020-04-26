{% extends 'templates/main.volt' %}

{% block custom_css %}
<style>
    td.details-control {
        background: url('img/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    tr.details td.details-control {
        background: url('img/details_close.png') no-repeat center center;
    }
</style>
{% endblock %}

{% block content %}
    <h1 style='text-align:center'>Daftar Peminjam</h1>
    <table id="peminjam-table" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <div>
        <a href="/manajemenpeminjaman/history" class="btn btn-success btn-block">History</a>
    </div>
{% endblock %}

{% block custom_js %}
<script>
    function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>NRP:</td>'+
            '<td>'+d.nrp+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Nama:</td>'+
            '<td>'+d.nama+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Email:</td>'+
            '<td>'+d.email+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>No Telepon:</td>'+
            '<td>'+d.no_telp+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Tanggal Pinjam:</td>'+
            '<td>'+d.tanggal_peminjaman+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Tanggal Pengembalian:</td>'+
            '<td>'+d.tanggal_pengembalian+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Deskripsi:</td>'+
            '<td>'+d.deskripsi+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Status:</td>'+
            '<td>'+d.status+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Barang:</td>'+
            '<td>'+d.inventaris+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Kode:</td>'+
            '<td>'+d.kode+'</td>'+
        '</tr>'+
    '</table>';
    }
    $(document).ready(function() {
        var dt = $('#peminjam-table').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                'url': '/manajemenpeminjaman/ajaxDatatables',
                'dataType': 'json',
                'type': 'POST',
            },
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "nrp" },
                { "data": "nama" },
                { "data": "inventaris" , 'orderable': false},
                { "data": "status", 'orderable': false },
                { "data": "action", 'orderable': false },
            ],
            "order": [[ 1, "asc" ]]
        } );
 
    // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#peminjam-table tbody').on( 'click', 'tr td.details-control', function () {
        
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
} );
</script>
{% endblock %}
