<?php 
function country_list($sel) {
	$sel_text = ' selected="selected"';
	$sel = strtoupper($sel);
	?>
    <option value=" "<?php echo ($sel == ' ') ? $sel_text : ''; ?>></option>  
    <option value="US"<?php echo ($sel == 'US') ? $sel_text : ''; ?>>United States</option>  
    <option value="AX"<?php echo ($sel == 'AX') ? $sel_text : ''; ?>>Åland Islands</option>
    <option value="AF"<?php echo ($sel == 'AF') ? $sel_text : ''; ?>>Afghanistan</option>
    <option value="AL"<?php echo ($sel == 'AL') ? $sel_text : ''; ?>>Albania</option>
    <option value="DZ"<?php echo ($sel == 'DZ') ? $sel_text : ''; ?>>Algeria</option>
    <option value="AS"<?php echo ($sel == 'AS') ? $sel_text : ''; ?>>American Samoa</option>
    <option value="AD"<?php echo ($sel == 'AD') ? $sel_text : ''; ?>>Andorra</option>
    <option value="AO"<?php echo ($sel == 'AO') ? $sel_text : ''; ?>>Angola</option>
    <option value="AI"<?php echo ($sel == 'AI') ? $sel_text : ''; ?>>Anguilla</option>
    <option value="AQ"<?php echo ($sel == 'AQ') ? $sel_text : ''; ?>>Antarctica</option>
    <option value="AG"<?php echo ($sel == 'AG') ? $sel_text : ''; ?>>Antigua And Barbuda</option>
    <option value="AR"<?php echo ($sel == 'AR') ? $sel_text : ''; ?>>Argentina</option>
    <option value="AM"<?php echo ($sel == 'AM') ? $sel_text : ''; ?>>Armenia</option>
    <option value="AW"<?php echo ($sel == 'AW') ? $sel_text : ''; ?>>Aruba</option>
    <option value="AU"<?php echo ($sel == 'AU') ? $sel_text : ''; ?>>Australia</option>
    <option value="AT"<?php echo ($sel == 'AT') ? $sel_text : ''; ?>>Austria</option>
    <option value="AZ"<?php echo ($sel == 'AZ') ? $sel_text : ''; ?>>Azerbaijan</option>
    <option value="BS"<?php echo ($sel == 'BS') ? $sel_text : ''; ?>>Bahamas</option>
    <option value="BH"<?php echo ($sel == 'BH') ? $sel_text : ''; ?>>Bahrain</option>
    <option value="BD"<?php echo ($sel == 'BD') ? $sel_text : ''; ?>>Bangladesh</option>
    <option value="BB"<?php echo ($sel == 'BB') ? $sel_text : ''; ?>>Barbados</option>
    <option value="BY"<?php echo ($sel == 'BY') ? $sel_text : ''; ?>>Belarus</option>
    <option value="BE"<?php echo ($sel == 'BE') ? $sel_text : ''; ?>>Belgium</option>
    <option value="BZ"<?php echo ($sel == 'BZ') ? $sel_text : ''; ?>>Belize</option>
    <option value="BJ"<?php echo ($sel == 'BJ') ? $sel_text : ''; ?>>Benin</option>
    <option value="BM"<?php echo ($sel == 'BM') ? $sel_text : ''; ?>>Bermuda</option>
    <option value="BT"<?php echo ($sel == 'BT') ? $sel_text : ''; ?>>Bhutan</option>
    <option value="BO"<?php echo ($sel == 'BO') ? $sel_text : ''; ?>>Bolivia</option>
    <option value="BA"<?php echo ($sel == 'BA') ? $sel_text : ''; ?>>Bosnia And Herzegovina</option>
    <option value="BW"<?php echo ($sel == 'BW') ? $sel_text : ''; ?>>Botswana</option>
    <option value="BV"<?php echo ($sel == 'BV') ? $sel_text : ''; ?>>Bouvet Island</option>
    <option value="BR"<?php echo ($sel == 'BR') ? $sel_text : ''; ?>>Brazil</option>
    <option value="IO"<?php echo ($sel == 'IO') ? $sel_text : ''; ?>>British Indian Ocean Territory</option>
    <option value="BN"<?php echo ($sel == 'BN') ? $sel_text : ''; ?>>Brunei Darussalam</option>
    <option value="BG"<?php echo ($sel == 'BG') ? $sel_text : ''; ?>>Bulgaria</option>
    <option value="BF"<?php echo ($sel == 'BF') ? $sel_text : ''; ?>>Burkina Faso</option>
    <option value="BI"<?php echo ($sel == 'BI') ? $sel_text : ''; ?>>Burundi</option>
    <option value="KH"<?php echo ($sel == 'KH') ? $sel_text : ''; ?>>Cambodia</option>
    <option value="CM"<?php echo ($sel == 'CM') ? $sel_text : ''; ?>>Cameroon</option>
    <option value="CA"<?php echo ($sel == 'CA') ? $sel_text : ''; ?>>Canada</option>
    <option value="CV"<?php echo ($sel == 'CV') ? $sel_text : ''; ?>>Cape Verde</option>
    <option value="KY"<?php echo ($sel == 'KY') ? $sel_text : ''; ?>>Cayman Islands</option>
    <option value="CF"<?php echo ($sel == 'CF') ? $sel_text : ''; ?>>Central African Republic</option>
    <option value="TD"<?php echo ($sel == 'TD') ? $sel_text : ''; ?>>Chad</option>
    <option value="CL"<?php echo ($sel == 'CL') ? $sel_text : ''; ?>>Chile</option>
    <option value="CN"<?php echo ($sel == 'CN') ? $sel_text : ''; ?>>China</option>
    <option value="CX"<?php echo ($sel == 'CX') ? $sel_text : ''; ?>>Christmas Island</option>
    <option value="CC"<?php echo ($sel == 'CC') ? $sel_text : ''; ?>>Cocos (keeling) Islands</option>
    <option value="CO"<?php echo ($sel == 'CO') ? $sel_text : ''; ?>>Colombia</option>
    <option value="KM"<?php echo ($sel == 'KM') ? $sel_text : ''; ?>>Comoros</option>
    <option value="CG"<?php echo ($sel == 'CG') ? $sel_text : ''; ?>>Congo</option>
    <option value="CD"<?php echo ($sel == 'CD') ? $sel_text : ''; ?>>Congo, The Democratic Republic Of The</option>
    <option value="CK"<?php echo ($sel == 'CK') ? $sel_text : ''; ?>>Cook Islands</option>
    <option value="CR"<?php echo ($sel == 'CR') ? $sel_text : ''; ?>>Costa Rica</option>
    <option value="CI"<?php echo ($sel == 'CI') ? $sel_text : ''; ?>>Côte d'Ivoire</option>
    <option value="HR"<?php echo ($sel == 'HR') ? $sel_text : ''; ?>>Croatia</option>
    <option value="CU"<?php echo ($sel == 'CU') ? $sel_text : ''; ?>>Cuba</option>
    <option value="CY"<?php echo ($sel == 'CY') ? $sel_text : ''; ?>>Cyprus</option>
    <option value="CZ"<?php echo ($sel == 'CZ') ? $sel_text : ''; ?>>Czech Republic</option>
    <option value="DK"<?php echo ($sel == 'DK') ? $sel_text : ''; ?>>Denmark</option>
    <option value="DJ"<?php echo ($sel == 'DJ') ? $sel_text : ''; ?>>Djibouti</option>
    <option value="DM"<?php echo ($sel == 'DM') ? $sel_text : ''; ?>>Dominica</option>
    <option value="DO"<?php echo ($sel == 'DO') ? $sel_text : ''; ?>>Dominican Republic</option>
    <option value="EC"<?php echo ($sel == 'EC') ? $sel_text : ''; ?>>Ecuador</option>
    <option value="EG"<?php echo ($sel == 'EG') ? $sel_text : ''; ?>>Egypt</option>
    <option value="SV"<?php echo ($sel == 'SV') ? $sel_text : ''; ?>>El Salvador</option>
    <option value="GQ"<?php echo ($sel == 'GQ') ? $sel_text : ''; ?>>Equatorial Guinea</option>
    <option value="ER"<?php echo ($sel == 'ER') ? $sel_text : ''; ?>>Eritrea</option>
    <option value="EE"<?php echo ($sel == 'EE') ? $sel_text : ''; ?>>Estonia</option>
    <option value="ET"<?php echo ($sel == 'ET') ? $sel_text : ''; ?>>Ethiopia</option>
    <option value="FK"<?php echo ($sel == 'FK') ? $sel_text : ''; ?>>Falkland Islands (malvinas)</option>
    <option value="FO"<?php echo ($sel == 'FO') ? $sel_text : ''; ?>>Faroe Islands</option>
    <option value="FJ"<?php echo ($sel == 'FJ') ? $sel_text : ''; ?>>Fiji</option>
    <option value="FI"<?php echo ($sel == 'FI') ? $sel_text : ''; ?>>Finland</option>
    <option value="FR"<?php echo ($sel == 'FR') ? $sel_text : ''; ?>>France</option>
    <option value="GF"<?php echo ($sel == 'GF') ? $sel_text : ''; ?>>French Guiana</option>
    <option value="PF"<?php echo ($sel == 'PF') ? $sel_text : ''; ?>>French Polynesia</option>
    <option value="TF"<?php echo ($sel == 'TF') ? $sel_text : ''; ?>>French Southern Territories</option>
    <option value="GA"<?php echo ($sel == 'GA') ? $sel_text : ''; ?>>Gabon</option>
    <option value="GM"<?php echo ($sel == 'GM') ? $sel_text : ''; ?>>Gambia</option>
    <option value="GE"<?php echo ($sel == 'GE') ? $sel_text : ''; ?>>Georgia</option>
    <option value="DE"<?php echo ($sel == 'DE') ? $sel_text : ''; ?>>Germany</option>
    <option value="GH"<?php echo ($sel == 'GH') ? $sel_text : ''; ?>>Ghana</option>
    <option value="GI"<?php echo ($sel == 'GI') ? $sel_text : ''; ?>>Gibraltar</option>
    <option value="GR"<?php echo ($sel == 'GR') ? $sel_text : ''; ?>>Greece</option>
    <option value="GL"<?php echo ($sel == 'GL') ? $sel_text : ''; ?>>Greenland</option>
    <option value="GD"<?php echo ($sel == 'GD') ? $sel_text : ''; ?>>Grenada</option>
    <option value="GP"<?php echo ($sel == 'GP') ? $sel_text : ''; ?>>Guadeloupe</option>
    <option value="GU"<?php echo ($sel == 'GU') ? $sel_text : ''; ?>>Guam</option>
    <option value="GT"<?php echo ($sel == 'GT') ? $sel_text : ''; ?>>Guatemala</option>
    <option value="GG"<?php echo ($sel == 'GG') ? $sel_text : ''; ?>>Guernsey</option>
    <option value="GN"<?php echo ($sel == 'GN') ? $sel_text : ''; ?>>Guinea</option>
    <option value="GW"<?php echo ($sel == 'GW') ? $sel_text : ''; ?>>Guinea-bissau</option>
    <option value="GY"<?php echo ($sel == 'GY') ? $sel_text : ''; ?>>Guyana</option>
    <option value="HT"<?php echo ($sel == 'HT') ? $sel_text : ''; ?>>Haiti</option>
    <option value="HM"<?php echo ($sel == 'HM') ? $sel_text : ''; ?>>Heard Island And Mcdonald Islands</option>
    <option value="HN"<?php echo ($sel == 'HN') ? $sel_text : ''; ?>>Honduras</option>
    <option value="HK"<?php echo ($sel == 'HK') ? $sel_text : ''; ?>>Hong Kong</option>
    <option value="HU"<?php echo ($sel == 'HU') ? $sel_text : ''; ?>>Hungary</option>
    <option value="IS"<?php echo ($sel == 'IS') ? $sel_text : ''; ?>>Iceland</option>
    <option value="IN"<?php echo ($sel == 'IN') ? $sel_text : ''; ?>>India</option>
    <option value="ID"<?php echo ($sel == 'ID') ? $sel_text : ''; ?>>Indonesia</option>
    <option value="IR"<?php echo ($sel == 'IR') ? $sel_text : ''; ?>>Iran, Islamic Republic Of</option>
    <option value="IQ"<?php echo ($sel == 'IQ') ? $sel_text : ''; ?>>Iraq</option>
    <option value="IE"<?php echo ($sel == 'IE') ? $sel_text : ''; ?>>Ireland</option>
    <option value="IM"<?php echo ($sel == 'IM') ? $sel_text : ''; ?>>Isle Of Man</option>
    <option value="IL"<?php echo ($sel == 'IL') ? $sel_text : ''; ?>>Israel</option>
    <option value="IT"<?php echo ($sel == 'IT') ? $sel_text : ''; ?>>Italy</option>
    <option value="JM"<?php echo ($sel == 'JM') ? $sel_text : ''; ?>>Jamaica</option>
    <option value="JP"<?php echo ($sel == 'JP') ? $sel_text : ''; ?>>Japan</option>
    <option value="JE"<?php echo ($sel == 'JE') ? $sel_text : ''; ?>>Jersey</option>
    <option value="JO"<?php echo ($sel == 'JO') ? $sel_text : ''; ?>>Jordan</option>
    <option value="KZ"<?php echo ($sel == 'KZ') ? $sel_text : ''; ?>>Kazakhstan</option>
    <option value="KE"<?php echo ($sel == 'KE') ? $sel_text : ''; ?>>Kenya</option>
    <option value="KI"<?php echo ($sel == 'KI') ? $sel_text : ''; ?>>Kiribati</option>
    <option value="KP"<?php echo ($sel == 'KP') ? $sel_text : ''; ?>>Korea, Democratic People's Republic Of</option>
    <option value="KR"<?php echo ($sel == 'KR') ? $sel_text : ''; ?>>Korea, Republic Of</option>
    <option value="KW"<?php echo ($sel == 'KW') ? $sel_text : ''; ?>>Kuwait</option>
    <option value="KG"<?php echo ($sel == 'KG') ? $sel_text : ''; ?>>Kyrgyzstan</option>
    <option value="LA"<?php echo ($sel == 'LA') ? $sel_text : ''; ?>>Lao People's Democratic Republic</option>
    <option value="LV"<?php echo ($sel == 'LV') ? $sel_text : ''; ?>>Latvia</option>
    <option value="LB"<?php echo ($sel == 'LB') ? $sel_text : ''; ?>>Lebanon</option>
    <option value="LS"<?php echo ($sel == 'LS') ? $sel_text : ''; ?>>Lesotho</option>
    <option value="LR"<?php echo ($sel == 'LR') ? $sel_text : ''; ?>>Liberia</option>
    <option value="LY"<?php echo ($sel == 'LY') ? $sel_text : ''; ?>>Libyan Arab Jamahiriya</option>
    <option value="LI"<?php echo ($sel == 'LI') ? $sel_text : ''; ?>>Liechtenstein</option>
    <option value="LT"<?php echo ($sel == 'LT') ? $sel_text : ''; ?>>Lithuania</option>
    <option value="LU"<?php echo ($sel == 'LU') ? $sel_text : ''; ?>>Luxembourg</option>
    <option value="MO"<?php echo ($sel == 'MO') ? $sel_text : ''; ?>>Macao</option>
    <option value="MK"<?php echo ($sel == 'MK') ? $sel_text : ''; ?>>Macedonia, The Former Yugoslav Republic Of</option>
    <option value="MG"<?php echo ($sel == 'MG') ? $sel_text : ''; ?>>Madagascar</option>
    <option value="MW"<?php echo ($sel == 'MW') ? $sel_text : ''; ?>>Malawi</option>
    <option value="MY"<?php echo ($sel == 'MY') ? $sel_text : ''; ?>>Malaysia</option>
    <option value="MV"<?php echo ($sel == 'MV') ? $sel_text : ''; ?>>Maldives</option>
    <option value="ML"<?php echo ($sel == 'ML') ? $sel_text : ''; ?>>Mali</option>
    <option value="MT"<?php echo ($sel == 'MT') ? $sel_text : ''; ?>>Malta</option>
    <option value="MH"<?php echo ($sel == 'MH') ? $sel_text : ''; ?>>Marshall Islands</option>
    <option value="MQ"<?php echo ($sel == 'MQ') ? $sel_text : ''; ?>>Martinique</option>
    <option value="MR"<?php echo ($sel == 'MR') ? $sel_text : ''; ?>>Mauritania</option>
    <option value="MU"<?php echo ($sel == 'MU') ? $sel_text : ''; ?>>Mauritius</option>
    <option value="YT"<?php echo ($sel == 'YT') ? $sel_text : ''; ?>>Mayotte</option>
    <option value="MX"<?php echo ($sel == 'MX') ? $sel_text : ''; ?>>Mexico</option>
    <option value="FM"<?php echo ($sel == 'FM') ? $sel_text : ''; ?>>Micronesia, Federated States Of</option>
    <option value="MD"<?php echo ($sel == 'MD') ? $sel_text : ''; ?>>Moldova</option>
    <option value="MC"<?php echo ($sel == 'MC') ? $sel_text : ''; ?>>Monaco</option>
    <option value="MN"<?php echo ($sel == 'MN') ? $sel_text : ''; ?>>Mongolia</option>
    <option value="ME"<?php echo ($sel == 'ME') ? $sel_text : ''; ?>>Montenegro</option>
    <option value="MS"<?php echo ($sel == 'MS') ? $sel_text : ''; ?>>Montserrat</option>
    <option value="MA"<?php echo ($sel == 'MA') ? $sel_text : ''; ?>>Morocco</option>
    <option value="MZ"<?php echo ($sel == 'MZ') ? $sel_text : ''; ?>>Mozambique</option>
    <option value="MM"<?php echo ($sel == 'MM') ? $sel_text : ''; ?>>Myanmar</option>
    <option value="NA"<?php echo ($sel == 'NA') ? $sel_text : ''; ?>>Namibia</option>
    <option value="NR"<?php echo ($sel == 'NR') ? $sel_text : ''; ?>>Nauru</option>
    <option value="NP"<?php echo ($sel == 'NP') ? $sel_text : ''; ?>>Nepal</option>
    <option value="NL"<?php echo ($sel == 'NL') ? $sel_text : ''; ?>>Netherlands</option>
    <option value="AN"<?php echo ($sel == 'AN') ? $sel_text : ''; ?>>Netherlands Antilles</option>
    <option value="NC"<?php echo ($sel == 'NC') ? $sel_text : ''; ?>>New Caledonia</option>
    <option value="NZ"<?php echo ($sel == 'NZ') ? $sel_text : ''; ?>>New Zealand</option>
    <option value="NI"<?php echo ($sel == 'NI') ? $sel_text : ''; ?>>Nicaragua</option>
    <option value="NE"<?php echo ($sel == 'NE') ? $sel_text : ''; ?>>Niger</option>
    <option value="NG"<?php echo ($sel == 'NG') ? $sel_text : ''; ?>>Nigeria</option>
    <option value="NU"<?php echo ($sel == 'NU') ? $sel_text : ''; ?>>Niue</option>
    <option value="NF"<?php echo ($sel == 'NF') ? $sel_text : ''; ?>>Norfolk Island</option>
    <option value="MP"<?php echo ($sel == 'MP') ? $sel_text : ''; ?>>Northern Mariana Islands</option>
    <option value="NO"<?php echo ($sel == 'NO') ? $sel_text : ''; ?>>Norway</option>
    <option value="OM"<?php echo ($sel == 'OM') ? $sel_text : ''; ?>>Oman</option>
    <option value="PK"<?php echo ($sel == 'PK') ? $sel_text : ''; ?>>Pakistan</option>
    <option value="PW"<?php echo ($sel == 'PW') ? $sel_text : ''; ?>>Palau</option>
    <option value="PS"<?php echo ($sel == 'PS') ? $sel_text : ''; ?>>Palestinian Territory, Occupied</option>
    <option value="PA"<?php echo ($sel == 'PA') ? $sel_text : ''; ?>>Panama</option>
    <option value="PG"<?php echo ($sel == 'PG') ? $sel_text : ''; ?>>Papua New Guinea</option>
    <option value="PY"<?php echo ($sel == 'PY') ? $sel_text : ''; ?>>Paraguay</option>
    <option value="PE"<?php echo ($sel == 'PE') ? $sel_text : ''; ?>>Peru</option>
    <option value="PH"<?php echo ($sel == 'PH') ? $sel_text : ''; ?>>Philippines</option>
    <option value="PN"<?php echo ($sel == 'PN') ? $sel_text : ''; ?>>Pitcairn</option>
    <option value="PL"<?php echo ($sel == 'PL') ? $sel_text : ''; ?>>Poland</option>
    <option value="PT"<?php echo ($sel == 'PT') ? $sel_text : ''; ?>>Portugal</option>
    <option value="PR"<?php echo ($sel == 'PR') ? $sel_text : ''; ?>>Puerto Rico</option>
    <option value="QA"<?php echo ($sel == 'QA') ? $sel_text : ''; ?>>Qatar</option>
    <option value="RE"<?php echo ($sel == 'RE') ? $sel_text : ''; ?>>Réunion</option>
    <option value="RO"<?php echo ($sel == 'RO') ? $sel_text : ''; ?>>Romania</option>
    <option value="RU"<?php echo ($sel == 'RU') ? $sel_text : ''; ?>>Russian Federation</option>
    <option value="RW"<?php echo ($sel == 'RW') ? $sel_text : ''; ?>>Rwanda</option>
    <option value="BL"<?php echo ($sel == 'BL') ? $sel_text : ''; ?>>Saint Barthélemy</option>
    <option value="SH"<?php echo ($sel == 'SH') ? $sel_text : ''; ?>>Saint Helena</option>
    <option value="KN"<?php echo ($sel == 'KN') ? $sel_text : ''; ?>>Saint Kitts And Nevis</option>
    <option value="LC"<?php echo ($sel == 'LC') ? $sel_text : ''; ?>>Saint Lucia</option>
    <option value="MF"<?php echo ($sel == 'MF') ? $sel_text : ''; ?>>Saint Martin</option>
    <option value="PM"<?php echo ($sel == 'PM') ? $sel_text : ''; ?>>Saint Pierre And Miquelon</option>
    <option value="VC"<?php echo ($sel == 'VC') ? $sel_text : ''; ?>>Saint Vincent And The Grenadines</option>
    <option value="WS"<?php echo ($sel == 'WS') ? $sel_text : ''; ?>>Samoa</option>
    <option value="SM"<?php echo ($sel == 'SM') ? $sel_text : ''; ?>>San Marino</option>
    <option value="ST"<?php echo ($sel == 'ST') ? $sel_text : ''; ?>>Sao Tome And Principe</option>
    <option value="SA"<?php echo ($sel == 'SA') ? $sel_text : ''; ?>>Saudi Arabia</option>
    <option value="SN"<?php echo ($sel == 'SN') ? $sel_text : ''; ?>>Senegal</option>
    <option value="RS"<?php echo ($sel == 'RS') ? $sel_text : ''; ?>>Serbia</option>
    <option value="SC"<?php echo ($sel == 'SC') ? $sel_text : ''; ?>>Seychelles</option>
    <option value="SL"<?php echo ($sel == 'SL') ? $sel_text : ''; ?>>Sierra Leone</option>
    <option value="SG"<?php echo ($sel == 'SG') ? $sel_text : ''; ?>>Singapore</option>
    <option value="SK"<?php echo ($sel == 'SK') ? $sel_text : ''; ?>>Slovakia</option>
    <option value="SI"<?php echo ($sel == 'SI') ? $sel_text : ''; ?>>Slovenia</option>
    <option value="SB"<?php echo ($sel == 'SB') ? $sel_text : ''; ?>>Solomon Islands</option>
    <option value="SO"<?php echo ($sel == 'SO') ? $sel_text : ''; ?>>Somalia</option>
    <option value="ZA"<?php echo ($sel == 'ZA') ? $sel_text : ''; ?>>South Africa</option>
    <option value="GS"<?php echo ($sel == 'GS') ? $sel_text : ''; ?>>South Georgia And The South Sandwich Islands</option>
    <option value="ES"<?php echo ($sel == 'ES') ? $sel_text : ''; ?>>Spain</option>
    <option value="LK"<?php echo ($sel == 'LK') ? $sel_text : ''; ?>>Sri Lanka</option>
    <option value="SD"<?php echo ($sel == 'SD') ? $sel_text : ''; ?>>Sudan</option>
    <option value="SR"<?php echo ($sel == 'SR') ? $sel_text : ''; ?>>Suriname</option>
    <option value="SJ"<?php echo ($sel == 'SJ') ? $sel_text : ''; ?>>Svalbard And Jan Mayen</option>
    <option value="SZ"<?php echo ($sel == 'SZ') ? $sel_text : ''; ?>>Swaziland</option>
    <option value="SE"<?php echo ($sel == 'SE') ? $sel_text : ''; ?>>Sweden</option>
    <option value="CH"<?php echo ($sel == 'CH') ? $sel_text : ''; ?>>Switzerland</option>
    <option value="SY"<?php echo ($sel == 'SY') ? $sel_text : ''; ?>>Syrian Arab Republic</option>
    <option value="TW"<?php echo ($sel == 'TW') ? $sel_text : ''; ?>>Taiwan, Province Of China</option>
    <option value="TJ"<?php echo ($sel == 'TJ') ? $sel_text : ''; ?>>Tajikistan</option>
    <option value="TZ"<?php echo ($sel == 'TZ') ? $sel_text : ''; ?>>Tanzania, United Republic Of</option>
    <option value="TH"<?php echo ($sel == 'TH') ? $sel_text : ''; ?>>Thailand</option>
    <option value="TL"<?php echo ($sel == 'TL') ? $sel_text : ''; ?>>Timor-leste</option>
    <option value="TG"<?php echo ($sel == 'TG') ? $sel_text : ''; ?>>Togo</option>
    <option value="TK"<?php echo ($sel == 'TK') ? $sel_text : ''; ?>>Tokelau</option>
    <option value="TO"<?php echo ($sel == 'TO') ? $sel_text : ''; ?>>Tonga</option>
    <option value="TT"<?php echo ($sel == 'TT') ? $sel_text : ''; ?>>Trinidad And Tobago</option>
    <option value="TN"<?php echo ($sel == 'TN') ? $sel_text : ''; ?>>Tunisia</option>
    <option value="TR"<?php echo ($sel == 'TR') ? $sel_text : ''; ?>>Turkey</option>
    <option value="TM"<?php echo ($sel == 'TM') ? $sel_text : ''; ?>>Turkmenistan</option>
    <option value="TC"<?php echo ($sel == 'TC') ? $sel_text : ''; ?>>Turks And Caicos Islands</option>
    <option value="TV"<?php echo ($sel == 'TV') ? $sel_text : ''; ?>>Tuvalu</option>
    <option value="UG"<?php echo ($sel == 'UG') ? $sel_text : ''; ?>>Uganda</option>
    <option value="UA"<?php echo ($sel == 'UA') ? $sel_text : ''; ?>>Ukraine</option>
    <option value="AE"<?php echo ($sel == 'AE') ? $sel_text : ''; ?>>United Arab Emirates</option>
    <option value="GB"<?php echo ($sel == 'GB') ? $sel_text : ''; ?>>United Kingdom</option>
    <option value="UM"<?php echo ($sel == 'UM') ? $sel_text : ''; ?>>United States Minor Outlying Islands</option>
    <option value="UY"<?php echo ($sel == 'UY') ? $sel_text : ''; ?>>Uruguay</option>
    <option value="UZ"<?php echo ($sel == 'UZ') ? $sel_text : ''; ?>>Uzbekistan</option>
    <option value="VU"<?php echo ($sel == 'VU') ? $sel_text : ''; ?>>Vanuatu</option>
    <option value="VA"<?php echo ($sel == 'VA') ? $sel_text : ''; ?>>Vatican City State</option>
    <option value="VE"<?php echo ($sel == 'VE') ? $sel_text : ''; ?>>Venezuela</option>
    <option value="VN"<?php echo ($sel == 'VN') ? $sel_text : ''; ?>>Viet Nam</option>
    <option value="VG"<?php echo ($sel == 'VG') ? $sel_text : ''; ?>>Virgin Islands, British</option>
    <option value="VI"<?php echo ($sel == 'VI') ? $sel_text : ''; ?>>Virgin Islands, U.s.</option>
    <option value="WF"<?php echo ($sel == 'WF') ? $sel_text : ''; ?>>Wallis And Futuna</option>
    <option value="EH"<?php echo ($sel == 'EH') ? $sel_text : ''; ?>>Western Sahara</option>
    <option value="YE"<?php echo ($sel == 'YE') ? $sel_text : ''; ?>>Yemen</option>
    <option value="ZM"<?php echo ($sel == 'ZM') ? $sel_text : ''; ?>>Zambia</option>
    <option value="ZW"<?php echo ($sel == 'ZW') ? $sel_text : ''; ?>>Zimbabwe</option>
<?php } ?>