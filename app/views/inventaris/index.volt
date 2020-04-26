{% extends 'templates/main.volt' %}

{% block content %}
    <h1 style='text-align:center'>Daftar Barang</h1>
    <table id="inventory-table" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <div>
        <a href="/inventaris/create" class="btn btn-success btn-block">Tambah</a>
    </div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/inventaris/update" method="post" id='updateform'>
                <input type="text" value="" name="id" id="id" hidden>
                <input type='hidden' name='{{ this.security.getTokenkey() }}' value='{{ this.security.getToken() }}'/>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control update-form" id="nama" name='nama' aria-describedby="nama" placeholder="" readonly>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control update-form" id="jumlah" name='jumlah' aria-describedby="jumlah" placeholder="" readonly>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea type="email" class="form-control  update-form" id="deskripsi" name='deskripsi' aria-describedby="deskripsi" placeholder="" readonly></textarea>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <div id='show-mode'>
            <button type="button" class="btn btn-secondary">Close</button>
            <button type="button" class="btn btn-info"  onClick='editMode()'>Update</button>
        </div>
        <div id='edit-mode' hidden>
            <button type="button" class="btn btn-secondary" onClick='showMode()'>Cancel</button>
            <button type="button" class="btn btn-primary" onClick='update()'>Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
{% endblock %}

{% block custom_js %}
<script>
    $(document).ready(function() {
        $('#inventory-table').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                'url': '/inventaris/ajaxDatatables',
                'dataType': 'json',
                'type': 'POST',
            },
            "columns": [
                { "data": "num", 'orderable': false},
                { "data": "nama" },
                { "data": "jumlah" },
                { "data": "action", 'orderable': false },
            ],
            "order": [[ 1, "asc" ]]
        } );
    } );

    function getData(id) {
        showMode();

        $.ajax({
            'url': '/inventaris/show/'+id,
            'dataType' : 'JSON',
            success: function(result) {
                $('#id').val(result.id)
                $('#nama').val(result.nama)
                $('#jumlah').val(result.jumlah)
                $('#deskripsi').val(result.deskripsi)
                $('#detailModal').modal('show')
            }
        });
    }

    function editMode() {
        $('.update-form').removeAttr('readonly');
        $('#edit-mode').removeAttr('hidden');
        $('#show-mode').prop('hidden',true);
    }

    function showMode() {
        $('.update-form').prop('readonly', true);
        $('#edit-mode').prop('hidden',true);
        $('#show-mode').removeAttr('hidden');
    }

    function update() {
        $('#updateform').submit();
    }
</script>
{% endblock %}
