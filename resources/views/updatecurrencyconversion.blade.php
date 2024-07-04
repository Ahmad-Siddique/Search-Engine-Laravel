<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Currency Conversion</title>
    @include('bootstraplink')

<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
.card {
  width: 500px;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
}
h2 {
  color: #007BFF;
  margin-bottom: 20px;
}
form {
  display: flex;
  flex-direction: column;
}
label {
  text-align: left;
  margin-bottom: 5px;
}
input, select {
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}
button {
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.switch {
  margin-top: 15px;
  font-size: 14px;
}
.switch a {
  color: #007BFF;
  text-decoration: none;
}
</style>

</head>
<body>
    @include('header')
    <div class="container">
        <div class="">
            <h2 class="mt-4 text-center">Update Currency Conversion</h2>
            <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Display Error Message -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="/postupdatecurrencyconversion/{{$data['id']}}">
                @csrf
                <input type="hidden" name="id" value="{{ $data['id'] }}" />
                <label for="currency" class="form-label">Currency Name</label>
                <select class="form-control" id="currency" name="currency">
                    <option value="">Select your Currency</option>
                    <option value="AED" {{ $data['currency'] == 'AED' ? 'selected' : '' }}>AED - United Arab Emirates Dirham</option>
                    <option value="AFN" {{ $data['currency'] == 'AFN' ? 'selected' : '' }}>AFN - Afghan Afghani</option>
                    <option value="ALL" {{ $data['currency'] == 'ALL' ? 'selected' : '' }}>ALL - Albanian Lek</option>
                    <option value="AMD" {{ $data['currency'] == 'AMD' ? 'selected' : '' }}>AMD - Armenian Dram</option>
                    <option value="ANG" {{ $data['currency'] == 'ANG' ? 'selected' : '' }}>ANG - Netherlands Antillean Guilder</option>
                    <option value="AOA" {{ $data['currency'] == 'AOA' ? 'selected' : '' }}>AOA - Angolan Kwanza</option>
                    <option value="ARS" {{ $data['currency'] == 'ARS' ? 'selected' : '' }}>ARS - Argentine Peso</option>
                    <option value="AUD" {{ $data['currency'] == 'AUD' ? 'selected' : '' }}>AUD - Australian Dollar</option>
                    <option value="AWG" {{ $data['currency'] == 'AWG' ? 'selected' : '' }}>AWG - Aruban Florin</option>
                    <option value="AZN" {{ $data['currency'] == 'AZN' ? 'selected' : '' }}>AZN - Azerbaijani Manat</option>
                    <option value="BAM" {{ $data['currency'] == 'BAM' ? 'selected' : '' }}>BAM - Bosnia-Herzegovina Convertible Mark</option>
                    <option value="BBD" {{ $data['currency'] == 'BBD' ? 'selected' : '' }}>BBD - Barbadian Dollar</option>
                    <option value="BDT" {{ $data['currency'] == 'BDT' ? 'selected' : '' }}>BDT - Bangladeshi Taka</option>
                    <option value="BGN" {{ $data['currency'] == 'BGN' ? 'selected' : '' }}>BGN - Bulgarian Lev</option>
                    <option value="BHD" {{ $data['currency'] == 'BHD' ? 'selected' : '' }}>BHD - Bahraini Dinar</option>
                    <option value="BIF" {{ $data['currency'] == 'BIF' ? 'selected' : '' }}>BIF - Burundian Franc</option>
                    <option value="BMD" {{ $data['currency'] == 'BMD' ? 'selected' : '' }}>BMD - Bermudian Dollar</option>
                    <option value="BND" {{ $data['currency'] == 'BND' ? 'selected' : '' }}>BND - Brunei Dollar</option>
                    <option value="BOB" {{ $data['currency'] == 'BOB' ? 'selected' : '' }}>BOB - Bolivian Boliviano</option>
                    <option value="BRL" {{ $data['currency'] == 'BRL' ? 'selected' : '' }}>BRL - Brazilian Real</option>
                    <option value="BSD" {{ $data['currency'] == 'BSD' ? 'selected' : '' }}>BSD - Bahamian Dollar</option>
                    <option value="BTN" {{ $data['currency'] == 'BTN' ? 'selected' : '' }}>BTN - Bhutanese Ngultrum</option>
                    <option value="BWP" {{ $data['currency'] == 'BWP' ? 'selected' : '' }}>BWP - Botswanan Pula</option>
                    <option value="BYN" {{ $data['currency'] == 'BYN' ? 'selected' : '' }}>BYN - Belarusian Ruble</option>
                    <option value="BZD" {{ $data['currency'] == 'BZD' ? 'selected' : '' }}>BZD - Belize Dollar</option>
                    <option value="CAD" {{ $data['currency'] == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                    <option value="CDF" {{ $data['currency'] == 'CDF' ? 'selected' : '' }}>CDF - Congolese Franc</option>
                    <option value="CHF" {{ $data['currency'] == 'CHF' ? 'selected' : '' }}>CHF - Swiss Franc</option>
                    <option value="CLP" {{ $data['currency'] == 'CLP' ? 'selected' : '' }}>CLP - Chilean Peso</option>
                    <option value="CNY" {{ $data['currency'] == 'CNY' ? 'selected' : '' }}>CNY - Chinese Yuan</option>
                    <option value="COP" {{ $data['currency'] == 'COP' ? 'selected' : '' }}>COP - Colombian Peso</option>
                    <option value="CRC" {{ $data['currency'] == 'CRC' ? 'selected' : '' }}>CRC - Costa Rican Colón</option>
                    <option value="CUP" {{ $data['currency'] == 'CUP' ? 'selected' : '' }}>CUP - Cuban Peso</option>
                    <option value="CVE" {{ $data['currency'] == 'CVE' ? 'selected' : '' }}>CVE - Cape Verdean Escudo</option>
                    <option value="CZK" {{ $data['currency'] == 'CZK' ? 'selected' : '' }}>CZK - Czech Republic Koruna</option>
                    <option value="DJF" {{ $data['currency'] == 'DJF' ? 'selected' : '' }}>DJF - Djiboutian Franc</option>
                    <option value="DKK" {{ $data['currency'] == 'DKK' ? 'selected' : '' }}>DKK - Danish Krone</option>
                    <option value="DOP" {{ $data['currency'] == 'DOP' ? 'selected' : '' }}>DOP - Dominican Peso</option>
                    <option value="DZD" {{ $data['currency'] == 'DZD' ? 'selected' : '' }}>DZD - Algerian Dinar</option>
                    <option value="EGP" {{ $data['currency'] == 'EGP' ? 'selected' : '' }}>EGP - Egyptian Pound</option>
                    <option value="ERN" {{ $data['currency'] == 'ERN' ? 'selected' : '' }}>ERN - Eritrean Nakfa</option>
                    <option value="ETB" {{ $data['currency'] == 'ETB' ? 'selected' : '' }}>ETB - Ethiopian Birr</option>
                    <option value="EUR" {{ $data['currency'] == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                    <option value="FJD" {{ $data['currency'] == 'FJD' ? 'selected' : '' }}>FJD - Fijian Dollar</option>
                    <option value="FKP" {{ $data['currency'] == 'FKP' ? 'selected' : '' }}>FKP - Falkland Islands Pound</option>
                    <option value="FOK" {{ $data['currency'] == 'FOK' ? 'selected' : '' }}>FOK - Faroese Króna</option>
                    <option value="GBP" {{ $data['currency'] == 'GBP' ? 'selected' : '' }}>GBP - British Pound Sterling</option>
                    <option value="GEL" {{ $data['currency'] == 'GEL' ? 'selected' : '' }}>GEL - Georgian Lari</option>
                    <option value="GGP" {{ $data['currency'] == 'GGP' ? 'selected' : '' }}>GGP - Guernsey Pound</option>
                    <option value="GHS" {{ $data['currency'] == 'GHS' ? 'selected' : '' }}>GHS - Ghanaian Cedi</option>
                    <option value="GIP" {{ $data['currency'] == 'GIP' ? 'selected' : '' }}>GIP - Gibraltar Pound</option>
                    <option value="GMD" {{ $data['currency'] == 'GMD' ? 'selected' : '' }}>GMD - Gambian Dalasi</option>
                    <option value="GNF" {{ $data['currency'] == 'GNF' ? 'selected' : '' }}>GNF - Guinean Franc</option>
                    <option value="GTQ" {{ $data['currency'] == 'GTQ' ? 'selected' : '' }}>GTQ - Guatemalan Quetzal</option>
                    <option value="GYD" {{ $data['currency'] == 'GYD' ? 'selected' : '' }}>GYD - Guyanaese Dollar</option>
                    <option value="HKD" {{ $data['currency'] == 'HKD' ? 'selected' : '' }}>HKD - Hong Kong Dollar</option>
                    <option value="HNL" {{ $data['currency'] == 'HNL' ? 'selected' : '' }}>HNL - Honduran Lempira</option>
                    <option value="HRK" {{ $data['currency'] == 'HRK' ? 'selected' : '' }}>HRK - Croatian Kuna</option>
                    <option value="HTG" {{ $data['currency'] == 'HTG' ? 'selected' : '' }}>HTG - Haitian Gourde</option>
                    <option value="HUF" {{ $data['currency'] == 'HUF' ? 'selected' : '' }}>HUF - Hungarian Forint</option>
                    <option value="IDR" {{ $data['currency'] == 'IDR' ? 'selected' : '' }}>IDR - Indonesian Rupiah</option>
                    <option value="ILS" {{ $data['currency'] == 'ILS' ? 'selected' : '' }}>ILS - Israeli New Sheqel</option>
                    <option value="IMP" {{ $data['currency'] == 'IMP' ? 'selected' : '' }}>IMP - Isle of Man Pound</option>
                    <option value="INR" {{ $data['currency'] == 'INR' ? 'selected' : '' }}>INR - Indian Rupee</option>
                    <option value="IQD" {{ $data['currency'] == 'IQD' ? 'selected' : '' }}>IQD - Iraqi Dinar</option>
                    <option value="IRR" {{ $data['currency'] == 'IRR' ? 'selected' : '' }}>IRR - Iranian Rial</option>
                    <option value="ISK" {{ $data['currency'] == 'ISK' ? 'selected' : '' }}>ISK - Icelandic Króna</option>
                    <option value="JEP" {{ $data['currency'] == 'JEP' ? 'selected' : '' }}>JEP - Jersey Pound</option>
                    <option value="JMD" {{ $data['currency'] == 'JMD' ? 'selected' : '' }}>JMD - Jamaican Dollar</option>
                    <option value="JOD" {{ $data['currency'] == 'JOD' ? 'selected' : '' }}>JOD - Jordanian Dinar</option>
                    <option value="JPY" {{ $data['currency'] == 'JPY' ? 'selected' : '' }}>JPY - Japanese Yen</option>
                    <option value="KES" {{ $data['currency'] == 'KES' ? 'selected' : '' }}>KES - Kenyan Shilling</option>
                    <option value="KGS" {{ $data['currency'] == 'KGS' ? 'selected' : '' }}>KGS - Kyrgystani Som</option>
                    <option value="KHR" {{ $data['currency'] == 'KHR' ? 'selected' : '' }}>KHR - Cambodian Riel</option>
                    <option value="KID" {{ $data['currency'] == 'KID' ? 'selected' : '' }}>KID - Kiribati Dollar</option>
                    <option value="KMF" {{ $data['currency'] == 'KMF' ? 'selected' : '' }}>KMF - Comorian Franc</option>
                    <option value="KRW" {{ $data['currency'] == 'KRW' ? 'selected' : '' }}>KRW - South Korean Won</option>
                    <option value="KWD" {{ $data['currency'] == 'KWD' ? 'selected' : '' }}>KWD - Kuwaiti Dinar</option>
                    <option value="KYD" {{ $data['currency'] == 'KYD' ? 'selected' : '' }}>KYD - Cayman Islands Dollar</option>
                    <option value="KZT" {{ $data['currency'] == 'KZT' ? 'selected' : '' }}>KZT - Kazakhstani Tenge</option>
                    <option value="LAK" {{ $data['currency'] == 'LAK' ? 'selected' : '' }}>LAK - Laotian Kip</option>
                    <option value="LBP" {{ $data['currency'] == 'LBP' ? 'selected' : '' }}>LBP - Lebanese Pound</option>
                    <option value="LKR" {{ $data['currency'] == 'LKR' ? 'selected' : '' }}>LKR - Sri Lankan Rupee</option>
                    <option value="LRD" {{ $data['currency'] == 'LRD' ? 'selected' : '' }}>LRD - Liberian Dollar</option>
                    <option value="LSL" {{ $data['currency'] == 'LSL' ? 'selected' : '' }}>LSL - Lesotho Loti</option>
                    <option value="LYD" {{ $data['currency'] == 'LYD' ? 'selected' : '' }}>LYD - Libyan Dinar</option>
                    <option value="MAD" {{ $data['currency'] == 'MAD' ? 'selected' : '' }}>MAD - Moroccan Dirham</option>
                    <option value="MDL" {{ $data['currency'] == 'MDL' ? 'selected' : '' }}>MDL - Moldovan Leu</option>
                    <option value="MGA" {{ $data['currency'] == 'MGA' ? 'selected' : '' }}>MGA - Malagasy Ariary</option>
                    <option value="MKD" {{ $data['currency'] == 'MKD' ? 'selected' : '' }}>MKD - Macedonian Denar</option>
                    <option value="MMK" {{ $data['currency'] == 'MMK' ? 'selected' : '' }}>MMK - Myanma Kyat</option>
                    <option value="MNT" {{ $data['currency'] == 'MNT' ? 'selected' : '' }}>MNT - Mongolian Tugrik</option>
                    <option value="MOP" {{ $data['currency'] == 'MOP' ? 'selected' : '' }}>MOP - Macanese Pataca</option>
                    <option value="MRU" {{ $data['currency'] == 'MRU' ? 'selected' : '' }}>MRU - Mauritanian Ouguiya</option>
                    <option value="MUR" {{ $data['currency'] == 'MUR' ? 'selected' : '' }}>MUR - Mauritian Rupee</option>
                    <option value="MVR" {{ $data['currency'] == 'MVR' ? 'selected' : '' }}>MVR - Maldivian Rufiyaa</option>
                    <option value="MWK" {{ $data['currency'] == 'MWK' ? 'selected' : '' }}>MWK - Malawian Kwacha</option>
                    <option value="MXN" {{ $data['currency'] == 'MXN' ? 'selected' : '' }}>MXN - Mexican Peso</option>
                    <option value="MYR" {{ $data['currency'] == 'MYR' ? 'selected' : '' }}>MYR - Malaysian Ringgit</option>
                    <option value="MZN" {{ $data['currency'] == 'MZN' ? 'selected' : '' }}>MZN - Mozambican Metical</option>
                    <option value="NAD" {{ $data['currency'] == 'NAD' ? 'selected' : '' }}>NAD - Namibian Dollar</option>
                    <option value="NGN" {{ $data['currency'] == 'NGN' ? 'selected' : '' }}>NGN - Nigerian Naira</option>
                    <option value="NIO" {{ $data['currency'] == 'NIO' ? 'selected' : '' }}>NIO - Nicaraguan Córdoba</option>
                    <option value="NOK" {{ $data['currency'] == 'NOK' ? 'selected' : '' }}>NOK - Norwegian Krone</option>
                    <option value="NPR" {{ $data['currency'] == 'NPR' ? 'selected' : '' }}>NPR - Nepalese Rupee</option>
                    <option value="NZD" {{ $data['currency'] == 'NZD' ? 'selected' : '' }}>NZD - New Zealand Dollar</option>
                    <option value="OMR" {{ $data['currency'] == 'OMR' ? 'selected' : '' }}>OMR - Omani Rial</option>
                    <option value="PAB" {{ $data['currency'] == 'PAB' ? 'selected' : '' }}>PAB - Panamanian Balboa</option>
                    <option value="PEN" {{ $data['currency'] == 'PEN' ? 'selected' : '' }}>PEN - Peruvian Sol</option>
                    <option value="PGK" {{ $data['currency'] == 'PGK' ? 'selected' : '' }}>PGK - Papua New Guinean Kina</option>
                    <option value="PHP" {{ $data['currency'] == 'PHP' ? 'selected' : '' }}>PHP - Philippine Peso</option>
                    <option value="PKR" {{ $data['currency'] == 'PKR' ? 'selected' : '' }}>PKR - Pakistani Rupee</option>
                    <option value="PLN" {{ $data['currency'] == 'PLN' ? 'selected' : '' }}>PLN - Polish Zloty</option>
                    <option value="PYG" {{ $data['currency'] == 'PYG' ? 'selected' : '' }}>PYG - Paraguayan Guarani</option>
                    <option value="QAR" {{ $data['currency'] == 'QAR' ? 'selected' : '' }}>QAR - Qatari Rial</option>
                    <option value="RON" {{ $data['currency'] == 'RON' ? 'selected' : '' }}>RON - Romanian Leu</option>
                    <option value="RSD" {{ $data['currency'] == 'RSD' ? 'selected' : '' }}>RSD - Serbian Dinar</option>
                    <option value="RUB" {{ $data['currency'] == 'RUB' ? 'selected' : '' }}>RUB - Russian Ruble</option>
                    <option value="RWF" {{ $data['currency'] == 'RWF' ? 'selected' : '' }}>RWF - Rwandan Franc</option>
                    <option value="SAR" {{ $data['currency'] == 'SAR' ? 'selected' : '' }}>SAR - Saudi Riyal</option>
                    <option value="SBD" {{ $data['currency'] == 'SBD' ? 'selected' : '' }}>SBD - Solomon Islands Dollar</option>
                    <option value="SCR" {{ $data['currency'] == 'SCR' ? 'selected' : '' }}>SCR - Seychellois Rupee</option>
                    <option value="SDG" {{ $data['currency'] == 'SDG' ? 'selected' : '' }}>SDG - Sudanese Pound</option>
                    <option value="SEK" {{ $data['currency'] == 'SEK' ? 'selected' : '' }}>SEK - Swedish Krona</option>
                    <option value="SGD" {{ $data['currency'] == 'SGD' ? 'selected' : '' }}>SGD - Singapore Dollar</option>
                    <option value="SHP" {{ $data['currency'] == 'SHP' ? 'selected' : '' }}>SHP - Saint Helena Pound</option>
                    <option value="SLL" {{ $data['currency'] == 'SLL' ? 'selected' : '' }}>SLL - Sierra Leonean Leone</option>
                    <option value="SOS" {{ $data['currency'] == 'SOS' ? 'selected' : '' }}>SOS - Somali Shilling</option>
                    <option value="SRD" {{ $data['currency'] == 'SRD' ? 'selected' : '' }}>SRD - Surinamese Dollar</option>
                    <option value="SSP" {{ $data['currency'] == 'SSP' ? 'selected' : '' }}>SSP - South Sudanese Pound</option>
                    <option value="STN" {{ $data['currency'] == 'STN' ? 'selected' : '' }}>STN - São Tomé and Príncipe Dobra</option>
                    <option value="SYP" {{ $data['currency'] == 'SYP' ? 'selected' : '' }}>SYP - Syrian Pound</option>
                    <option value="SZL" {{ $data['currency'] == 'SZL' ? 'selected' : '' }}>SZL - Swazi Lilangeni</option>
                    <option value="THB" {{ $data['currency'] == 'THB' ? 'selected' : '' }}>THB - Thai Baht</option>
                    <option value="TJS" {{ $data['currency'] == 'TJS' ? 'selected' : '' }}>TJS - Tajikistani Somoni</option>
                    <option value="TMT" {{ $data['currency'] == 'TMT' ? 'selected' : '' }}>TMT - Turkmenistani Manat</option>
                    <option value="TND" {{ $data['currency'] == 'TND' ? 'selected' : '' }}>TND - Tunisian Dinar</option>
                    <option value="TOP" {{ $data['currency'] == 'TOP' ? 'selected' : '' }}>TOP - Tongan Paʻanga</option>
                    <option value="TRY" {{ $data['currency'] == 'TRY' ? 'selected' : '' }}>TRY - Turkish Lira</option>
                    <option value="TTD" {{ $data['currency'] == 'TTD' ? 'selected' : '' }}>TTD - Trinidad and Tobago Dollar</option>
                    <option value="TVD" {{ $data['currency'] == 'TVD' ? 'selected' : '' }}>TVD - Tuvaluan Dollar</option>
                    <option value="TWD" {{ $data['currency'] == 'TWD' ? 'selected' : '' }}>TWD - New Taiwan Dollar</option>
                    <option value="TZS" {{ $data['currency'] == 'TZS' ? 'selected' : '' }}>TZS - Tanzanian Shilling</option>
                    <option value="UAH" {{ $data['currency'] == 'UAH' ? 'selected' : '' }}>UAH - Ukrainian Hryvnia</option>
                    <option value="UGX" {{ $data['currency'] == 'UGX' ? 'selected' : '' }}>UGX - Ugandan Shilling</option>
                    <option value="USD" {{ $data['currency'] == 'USD' ? 'selected' : '' }}>USD - United States Dollar</option>
                    <option value="UYU" {{ $data['currency'] == 'UYU' ? 'selected' : '' }}>UYU - Uruguayan Peso</option>
                    <option value="UZS" {{ $data['currency'] == 'UZS' ? 'selected' : '' }}>UZS - Uzbekistan Som</option>
                    <option value="VES" {{ $data['currency'] == 'VES' ? 'selected' : '' }}>VES - Venezuelan Bolívar Soberano</option>
                    <option value="VND" {{ $data['currency'] == 'VND' ? 'selected' : '' }}>VND - Vietnamese Đồng</option>
                    <option value="VUV" {{ $data['currency'] == 'VUV' ? 'selected' : '' }}>VUV - Vanuatu Vatu</option>
                    <option value="WST" {{ $data['currency'] == 'WST' ? 'selected' : '' }}>WST - Samoan Tālā</option>
                    <option value="XAF" {{ $data['currency'] == 'XAF' ? 'selected' : '' }}>XAF - Central African CFA Franc</option>
                    <option value="XCD" {{ $data['currency'] == 'XCD' ? 'selected' : '' }}>XCD - East Caribbean Dollar</option>
                    <option value="XDR" {{ $data['currency'] == 'XDR' ? 'selected' : '' }}>XDR - Special Drawing Rights</option>
                    <option value="XOF" {{ $data['currency'] == 'XOF' ? 'selected' : '' }}>XOF - West African CFA franc</option>
                    <option value="XPF" {{ $data['currency'] == 'XPF' ? 'selected' : '' }}>XPF - CFP Franc</option>
                    <option value="YER" {{ $data['currency'] == 'YER' ? 'selected' : '' }}>YER - Yemeni Rial</option>
                    <option value="ZAR" {{ $data['currency'] == 'ZAR' ? 'selected' : '' }}>ZAR - South African Rand</option>
                    <option value="ZMW" {{ $data['currency'] == 'ZMW' ? 'selected' : '' }}>ZMW - Zambian Kwacha</option>
                    <option value="ZWL" {{ $data['currency'] == 'ZWL' ? 'selected' : '' }}>ZWL - Zimbabwean Dollar</option>
                </select>

                <label for="price" class="form-label">Price</label>
                <input step="0.01" type="number" class="form-control" id="price" name="price" value="{{ $data['price'] }}" placeholder="Enter Price">
                <button class="mt-3" type="submit">Update</button>
            </form>
        </div>
    </div>
    @include('footer')
</body>
</html>
