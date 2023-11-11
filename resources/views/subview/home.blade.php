
<div class="d-flex justify-content-center">
    <div class="col-md-9 mt-3 token-tables">
        <h1 class="text-center">Inventori Token Listrik Rumah</h1>

        {{-- ADD TOKEN FORM --}}
        <div class="add-token-form">
            <button class="btn btn-dark add-btn">+ Tambahkan Data</button>
            <button class="btn btn-secondary no-btn d-none">× Batalkan</button>
            <div class="add-container d-none">
                <form class="d-flex pt-3" action="add" method="post">
                    @csrf
                    <div class="col-sm-11">
                        <div class="row mb-3">
                            <label for="id" class="col-sm-2 col-form-label">Nomor Token: </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="tokenNumber" name="token_number" placeholder="0000 0000 0000 0000 0000">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tokenStatus" name="token_status">
                                <label class="form-check-label">
                                  Terpakai
                                </label>
                              </div>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Tanggal Beli: </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="purchasedDate" name="purchased_date">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="emailInput" class="col-sm-2 col-form-label">Harga (IDR):  </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="costInput" name="cost">
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- EDIT TOKEN FORM --}}
        <div class="edit-token-form d-none">
            <button class="btn btn-secondary no-edit-token-btn d-none">× Batalkan Ubah</button>
            <div class="edit-container">
                <form class="d-flex pt-3" action="put" method="post" id="edit-form" enctype="multipart/form-data">
                    {{-- <a id="edit-form-href" href="put">Text</a> --}}
                    @csrf
                    @method('PUT')
                    <div class="col-sm-11">
                        <div class="row mb-3">
                            <label for="id" class="col-sm-2 col-form-label">Nomor Token: </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="tokenNumberEdit" name="token_number" placeholder="0000 0000 0000 0000 0000">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tokenStatusEdit" name="token_status">
                                    <label class="form-check-label">Terpakai</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Tanggal Beli: </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="purchasedDateEdit" name="purchased_date">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="emailInput" class="col-sm-2 col-form-label">Harga (IDR):  </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="costInputEdit" name="cost">
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-info">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">ID.</th>
                    <th scope="col">Nomor Token</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Beli</th>
                    <th scope="col">Harga</th>
                    <th scope="col">.</th>
                </tr>
            </thead>
            <tbody class="token-table">
                @php
                    // $i = 1;
                    $cost = 0;
                @endphp
                @foreach ($electric_tokens as $item)
                    <tr class="table-fonts">
                        @if ($item->token_status == 0)
                            {{-- <td scope="col">{{ $i++ }}</td> --}}
                            <td scope="col">{{ $item->id }}</td>
                            <td scope="col">{{ chunk_split($item->token_number, 4, ' ') }}</td>
                            <td scope="col">Belum Terpakai</td>
                            <td scope="col">{{ $item->purchased_date }}</td>
                            <td scope="col">{{ $item->cost }}</td>
                        @else
                            {{-- <td scope="col" style="background-color: #FF7276;">{{ $i++ }}</td> --}}
                            <td scope="col" style="background-color: #FF7276;">{{ $item->id }}</td>
                            <td scope="col" style="background-color: #FF7276;">{{ chunk_split($item->token_number, 4, ' ') }}</td>
                            <td scope="col" style="background-color: #FF7276;">Terpakai</td>
                            <td scope="col" style="background-color: #FF7276;">{{ $item->purchased_date }}</td>
                            <td scope="col" style="background-color: #FF7276;">{{ $item->cost }}</td>
                        @endif
                        @php
                            $cost += $item->cost;
                        @endphp
                        <td scope="col">
                            <button class="btn btn-warning edit-btn" data-item-value="{{$item}}" data-action-name="edit">Ubah</button>
                            <button class="btn btn-danger del-btn" data-item-value="{{$item}}" data-action-name="del">Hapus</button>
                            <button class="btn btn-info info-btn"> ? </button>
                            {{-- <input type="hidden" name="item-id" id="item-id" value="{{$item->id}}">
                            <input type="text" name="item-id-text" id="item-id-text" value=""> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12 d-flex flex-row">
            <div class="col-md-6">
                {{ $electric_tokens->links() }}
                <button class="btn btn-dark add-balance-btn">+ Tambah Saldo</button>
                <button class="btn btn-secondary cancel-balance-btn d-none">× Batalkan</button>
                <div class="add-balance-form d-none mt-3">
                    <div class="row mb-3">
                            <div class="d-flex flex-row">
                                <div style="width: 90px;">
                                    <input type="text" class="form-control text-center" id="balance">
                                </div>
                                <div class="d-flex flex-row">
                                    <form action="add-balance" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Tambah Saldo</button>
                                        <input type="hidden" id="added-balance" name="balance" value="">
                                    </form>
                                    <form action="update-balance" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-info" style="margin-left: 10px;">Perbarui Saldo</button>
                                        <input type="hidden" id="updated-balance" name="balance" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <table class="balance-text">
                    <tr>
                        <td>Total Terbeli</td>
                        <td>:</td>
                        <td>{{ $cost }}</td>
                    </tr>
                    <tr>
                        <td>Saldo Masuk</td>
                        <td>:</td>
                        <td>{{ $amount }}</td>
                    </tr>
                    <tr>
                        @php
                            $left = $amount - $cost;
                        @endphp
                        @if ($left < 0)
                            <td style="color: red;">Saldo Kurang</td>
                            <td style="color: red;">:</td>
                            <td  style="color: red;">{{ $left }}</td>
                        @else
                            <td>Saldo Cukup</td>
                            <td>:</td>
                            <td>{{ $left }}</td>
                        @endif
                    </tr> 
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tokenStatusEdit').prop('checked', true);
        $('.add-btn').click(function(e) { 
            $('.add-btn').addClass('d-none');
            $('.no-btn').removeClass('d-none');
            $('.add-container').removeClass('d-none');
            e.preventDefault();
        });

        $('.no-btn').click(function(e) { 
            $('.add-btn').removeClass('d-none');
            $('.no-btn').addClass('d-none');
            $('.add-container').addClass('d-none');
            e.preventDefault();
        });

        $('.edit-btn').click(function(e) {
            $('.add-btn').addClass('d-none');
            $('.no-edit-token-btn').removeClass('d-none');
            $('.edit-token-form').removeClass('d-none');
            e.preventDefault();
        })

        $('.no-edit-token-btn').click(function(e) {
            $('.add-btn').removeClass('d-none');

            // $('.n').removeClass('d-none');
            $('.edit-token-form').addClass('d-none');
        });

        $('.add-balance-btn').click(function(e) { 
            $('.add-balance-btn').addClass('d-none');
            $('.cancel-balance-btn').removeClass('d-none');
            $('.add-balance-form').removeClass('d-none');
            e.preventDefault();
        });

        $('.cancel-balance-btn').click(function(e) { 
            $('.add-balance-btn').removeClass('d-none');
            $('.cancel-balance-btn').addClass('d-none');
            $('.add-balance-form').addClass('d-none');
            e.preventDefault();
        });

        $('#balance').on('change', function(e) {  
            $('#added-balance').val($(this).val());
            $('#updated-balance').val($(this).val());
            e.preventDefault();
        });

        
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#purchasedDate').val(today);

        $('.edit-btn, .del-btn').click(function(e) {
            var itemValue = $(this).data('item-value');
            var actionName = $(this).data('action-name');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // var buttonText = (actionName === 'edit' ? 'Edit' : 'Delete') + ' ID ' + itemValue.id;

            if (actionName === 'del') {
            // Send AJAX DELETE request
                $.ajax({
                    url: '/del/' + itemValue.id,
                    type: 'DELETE',
                    data: {
                        '_token': csrfToken,
                    },
                    success: function(result) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + status + " " + error);
                    }
                });
            } else if (actionName === 'edit') {
                $.ajax({
                    url: '/edit/' + itemValue.id,
                    type: 'GET',
                    success: function(data) {
                        $('#edit-form').attr('action', 'put/' + data.id);
                        // $('#edit-form-href').attr('href', 'put/' + data.id);

                        $('#tokenNumberEdit').val(data.token_number);
                        if (data.token_status === 0) {
                            $('#tokenStatusEdit').prop('checked', false);
                        }
                        else {
                            $('#tokenStatusEdit').prop('checked', true);
                        }
                        var dateParts = data.purchased_date.split(' ')[0].split('-');
                        let formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];
                        $('#purchasedDateEdit').val(formattedDate);
                        $('#costInputEdit').val(data.cost);
                    },
                    error: function(xhr, status, error) {
                        // Handle error (you might want to display a message to the user)
                        console.error("Error: " + status + " " + error);
                    }
                });
            }
            e.preventDefault();
            
            // Find the closest tr parent and then find the .info-btn within that row
            // $(this).closest('tr').find('.info-btn').text(buttonText);
        });
    });
</script>
<script>
    $(document).on('click', '.role-item', function() {
        let roleId = this.dataset.roleId;
        $('.role-toggle').text($(this).text());
        $('.role-input').val(roleId);
        $('.role-fk-hidden').val(roleId);
        event.preventDefault();
    });
</script>