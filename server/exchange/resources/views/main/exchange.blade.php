<head>
    <title>貨幣轉換器</title>
</head>
<!-- 貨幣轉換器 -->
<body>
    <form id="exchange">
        <h1>貨幣轉換器</h1>
        金額：<input type="text" id="amount" placeholder="請填寫貨幣金額" ><br/>
        原貨幣：
        @if (!empty($currencies))
            <select id="source" name="source">
                @foreach ($currencies as $currency)
                    <option value="{{ $currency ?? '' }}">
                        {{ $currency ?? '' }}
                    </option>
                @endforeach
            </select>
        @endif
        <br/>
        轉換成：
        @if (!empty($currencies))
            <select id="target" name="target">
                @foreach ($currencies as $currency)
                    <option value="{{ $currency ?? '' }}">
                        {{ $currency ?? '' }}
                    </option>
                @endforeach
            </select>
        @endif
        <br/>
        <a href="javascript:void(0);" id="submitPhone">轉換</a>
        <br/>
        金額為：<div id="res"></div>
    </form>
</body>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script>

    $(function () {

        // 填寫手機號碼頁 - 點選確認按鈕
        $('body').on('click', '#submitPhone', function (e) {
            e.preventDefault(); // 防止url連結被開啟

            let amount = $('#amount').val(); // 金額
            let source = $('#source').val(); // 原貨幣
            let target = $('#target').val(); // 轉換貨幣

            // 尚未選取原貨幣
            if (amount == '') {
                alert('請填寫金額！');
                return false;
            }

            // 尚未選取原貨幣
            if (source == '') {
                alert('請選擇原貨幣！');
                return false;
            }

            // 尚未選取轉換貨幣
            if (target == '') {
                alert('請選擇轉換貨幣！');
                return false;
            }

            exchangeRate(amount, source, target); // 轉換
        });
    });

    /*
    * 登入 API
    */
    function exchangeRate(amount, source, target) {

        axios.get('/api/exchange', { params: { amount: amount, source: source, target: target} })
            .then((res) => {
                if (res.data.return_code === '0000') {
                    $('#res').html(res.data.data.amount); // 塞入結算金額
                } else {
                    alert(res.data.msg); // 回傳錯誤訊息
                }
            })
            .catch((error) => {
                console.error(error)
            })
    }
</script>