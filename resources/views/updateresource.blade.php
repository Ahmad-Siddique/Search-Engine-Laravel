<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 @include('pagetitle')
    @include('bootstraplink')

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
} */

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

        input {
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
            <h2 class="mt-4 text-center">Update Resource </h2>
            <form enctype="multipart/form-data" method="POST" action="/postupdateresource/{{ $data['id'] }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value={{ $data['id'] }} />
                <label for="username">CSI</label>
                <input type="text" class="form-control" value="<?php echo isset($data['CSI']) ? htmlspecialchars($data['CSI']) : ''; ?>" id="username" name="CSI"
                    placeholder="Enter CSI">

                <label for="password">Name</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Name']) ? htmlspecialchars($data['Name']) : ''; ?>" id="password" name="Name"
                    placeholder="Enter your Name">

                <label for="password" class="form-label">Qualification</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Qualification']) ? htmlspecialchars($data['Qualification']) : ''; ?>" id="password"
                    name="Qualification" placeholder="Enter your Qualification">

                <label for="password" class="form-label">Experience</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Experience']) ? htmlspecialchars($data['Experience']) : ''; ?>" id="password" name="Experience"
                    placeholder="Enter your Experience">

                <label for="password" class="form-label">Awards</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Awards']) ? htmlspecialchars($data['Awards']) : ''; ?>" id="password" name="Awards"
                    placeholder="Enter your Awards">


                <label for="currency" class="form-label">Currency</label>
<select class="form-control" id="currency" name="currency">
    <option value="">Select your Currency</option>
    <option value="AED" <?php echo isset($data['Currency']) && $data['Currency'] == 'AED' ? 'selected' : ''; ?>>AED - United Arab Emirates Dirham</option>
    <option value="AFN" <?php echo isset($data['Currency']) && $data['Currency'] == 'AFN' ? 'selected' : ''; ?>>AFN - Afghan Afghani</option>
    <option value="ALL" <?php echo isset($data['Currency']) && $data['Currency'] == 'ALL' ? 'selected' : ''; ?>>ALL - Albanian Lek</option>
    <option value="AMD" <?php echo isset($data['Currency']) && $data['Currency'] == 'AMD' ? 'selected' : ''; ?>>AMD - Armenian Dram</option>
    <option value="ANG" <?php echo isset($data['Currency']) && $data['Currency'] == 'ANG' ? 'selected' : ''; ?>>ANG - Netherlands Antillean Guilder</option>
    <option value="AOA" <?php echo isset($data['Currency']) && $data['Currency'] == 'AOA' ? 'selected' : ''; ?>>AOA - Angolan Kwanza</option>
    <option value="ARS" <?php echo isset($data['Currency']) && $data['Currency'] == 'ARS' ? 'selected' : ''; ?>>ARS - Argentine Peso</option>
    <option value="AUD" <?php echo isset($data['Currency']) && $data['Currency'] == 'AUD' ? 'selected' : ''; ?>>AUD - Australian Dollar</option>
    <option value="AWG" <?php echo isset($data['Currency']) && $data['Currency'] == 'AWG' ? 'selected' : ''; ?>>AWG - Aruban Florin</option>
    <option value="AZN" <?php echo isset($data['Currency']) && $data['Currency'] == 'AZN' ? 'selected' : ''; ?>>AZN - Azerbaijani Manat</option>
    <option value="BAM" <?php echo isset($data['Currency']) && $data['Currency'] == 'BAM' ? 'selected' : ''; ?>>BAM - Bosnia-Herzegovina Convertible Mark</option>
    <option value="BBD" <?php echo isset($data['Currency']) && $data['Currency'] == 'BBD' ? 'selected' : ''; ?>>BBD - Barbadian Dollar</option>
    <option value="BDT" <?php echo isset($data['Currency']) && $data['Currency'] == 'BDT' ? 'selected' : ''; ?>>BDT - Bangladeshi Taka</option>
    <option value="BGN" <?php echo isset($data['Currency']) && $data['Currency'] == 'BGN' ? 'selected' : ''; ?>>BGN - Bulgarian Lev</option>
    <option value="BHD" <?php echo isset($data['Currency']) && $data['Currency'] == 'BHD' ? 'selected' : ''; ?>>BHD - Bahraini Dinar</option>
    <option value="BIF" <?php echo isset($data['Currency']) && $data['Currency'] == 'BIF' ? 'selected' : ''; ?>>BIF - Burundian Franc</option>
    <option value="BMD" <?php echo isset($data['Currency']) && $data['Currency'] == 'BMD' ? 'selected' : ''; ?>>BMD - Bermudian Dollar</option>
    <option value="BND" <?php echo isset($data['Currency']) && $data['Currency'] == 'BND' ? 'selected' : ''; ?>>BND - Brunei Dollar</option>
    <option value="BOB" <?php echo isset($data['Currency']) && $data['Currency'] == 'BOB' ? 'selected' : ''; ?>>BOB - Bolivian Boliviano</option>
    <option value="BRL" <?php echo isset($data['Currency']) && $data['Currency'] == 'BRL' ? 'selected' : ''; ?>>BRL - Brazilian Real</option>
    <option value="BSD" <?php echo isset($data['Currency']) && $data['Currency'] == 'BSD' ? 'selected' : ''; ?>>BSD - Bahamian Dollar</option>
    <option value="BTN" <?php echo isset($data['Currency']) && $data['Currency'] == 'BTN' ? 'selected' : ''; ?>>BTN - Bhutanese Ngultrum</option>
    <option value="BWP" <?php echo isset($data['Currency']) && $data['Currency'] == 'BWP' ? 'selected' : ''; ?>>BWP - Botswanan Pula</option>
    <option value="BYN" <?php echo isset($data['Currency']) && $data['Currency'] == 'BYN' ? 'selected' : ''; ?>>BYN - Belarusian Ruble</option>
    <option value="BZD" <?php echo isset($data['Currency']) && $data['Currency'] == 'BZD' ? 'selected' : ''; ?>>BZD - Belize Dollar</option>
    <option value="CAD" <?php echo isset($data['Currency']) && $data['Currency'] == 'CAD' ? 'selected' : ''; ?>>CAD - Canadian Dollar</option>
    <option value="CDF" <?php echo isset($data['Currency']) && $data['Currency'] == 'CDF' ? 'selected' : ''; ?>>CDF - Congolese Franc</option>
    <option value="CHF" <?php echo isset($data['Currency']) && $data['Currency'] == 'CHF' ? 'selected' : ''; ?>>CHF - Swiss Franc</option>
    <option value="CLP" <?php echo isset($data['Currency']) && $data['Currency'] == 'CLP' ? 'selected' : ''; ?>>CLP - Chilean Peso</option>
    <option value="CNY" <?php echo isset($data['Currency']) && $data['Currency'] == 'CNY' ? 'selected' : ''; ?>>CNY - Chinese Yuan</option>
    <option value="COP" <?php echo isset($data['Currency']) && $data['Currency'] == 'COP' ? 'selected' : ''; ?>>COP - Colombian Peso</option>
    <option value="CRC" <?php echo isset($data['Currency']) && $data['Currency'] == 'CRC' ? 'selected' : ''; ?>>CRC - Costa Rican Colón</option>
    <option value="CUP" <?php echo isset($data['Currency']) && $data['Currency'] == 'CUP' ? 'selected' : ''; ?>>CUP - Cuban Peso</option>
    <option value="CVE" <?php echo isset($data['Currency']) && $data['Currency'] == 'CVE' ? 'selected' : ''; ?>>CVE - Cape Verdean Escudo</option>
    <option value="CZK" <?php echo isset($data['Currency']) && $data['Currency'] == 'CZK' ? 'selected' : ''; ?>>CZK - Czech Republic Koruna</option>
    <option value="DJF" <?php echo isset($data['Currency']) && $data['Currency'] == 'DJF' ? 'selected' : ''; ?>>DJF - Djiboutian Franc</option>
    <option value="DKK" <?php echo isset($data['Currency']) && $data['Currency'] == 'DKK' ? 'selected' : ''; ?>>DKK - Danish Krone</option>
    <option value="DOP" <?php echo isset($data['Currency']) && $data['Currency'] == 'DOP' ? 'selected' : ''; ?>>DOP - Dominican Peso</option>
    <option value="DZD" <?php echo isset($data['Currency']) && $data['Currency'] == 'DZD' ? 'selected' : ''; ?>>DZD - Algerian Dinar</option>
    <option value="EGP" <?php echo isset($data['Currency']) && $data['Currency'] == 'EGP' ? 'selected' : ''; ?>>EGP - Egyptian Pound</option>
    <option value="ERN" <?php echo isset($data['Currency']) && $data['Currency'] == 'ERN' ? 'selected' : ''; ?>>ERN - Eritrean Nakfa</option>
    <option value="ETB" <?php echo isset($data['Currency']) && $data['Currency'] == 'ETB' ? 'selected' : ''; ?>>ETB - Ethiopian Birr</option>
    <option value="EUR" <?php echo isset($data['Currency']) && $data['Currency'] == 'EUR' ? 'selected' : ''; ?>>EUR - Euro</option>
    <option value="FJD" <?php echo isset($data['Currency']) && $data['Currency'] == 'FJD' ? 'selected' : ''; ?>>FJD - Fijian Dollar</option>
    <option value="FKP" <?php echo isset($data['Currency']) && $data['Currency'] == 'FKP' ? 'selected' : ''; ?>>FKP - Falkland Islands Pound</option>
    <option value="FOK" <?php echo isset($data['Currency']) && $data['Currency'] == 'FOK' ? 'selected' : ''; ?>>FOK - Faroese Króna</option>
    <option value="GBP" <?php echo isset($data['Currency']) && $data['Currency'] == 'GBP' ? 'selected' : ''; ?>>GBP - British Pound Sterling</option>
    <option value="GEL" <?php echo isset($data['Currency']) && $data['Currency'] == 'GEL' ? 'selected' : ''; ?>>GEL - Georgian Lari</option>
    <option value="GGP" <?php echo isset($data['Currency']) && $data['Currency'] == 'GGP' ? 'selected' : ''; ?>>GGP - Guernsey Pound</option>
    <option value="GHS" <?php echo isset($data['Currency']) && $data['Currency'] == 'GHS' ? 'selected' : ''; ?>>GHS - Ghanaian Cedi</option>
    <option value="GIP" <?php echo isset($data['Currency']) && $data['Currency'] == 'GIP' ? 'selected' : ''; ?>>GIP - Gibraltar Pound</option>
    <option value="GMD" <?php echo isset($data['Currency']) && $data['Currency'] == 'GMD' ? 'selected' : ''; ?>>GMD - Gambian Dalasi</option>
    <option value="GNF" <?php echo isset($data['Currency']) && $data['Currency'] == 'GNF' ? 'selected' : ''; ?>>GNF - Guinean Franc</option>
    <option value="GTQ" <?php echo isset($data['Currency']) && $data['Currency'] == 'GTQ' ? 'selected' : ''; ?>>GTQ - Guatemalan Quetzal</option>
    <option value="GYD" <?php echo isset($data['Currency']) && $data['Currency'] == 'GYD' ? 'selected' : ''; ?>>GYD - Guyanaese Dollar</option>
    <option value="HKD" <?php echo isset($data['Currency']) && $data['Currency'] == 'HKD' ? 'selected' : ''; ?>>HKD - Hong Kong Dollar</option>
    <option value="HNL" <?php echo isset($data['Currency']) && $data['Currency'] == 'HNL' ? 'selected' : ''; ?>>HNL - Honduran Lempira</option>
    <option value="HRK" <?php echo isset($data['Currency']) && $data['Currency'] == 'HRK' ? 'selected' : ''; ?>>HRK - Croatian Kuna</option>
    <option value="HTG" <?php echo isset($data['Currency']) && $data['Currency'] == 'HTG' ? 'selected' : ''; ?>>HTG - Haitian Gourde</option>
    <option value="HUF" <?php echo isset($data['Currency']) && $data['Currency'] == 'HUF' ? 'selected' : ''; ?>>HUF - Hungarian Forint</option>
    <option value="IDR" <?php echo isset($data['Currency']) && $data['Currency'] == 'IDR' ? 'selected' : ''; ?>>IDR - Indonesian Rupiah</option>
    <option value="ILS" <?php echo isset($data['Currency']) && $data['Currency'] == 'ILS' ? 'selected' : ''; ?>>ILS - Israeli New Sheqel</option>
    <option value="IMP" <?php echo isset($data['Currency']) && $data['Currency'] == 'IMP' ? 'selected' : ''; ?>>IMP - Isle of Man Pound</option>
    <option value="INR" <?php echo isset($data['Currency']) && $data['Currency'] == 'INR' ? 'selected' : ''; ?>>INR - Indian Rupee</option>
    <option value="IQD" <?php echo isset($data['Currency']) && $data['Currency'] == 'IQD' ? 'selected' : ''; ?>>IQD - Iraqi Dinar</option>
    <option value="IRR" <?php echo isset($data['Currency']) && $data['Currency'] == 'IRR' ? 'selected' : ''; ?>>IRR - Iranian Rial</option>
    <option value="ISK" <?php echo isset($data['Currency']) && $data['Currency'] == 'ISK' ? 'selected' : ''; ?>>ISK - Icelandic Króna</option>
    <option value="JEP" <?php echo isset($data['Currency']) && $data['Currency'] == 'JEP' ? 'selected' : ''; ?>>JEP - Jersey Pound</option>
    <option value="JMD" <?php echo isset($data['Currency']) && $data['Currency'] == 'JMD' ? 'selected' : ''; ?>>JMD - Jamaican Dollar</option>
    <option value="JOD" <?php echo isset($data['Currency']) && $data['Currency'] == 'JOD' ? 'selected' : ''; ?>>JOD - Jordanian Dinar</option>
    <option value="JPY" <?php echo isset($data['Currency']) && $data['Currency'] == 'JPY' ? 'selected' : ''; ?>>JPY - Japanese Yen</option>
    <option value="KES" <?php echo isset($data['Currency']) && $data['Currency'] == 'KES' ? 'selected' : ''; ?>>KES - Kenyan Shilling</option>
    <option value="KGS" <?php echo isset($data['Currency']) && $data['Currency'] == 'KGS' ? 'selected' : ''; ?>>KGS - Kyrgystani Som</option>
    <option value="KHR" <?php echo isset($data['Currency']) && $data['Currency'] == 'KHR' ? 'selected' : ''; ?>>KHR - Cambodian Riel</option>
    <option value="KID" <?php echo isset($data['Currency']) && $data['Currency'] == 'KID' ? 'selected' : ''; ?>>KID - Kiribati Dollar</option>
    <option value="KMF" <?php echo isset($data['Currency']) && $data['Currency'] == 'KMF' ? 'selected' : ''; ?>>KMF - Comorian Franc</option>
    <option value="KRW" <?php echo isset($data['Currency']) && $data['Currency'] == 'KRW' ? 'selected' : ''; ?>>KRW - South Korean Won</option>
    <option value="KWD" <?php echo isset($data['Currency']) && $data['Currency'] == 'KWD' ? 'selected' : ''; ?>>KWD - Kuwaiti Dinar</option>
    <option value="KYD" <?php echo isset($data['Currency']) && $data['Currency'] == 'KYD' ? 'selected' : ''; ?>>KYD - Cayman Islands Dollar</option>
    <option value="KZT" <?php echo isset($data['Currency']) && $data['Currency'] == 'KZT' ? 'selected' : ''; ?>>KZT - Kazakhstani Tenge</option>
    <option value="LAK" <?php echo isset($data['Currency']) && $data['Currency'] == 'LAK' ? 'selected' : ''; ?>>LAK - Laotian Kip</option>
    <option value="LBP" <?php echo isset($data['Currency']) && $data['Currency'] == 'LBP' ? 'selected' : ''; ?>>LBP - Lebanese Pound</option>
    <option value="LKR" <?php echo isset($data['Currency']) && $data['Currency'] == 'LKR' ? 'selected' : ''; ?>>LKR - Sri Lankan Rupee</option>
    <option value="LRD" <?php echo isset($data['Currency']) && $data['Currency'] == 'LRD' ? 'selected' : ''; ?>>LRD - Liberian Dollar</option>
    <option value="LSL" <?php echo isset($data['Currency']) && $data['Currency'] == 'LSL' ? 'selected' : ''; ?>>LSL - Lesotho Loti</option>
    <option value="LYD" <?php echo isset($data['Currency']) && $data['Currency'] == 'LYD' ? 'selected' : ''; ?>>LYD - Libyan Dinar</option>
    <option value="MAD" <?php echo isset($data['Currency']) && $data['Currency'] == 'MAD' ? 'selected' : ''; ?>>MAD - Moroccan Dirham</option>
    <option value="MDL" <?php echo isset($data['Currency']) && $data['Currency'] == 'MDL' ? 'selected' : ''; ?>>MDL - Moldovan Leu</option>
    <option value="MGA" <?php echo isset($data['Currency']) && $data['Currency'] == 'MGA' ? 'selected' : ''; ?>>MGA - Malagasy Ariary</option>
    <option value="MKD" <?php echo isset($data['Currency']) && $data['Currency'] == 'MKD' ? 'selected' : ''; ?>>MKD - Macedonian Denar</option>
    <option value="MMK" <?php echo isset($data['Currency']) && $data['Currency'] == 'MMK' ? 'selected' : ''; ?>>MMK - Myanma Kyat</option>
    <option value="MNT" <?php echo isset($data['Currency']) && $data['Currency'] == 'MNT' ? 'selected' : ''; ?>>MNT - Mongolian Tugrik</option>
    <option value="MOP" <?php echo isset($data['Currency']) && $data['Currency'] == 'MOP' ? 'selected' : ''; ?>>MOP - Macanese Pataca</option>
    <option value="MRU" <?php echo isset($data['Currency']) && $data['Currency'] == 'MRU' ? 'selected' : ''; ?>>MRU - Mauritanian Ouguiya</option>
    <option value="MUR" <?php echo isset($data['Currency']) && $data['Currency'] == 'MUR' ? 'selected' : ''; ?>>MUR - Mauritian Rupee</option>
    <option value="MVR" <?php echo isset($data['Currency']) && $data['Currency'] == 'MVR' ? 'selected' : ''; ?>>MVR - Maldivian Rufiyaa</option>
    <option value="MWK" <?php echo isset($data['Currency']) && $data['Currency'] == 'MWK' ? 'selected' : ''; ?>>MWK - Malawian Kwacha</option>
    <option value="MXN" <?php echo isset($data['Currency']) && $data['Currency'] == 'MXN' ? 'selected' : ''; ?>>MXN - Mexican Peso</option>
    <option value="MYR" <?php echo isset($data['Currency']) && $data['Currency'] == 'MYR' ? 'selected' : ''; ?>>MYR - Malaysian Ringgit</option>
    <option value="MZN" <?php echo isset($data['Currency']) && $data['Currency'] == 'MZN' ? 'selected' : ''; ?>>MZN - Mozambican Metical</option>
    <option value="NAD" <?php echo isset($data['Currency']) && $data['Currency'] == 'NAD' ? 'selected' : ''; ?>>NAD - Namibian Dollar</option>
    <option value="NGN" <?php echo isset($data['Currency']) && $data['Currency'] == 'NGN' ? 'selected' : ''; ?>>NGN - Nigerian Naira</option>
    <option value="NIO" <?php echo isset($data['Currency']) && $data['Currency'] == 'NIO' ? 'selected' : ''; ?>>NIO - Nicaraguan Córdoba</option>
    <option value="NOK" <?php echo isset($data['Currency']) && $data['Currency'] == 'NOK' ? 'selected' : ''; ?>>NOK - Norwegian Krone</option>
    <option value="NPR" <?php echo isset($data['Currency']) && $data['Currency'] == 'NPR' ? 'selected' : ''; ?>>NPR - Nepalese Rupee</option>
    <option value="NZD" <?php echo isset($data['Currency']) && $data['Currency'] == 'NZD' ? 'selected' : ''; ?>>NZD - New Zealand Dollar</option>
    <option value="OMR" <?php echo isset($data['Currency']) && $data['Currency'] == 'OMR' ? 'selected' : ''; ?>>OMR - Omani Rial</option>
    <option value="PAB" <?php echo isset($data['Currency']) && $data['Currency'] == 'PAB' ? 'selected' : ''; ?>>PAB - Panamanian Balboa</option>
    <option value="PEN" <?php echo isset($data['Currency']) && $data['Currency'] == 'PEN' ? 'selected' : ''; ?>>PEN - Peruvian Sol</option>
    <option value="PGK" <?php echo isset($data['Currency']) && $data['Currency'] == 'PGK' ? 'selected' : ''; ?>>PGK - Papua New Guinean Kina</option>
    <option value="PHP" <?php echo isset($data['Currency']) && $data['Currency'] == 'PHP' ? 'selected' : ''; ?>>PHP - Philippine Peso</option>
    <option value="PKR" <?php echo isset($data['Currency']) && $data['Currency'] == 'PKR' ? 'selected' : ''; ?>>PKR - Pakistani Rupee</option>
    <option value="PLN" <?php echo isset($data['Currency']) && $data['Currency'] == 'PLN' ? 'selected' : ''; ?>>PLN - Polish Zloty</option>
    <option value="PYG" <?php echo isset($data['Currency']) && $data['Currency'] == 'PYG' ? 'selected' : ''; ?>>PYG - Paraguayan Guarani</option>
    <option value="QAR" <?php echo isset($data['Currency']) && $data['Currency'] == 'QAR' ? 'selected' : ''; ?>>QAR - Qatari Rial</option>
    <option value="RON" <?php echo isset($data['Currency']) && $data['Currency'] == 'RON' ? 'selected' : ''; ?>>RON - Romanian Leu</option>
    <option value="RSD" <?php echo isset($data['Currency']) && $data['Currency'] == 'RSD' ? 'selected' : ''; ?>>RSD - Serbian Dinar</option>
    <option value="RUB" <?php echo isset($data['Currency']) && $data['Currency'] == 'RUB' ? 'selected' : ''; ?>>RUB - Russian Ruble</option>
    <option value="RWF" <?php echo isset($data['Currency']) && $data['Currency'] == 'RWF' ? 'selected' : ''; ?>>RWF - Rwandan Franc</option>
    <option value="SAR" <?php echo isset($data['Currency']) && $data['Currency'] == 'SAR' ? 'selected' : ''; ?>>SAR - Saudi Riyal</option>
    <option value="SBD" <?php echo isset($data['Currency']) && $data['Currency'] == 'SBD' ? 'selected' : ''; ?>>SBD - Solomon Islands Dollar</option>
    <option value="SCR" <?php echo isset($data['Currency']) && $data['Currency'] == 'SCR' ? 'selected' : ''; ?>>SCR - Seychellois Rupee</option>
    <option value="SDG" <?php echo isset($data['Currency']) && $data['Currency'] == 'SDG' ? 'selected' : ''; ?>>SDG - Sudanese Pound</option>
    <option value="SEK" <?php echo isset($data['Currency']) && $data['Currency'] == 'SEK' ? 'selected' : ''; ?>>SEK - Swedish Krona</option>
    <option value="SGD" <?php echo isset($data['Currency']) && $data['Currency'] == 'SGD' ? 'selected' : ''; ?>>SGD - Singapore Dollar</option>
    <option value="SHP" <?php echo isset($data['Currency']) && $data['Currency'] == 'SHP' ? 'selected' : ''; ?>>SHP - Saint Helena Pound</option>
    <option value="SLL" <?php echo isset($data['Currency']) && $data['Currency'] == 'SLL' ? 'selected' : ''; ?>>SLL - Sierra Leonean Leone</option>
    <option value="SOS" <?php echo isset($data['Currency']) && $data['Currency'] == 'SOS' ? 'selected' : ''; ?>>SOS - Somali Shilling</option>
    <option value="SRD" <?php echo isset($data['Currency']) && $data['Currency'] == 'SRD' ? 'selected' : ''; ?>>SRD - Surinamese Dollar</option>
    <option value="SSP" <?php echo isset($data['Currency']) && $data['Currency'] == 'SSP' ? 'selected' : ''; ?>>SSP - South Sudanese Pound</option>
    <option value="STN" <?php echo isset($data['Currency']) && $data['Currency'] == 'STN' ? 'selected' : ''; ?>>STN - São Tomé and Príncipe Dobra</option>
    <option value="SYP" <?php echo isset($data['Currency']) && $data['Currency'] == 'SYP' ? 'selected' : ''; ?>>SYP - Syrian Pound</option>
    <option value="SZL" <?php echo isset($data['Currency']) && $data['Currency'] == 'SZL' ? 'selected' : ''; ?>>SZL - Swazi Lilangeni</option>
    <option value="THB" <?php echo isset($data['Currency']) && $data['Currency'] == 'THB' ? 'selected' : ''; ?>>THB - Thai Baht</option>
    <option value="TJS" <?php echo isset($data['Currency']) && $data['Currency'] == 'TJS' ? 'selected' : ''; ?>>TJS - Tajikistani Somoni</option>
    <option value="TMT" <?php echo isset($data['Currency']) && $data['Currency'] == 'TMT' ? 'selected' : ''; ?>>TMT - Turkmenistani Manat</option>
    <option value="TND" <?php echo isset($data['Currency']) && $data['Currency'] == 'TND' ? 'selected' : ''; ?>>TND - Tunisian Dinar</option>
    <option value="TOP" <?php echo isset($data['Currency']) && $data['Currency'] == 'TOP' ? 'selected' : ''; ?>>TOP - Tongan Paʻanga</option>
    <option value="TRY" <?php echo isset($data['Currency']) && $data['Currency'] == 'TRY' ? 'selected' : ''; ?>>TRY - Turkish Lira</option>
    <option value="TTD" <?php echo isset($data['Currency']) && $data['Currency'] == 'TTD' ? 'selected' : ''; ?>>TTD - Trinidad and Tobago Dollar</option>
    <option value="TVD" <?php echo isset($data['Currency']) && $data['Currency'] == 'TVD' ? 'selected' : ''; ?>>TVD - Tuvaluan Dollar</option>
    <option value="TWD" <?php echo isset($data['Currency']) && $data['Currency'] == 'TWD' ? 'selected' : ''; ?>>TWD - New Taiwan Dollar</option>
    <option value="TZS" <?php echo isset($data['Currency']) && $data['Currency'] == 'TZS' ? 'selected' : ''; ?>>TZS - Tanzanian Shilling</option>
    <option value="UAH" <?php echo isset($data['Currency']) && $data['Currency'] == 'UAH' ? 'selected' : ''; ?>>UAH - Ukrainian Hryvnia</option>
    <option value="UGX" <?php echo isset($data['Currency']) && $data['Currency'] == 'UGX' ? 'selected' : ''; ?>>UGX - Ugandan Shilling</option>
    <option value="USD" <?php echo isset($data['Currency']) && $data['Currency'] == 'USD' ? 'selected' : ''; ?>>USD - United States Dollar</option>
    <option value="UYU" <?php echo isset($data['Currency']) && $data['Currency'] == 'UYU' ? 'selected' : ''; ?>>UYU - Uruguayan Peso</option>
    <option value="UZS" <?php echo isset($data['Currency']) && $data['Currency'] == 'UZS' ? 'selected' : ''; ?>>UZS - Uzbekistan Som</option>
    <option value="VES" <?php echo isset($data['Currency']) && $data['Currency'] == 'VES' ? 'selected' : ''; ?>>VES - Venezuelan Bolívar Soberano</option>
    <option value="VND" <?php echo isset($data['Currency']) && $data['Currency'] == 'VND' ? 'selected' : ''; ?>>VND - Vietnamese Đồng</option>
    <option value="VUV" <?php echo isset($data['Currency']) && $data['Currency'] == 'VUV' ? 'selected' : ''; ?>>VUV - Vanuatu Vatu</option>
    <option value="WST" <?php echo isset($data['Currency']) && $data['Currency'] == 'WST' ? 'selected' : ''; ?>>WST - Samoan Tālā</option>
    <option value="XAF" <?php echo isset($data['Currency']) && $data['Currency'] == 'XAF' ? 'selected' : ''; ?>>XAF - Central African CFA Franc</option>
    <option value="XCD" <?php echo isset($data['Currency']) && $data['Currency'] == 'XCD' ? 'selected' : ''; ?>>XCD - East Caribbean Dollar</option>
    <option value="XDR" <?php echo isset($data['Currency']) && $data['Currency'] == 'XDR' ? 'selected' : ''; ?>>XDR - Special Drawing Rights</option>
    <option value="XOF" <?php echo isset($data['Currency']) && $data['Currency'] == 'XOF' ? 'selected' : ''; ?>>XOF - West African CFA franc</option>
    <option value="XPF" <?php echo isset($data['Currency']) && $data['Currency'] == 'XPF' ? 'selected' : ''; ?>>XPF - CFP Franc</option>
    <option value="YER" <?php echo isset($data['Currency']) && $data['Currency'] == 'YER' ? 'selected' : ''; ?>>YER - Yemeni Rial</option>
    <option value="ZAR" <?php echo isset($data['Currency']) && $data['Currency'] == 'ZAR' ? 'selected' : ''; ?>>ZAR - South African Rand</option>
    <option value="ZMW" <?php echo isset($data['Currency']) && $data['Currency'] == 'ZMW' ? 'selected' : ''; ?>>ZMW - Zambian Kwacha</option>
    <option value="ZWL" <?php echo isset($data['Currency']) && $data['Currency'] == 'ZWL' ? 'selected' : ''; ?>>ZWL - Zimbabwean Dollar</option>
</select>


                <label for="password" class="form-label">Photo</label>
                <input type="file" class="form-control" value="<?php echo isset($data['Photo']) ? htmlspecialchars($data['Photo']) : ''; ?>" id="password" name="Photo"
                    placeholder="Enter your Photo">

                <label for="password" class="form-label">Notes</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Notes']) ? htmlspecialchars($data['Notes']) : ''; ?>" id="password" name="Notes"
                    placeholder="Enter your Notes">

                <label for="password" class="form-label">Engagement Type</label>
                 <select class="form-control" id="Engagement_Type" name="Engagement_Type">

                    <option value="Full Time" <?php echo isset($data['Engagement']) && $data['Engagement'] == 'Full Time' ? 'selected' : ''; ?>>Full Time</option>
                    <option value="Part Time" <?php echo isset($data['Engagement']) && $data['Engagement'] == 'Part Time' ? 'selected' : ''; ?>>Part Time</option>
                    <option value="Free Lancer" <?php echo isset($data['Engagement']) && $data['Engagement'] == 'Free Lancer' ? 'selected' : ''; ?>>Free Lancer</option>

                </select>

                <label for="password" class="form-label">Availability</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Availability']) ? htmlspecialchars($data['Availability']) : ''; ?>" id="password"
                    name="Availability" placeholder="Enter your Availability">

                <label for="password" class="form-label">Location</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Location']) ? htmlspecialchars($data['Location']) : ''; ?>" id="password" name="Location"
                    placeholder="Enter your Location">

               <label for="nationality" class="form-label">Nationality</label>
<select class="form-control" id="nationality" name="nationality">
    <option value="">Select your Nationality</option>
    <option value="Afghanistan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Afghanistan' ? 'selected' : ''; ?>>Afghanistan</option>
    <option value="Albania" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Albania' ? 'selected' : ''; ?>>Albania</option>
    <option value="Algeria" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Algeria' ? 'selected' : ''; ?>>Algeria</option>
    <option value="Andorra" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Andorra' ? 'selected' : ''; ?>>Andorra</option>
    <option value="Angola" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Angola' ? 'selected' : ''; ?>>Angola</option>
    <option value="Antigua and Barbuda" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Antigua and Barbuda' ? 'selected' : ''; ?>>Antigua and Barbuda</option>
    <option value="Argentina" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Argentina' ? 'selected' : ''; ?>>Argentina</option>
    <option value="Armenia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Armenia' ? 'selected' : ''; ?>>Armenia</option>
    <option value="Australia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Australia' ? 'selected' : ''; ?>>Australia</option>
    <option value="Austria" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Austria' ? 'selected' : ''; ?>>Austria</option>
    <option value="Azerbaijan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Azerbaijan' ? 'selected' : ''; ?>>Azerbaijan</option>
    <option value="Bahamas" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Bahamas' ? 'selected' : ''; ?>>Bahamas</option>
    <option value="Bahrain" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Bahrain' ? 'selected' : ''; ?>>Bahrain</option>
    <option value="Bangladesh" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Bangladesh' ? 'selected' : ''; ?>>Bangladesh</option>
    <option value="Barbados" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Barbados' ? 'selected' : ''; ?>>Barbados</option>
    <option value="Belarus" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Belarus' ? 'selected' : ''; ?>>Belarus</option>
    <option value="Belgium" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Belgium' ? 'selected' : ''; ?>>Belgium</option>
    <option value="Belize" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Belize' ? 'selected' : ''; ?>>Belize</option>
    <option value="Benin" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Benin' ? 'selected' : ''; ?>>Benin</option>
    <option value="Bhutan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Bhutan' ? 'selected' : ''; ?>>Bhutan</option>
    <option value="Bolivia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Bolivia' ? 'selected' : ''; ?>>Bolivia</option>
    <option value="Bosnia and Herzegovina" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Bosnia and Herzegovina' ? 'selected' : ''; ?>>Bosnia and Herzegovina</option>
    <option value="Botswana" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Botswana' ? 'selected' : ''; ?>>Botswana</option>
    <option value="Brazil" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Brazil' ? 'selected' : ''; ?>>Brazil</option>
    <option value="Brunei" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Brunei' ? 'selected' : ''; ?>>Brunei</option>
    <option value="Bulgaria" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Bulgaria' ? 'selected' : ''; ?>>Bulgaria</option>
    <option value="Burkina Faso" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Burkina Faso' ? 'selected' : ''; ?>>Burkina Faso</option>
    <option value="Burundi" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Burundi' ? 'selected' : ''; ?>>Burundi</option>
    <option value="Cabo Verde" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Cabo Verde' ? 'selected' : ''; ?>>Cabo Verde</option>
    <option value="Cambodia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Cambodia' ? 'selected' : ''; ?>>Cambodia</option>
    <option value="Cameroon" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Cameroon' ? 'selected' : ''; ?>>Cameroon</option>
    <option value="Canada" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Canada' ? 'selected' : ''; ?>>Canada</option>
    <option value="Central African Republic" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Central African Republic' ? 'selected' : ''; ?>>Central African Republic</option>
    <option value="Chad" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Chad' ? 'selected' : ''; ?>>Chad</option>
    <option value="Chile" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Chile' ? 'selected' : ''; ?>>Chile</option>
    <option value="China" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'China' ? 'selected' : ''; ?>>China</option>
    <option value="Colombia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Colombia' ? 'selected' : ''; ?>>Colombia</option>
    <option value="Comoros" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Comoros' ? 'selected' : ''; ?>>Comoros</option>
    <option value="Congo, Democratic Republic of the" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Congo, Democratic Republic of the' ? 'selected' : ''; ?>>Congo, Democratic Republic of the</option>
    <option value="Congo, Republic of the" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Congo, Republic of the' ? 'selected' : ''; ?>>Congo, Republic of the</option>
    <option value="Costa Rica" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Costa Rica' ? 'selected' : ''; ?>>Costa Rica</option>
    <option value="Croatia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Croatia' ? 'selected' : ''; ?>>Croatia</option>
    <option value="Cuba" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Cuba' ? 'selected' : ''; ?>>Cuba</option>
    <option value="Cyprus" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Cyprus' ? 'selected' : ''; ?>>Cyprus</option>
    <option value="Czech Republic" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Czech Republic' ? 'selected' : ''; ?>>Czech Republic</option>
    <option value="Denmark" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Denmark' ? 'selected' : ''; ?>>Denmark</option>
    <option value="Djibouti" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Djibouti' ? 'selected' : ''; ?>>Djibouti</option>
    <option value="Dominica" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Dominica' ? 'selected' : ''; ?>>Dominica</option>
    <option value="Dominican Republic" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Dominican Republic' ? 'selected' : ''; ?>>Dominican Republic</option>
    <option value="Ecuador" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Ecuador' ? 'selected' : ''; ?>>Ecuador</option>
    <option value="Egypt" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Egypt' ? 'selected' : ''; ?>>Egypt</option>
    <option value="El Salvador" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'El Salvador' ? 'selected' : ''; ?>>El Salvador</option>
    <option value="Equatorial Guinea" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Equatorial Guinea' ? 'selected' : ''; ?>>Equatorial Guinea</option>
    <option value="Eritrea" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Eritrea' ? 'selected' : ''; ?>>Eritrea</option>
    <option value="Estonia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Estonia' ? 'selected' : ''; ?>>Estonia</option>
    <option value="Eswatini" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Eswatini' ? 'selected' : ''; ?>>Eswatini</option>
    <option value="Ethiopia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Ethiopia' ? 'selected' : ''; ?>>Ethiopia</option>
    <option value="Fiji" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Fiji' ? 'selected' : ''; ?>>Fiji</option>
    <option value="Finland" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Finland' ? 'selected' : ''; ?>>Finland</option>
    <option value="France" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'France' ? 'selected' : ''; ?>>France</option>
    <option value="Gabon" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Gabon' ? 'selected' : ''; ?>>Gabon</option>
    <option value="Gambia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Gambia' ? 'selected' : ''; ?>>Gambia</option>
    <option value="Georgia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Georgia' ? 'selected' : ''; ?>>Georgia</option>
    <option value="Germany" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Germany' ? 'selected' : ''; ?>>Germany</option>
    <option value="Ghana" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Ghana' ? 'selected' : ''; ?>>Ghana</option>
    <option value="Greece" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Greece' ? 'selected' : ''; ?>>Greece</option>
    <option value="Grenada" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Grenada' ? 'selected' : ''; ?>>Grenada</option>
    <option value="Guatemala" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Guatemala' ? 'selected' : ''; ?>>Guatemala</option>
    <option value="Guinea" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Guinea' ? 'selected' : ''; ?>>Guinea</option>
    <option value="Guinea-Bissau" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Guinea-Bissau' ? 'selected' : ''; ?>>Guinea-Bissau</option>
    <option value="Guyana" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Guyana' ? 'selected' : ''; ?>>Guyana</option>
    <option value="Haiti" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Haiti' ? 'selected' : ''; ?>>Haiti</option>
    <option value="Honduras" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Honduras' ? 'selected' : ''; ?>>Honduras</option>
    <option value="Hungary" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Hungary' ? 'selected' : ''; ?>>Hungary</option>
    <option value="Iceland" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Iceland' ? 'selected' : ''; ?>>Iceland</option>
    <option value="India" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'India' ? 'selected' : ''; ?>>India</option>
    <option value="Indonesia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Indonesia' ? 'selected' : ''; ?>>Indonesia</option>
    <option value="Iran" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Iran' ? 'selected' : ''; ?>>Iran</option>
    <option value="Iraq" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Iraq' ? 'selected' : ''; ?>>Iraq</option>
    <option value="Ireland" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Ireland' ? 'selected' : ''; ?>>Ireland</option>
    <option value="Israel" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Israel' ? 'selected' : ''; ?>>Israel</option>
    <option value="Italy" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Italy' ? 'selected' : ''; ?>>Italy</option>
    <option value="Jamaica" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Jamaica' ? 'selected' : ''; ?>>Jamaica</option>
    <option value="Japan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Japan' ? 'selected' : ''; ?>>Japan</option>
    <option value="Jordan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Jordan' ? 'selected' : ''; ?>>Jordan</option>
    <option value="Kazakhstan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Kazakhstan' ? 'selected' : ''; ?>>Kazakhstan</option>
    <option value="Kenya" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Kenya' ? 'selected' : ''; ?>>Kenya</option>
    <option value="Kiribati" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Kiribati' ? 'selected' : ''; ?>>Kiribati</option>
    <option value="Korea, North" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Korea, North' ? 'selected' : ''; ?>>Korea, North</option>
    <option value="Korea, South" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Korea, South' ? 'selected' : ''; ?>>Korea, South</option>
    <option value="Kosovo" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Kosovo' ? 'selected' : ''; ?>>Kosovo</option>
    <option value="Kuwait" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Kuwait' ? 'selected' : ''; ?>>Kuwait</option>
    <option value="Kyrgyzstan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Kyrgyzstan' ? 'selected' : ''; ?>>Kyrgyzstan</option>
    <option value="Laos" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Laos' ? 'selected' : ''; ?>>Laos</option>
    <option value="Latvia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Latvia' ? 'selected' : ''; ?>>Latvia</option>
    <option value="Lebanon" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Lebanon' ? 'selected' : ''; ?>>Lebanon</option>
    <option value="Lesotho" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Lesotho' ? 'selected' : ''; ?>>Lesotho</option>
    <option value="Liberia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Liberia' ? 'selected' : ''; ?>>Liberia</option>
    <option value="Libya" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Libya' ? 'selected' : ''; ?>>Libya</option>
    <option value="Liechtenstein" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Liechtenstein' ? 'selected' : ''; ?>>Liechtenstein</option>
    <option value="Lithuania" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Lithuania' ? 'selected' : ''; ?>>Lithuania</option>
    <option value="Luxembourg" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Luxembourg' ? 'selected' : ''; ?>>Luxembourg</option>
    <option value="Madagascar" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Madagascar' ? 'selected' : ''; ?>>Madagascar</option>
    <option value="Malawi" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Malawi' ? 'selected' : ''; ?>>Malawi</option>
    <option value="Malaysia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Malaysia' ? 'selected' : ''; ?>>Malaysia</option>
    <option value="Maldives" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Maldives' ? 'selected' : ''; ?>>Maldives</option>
    <option value="Mali" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Mali' ? 'selected' : ''; ?>>Mali</option>
    <option value="Malta" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Malta' ? 'selected' : ''; ?>>Malta</option>
    <option value="Marshall Islands" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Marshall Islands' ? 'selected' : ''; ?>>Marshall Islands</option>
    <option value="Mauritania" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Mauritania' ? 'selected' : ''; ?>>Mauritania</option>
    <option value="Mauritius" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Mauritius' ? 'selected' : ''; ?>>Mauritius</option>
    <option value="Mexico" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Mexico' ? 'selected' : ''; ?>>Mexico</option>
    <option value="Micronesia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Micronesia' ? 'selected' : ''; ?>>Micronesia</option>
    <option value="Moldova" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Moldova' ? 'selected' : ''; ?>>Moldova</option>
    <option value="Monaco" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Monaco' ? 'selected' : ''; ?>>Monaco</option>
    <option value="Mongolia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Mongolia' ? 'selected' : ''; ?>>Mongolia</option>
    <option value="Montenegro" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Montenegro' ? 'selected' : ''; ?>>Montenegro</option>
    <option value="Morocco" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Morocco' ? 'selected' : ''; ?>>Morocco</option>
    <option value="Mozambique" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Mozambique' ? 'selected' : ''; ?>>Mozambique</option>
    <option value="Myanmar" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Myanmar' ? 'selected' : ''; ?>>Myanmar</option>
    <option value="Namibia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Namibia' ? 'selected' : ''; ?>>Namibia</option>
    <option value="Nauru" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Nauru' ? 'selected' : ''; ?>>Nauru</option>
    <option value="Nepal" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Nepal' ? 'selected' : ''; ?>>Nepal</option>
    <option value="Netherlands" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Netherlands' ? 'selected' : ''; ?>>Netherlands</option>
    <option value="New Zealand" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'New Zealand' ? 'selected' : ''; ?>>New Zealand</option>
    <option value="Nicaragua" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Nicaragua' ? 'selected' : ''; ?>>Nicaragua</option>
    <option value="Niger" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Niger' ? 'selected' : ''; ?>>Niger</option>
    <option value="Nigeria" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Nigeria' ? 'selected' : ''; ?>>Nigeria</option>
    <option value="North Macedonia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'North Macedonia' ? 'selected' : ''; ?>>North Macedonia</option>
    <option value="Norway" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Norway' ? 'selected' : ''; ?>>Norway</option>
    <option value="Oman" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Oman' ? 'selected' : ''; ?>>Oman</option>
    <option value="Pakistan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Pakistan' ? 'selected' : ''; ?>>Pakistan</option>
    <option value="Palau" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Palau' ? 'selected' : ''; ?>>Palau</option>
    <option value="Palestine, State of" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Palestine, State of' ? 'selected' : ''; ?>>Palestine, State of</option>
    <option value="Panama" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Panama' ? 'selected' : ''; ?>>Panama</option>
    <option value="Papua New Guinea" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Papua New Guinea' ? 'selected' : ''; ?>>Papua New Guinea</option>
    <option value="Paraguay" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Paraguay' ? 'selected' : ''; ?>>Paraguay</option>
    <option value="Peru" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Peru' ? 'selected' : ''; ?>>Peru</option>
    <option value="Philippines" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Philippines' ? 'selected' : ''; ?>>Philippines</option>
    <option value="Poland" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Poland' ? 'selected' : ''; ?>>Poland</option>
    <option value="Portugal" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Portugal' ? 'selected' : ''; ?>>Portugal</option>
    <option value="Qatar" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Qatar' ? 'selected' : ''; ?>>Qatar</option>
    <option value="Romania" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Romania' ? 'selected' : ''; ?>>Romania</option>
    <option value="Russia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Russia' ? 'selected' : ''; ?>>Russia</option>
    <option value="Rwanda" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Rwanda' ? 'selected' : ''; ?>>Rwanda</option>
    <option value="Saint Kitts and Nevis" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Saint Kitts and Nevis' ? 'selected' : ''; ?>>Saint Kitts and Nevis</option>
    <option value="Saint Lucia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Saint Lucia' ? 'selected' : ''; ?>>Saint Lucia</option>
    <option value="Saint Vincent and the Grenadines" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Saint Vincent and the Grenadines' ? 'selected' : ''; ?>>Saint Vincent and the Grenadines</option>
    <option value="Samoa" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Samoa' ? 'selected' : ''; ?>>Samoa</option>
    <option value="San Marino" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'San Marino' ? 'selected' : ''; ?>>San Marino</option>
    <option value="Sao Tome and Principe" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Sao Tome and Principe' ? 'selected' : ''; ?>>Sao Tome and Principe</option>
    <option value="Saudi Arabia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Saudi Arabia' ? 'selected' : ''; ?>>Saudi Arabia</option>
    <option value="Senegal" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Senegal' ? 'selected' : ''; ?>>Senegal</option>
    <option value="Serbia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Serbia' ? 'selected' : ''; ?>>Serbia</option>
    <option value="Seychelles" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Seychelles' ? 'selected' : ''; ?>>Seychelles</option>
    <option value="Sierra Leone" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Sierra Leone' ? 'selected' : ''; ?>>Sierra Leone</option>
    <option value="Singapore" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Singapore' ? 'selected' : ''; ?>>Singapore</option>
    <option value="Slovakia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Slovakia' ? 'selected' : ''; ?>>Slovakia</option>
    <option value="Slovenia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Slovenia' ? 'selected' : ''; ?>>Slovenia</option>
    <option value="Solomon Islands" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Solomon Islands' ? 'selected' : ''; ?>>Solomon Islands</option>
    <option value="Somalia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Somalia' ? 'selected' : ''; ?>>Somalia</option>
    <option value="South Africa" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'South Africa' ? 'selected' : ''; ?>>South Africa</option>
    <option value="South Sudan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'South Sudan' ? 'selected' : ''; ?>>South Sudan</option>
    <option value="Spain" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Spain' ? 'selected' : ''; ?>>Spain</option>
    <option value="Sri Lanka" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Sri Lanka' ? 'selected' : ''; ?>>Sri Lanka</option>
    <option value="Sudan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Sudan' ? 'selected' : ''; ?>>Sudan</option>
    <option value="Suriname" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Suriname' ? 'selected' : ''; ?>>Suriname</option>
    <option value="Sweden" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Sweden' ? 'selected' : ''; ?>>Sweden</option>
    <option value="Switzerland" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Switzerland' ? 'selected' : ''; ?>>Switzerland</option>
    <option value="Syria" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Syria' ? 'selected' : ''; ?>>Syria</option>
    <option value="Taiwan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Taiwan' ? 'selected' : ''; ?>>Taiwan</option>
    <option value="Tajikistan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Tajikistan' ? 'selected' : ''; ?>>Tajikistan</option>
    <option value="Tanzania" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Tanzania' ? 'selected' : ''; ?>>Tanzania</option>
    <option value="Thailand" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Thailand' ? 'selected' : ''; ?>>Thailand</option>
    <option value="Timor-Leste" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Timor-Leste' ? 'selected' : ''; ?>>Timor-Leste</option>
    <option value="Togo" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Togo' ? 'selected' : ''; ?>>Togo</option>
    <option value="Tonga" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Tonga' ? 'selected' : ''; ?>>Tonga</option>
    <option value="Trinidad and Tobago" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Trinidad and Tobago' ? 'selected' : ''; ?>>Trinidad and Tobago</option>
    <option value="Tunisia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Tunisia' ? 'selected' : ''; ?>>Tunisia</option>
    <option value="Turkey" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Turkey' ? 'selected' : ''; ?>>Turkey</option>
    <option value="Turkmenistan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Turkmenistan' ? 'selected' : ''; ?>>Turkmenistan</option>
    <option value="Tuvalu" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Tuvalu' ? 'selected' : ''; ?>>Tuvalu</option>
    <option value="Uganda" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Uganda' ? 'selected' : ''; ?>>Uganda</option>
    <option value="Ukraine" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Ukraine' ? 'selected' : ''; ?>>Ukraine</option>
    <option value="United Arab Emirates" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'United Arab Emirates' ? 'selected' : ''; ?>>United Arab Emirates</option>
    <option value="United Kingdom" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'United Kingdom' ? 'selected' : ''; ?>>United Kingdom</option>
    <option value="United States" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'United States' ? 'selected' : ''; ?>>United States</option>
    <option value="Uruguay" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Uruguay' ? 'selected' : ''; ?>>Uruguay</option>
    <option value="Uzbekistan" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Uzbekistan' ? 'selected' : ''; ?>>Uzbekistan</option>
    <option value="Vanuatu" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Vanuatu' ? 'selected' : ''; ?>>Vanuatu</option>
    <option value="Vatican City" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Vatican City' ? 'selected' : ''; ?>>Vatican City</option>
    <option value="Venezuela" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Venezuela' ? 'selected' : ''; ?>>Venezuela</option>
    <option value="Vietnam" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Vietnam' ? 'selected' : ''; ?>>Vietnam</option>
    <option value="Yemen" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Yemen' ? 'selected' : ''; ?>>Yemen</option>
    <option value="Zambia" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Zambia' ? 'selected' : ''; ?>>Zambia</option>
    <option value="Zimbabwe" <?php echo isset($data['Nationality']) && $data['Nationality'] == 'Zimbabwe' ? 'selected' : ''; ?>>Zimbabwe</option>
</select>


                <label for="password" class="form-label">Age_Years</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Age_Years']) ? htmlspecialchars($data['Age_Years']) : ''; ?>" id="password"
                    name="Age_Years" placeholder="Enter your Age_Years">

                <label for="password" class="form-label">Price Min</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Price_Min']) ? htmlspecialchars($data['Price_Min']) : ''; ?>" id="password"
                    name="Price_Min" placeholder="Enter your Price Min">

                <label for="password" class="form-label">Price Max</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Price_Max']) ? htmlspecialchars($data['Price_Max']) : ''; ?>" id="password"
                    name="Price_Max" placeholder="Enter your Price Max">



                {{-- <label for="password" class="form-label">Created On</label>
      <input type="text" class="form-control" value={{$data["CSI"]}} id="password" name="Created_On" placeholder="Enter your Created On">

      <label for="password" class="form-label">Update On</label>
      <input type="text" class="form-control" value={{$data["CSI"]}} id="password" name="Update_On" placeholder="Enter your Update On"> --}}


                <button type="submit">Submit</button>
            </form>

        </div>


    </div>
    @include('footer')
</body>

</html>
