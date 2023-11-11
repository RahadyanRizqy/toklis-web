
<div class="d-flex justify-content-center">
    <div class="col-md-9 mt-3 token-tables">
        <div class="d-flex justify-content-center">
            <img src="https://seeklogo.com/images/T/the-spongebob-logo-27F781E89E-seeklogo.com.png" alt="the" srcset="">
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.add-btn').click(function (e) { 
            $('.add-btn').addClass('d-none');
            $('.no-btn').removeClass('d-none');
            $('#cancelstatus').text('Cancel exist');
            $('.token-form').removeClass('d-none');
            e.preventDefault();
        });

        $('.no-btn').click(function (e) { 
            $('.add-btn').removeClass('d-none');
            $('.no-btn').addClass('d-none');
            $('#cancelstatus').text('Add exist');
            $('.token-form').addClass('d-none');
            e.preventDefault();
        });

        $('.add-balance-btn').click(function (e) { 
            $('.add-balance-btn').addClass('d-none');
            $('.cancel-balance-btn').removeClass('d-none');
            $('.add-balance-form').removeClass('d-none');
            e.preventDefault();
        });

        $('.cancel-balance-btn').click(function (e) { 
            $('.add-balance-btn').removeClass('d-none');
            $('.cancel-balance-btn').addClass('d-none');
            $('.add-balance-form').addClass('d-none');
            e.preventDefault();
        });

        // $('.no-btn').click(function (e) {
        //     $('.add-btn').addClass('d-none');
        //     $('.no-btn').removeClass('d-none');
        //     e.preventDefault();
        // });
        // if ($('.no-btn').hasClass('d-none')) {
        //     $('#cancelstatus').text('Cancel exist');
        // }
        // else {
        //     $('#cancelstatus').text('Add exist');
        // }
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