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
    @php
                    $moduleNames = session(
                        'module_names',
                        (object) [
                            'material' => 'Materials',
                            'resource' => 'Resources',
                            'service' => 'Services',
                            'equipment' => 'Equipments',
                            'reference' => 'Reference',
                            'gallery' => 'Gallery',
                            'knowledgebase'=>'KnowledgeBase'
                        ],
                    );
                @endphp
    <div class="container">
        <div class="">
            <h2 class="mt-4 text-center">Add {{$moduleNames->resource}} </h2>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <label for="username">CSI</label>
                <input type="text" class="form-control" id="username" name="csi" placeholder="Enter CSI">

                <label for="password">Name</label>
                <input type="text" class="form-control" id="password" name="Name" placeholder="Enter your Name">

                <label for="password" class="form-label">Qualification</label>
                <input type="text" class="form-control" id="password" name="Qualification"
                    placeholder="Enter your Qualification">

                <label for="password" class="form-label">Experience</label>
                <input type="text" class="form-control" id="password" name="Experience"
                    placeholder="Enter your Experience">

                <label for="password" class="form-label">Awards</label>
                <input type="text" class="form-control" id="password" name="Awards"
                    placeholder="Enter your Awards">

                <label for="password" class="form-label">Current_Salary_All</label>
                <input type="text" class="form-control" id="password" name="Current_Salary_All"
                    placeholder="Enter your Current_Salary_All">

                <label for="currency" class="form-label">Currency</label>
                <select class="form-control" id="currency" name="Currency">
                    <option value="">Select your Currency</option>
                    <option value="AED">AED - United Arab Emirates Dirham</option>
                    <option value="AFN">AFN - Afghan Afghani</option>
                    <option value="ALL">ALL - Albanian Lek</option>
                    <option value="AMD">AMD - Armenian Dram</option>
                    <option value="ANG">ANG - Netherlands Antillean Guilder</option>
                    <option value="AOA">AOA - Angolan Kwanza</option>
                    <option value="ARS">ARS - Argentine Peso</option>
                    <option value="AUD">AUD - Australian Dollar</option>
                    <option value="AWG">AWG - Aruban Florin</option>
                    <option value="AZN">AZN - Azerbaijani Manat</option>
                    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
                    <option value="BBD">BBD - Barbadian Dollar</option>
                    <option value="BDT">BDT - Bangladeshi Taka</option>
                    <option value="BGN">BGN - Bulgarian Lev</option>
                    <option value="BHD">BHD - Bahraini Dinar</option>
                    <option value="BIF">BIF - Burundian Franc</option>
                    <option value="BMD">BMD - Bermudian Dollar</option>
                    <option value="BND">BND - Brunei Dollar</option>
                    <option value="BOB">BOB - Bolivian Boliviano</option>
                    <option value="BRL">BRL - Brazilian Real</option>
                    <option value="BSD">BSD - Bahamian Dollar</option>
                    <option value="BTN">BTN - Bhutanese Ngultrum</option>
                    <option value="BWP">BWP - Botswanan Pula</option>
                    <option value="BYN">BYN - Belarusian Ruble</option>
                    <option value="BZD">BZD - Belize Dollar</option>
                    <option value="CAD">CAD - Canadian Dollar</option>
                    <option value="CDF">CDF - Congolese Franc</option>
                    <option value="CHF">CHF - Swiss Franc</option>
                    <option value="CLP">CLP - Chilean Peso</option>
                    <option value="CNY">CNY - Chinese Yuan</option>
                    <option value="COP">COP - Colombian Peso</option>
                    <option value="CRC">CRC - Costa Rican Colón</option>
                    <option value="CUP">CUP - Cuban Peso</option>
                    <option value="CVE">CVE - Cape Verdean Escudo</option>
                    <option value="CZK">CZK - Czech Republic Koruna</option>
                    <option value="DJF">DJF - Djiboutian Franc</option>
                    <option value="DKK">DKK - Danish Krone</option>
                    <option value="DOP">DOP - Dominican Peso</option>
                    <option value="DZD">DZD - Algerian Dinar</option>
                    <option value="EGP">EGP - Egyptian Pound</option>
                    <option value="ERN">ERN - Eritrean Nakfa</option>
                    <option value="ETB">ETB - Ethiopian Birr</option>
                    <option value="EUR">EUR - Euro</option>
                    <option value="FJD">FJD - Fijian Dollar</option>
                    <option value="FKP">FKP - Falkland Islands Pound</option>
                    <option value="FOK">FOK - Faroese Króna</option>
                    <option value="GBP">GBP - British Pound Sterling</option>
                    <option value="GEL">GEL - Georgian Lari</option>
                    <option value="GGP">GGP - Guernsey Pound</option>
                    <option value="GHS">GHS - Ghanaian Cedi</option>
                    <option value="GIP">GIP - Gibraltar Pound</option>
                    <option value="GMD">GMD - Gambian Dalasi</option>
                    <option value="GNF">GNF - Guinean Franc</option>
                    <option value="GTQ">GTQ - Guatemalan Quetzal</option>
                    <option value="GYD">GYD - Guyanaese Dollar</option>
                    <option value="HKD">HKD - Hong Kong Dollar</option>
                    <option value="HNL">HNL - Honduran Lempira</option>
                    <option value="HRK">HRK - Croatian Kuna</option>
                    <option value="HTG">HTG - Haitian Gourde</option>
                    <option value="HUF">HUF - Hungarian Forint</option>
                    <option value="IDR">IDR - Indonesian Rupiah</option>
                    <option value="ILS">ILS - Israeli New Sheqel</option>
                    <option value="IMP">IMP - Isle of Man Pound</option>
                    <option value="INR">INR - Indian Rupee</option>
                    <option value="IQD">IQD - Iraqi Dinar</option>
                    <option value="IRR">IRR - Iranian Rial</option>
                    <option value="ISK">ISK - Icelandic Króna</option>
                    <option value="JEP">JEP - Jersey Pound</option>
                    <option value="JMD">JMD - Jamaican Dollar</option>
                    <option value="JOD">JOD - Jordanian Dinar</option>
                    <option value="JPY">JPY - Japanese Yen</option>
                    <option value="KES">KES - Kenyan Shilling</option>
                    <option value="KGS">KGS - Kyrgystani Som</option>
                    <option value="KHR">KHR - Cambodian Riel</option>
                    <option value="KID">KID - Kiribati Dollar</option>
                    <option value="KMF">KMF - Comorian Franc</option>
                    <option value="KRW">KRW - South Korean Won</option>
                    <option value="KWD">KWD - Kuwaiti Dinar</option>
                    <option value="KYD">KYD - Cayman Islands Dollar</option>
                    <option value="KZT">KZT - Kazakhstani Tenge</option>
                    <option value="LAK">LAK - Laotian Kip</option>
                    <option value="LBP">LBP - Lebanese Pound</option>
                    <option value="LKR">LKR - Sri Lankan Rupee</option>
                    <option value="LRD">LRD - Liberian Dollar</option>
                    <option value="LSL">LSL - Lesotho Loti</option>
                    <option value="LYD">LYD - Libyan Dinar</option>
                    <option value="MAD">MAD - Moroccan Dirham</option>
                    <option value="MDL">MDL - Moldovan Leu</option>
                    <option value="MGA">MGA - Malagasy Ariary</option>
                    <option value="MKD">MKD - Macedonian Denar</option>
                    <option value="MMK">MMK - Myanma Kyat</option>
                    <option value="MNT">MNT - Mongolian Tugrik</option>
                    <option value="MOP">MOP - Macanese Pataca</option>
                    <option value="MRU">MRU - Mauritanian Ouguiya</option>
                    <option value="MUR">MUR - Mauritian Rupee</option>
                    <option value="MVR">MVR - Maldivian Rufiyaa</option>
                    <option value="MWK">MWK - Malawian Kwacha</option>
                    <option value="MXN">MXN - Mexican Peso</option>
                    <option value="MYR">MYR - Malaysian Ringgit</option>
                    <option value="MZN">MZN - Mozambican Metical</option>
                    <option value="NAD">NAD - Namibian Dollar</option>
                    <option value="NGN">NGN - Nigerian Naira</option>
                    <option value="NIO">NIO - Nicaraguan Córdoba</option>
                    <option value="NOK">NOK - Norwegian Krone</option>
                    <option value="NPR">NPR - Nepalese Rupee</option>
                    <option value="NZD">NZD - New Zealand Dollar</option>
                    <option value="OMR">OMR - Omani Rial</option>
                    <option value="PAB">PAB - Panamanian Balboa</option>
                    <option value="PEN">PEN - Peruvian Sol</option>
                    <option value="PGK">PGK - Papua New Guinean Kina</option>
                    <option value="PHP">PHP - Philippine Peso</option>
                    <option value="PKR">PKR - Pakistani Rupee</option>
                    <option value="PLN">PLN - Polish Zloty</option>
                    <option value="PYG">PYG - Paraguayan Guarani</option>
                    <option value="QAR">QAR - Qatari Rial</option>
                    <option value="RON">RON - Romanian Leu</option>
                    <option value="RSD">RSD - Serbian Dinar</option>
                    <option value="RUB">RUB - Russian Ruble</option>
                    <option value="RWF">RWF - Rwandan Franc</option>
                    <option value="SAR">SAR - Saudi Riyal</option>
                    <option value="SBD">SBD - Solomon Islands Dollar</option>
                    <option value="SCR">SCR - Seychellois Rupee</option>
                    <option value="SDG">SDG - Sudanese Pound</option>
                    <option value="SEK">SEK - Swedish Krona</option>
                    <option value="SGD">SGD - Singapore Dollar</option>
                    <option value="SHP">SHP - Saint Helena Pound</option>
                    <option value="SLL">SLL - Sierra Leonean Leone</option>
                    <option value="SOS">SOS - Somali Shilling</option>
                    <option value="SRD">SRD - Surinamese Dollar</option>
                    <option value="SSP">SSP - South Sudanese Pound</option>
                    <option value="STN">STN - São Tomé and Príncipe Dobra</option>
                    <option value="SYP">SYP - Syrian Pound</option>
                    <option value="SZL">SZL - Swazi Lilangeni</option>
                    <option value="THB">THB - Thai Baht</option>
                    <option value="TJS">TJS - Tajikistani Somoni</option>
                    <option value="TMT">TMT - Turkmenistani Manat</option>
                    <option value="TND">TND - Tunisian Dinar</option>
                    <option value="TOP">TOP - Tongan Paʻanga</option>
                    <option value="TRY">TRY - Turkish Lira</option>
                    <option value="TTD">TTD - Trinidad and Tobago Dollar</option>
                    <option value="TVD">TVD - Tuvaluan Dollar</option>
                    <option value="TWD">TWD - New Taiwan Dollar</option>
                    <option value="TZS">TZS - Tanzanian Shilling</option>
                    <option value="UAH">UAH - Ukrainian Hryvnia</option>
                    <option value="UGX">UGX - Ugandan Shilling</option>
                    <option value="USD">USD - United States Dollar</option>
                    <option value="UYU">UYU - Uruguayan Peso</option>
                    <option value="UZS">UZS - Uzbekistan Som</option>
                    <option value="VES">VES - Venezuelan Bolívar Soberano</option>
                    <option value="VND">VND - Vietnamese Đồng</option>
                    <option value="VUV">VUV - Vanuatu Vatu</option>
                    <option value="WST">WST - Samoan Tālā</option>
                    <option value="XAF">XAF - Central African CFA Franc</option>
                    <option value="XCD">XCD - East Caribbean Dollar</option>
                    <option value="XDR">XDR - Special Drawing Rights</option>
                    <option value="XOF">XOF - West African CFA franc</option>
                    <option value="XPF">XPF - CFP Franc</option>
                    <option value="YER">YER - Yemeni Rial</option>
                    <option value="ZAR">ZAR - South African Rand</option>
                    <option value="ZMW">ZMW - Zambian Kwacha</option>
                    <option value="ZWL">ZWL - Zimbabwean Dollar</option>
                </select>


                <label for="password" class="form-label">Photo</label>
                <input type="file" class="form-control" id="password" name="Photo"
                    placeholder="Enter your Photo">

                <label for="password" class="form-label">Notes</label>
                <input type="text" class="form-control" id="password" name="Notes"
                    placeholder="Enter your Notes">

                <label for="password" class="form-label">Engagement Type</label>
                
                <select class="form-control" id="Engagement_Type" name="Engagement_Type">

                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Free Lancer">Free Lancer</option>

                </select>


                <label for="password" class="form-label">Availability</label>
                <input type="text" class="form-control" id="password" name="Availability"
                    placeholder="Enter your Availability">

                <label for="password" class="form-label">Location</label>
                <input type="text" class="form-control" id="password" name="Location"
                    placeholder="Enter your Location">

                <label for="nationality" class="form-label">Nationality</label>
                <select class="form-control" id="nationality" name="nationality">
                    <option value="">Select your Nationality</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cabo Verde">Cabo Verde</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                    <option value="Congo, Republic of the">Congo, Republic of the</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Eswatini">Eswatini</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Greece">Greece</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea, North">Korea, North</option>
                    <option value="Korea, South">Korea, South</option>
                    <option value="Kosovo">Kosovo</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia">Micronesia</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="North Macedonia">North Macedonia</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestine, State of">Palestine, State of</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-Leste">Timor-Leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City">Vatican City</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>


                <label for="password" class="form-label">Age_Years</label>
                <input type="text" class="form-control" id="password" name="Age_Years"
                    placeholder="Enter your Age_Years">

                <label for="password" class="form-label">Price Min</label>
                <input type="text" class="form-control" id="password" name="Price_Min"
                    placeholder="Enter your Price Min">

                <label for="password" class="form-label">Price Max</label>
                <input type="text" class="form-control" id="password" name="Price_Max"
                    placeholder="Enter your Price Max">

                <label for="password" class="form-label">References</label>
                <input type="text" class="form-control" id="password" name="alternate_csi"
                    placeholder="Enter your References">

                <label for="password" class="form-label">Notes</label>
                <input type="text" class="form-control" id="password" name="notes"
                    placeholder="Enter your Notes">

                {{-- <label for="password" class="form-label">Created On</label>
      <input type="text" class="form-control" id="password" name="Created_On" placeholder="Enter your Created On">

      <label for="password" class="form-label">Update On</label>
      <input type="text" class="form-control" id="password" name="Update_On" placeholder="Enter your Update On"> --}}


                <button type="submit">Submit</button>
            </form>

        </div>


    </div>
    @include('footer')
</body>

</html>
