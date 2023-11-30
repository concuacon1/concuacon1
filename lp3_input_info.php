<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->Html->css('/css/change_point/change_point_form2_lp3'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lp3/confirm_chargepoint_lp3.css">
    <title>input info</title>
</head>

<body>
    <div class="container">
        <div class="container__chargepoint-head_title" style="text-align: center; font-size: 28px">
            <span>チャージポイント返金</span>
        </div>

        <!-- contents -->
        <div class="container__info_form-title">
            <label class="p-form__label_lp3_lp3" for="name">ゆうちょ銀行口座情報入力</label>
            <hr class="line">
            <?php echo $this->Form->create($applyValidate, [
                'type' => 'post',
                'id' => 'change_point_form'
            ]); ?>
            <form action="">
                <fieldset class="p-form__item_lp3">
                    <label class="p-form__label_lp3" for="">金融機関名</label><br>
                    <span class="message_error form__btn-search-left" id="bank_name"></span>
                    <?php
                    echo $this->Form->control(
                        'bank_name',
                        array(
                            'type' => 'text',
                            'error' => false,
                            'required' => false,
                            'class' => 'input_field',
                            'placeholder' => "例）ゆうちょ銀行",
                            'label' => false,
                            'div' => false,
                            'id' => 'bankName',
                            'oninput' => 'searchBank(this.value)',
                            'pattern' => '[\p{Katakana}\p{Hiragana}]+',
                            'maxlength' => 100
                        )
                    ); ?>
                </fieldset>

                <fieldset class="p-form__item_lp3">
                    <label class="p-form__label_lp3" for="">記号</label><br>
                    <span class="message_error form__btn-search-left" id="symbol"></span>
                    <?php
                    echo $this->Form->control(
                        'code',
                        array(
                            'type' => 'number',
                            'error' => false,
                            'required' => false,
                            'class' => 'input_field',
                            'placeholder' => "例）12345",
                            'label' => false,
                            'div' => false,
                            'id' => 'symbol1',
                            'oninput' => 'inputValue(this.value)',
                            'maxlength' => 5,
                        )
                    ); ?>
                    <?php
                    echo $this->Form->control(
                        'code',
                        array(
                            'type' => 'number',
                            'error' => false,
                            'required' => false,
                            'class' => 'input_field',
                            'placeholder' => "例）1",
                            'label' => false,
                            'div' => false,
                            'id' => 'symbol2',
                            'oninput' => 'inputValue(this.value)',
                            'maxlength' => 1,
                        )
                    ); ?>
                </fieldset>
                <fieldset class="p-form__item_lp3">
                    <label class="p-form__label_lp3" for="">番号</label><br>
                    <span class="message_error form__btn-search-left" id="account_number"></span>
                    <?php
                    echo $this->Form->control(
                        'code',
                        array(
                            'type' => 'number',
                            'error' => false,
                            'required' => false,
                            'class' => 'input_field',
                            'placeholder' => "例）12345",
                            'label' => false,
                            'div' => false,
                            'id' => 'accountNumber',
                            'oninput' => 'inputValue(this.value)',
                            'maxlength' => 10,
                        )
                    ); ?>
                </fieldset>
                <fieldset class="p-form__item_lp3">
                    <label class="p-form__label_lp3" for="">口座名義カナ</label><br>
                    <span class="message_error form__btn-search-left" id="account_name"></span>
                    <?php
                    echo $this->Form->control(
                        'code',
                        array(
                            'type' => 'number',
                            'error' => false,
                            'required' => false,
                            'class' => 'input_field',
                            'placeholder' => " 例）リラクタロウ",
                            'label' => false,
                            'div' => false,
                            'id' => 'accountName',
                            'oninput' => 'inputValue(this.value)',
                            'pattern' => '[\p{Katakana}]+',
                            'maxlength' => 100,
                        )
                    ); ?>
                </fieldset>
                <fieldset class="p-form__item_lp3">
                    <label class="p-form__label_lp3" for="">お客様電話番号</label><br>
                    <span class="message_error form__btn-search-left" id="phone_number"></span>
                    <?php
                    echo $this->Form->control(
                        'code',
                        array(
                            'type' => 'number',
                            'error' => false,
                            'required' => false,
                            'class' => 'input_field',
                            'placeholder' => "例）09012348765",
                            'label' => false,
                            'div' => false,
                            'id' => 'phoneNumber',
                            'oninput' => 'inputValue(this.value)',
                            'maxlength' => 11,
                        )
                    ); ?>
                </fieldset>
                <div class="btn_next" style="margin-bottom: 30px; background-color: #000;">
                    <button type="submit" class="btn_next" id="btn_next_page">
                        <?php echo __('＞　次へ進む'); ?>
                    </button>
                </div>

                <div class="btn_back" style="margin-bottom: 50px; background-color: #898989;">
                    <button type="submit" class="btn_back" onclick="clickBtnBackPage()">
                        <?php echo __('＜ 前画面へ戻る'); ?>
                    </button>
                </div>
            </form>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- contents -->
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        // disable btn next.
        var btnNextPage = document.getElementById("btn_next_page");
        btnNextPage.disabled = true;
        btnNextPage.style.backgroundColor = '#545252';

        // check disable textfield
        var bankNameField = document.getElementById("bankName");
        var bankCodeField = document.getElementById("bankCode");
        var bankName = bankNameField.value.trim();
        var bankCode = bankCodeField.value.trim();

        if (bankName !== "" && bankCode !== "") {
            console.log("Both text fields have data.");
        } else {
            const branchName = document.getElementById('branchName');
            const branchCode = document.getElementById('branchCode');
            branchName.setAttribute('disabled', 'disabled');
            branchCode.setAttribute('disabled', 'disabled');
            $("#dropdown_bank_name").attr("disabled", true);
            $("#dropdown_branch_name").attr("disabled", true);
            console.log('-----disable branch name & dropd----before: ');
        }

        // check disable dropdown
        const dropdown = document.getElementById('dropdown_bank_name');
        if (dropdown.options.length === 0) {
            // disable text field branchname,code
            const branchName = document.getElementById('branchName');
            const branchCode = document.getElementById('branchCode');
            branchName.setAttribute('disabled', 'disabled');
            branchCode.setAttribute('disabled', 'disabled');
            $("#dropdown_branch_name").attr("disabled", true);

            console.log('Dropdown bank not value before');
        } else {
            //enbale text field branchname,code
            const branchName = document.getElementById('branchName');
            const branchCode = document.getElementById('branchCode');
            branchName.removeAttribute('disabled');
            branchCode.removeAttribute('disabled');

            console.log('Dropdown bank have value before');
        }

        $("#change_point_form").on('submit', function(e) {
            e.preventDefault();
            $('#bank_name').html('');
            $('#code').html('');
            $('#branch_name').html('');
            $('#branch_code').html('');
            $.ajax({
                type: 'post',
                url: "/usr/customers/search_bank_name_form2_lp3",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'Accept-Language': 'ja'
                },
                success: function(e) {
                    let data = JSON.parse(e)
                    console.log('--data---2: ', data.data);
                    if (data.status == true || data.status == 'true') {
                        window.location.href = '/usr/customers/refund_change_point_form2_lp3';
                    } else {
                        console.log('--data.error: ', data.error);

                        if (data.error.bank_name != undefined) {
                            console.log('--bank name----');

                            $("#bank_name").css("color", "red");
                            $('#bank_name').html(data.error.bank_name[0]);
                        }
                        console.log('--000000----');

                        if (data.error.code != undefined) {
                            console.log('--code----');

                            $("#code").css("color", "red");
                            $('#code').html(data.error.code[0]);
                        }
                        console.log('--1111111----');

                        if (data.error.branch_name != undefined) {
                            console.log('--branch name----');

                            $("#branch_name").css("color", "red");
                            $('#branch_name').html(data.error.branch_name[0]);
                        }
                        console.log('--2222222----');

                        if (data.error.branch_code != undefined) {
                            console.log('--branch code----');

                            $("#branch_code").css("color", "red");
                            $('#branch_code').html(data.error.branch_code[0]);
                        }
                        console.log('--33333333----');
                    }
                }
            });
        });

    });


    // click btn back page
    function clickBtnBackPage() {
        window.location.href = '/usr/customers/choose_form_bank_lp3'
    }

    function searchBank(str) {
        // var textField = event.target;
        // var inputValue = textField.value.trim();

        // var kanaPattern = /^[\p{Script=Hiragana}\p{Script=Katakana}\p{Script=Han}ー 　]*$/u;

        // if (!kanaPattern.test(inputValue)) {
        //     textField.value = inputValue.replace(/[^\p{Script=Hiragana}\p{Script=Katakana}\p{Script=Han}ー 　]/gu, '');
        // }

        // if (textField.value.length > 100) {
        //     textField.value = textField.value.slice(0, 100);
        // }
        console.log(str);
        document.getElementById("dropdown_bank_name").options.length = 0;
        bankName = document.getElementById("bankName").value;
        bankCode = document.getElementById("bankCode").value;
        console.log('--bankName--: ', bankName);
        console.log('--bankCode--: ', bankCode);
        viewportAjax = $.ajax({
            url: '/usr/customers/get_bank_name_form2_lp3',
            global: false,
            async: true, // call api as syncronized
            method: 'POST',
            data: {
                bankName,
                bankCode
            },
            success: function(result) {
                let returData = JSON.parse(result);
                console.log('--returData--: ', returData);
                let option = '';
                if (returData.data.length > 0) {
                    for (i = 0; i < returData.data.length; i++) {
                        option += '<option value="' + returData.data[i] + '">' + returData.data[i] + '</option>';
                    }
                    console.log('--option--: ', option);
                    $('#dropdown_bank_name').append(option);
                    $("#dropdown_bank_name").attr("disabled", false);

                    // check disable dropdown
                    const dropdown = document.getElementById('dropdown_bank_name');
                    console.log('--bankname have data after-: ');
                    if (dropdown.options.length === 0) {
                        // disable text field branchname,code
                        const branchName = document.getElementById('branchName');
                        const branchCode = document.getElementById('branchCode');
                        branchName.setAttribute('disabled', 'disabled');
                        branchCode.setAttribute('disabled', 'disabled');
                        $("#dropdown_branch_name").attr("disabled", true);

                        console.log('Dropdown bank not value after');
                    } else {
                        //enbale text field branchname,code
                        const branchName = document.getElementById('branchName');
                        const branchCode = document.getElementById('branchCode');
                        branchName.removeAttribute('disabled');
                        branchCode.removeAttribute('disabled');
                        console.log('Dropdown bank have value after');
                    }
                } else {
                    // disable text field branchname,code
                    const branchName = document.getElementById('branchName');
                    const branchCode = document.getElementById('branchCode');
                    branchName.setAttribute('disabled', 'disabled');
                    branchCode.setAttribute('disabled', 'disabled');
                    $("#dropdown_bank_name").attr("disabled", true);
                    $("#dropdown_branch_name").attr("disabled", true);

                    // disable btn next.
                    var btnNextPage = document.getElementById("btn_next_page");
                    btnNextPage.disabled = true;
                    btnNextPage.style.backgroundColor = '#545252';
                    console.log('----not data bank name----: ');
                }
            }
        });
    }

    function inputValue(str) {
        document.getElementById("dropdown_branch_name").options.length = 0;
        dropdownBankName = document.getElementById("dropdown_bank_name").value;
        branchName = document.getElementById("branchName").value;
        branchCode = document.getElementById("branchCode").value;
        console.log('---dropdown_bank_name--2: ', dropdownBankName);
        console.log('---branchName--2: ', branchName);
        console.log('---branchCode--2: ', branchCode);
        viewportAjax = $.ajax({
            url: '/usr/customers/get_branch_name_form2_lp3',
            global: false,
            async: true, // call api as syncronized
            method: 'POST',
            data: {
                dropdownBankName,
                branchName,
                branchCode
            },
            success: function(result) {
                let returData = JSON.parse(result);
                console.log('--returData--: ', returData);
                let option = '';
                if (returData.data.length > 0) {
                    for (i = 0; i < returData.data.length; i++) {
                        option += '<option value="' + returData.data[i] + '">' + returData.data[i] + '</option>';
                    }
                    console.log('--option--: ', option);
                    $('#dropdown_branch_name').append(option);

                    // check disable dropdown
                    const dropdownBank = document.getElementById('dropdown_bank_name');
                    const dropdownBranch = document.getElementById('dropdown_branch_name');
                    console.log('--dropdownBank-22 after-: ', dropdownBank.options.length);
                    console.log('--dropdownBranch-22 after-: ', dropdownBranch.options.length);
                    if (dropdownBank.options.length === 0 || dropdownBranch.options.length === 0) {
                        // disable btn next.
                        var btnNextPage = document.getElementById("btn_next_page");
                        btnNextPage.disabled = true;
                        btnNextPage.style.backgroundColor = '#545252';

                        console.log('Dropdown branch not value after');
                    } else {
                        //enbale dropdown branchname,code
                        $("#dropdown_branch_name").attr("disabled", false);

                        // enable btn next.
                        var btnNextPage = document.getElementById("btn_next_page");
                        btnNextPage.disabled = false;
                        btnNextPage.style.backgroundColor = '#0c0a0a';
                        console.log('Dropdown branch have value after');
                    }
                } else {
                    // disable dropdown branchname,code
                    $("#dropdown_branch_name").attr("disabled", true);

                    // disable btn next.
                    var btnNextPage = document.getElementById("btn_next_page");
                    btnNextPage.disabled = true;
                    btnNextPage.style.backgroundColor = '#545252';

                    console.log('------not data branch name--------: ');
                }
            }
        });
    }
</script>

</html>